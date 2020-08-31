<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller{

    public function add_new_shop(){
        
        $shop_list['data'] = $this->shop_model->view_shop();

        $this->load->view('include/header');          
        $this->load->view('shop/add-new-shop', $shop_list);
        $this->load->view('include/footer');


    }

    public function add_shop(){
        //receive data
        $data = array();
        $data['shop_name'] = $this->input->post('shop-name', true); 
        $data['shop_mobile'] = $this->input->post('shop-mobile', true); 

        $sdata = false;
        $insert_result = false;

        // print_r($data);

            $config['upload_path']   = './img/'; 
            $config['allowed_types'] = 'gif|jpg|png'; 
            $config['max_size']      = 2048; 
            $config['max_width']     = 1024; 
            $config['max_height']    = 768;  
            $this->load->library('upload');
            $this->upload->initialize($config);

            if(! $this->upload->do_upload('shop-logo')){
                $error = $this->upload->display_errors(); ;
            }else{
                $sdata = $this->upload->data();
                if($sdata){
                    $data['shop_logo'] = $config['upload_path'].$sdata['file_name'];
                    $insert_result = $this->shop_model->add_shop($data);
                }
            }
            
            // print_r($error);
            if($insert_result){
                $this->session->set_flashdata('success', 'insert success');
                redirect('add-new-shop');
            }else{            
                $this->session->set_flashdata('error', $error);
                redirect('add-new-shop');
            }
    }

    public function view_shop(){
        
        $shop_list['data'] = $this->shop_model->view_shop();

        $this->load->view('include/header');          
        $this->load->view('shop/view-shop', $shop_list);
        $this->load->view('include/footer');
    }

    public function edit_shop(){
        
        $shop_list['data'] = $this->shop_model->view_shop();

        $this->load->view('include/header');          
        $this->load->view('shop/edit-shop', $shop_list);
        $this->load->view('include/footer');
    }
}