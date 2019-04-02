<?php
  class User_model extends CI_Model {
    public function __construct(){
      $this->load->database();
    }
//==============================================================
    public function login($username, $password){
      $this->db->where('username', $username);
      $this->db->where('password', $password);

      $result = $this->db->get('users');

      if ($result->num_rows() == 1) {
        return $result->row(0)->id;
      } else {
        return false;
      }
      // $query = $this->db->get('users');
      // return $query->result_array();
    }
//==============================================================
    public function register(){
      $password = md5($this->input->post('password'));
      $data = array(
        'name' => $this->input->post('name'),
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => $password,
        'created_at' => date('Y-m-d'),
        'updated_at' => date('Y-m-d')
      );
      return $this->db->insert('users', $data);
    }

    public function check_username_exists($username){
      $query = $this->db->get_where('users', array('username' => $username));
      if (empty($query->row_array())) {
        return true;
      } else {
        return false;
      }
    }

    public function check_email_exists($email){
      $query = $this->db->get_where('users', array('email' => $email));
      if (empty($query->row_array())) {
        return true;
      } else {
        return false;
      }
    }
  }
