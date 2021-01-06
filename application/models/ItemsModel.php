<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class ItemsModel extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function check_if_exists($slug){
            return $this->db->get_where('items',array('slug'=>$slug))->row_array();
        }
        
        public function fetch_all_items(){
            return $this->db->get('items')->result_array();
        }
        public function fetch_item_by_id($id){
            $this->db->where('id', $id);
            return $this->db->get('items')->row_array();
        }
    
        public function create_new($obj_to_insert){
            return $this->db->insert('items',$obj_to_insert);
        }

        public function delete($id){
            $this->db->where('id',$id);
            return $this->db->delete('items');
        }

    }
    
    /* End of file ItemsModel.php */
    