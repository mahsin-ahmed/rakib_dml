<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends CI_Model{

    function __construct()  
      {  
         // Call the Model constructor  
         parent::__construct();  
      }  

   public function get_charge($cn){
        $this->db->select("c_charge"); 
        $this->db->from("courier"); 
        $this->db->where("id", $cn);
        $query = $this->db->get(); 
        
        return $query->result();  
    }

    public function insert_sale_summery($data){
        $result = $this->db->insert('sale_details', $data);
        return $result;
    }
    public function insert_product_details($data1){
        $result = $this->db->insert('sale_products', $data1);
        return $result;
    }
    
    public function insert_order_number($data2){
        $result = $this->db->insert('order_number', $data2);
        return $result;
    }
}

    