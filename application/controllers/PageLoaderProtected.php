<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class PageLoaderProtected extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('type')!='authorized') {
                redirect(site_url('login'));
            }
        }
        

        public function change_password(){
            $data['title'] = 'Change Password';
            $data['success'] = $data['error'] = '';
            $this->load->view('templates/app_header', $data);
            $this->load->view('app_pages/change_pwd', $data);
            $this->load->view('templates/app_footer', $data);
        }

        public function dashboard(){
            $data['title'] = 'App Dashboard';
            $this->load->view('templates/app_header', $data);
            $this->load->view('app_pages/dashboard', $data);
            $this->load->view('templates/app_footer', $data);
        }

        public function all_items(){
            $data['title'] = 'All items';
            $data['error'] = $data['success'] = '';
            $this->load->model('ItemsModel');
            $data['items'] = $this->ItemsModel->fetch_all_items();
            $this->load->view('templates/app_header', $data);
            $this->load->view('app_pages/all_items', $data);
            $this->load->view('templates/app_footer', $data);
        }

        public function add_new_item(){
            $data['title'] = 'Add New Item';
            $data['error'] = $data['success'] = '';
            $this->load->view('templates/app_header', $data);
            $this->load->view('app_pages/add_new_item', $data);
            $this->load->view('templates/app_footer', $data);
        }
        
        public function create_new_invoice(){
            $data['title'] = 'Add New Invoice';
            $this->load->model('ItemsModel');
            $data['items'] = $this->ItemsModel->fetch_all_items();
            $first_item = $data['items'][0];
            $data['first_uni_item'] = $first_uni_item = array(
                'prod_cost' => json_decode($first_item['production_cost'],TRUE)[0],
                // 'labour_cost' => json_decode($first_item['labour_cost'],TRUE)[0],
                'cloth_reqd' => json_decode($first_item['cloth_reqd'],TRUE)[0]
            );
            $this->load->database();
            
            $this->db->where('id','1');
            $inv_data = $this->db->get('invoices')->row_array();
            $new_latest_inv_id = $inv_data['latest_inv_id']+1;

            $data['new_latest_inv_id'] = $new_latest_inv_id;

            $data['error'] = $data['success'] = '';
            $this->load->view('templates/app_header', $data);
            $this->load->view('app_pages/add_new_invoice', $data);
            $this->load->view('templates/app_footer', $data);
        }
    
    }
    
    /* End of file PageLoader.php */
    