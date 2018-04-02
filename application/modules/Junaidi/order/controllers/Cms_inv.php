<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cms_inv extends MX_Controller {
	var $data = array();
    public function __construct()
    {
    	$this->load->model('transaksi_model');
    	$this->load->model('inv_model');
    	$this->data['menu'] = $this->transaksi_model->listMenu($this->session->userdata('previlage'));
        $this->load->library('email');
        // $this->pdf->set_option('enable_html5_parser', TRUE);
        if ($this->session->userdata('is_login') != true) {
            redirect('login');
        }
    }

    public function index(){

    	$sql = "SELECT * FROM tb_cms_inv WHERE id_conf = (SELECT MAX(id_conf) FROM tb_cms_inv)";
    	$this->data['result'] = $this->db->query($sql)->row_array();
    	if ($this->input->server('REQUEST_METHOD') == 'POST') {
    		$ret['status'] = 0;
        		if (is_array($this->data['result'])) {
        			// print_r($this->input->post());
        			$src['id_conf'] = $this->data['result']['id_conf'];
        			if (isset($_FILES['logo']['name'])) {
        				$config['upload_path']          = FCPATH.'./assets/file/';
		                $config['allowed_types']        = 'jpg|jpeg|png';
		                $config['max_size']             = 1000;

		                $this->load->library('upload', $config);
	                	$ret['upload'] = 1;
		                if ( ! $this->upload->do_upload('logo'))
		                {
		                    $ret['notif']['logo'] = $this->upload->display_errors();
		                }
		                else
		                {
		                    $upload_data = $this->upload->data();
		                    $data['logo'] = $upload_data['file_name'];
			    			if ($this->db->update('tb_cms_inv',$data,$src)) {
			    				$ret['status'] = 1;
			    				// $ret['url'] = site_url('order/cms_inv/list_template');
			    			}
		                }
        			}else{
	        			if ($this->db->update('tb_cms_inv',$this->input->post(),$src)) {
	        				$ret['status'] = 1;
	        				$ret['success'] = 'success update data';
	        			}
	        		}
        		}else{
        			$data = $this->input->post();
        			if ($this->db->insert('tb_cms_inv',$data)) {
        				$ret['status'] = 1;
        				$ret['success'] = 'success update data';
        			}
        		}
        	echo  json_encode($ret);
            exit();
    	}
    	// print_r($this->inv_model->getTemplate());
    	$this->data['template'] = $this->inv_model->getTemplate();
    	$this->load->view('template',$this->data);
    	$this->load->view('cms_inv',$this->data);
    	$this->load->view('footer');
    }

    public function invoice(){

    	$this->data['invoice'] = $this->inv_model->getInvoice();
    	$this->data['view'] = 'list';
    	$this->load->view('template',$this->data);
    	$this->load->view('master_invoice',$this->data);
    	$this->load->view('footer');
    }

    public function create_invoice(){

    	$sql = "SELECT * FROM tb_cms_inv WHERE id_conf = (SELECT MAX(id_conf) FROM tb_cms_inv)";
    	$result = $this->db->query($sql)->row_array();
    	if ($this->input->server('REQUEST_METHOD') == 'POST') {
    		$ret['state'] = 0;
    		$ret['status'] = 0;
    		$this->form_validation->set_error_delimiters('','');
    		$this->form_validation->set_rules('nama', 'Nama User', 'trim|required');
            $this->form_validation->set_rules('project', 'Nama Project', 'trim|required');
    		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
    		$this->form_validation->set_rules('tagihan', 'Total Tagihan', 'trim|required');
    		if ($this->form_validation->run() == true) {
    			$ret['state'] = 1;
    			$sql = 'SELECT MAX(id_invoice) as id_invoice from tb_invoice WHERE created LIKE "%'.date('Y-m-d').'%"';
				$tgl_transaksi = $this->db->query($sql)->row_array();
				// print_r($sql);
    			if (!is_null($tgl_transaksi['id_invoice'])) {
					$id_transaksi_max = $this->db->query($sql)->row_array();
					$data_transaksi = $id_transaksi_max['id_invoice']+1;
				}else{
					$data_transaksi = date('Ymd').'001';
				}

    			$data['perfix'] = $result['nomor_inv'];
    			$data['id_invoice'] = $data_transaksi;
    			$data['nama'] = $this->input->post('nama');
                $data['project'] = $this->input->post('project');
    			$data['deskripsi'] = $this->input->post('deskripsi');
    			$data['harga'] = $this->input->post('tagihan');
    			if ($this->db->insert('tb_invoice',$data)) {
    				$ret['status'] = 1;
    				$ret['url'] = site_url('order/cms_inv/invoice');
    			}

                // create invoice pdf
                // $filename   = $result['nomor_inv'];
                //if (file_exists(INVOICE_DIR . $filename)) return false;
                // $this->data['result'] = $this->inv_model->getCms();
                // $this->data['invoice'] = $this->inv_model->rowInvoice($filename);
                // $html = $this->load->view('invoice/'.$this->data['result']['nm_template'],$this->data,true);
                //$this->pdf->setBasePath("https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css");
                // $this->pdf->setPaper('A4', 'potrait');
                // $this->pdf->loadHtml($html);
                // $this->pdf->render();
                // $output = $this->pdf->output();
                // $invoice_dir  = $_SERVER['DOCUMENT_ROOT']."/module-space/assets/data_invoice/";
                // file_put_contents($invoice_dir . $filename.".pdf", $output);
    		}

    		$ret['notif']['nama'] = form_error('nama');
            $ret['notif']['project'] = form_error('project');
    		$ret['notif']['deskripsi'] = form_error('deskripsi');
    		$ret['notif']['tagihan'] = form_error('tagihan');
    		echo json_encode($ret);
    		exit();
    	}
    	$this->data['invoice'] = $this->inv_model->getInvoice();
    	$this->data['view'] = 'create';
    	$this->load->view('template',$this->data);
    	$this->load->view('master_invoice',$this->data);
    	$this->load->view('footer');
    }

    function get_pdf(){

        $param = $this->uri->segment_array();
        $invoice = end($param);
        $invoice_dir  = $_SERVER['DOCUMENT_ROOT']."/module-space/assets/data_invoice/";
        $namafile = $invoice.".pdf";

        header("Content-type:application/pdf");
        // It will be called downloaded.pdf
        header("Content-Disposition:attachment;filename='$namafile'");
        // The PDF source is in original.pdf
        readfile($invoice_dir.$namafile);
    }

    public function generate_pdf(){

        $filename   = 'INV20180323003'; //$this->invoice_model->get_filename($invoice);
        //if (file_exists(INVOICE_DIR . $filename)) return false;

        $this->data['result'] = $this->inv_model->getCms();
        $this->data['invoice'] = $this->inv_model->rowInvoice($filename);
        $html = $this->load->view($this->data['result']['nm_template'],$this->data,true);
        //$this->pdf->setBasePath("https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css");
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->loadHtml($html);
        $this->pdf->render();
        $output = $this->pdf->output();
        $invoice_dir  = $_SERVER['DOCUMENT_ROOT']."/module-space/assets/data_invoice/";
        file_put_contents($invoice_dir . $filename.".pdf", $output);
    }

    public function edit_invoice(){

    	$url = $this->uri->segment_array();
    	$id = end($url);
    	if ($this->input->server('REQUEST_METHOD') == 'POST') {
    		$ret['state'] = 0;
    		$ret['status'] = 0;
    		$this->form_validation->set_error_delimiters('','');
    		$this->form_validation->set_rules('nama', 'Nama User', 'trim|required');
    		$this->form_validation->set_rules('project', 'Nama Project', 'trim|required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi Project', 'trim|required');
    		$this->form_validation->set_rules('tagihan', 'Total Tagihan', 'trim|required');
    		if ($this->form_validation->run() == true) {
    			$ret['state'] = 1;
    			$data['nama'] = $this->input->post('nama');
                $data['project'] = $this->input->post('project');
    			$data['deskripsi'] = $this->input->post('deskripsi');
    			$data['harga'] = $this->input->post('tagihan');
    			if ($this->db->update('tb_invoice',$data,array('id_invoice' => $id))) {
    				$ret['status'] = 1;
    				$ret['url'] = site_url('order/cms_inv/invoice');
    			}
    		}
    		$ret['notif']['nama'] = form_error('nama');
    		$ret['notif']['project'] = form_error('project');
            $ret['notif']['deskripsi'] = form_error('deskripsi');
    		$ret['notif']['tagihan'] = form_error('tagihan');
    		echo json_encode($ret);
    		exit();
    	}
    	$this->data['invoice'] = $this->inv_model->rowInvoice($id);
    	$this->data['view'] = 'edit';
    	$this->load->view('template',$this->data);
    	$this->load->view('master_invoice',$this->data);
    	$this->load->view('footer');
    }

    public function preview_invoice(){

    	$url = $this->uri->segment_array();
    	$id = end($url);
    	$this->data['result'] = $this->inv_model->getCms();
    	$this->data['invoice'] = $this->inv_model->rowInvoice($id);
    	$this->load->view('invoice/'.$this->data['result']['nm_template'],$this->data);
    }

    public function edit_template(){

    	$url = $this->uri->segment_array();
    	$id['id_template'] = end($url);
    	if ($this->input->server('REQUEST_METHOD') == 'POST') {
    		$ret['state'] = 0;
    		$ret['upload'] = 0;
    		$ret['status'] = 0;
    		$this->form_validation->set_error_delimiters('','');
    		$this->form_validation->set_rules('nama', 'Nama Template', 'trim|required');
    		if ($this->form_validation->run() == true) {
    			$ret['state'] = 1;
    			$data['nama'] = $this->input->post('nama');
    			$config['upload_path']          = FCPATH.'./application/modules/Junaidi/order/views/';
                $config['allowed_types']        = 'php';
                $config['max_size']             = 1000;

                $this->load->library('upload', $config);
                if (isset($_FILES['template']['name'])) {
                	$ret['upload'] = 1;
	                if ( ! $this->upload->do_upload('template'))
	                {
	                    $ret['notif']['alert_file'] = $this->upload->display_errors();
	                }
	                else
	                {
	                    $upload_data = $this->upload->data();
	                    $data['template'] = $upload_data['file_name'];
		    			if ($this->db->insert('tb_template',$data)) {
		    				$ret['status'] = 1;
		    				$ret['url'] = site_url('order/cms_inv/list_template');
		    			}
	                }
                }
    		}
    		$ret['notif']['nama'] = form_error('nama');
    		if (!isset($_FILES['template']['name'])) {
    			$ret['notif']['template'] = 'File is Required';
    		}
    		echo json_encode($ret);
    		exit();
    	}
    	$this->data['template'] = $this->inv_model->rowTemplate($id);
    	$this->data['view'] = 'edit';
    	$this->load->view('template',$this->data);
    	$this->load->view('master_template',$this->data);
    	$this->load->view('footer');
    }

    public function create_template(){
    	if ($this->input->server('REQUEST_METHOD') == 'POST') {
    		$ret['state'] = 0;
    		$ret['upload'] = 0;
    		$ret['status'] = 0;
    		$this->form_validation->set_error_delimiters('','');
    		$this->form_validation->set_rules('nama', 'Nama Template', 'trim|required');
    		if ($this->form_validation->run() == true) {
    			$ret['state'] = 1;
    			$data['nama'] = $this->input->post('nama');
    			
                if (!file_exists(FCPATH.'/assets/invoice1/'.$data['nama'])) {
				    mkdir(FCPATH.'/assets/invoice1/'.$data['nama'], 0777, true);
				}
				$config['upload_path']          = FCPATH.'./application/modules/Junaidi/order/views/';
                $config['allowed_types']        = 'php';
                $config['max_size']             = 1000;
                $this->load->library('upload', $config);
                if (isset($_FILES['template']['name'])) {
                	$ret['upload'] = 1;
	                if ( ! $this->upload->do_upload('template'))
	                {
	                    // $error = array('error' => $this->upload->display_errors());
	                    $ret['notif']['alert_file'] = $this->upload->display_errors();
	                }
	                else
	                {
	                    $upload_data = $this->upload->data();
	                    $data['template'] = $upload_data['file_name'];
        				if (isset($_FILES['css']['name'])) {
        					$this->load->module('css');
		                    $css = $this->css->css(1,2);
		                    print_r($css);
		                    if ($css['state']==1) {
		                    	$ret['state'] = 1;
		                    	$data['css'] = $css['name'];
		                    }else{
		                    	$ret['state'] = 0;
		                    	$ret['notif']['css'] = $css['notif'];
		                    }
	                    }
	                    if ($ret['state'] == 1 ) {
			    			if ($this->db->insert('tb_template',$data)) {
			    				$ret['status'] = 1;
			    				$ret['url'] = site_url('order/cms_inv/list_template');
			    			}
	                    }
	                }
                }
                

    		}
    		$ret['notif']['nama'] = form_error('nama');
    		if (!isset($_FILES['template']['name'])) {
    			$ret['notif']['template'] = 'File is Required';
    		}
    		echo json_encode($ret);
    		exit();
    	}
    	$this->data['view'] = 'create';
    	$this->load->view('template',$this->data);
    	$this->load->view('master_template',$this->data);
    	$this->load->view('footer');
    }

    function _css($data,$name){
    	$config['upload_path']          = FCPATH.'/assets/invoice1/'.$name;
        $config['allowed_types']        = 'css';
        $config['max_size']             = 1000;
        $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('css'))
            {
                // $error = array('error' => $this->upload->display_errors());
                $ret['notif'] = $this->upload->display_errors();
                $ret['state'] = 0;
                return $ret;
                exit();
            }
            else
            {
            	$upload_css = $this->upload->data();
            	$ret['state'] = 1;
            	$ret['name'] = $upload_css['file_name'];
            	return $ret;
            	exit();
            }
        
    }

    public function list_template(){
    	// print_r('<style type="text/css">'.file_get_contents(base_url().'assets/invoice1/assets/css/styles.css').'</style>');
    	$this->data['template'] = $this->inv_model->getTemplate();
    	$this->data['view'] = 'list';
    	$this->load->view('template',$this->data);
    	$this->load->view('master_template',$this->data);
    	$this->load->view('footer');
    }

    public function laporan_pdf(){
        // print_r($_SERVER['DOCUMENT_ROOT'].'/assets/file/bkkbn.png');
        $this->load->library('pdfgenerator');
        $url = $this->uri->segment_array();
        $id = end($url);
        $this->data['result'] = $this->inv_model->getCms();
        $this->data['invoice'] = $this->inv_model->rowInvoice($id);
        $html = $this->load->view('invoice/invoice4_new', $this->data, true);
        $filename = 'report_'.time();
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');


    }

    public function list_setting(){

    }
}