<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_order extends CI_Controller{

    public function index(){
        // get all product information from database
        $order_list['all_order'] = $this->View_Order_Model->view_all();
        // add view page here
        $this->load->view('include/header'); 
        $this->load->view('view_product/view_all', $order_list);         
        $this->load->view('include/footer');
    }

    public function view_details(){
        // get all product information from database
        $order_number = $this->input->get('order_id');

        $view_details['view_details'] = $this->View_Order_Model->view_details($order_number);

        // // add view page here
        $this->load->view('include/header'); 
        $this->load->view('view_product/view_details',$view_details);         
        $this->load->view('include/footer');
    }
}