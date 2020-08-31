<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_Order_Model extends CI_Model{

    function __construct()  
      {  
         // Call the Model constructor  
         parent::__construct();  
      }  

   public function view_all(){
       $query = $this->db->query("SELECT sale_details.*, order_number.* FROM sale_details INNER JOIN order_number ON sale_details.order_number = order_number.order_number");       

       if($query->num_rows() > 0){
         return $query->result();
       }else{
          return false;
       }
   }


   public function view_details($order_no){
       $query = $this->db->query("SELECT sale_details.*, order_number.* FROM sale_details INNER JOIN order_number ON sale_details.order_number = order_number.order_number WHERE order_number.order_number = $order_no");       

       if($query->num_rows() > 0){
         return $query->result();
       }else{
          return false;
       }
   }

   public function view_product_summery($order_no){
       $query = $this->db->query("SELECT * FROM sale_products WHERE sale_products.order_number = $order_no");       

       if($query->num_rows() > 0){
         return $query->result();
       }else{
          return false;
       }
   }
}

    