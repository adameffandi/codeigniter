<?php
  class Post_model extends CI_Model {
    public function __construct(){
      $this->load->database();
    }
//==================================
    public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE){
      if ($limit) {
        $this->db->limit($limit, $offset);
      }
      if ($slug === FALSE) {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('posts');
        return $query->result_array();
      }

      $query = $this->db->get_where('posts', array('slug' => $slug));
      return $query->row_array();
    }
//==================================
    public function get_categories(){
      $query = $this->db->get('categories');
      return $query->result_array();
    }
//==================================
    public function create_post($post_image){
      $slug = url_title($this->input->post('title'));
      $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'title' => $this->input->post('title'),
        'category_id' => $this->input->post('category'),
        'slug' => $slug,
        'content' => $this->input->post('content'),
        'post_image' => $post_image,
        'created_at' => date('Y-m-d')
      );
      return $this->db->insert('posts', $data);
    }
//==================================
    public function delete_post($id){
      $this->db->where('id', $id);
      return $this->db->delete('posts');
    }
//==================================
    public function edit_post($id, $post_image){
      $slug = url_title($this->input->post('title'));
      $data = array(
        'title' => $this->input->post('title'),
        'category_id' => $this->input->post('category'),
        'slug' => $slug,
        'content' => $this->input->post('content'),
        'post_image' => $post_image,
        'created_at' => date('Y-m-d')
      );

      $this->db->where('id', $id);
      return $this->db->update('posts', $data);
    }
//==================================
  }
