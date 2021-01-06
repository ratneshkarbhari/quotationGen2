<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class PageLoaderPublic extends CI_Controller {
    
        public function login(){
            if ($this->session->userdata('type')=='authorized') {
                redirect(site_url('dashboard'));
            }
            $data['title'] = 'Login';
            $data['error'] = '';
            $this->load->view('templates/header', $data);
            $this->load->view('public_pages/login', $data);
            $this->load->view('templates/footer', $data);
        }
    
    }
    
    /* End of file PageLoaderPublic.php */
    