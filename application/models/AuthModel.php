<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class AuthModel extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function fetch_user_by_email($email){
            
            return $this->db->get_where('users',array('email'=>$email))->row_array();
        }

        public function change_pwd($loggedinUserEmail,$newPwdHash){
            $this->db->where('email',$loggedinUserEmail);
            $this->db->set('password',$newPwdHash);
            return $this->db->update('users');
        }
        
    
    }
    
    /* End of file AuthModel.php */
    