<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller{

    public function create_order(){
        $date['shops'] = $this->shop_model->view_shop();
        $date['districts'] = $this->shop_model->get_district();
        $date['couriers'] = $this->courier_model->view_courier();
        $date['order_number'] = $this->shop_model->get_order_number();
        // $order_number = $this->shop_model->get_order_number();

        $this->load->view('include/header');          
        $this->load->view('order/create-order', $date);
        $this->load->view('include/footer');
    }
}
    