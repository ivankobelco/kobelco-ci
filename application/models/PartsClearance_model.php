<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PartsClearance_model extends CI_Model
{

    public $table = 'tbl_list_parts_clearance';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
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
        $this->db->like('id', $q);
		$this->db->or_like('CLASS_TON', $q);
		$this->db->or_like('MODEL', $q);
		$this->db->or_like('New_Model', $q);
		$this->db->or_like('CATEGORY', $q);
		$this->db->or_like('PARTS_NO', $q);
		$this->db->or_like('INTERCHANGE', $q);
		$this->db->or_like('PARTS_NAME', $q);
		$this->db->or_like('Clasification', $q);
		$this->db->or_like('Check_Update_Model', $q);
		$this->db->or_like('PIC', $q);
		$this->db->or_like('Reason', $q);
		$this->db->or_like('Model1', $q);
		$this->db->or_like('Page_name1', $q);
		$this->db->or_like('Model2', $q);
		$this->db->or_like('Page_name2', $q);
		$this->db->or_like('Model3', $q);
		$this->db->or_like('Page_name3', $q);
		$this->db->or_like('Model4', $q);
		$this->db->or_like('Page_name4', $q);
		$this->db->or_like('Model5', $q);
		$this->db->or_like('Page_name5', $q);
		$this->db->or_like('Model6', $q);
		$this->db->or_like('Page_name6', $q);
		$this->db->or_like('Model7', $q);
		$this->db->or_like('Page_name7', $q);
		$this->db->or_like('Model8', $q);
		$this->db->or_like('Page_name8', $q);
		$this->db->or_like('Model9', $q);
		$this->db->or_like('QTY_STOCK', $q);
		$this->db->or_like('FOTO_1', $q);
		$this->db->or_like('FOTO_2', $q);
		$this->db->or_like('FOTO_3', $q);
		$this->db->or_like('FOTO_4', $q);
		$this->db->or_like('REMARK', $q);
		$this->db->or_like('LOCATION', $q);
		$this->db->or_like('Normal_Price', $q);
		$this->db->or_like('Special_Price', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
		$this->db->or_like('CLASS_TON', $q);
		$this->db->or_like('MODEL', $q);
		$this->db->or_like('New_Model', $q);
		$this->db->or_like('CATEGORY', $q);
		$this->db->or_like('PARTS_NO', $q);
		$this->db->or_like('INTERCHANGE', $q);
		$this->db->or_like('PARTS_NAME', $q);
		$this->db->or_like('Clasification', $q);
		$this->db->or_like('Check_Update_Model', $q);
		$this->db->or_like('PIC', $q);
		$this->db->or_like('Reason', $q);
		$this->db->or_like('Model1', $q);
		$this->db->or_like('Page_name1', $q);
		$this->db->or_like('Model2', $q);
		$this->db->or_like('Page_name2', $q);
		$this->db->or_like('Model3', $q);
		$this->db->or_like('Page_name3', $q);
		$this->db->or_like('Model4', $q);
		$this->db->or_like('Page_name4', $q);
		$this->db->or_like('Model5', $q);
		$this->db->or_like('Page_name5', $q);
		$this->db->or_like('Model6', $q);
		$this->db->or_like('Page_name6', $q);
		$this->db->or_like('Model7', $q);
		$this->db->or_like('Page_name7', $q);
		$this->db->or_like('Model8', $q);
		$this->db->or_like('Page_name8', $q);
		$this->db->or_like('Model9', $q);
		$this->db->or_like('QTY_STOCK', $q);
		$this->db->or_like('FOTO_1', $q);
		$this->db->or_like('FOTO_2', $q);
		$this->db->or_like('FOTO_3', $q);
		$this->db->or_like('FOTO_4', $q);
		$this->db->or_like('REMARK', $q);
		$this->db->or_like('LOCATION', $q);
		$this->db->or_like('Normal_Price', $q);
		$this->db->or_like('Special_Price', $q);
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

