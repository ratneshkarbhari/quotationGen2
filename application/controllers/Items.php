<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Items extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('type')!='authorized') {
                redirect(site_url('login'));
            }
            $this->load->model('ItemsModel');
            
        }
        

        public function add_new(){
            
            $slug = strtolower(url_title($this->input->post('item_title')));

            $already_exists = $this->ItemsModel->check_if_exists($slug);

            if ($already_exists) {
                
                $data['title'] = 'Add New Item';
                $data['error'] = 'Item already exists'; $data['success'] = '';
                $this->load->view('templates/app_header', $data);
                $this->load->view('app_pages/add_new_item', $data);
                $this->load->view('templates/app_footer', $data);
                
            } else {

                $title = $this->input->post('item_title');

                $sizes = json_encode($this->input->post('sizes[]'));
                
                $prod_costs = $this->input->post('prod_costs[]');



                $cloth_reqds = json_encode($this->input->post('cloth_reqds[]'));
                $prod_costs = json_encode($prod_costs);
    
                $obj_to_insert = array(
    
                    'title' => $title,
                    'slug' => strtolower(url_title($title)),
                    'production_cost	' => $prod_costs, 
                    'cloth_reqd' => $cloth_reqds,
                    
                );
    
    
    
                $created = $this->ItemsModel->create_new($obj_to_insert);
    
                if ($created) {
                    $data['title'] = 'Add New Item';
                    $data['error'] = ''; $data['success'] = 'Item added successfully';
                    $this->load->view('templates/app_header', $data);
                    $this->load->view('app_pages/add_new_item', $data);
                    $this->load->view('templates/app_footer', $data);
                } else {
                    $data['title'] = 'Add New Item';
                    $data['error'] = 'Error occured'; $data['success'] = '';
                    $this->load->view('templates/app_header', $data);
                    $this->load->view('app_pages/add_new_item', $data);
                    $this->load->view('templates/app_footer', $data);
                }
                
            }

        }

        public function delete(){
            $itemId = $this->input->post('item_id');
            $deleted = $this->ItemsModel->delete($itemId);
            if ($deleted) {
                
                $data['title'] = 'All items';
                $data['error'] = ''; $data['success'] = 'Item deleted successfully';
                $data['items'] = $this->ItemsModel->fetch_all_items();
                $this->load->view('templates/app_header', $data);
                $this->load->view('app_pages/all_items', $data);
                $this->load->view('templates/app_footer', $data);

            } else {
                
                $data['title'] = 'All items';
                $data['error'] = 'Item not deleted'; $data['success'] = '';
                $data['items'] = $this->ItemsModel->fetch_all_items();
                $this->load->view('templates/app_header', $data);
                $this->load->view('app_pages/all_items', $data);
                $this->load->view('templates/app_footer', $data);

            }
        }
    
    }
    
    /* End of file Items.php */
    