<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor  
        parent::__construct();
    }

    public function get_order_number()
    {
        $query = $this->db->query("SELECT id FROM order_number");

        return $query->result();

        // if($query->result()){
        //     return $query->result();
        // }else{
        //     return 1;
        // }
    }

    public function add_shop($data)
    {
        $result = $this->db->insert('shop', $data);

        return $result;
    }

    public function view_shop()
    {
        $query = $this->db->query("SELECT *FROM shop");
        return $query->result();
    }

    public function get_district()
    {
        $query = $this->db->query("SELECT *FROM districts");

        return $query->result();
    }

    public function get_district_name($data){
        $query = $this->db->query("SELECT name FROM districts WHERE id = $data");
        return $query->result();

        // foreach($query as $row){
        //     echo $row->name;
        // }
    }
}
