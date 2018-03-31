<?php 

/**
* 
*/
class Login extends MX_Controller
{
        var $idUser;

    function __construct()
    {
    	// $this->load->model('login_model');
    }

    public function index(){
    	if($this->input->method() == 'post'){
    		$ret['state'] = 0;
    		$ret['status'] = 0;
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('username','username', 'required');
            $this->form_validation->set_rules('password','password', 'required');
            if ($this->form_validation->run() == true) {
            	$ret['state'] = 1;
            	$username = $this->input->post('username');
            	$password = sha1($this->input->post('password'));
            	$sql = "SELECT * FROM tb_user WHERE username = ? AND password = ?";
            	$data = $this->db->query($sql,[$username,$password]);
            	if ($data->num_rows() == 1) {
            		$ret['status'] = 1;
            		$data_user = $data->row_array();
            		$this->session->set_userdata('id_user', $data_user['id_user']);
            		$this->session->set_userdata('previlage', $data_user['status']);
            		$this->session->set_userdata('is_login', true);
            		$ret['url'] = site_url('order/cms_inv/');

            	}else{
                    $ret['notif']['login'] = 'username or password worng';
                }
            }
            $ret['notif']['username'] = form_error('username');
            $ret['notif']['password'] = form_error('password');
            echo  json_encode($ret);
            exit();
        }
        $this->load->view('login.php');
    }

    public function logout(){
    	$this->session->sess_destroy();
    	redirect(site_url('login'));
    }
}