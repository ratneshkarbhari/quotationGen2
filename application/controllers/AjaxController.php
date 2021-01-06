<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class AjaxController extends CI_Controller {


        
        public function __construct()
        {
            parent::__construct();
            if($this->session->userdata('type')!='authorized'){
                
                redirect(site_url('login'));
                
            }
        }
        
    
        public function fetch_costs_cloth_reqd_for_item_and_size(){


            $this->load->model('ItemsModel');
            
            
            $item_id = $this->input->post('item_id');
            $item_size_pos = $this->input->post('item_size');

            $item_data = $this->ItemsModel->fetch_item_by_id($item_id);


            $item_data['production_cost'] = json_decode($item_data['production_cost'],TRUE);
            $production_cost = $item_data['production_cost'][$item_size_pos];

            $item_data['cloth_reqd'] = json_decode($item_data['cloth_reqd'],TRUE);
            $cloth_reqd = $item_data['cloth_reqd'][$item_size_pos];

            exit(json_encode(array(
                'production_cost' => $production_cost,
                'cloth_reqd' => $cloth_reqd
            )));

        }
    
    }
    
    /* End of file AjaxController.php */
    