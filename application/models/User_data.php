<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_data extends CI_Model{
    public function get_user_data($user_id, $password){
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('user_id', $user_id);
        $this->db->where('password', md5($password));
        $this->db->where('status', 1);

        $query = $this->db->get();
        $result = $query->row();

        // echo $result->name;
        if($result){
            //goto Admin Controller
            return $result;
        }else{
            return 0;
        }
    }
}