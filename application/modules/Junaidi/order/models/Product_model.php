<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_model extends CI_Model
{

    public $table = 'tb_product';
    public $id = 'id_product';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_product,nama_product,stock');
        $this->datatables->from('tb_product');
        //add this line for join
        //$this->datatables->join('table2', 'tb_product.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('product/read/$1'),'Read')." | ".anchor(site_url('product/update/$1'),'Update')." | ".anchor(site_url('product/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_product');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_product', $q);
	$this->db->or_like('nama_product', $q);
	$this->db->or_like('stock', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_product', $q);
	$this->db->or_like('nama_product', $q);
	$this->db->or_like('stock', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-02-19 05:49:50 */
/* http://harviacode.com */