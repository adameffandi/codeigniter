<?php
  class Comment_model extends CI_Model {
    public function __construct(){
      $this->load->database();
    }
//==================================
    public function get_comment($id){
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get_where('comments', array('post_id' => $id));
        return $query->result_array();
    }
//==================================
    public function create_comment($id){
      $data = array(
        'comment_title' => $this->input->post('title'),
        'comment_content' => $this->input->post('content'),
        'post_id' => $id,
        'posted_by' => null,
        'created_at' => date('Y-m-d')
      );
      return $this->db->insert('comments', $data);
    }
//==================================
    public function delete_comment($id){
      $this->db->where('id', $id);
      return $this->db->delete('comments');
    }
//==================================
    public function edit_comment($id){
      $data = array(
        'title' => $this->input->post('title'),
        'content' => $this->input->post('content'),
        // 'slug' => $slug,
        'created_at' => date('Y-m-d')
      );

      $this->db->where('id', $id);
      return $this->db->update('comments', $data);
    }
//==================================
  }
