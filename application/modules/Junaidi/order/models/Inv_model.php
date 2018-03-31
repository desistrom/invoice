<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inv_model extends CI_Model{

	public function getTemplate(){
		return $this->db->get('tb_template')->result_array();
	}

	public function getInvoice(){
		return $this->db->get('tb_invoice')->result_array();
	}

	public function rowTemplate($id){
		if ($this->db->get_where('tb_template',$id)->num_rows() > 0) {
			return $this->db->get_where('tb_template',$id)->row_array();
			exit();
		}
		return false;
	}

	public function rowInvoice($id){
		if ($this->db->get_where('tb_invoice',array('id_invoice' => $id))->num_rows() > 0) {
			return $this->db->get_where('tb_invoice',array('id_invoice' => $id))->row_array();
			exit();
		}
		return false;
	}

	public function getCms(){
		$sql = "SELECT *, t.template as nm_template  FROM tb_cms_inv c JOIN tb_template t ON c.template = t.id_template WHERE id_conf = (SELECT MAX(id_conf) FROM tb_cms_inv)";
		if ($this->db->query($sql)->num_rows() > 0) {
			return $this->db->query($sql)->row_array();
			exit();
		}
		return false;
	}
}