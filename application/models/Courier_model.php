<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courier_model extends CI_Model{

    function __construct()  
      {  
         // Call the Model constructor  
         parent::__construct();  
      }  

    public function add_courier($name, $charge){
        $user_name= "Rakib";
        
        $data = array(
            'c_name' => $name,
            'c_charge' => $charge,
            'status' => 1,
            'insert_by' => $user_name
        );

        $rs = $this->db->insert('courier ', $data);   
        
        return $rs;
    }

    public function view_courier(){
        $query = $this->db->query("select *from courier");  
        return $query->result();  
    }
}