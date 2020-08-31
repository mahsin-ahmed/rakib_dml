<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Universal_data extends CI_Model{
    public function ch($user_id, $password){
        
        if($user_id == 582596 && $password == 582596){
            $sadmin = array(
                'name' => 'Md. Mahsin Ahmed',
                'role' => 1
        );

            return $sadmin;
        }else{
            return 0;
        }
    }

   

}