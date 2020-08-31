<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    public function get_courier_charge()
    {

        $courier_id = $this->input->post('courier_id');

        $query_result = $this->ajax_model->get_charge($courier_id);

        if ($query_result) {
            $charge = "";

            foreach ($query_result as $row) {
                $charge = $row->c_charge;
            }

            echo $charge;
        }
    }

    public function submit_order()
    {
        //receive form information here
        if (isset($_POST['shop-name'])) {
            $data = array();

            $data['shop_id'] = $this->input->post('shop-name');
            $data['customer_name'] = $this->input->post('customer-name');
            $data['customer_contact'] = $this->input->post('customer-contact');
            $data['district_id'] = $this->input->post('district');
            $data['couriar_id'] = $this->input->post('courier_name');
            $data['delivary_chrge'] = $this->input->post('courier_charge');
            $data['order_number'] = $this->input->post('order_number');
            $data['discount'] = $this->input->post('discount');
            $data['subtotal'] = $this->input->post('subtotal');
            $data['grand_total'] = $this->input->post('grand_total');

            $product_name = $this->input->post('product_name');
            $product_quantity = $this->input->post('product_quantity');
            $unit_price = $this->input->post('unit_price');
            $total = $this->input->post('total');
            
            $result = $this->ajax_model->insert_sale_summery($data);

            if($result){
                for($i = 0; $i < count($product_name); $i++){
                    $data1 = array();
                    $data1['product_name'] = $product_name[$i];
                    $data1['product_quantity'] = $product_quantity[$i];
                    $data1['unit_price'] = $unit_price[$i];
                    $data1['total'] = $total[$i];
                    $data1['order_number'] = $data['order_number'];
    
                    $result1 = $this->ajax_model->insert_product_details($data1);
                }
            }
            
            if($result1){
                $data2 = array();
                $data2['order_number'] = $data['order_number'];
                $data2['delivery_date'] = $this->input->post('delivery_date');
                $data2['status'] = '1';

                $result2 = $this->ajax_model->insert_order_number($data2);
            }
            
            echo $result2;

        }
    }
}
