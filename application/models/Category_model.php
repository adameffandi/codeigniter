<?php
  class Category_model extends CI_Model {
    public function __construct(){
      $this->load->database();
    }

    public function get_categories($id = FALSE){
      if ($id === FALSE) {
        $query = $this->db->get('categories');
        return $query->result_array();
      }

      $query = $this->db->get_where('categories ', array('id' => $id));
      return $query->row_array();
    }

    public function get_posts_in_category($id){
      $query = $this->db->get_where('posts ', array('category_id' => $id));
      return $query->result_array();
    }

    public function create_category(){
      $data = array(
        'category_name' => $this->input->post('category_name'),
        'created_at' => date('Y-m-d')
      );

      return $this->db->insert('categories', $data);
    }

    public function delete_category($id){
      $this->db->where('id', $id);
      return $this->db->delete('categories');
    }

    public function edit_category($id){
      $data = array(
        'category_name' => $this->input->post('category_name'),
        'created_at' => date('Y-m-d')
      );

      $this->db->where('id', $id);
      return $this->db->update('categories', $data);
    }
  }
