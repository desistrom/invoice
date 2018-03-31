<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_model extends CI_Model{

	public function getProduk(){
		return $this->db->get('tb_product')->result_array();
	}

	public function rowProduk($id){
		if ($this->db->get_where('tb_product',array('id_product' => $id))->num_rows() > 0) {
			return $this->db->get_where('tb_product',array('id_product' => $id))->row_array();
			exit();
		}
		return array();
	}

	public function getMetode(){
		return $this->db->get('tb_metode')->result_array();
	}

	public function getTransaksi(){
		$sql = "SELECT id_transaksi, total, tgl_transaksi, methode,
		CASE
			WHEN status = 0 THEN 'PENDING'
			WHEN status = 1 THEN 'SETTLEMENT'
			WHEN status = 2 THEN 'CANCEL'
		END as status
		FROM tb_transaksi Order By tgl_transaksi";
		return $this->db->query($sql)->result_array();
	}

	public function detailTransaksi($id){
		$sql = "SELECT id_transaksi, total, tgl_transaksi, methode, email, nama_user, phone,
		CASE
			WHEN status = 0 THEN 'PENDING'
			WHEN status = 1 THEN 'SETTLEMENT'
			WHEN status = 2 THEN 'CANCEL'
		END as status
		FROM tb_transaksi WHERE id_transaksi = ? Order By tgl_transaksi";
		return $this->db->query($sql,$id)->row_array();
	}

	public function insertOrder($data){
		if ($this->db->insert('tb_order_barang',$data)){
			return true;
			exit();
		}
		return false;
	}

	public function getMenu(){
		return $this->db->get('tb_menu')->result_array();
	}

	public function listMenu($data){
		$sql = "SELECT * FROM tb_menu ";
		if ($data == 1) {
			$sql .= 'where admin != 0';
		}else if($data == 2){
			$sql .= 'where marketing != 0';
		}else{
			$sql .= 'where staff != 0';
		}
		if ($this->db->query($sql)->num_rows() > 0) {
			return $this->db->query($sql)->result_array();
			exit();
		}
		return false;
	}
}