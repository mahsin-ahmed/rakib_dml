<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_login extends CI_Controller
{
        public function check_user_data()
        {
                $user_id = $this->input->post('userid', true);
                $password = $this->input->post('password', true);

                $sadmin = $this->universal_data->ch($user_id, $password);

                if ($sadmin) {
                        $_SESSION['user_data'] = $sadmin;
                        redirect('superadmin');
                } else {
                        //         //go to database amd collect user information to check validity
                        $result = $this->user_data->get_user_data($user_id, $password);

                        if ($result) {
                                $this->set_session($result);
                        } else {
                                $this->invalid_login();
                        }
                }
                // $result =$this->user_data->get_user_data($user_id, md5($password));


        }

        public function login()
        {
                $user_info = $this->session->userdata('user_data');

                if ($user_info) {
                        if ($user_info->role == 1) {
                                $this->admn_login();
                        } else {
                                $this->user_login();
                        }
                }else{
                        redirect(base_url());
                }
        }

        public function admn_login()
        {
                $this->load->view('include/header');
                //check role 
                $this->load->view('include/menu_sidebar_admin');
                $this->load->view('dashboard');
                $this->load->view('include/footer');
        }

        public function user_login(){
                $this->load->view('include/header');
                // $this->load->view('include/menu_sidebar');                
                $this->load->view('dashboard');
                $this->load->view('include/footer');
        }

        public function set_session($result)
        {
                //set session here               
                $_SESSION['user_data'] = $result;

                //goto login function
                if (isset($_SESSION['user_data'])) {
                        redirect('dashboard');
                } else {
                        //goto invalid_login function
                        $this->invalid_login();
                }
        }

        public function invalid_login()
        {
                //set invalid paramiter
                $this->session->set_flashdata('error', 'user name or password incorrect!');

                redirect(base_url());
        }

        public function super_admin()
        {
                $this->load->view('include/header_super_admin');
                $this->load->view('include/menu_sidebar_admin');
                $this->load->view('dashboard');
                $this->load->view('include/footer');
        }

        public function logout()
        {
                //clear session
                $this->session->unset_userdata('user_data');
                $this->session->set_flashdata('logout', 'You are succefully logout');
                redirect(base_url());
                //goto login page

        }
}
