<?php
  class Post_model extends CI_Model {
    public function __construct(){
      $this->load->database();
    }
//==============================================================
    public function login(){
      $query = $this->db->get('users');
      return $query->result_array();
    }
//==============================================================
    public function register(){
      $data = array(
        'name' => $this->input->post('name'),
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
        'created_at' => date('Y-m-d'),
        'updated_at' => date('Y-m-d')
      );
      return $this->db->insert('posts', $data);
    }
  }
