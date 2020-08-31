<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courier extends CI_Controller{

    public function add_new_courier(){
        
        $courier_list['data'] = $this->courier_model->view_courier();

        $this->load->view('include/header');          
        $this->load->view('courier/add-new-courier', $courier_list);
        $this->load->view('include/footer');


    }

    public function add_courier(){
        //receive data and goto model with data 
        $courier_name = $this->input->post('courier-name');
        $courier_charge = $this->input->post('courier-charge');

        $result = $this->courier_model->add_courier($courier_name, $courier_charge);

        if($result){
            $this->session->set_flashdata('success', 'insert success');
            redirect('add-new-courier');
        }else{            
            $this->session->set_flashdata('error', 'something wrong');
            redirect('add-new-courier');
        }
    }

    public function view_courier(){
        
        $courier_list['data'] = $this->courier_model->view_courier();

        $this->load->view('include/header');          
        $this->load->view('courier/view-courier', $courier_list);
        $this->load->view('include/footer');
    }

    public function edit_courier(){
        
        $courier_list['data'] = $this->courier_model->view_courier();

        $this->load->view('include/header');          
        $this->load->view('courier/edit-courier', $courier_list);
        $this->load->view('include/footer');
    }
}