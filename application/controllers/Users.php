<?php
class Users extends CI_Controller {

  public function index(){
    $data['title'] = 'Register & Login';

    $this->load->view('templates/header');
    $this->load->view('users/index', $data);
    $this->load->view('templates/footer');
  }

  public function register(){
    //check login
    if ($this->session->userdata('logged_in')) {
      $this->session->set_flashdata('danger', 'You are already logged in.');
      redirect('/users');
    }

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
    $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('password2', 'Confirm password', 'matches[password]');

    if ($this->form_validation->run() === FALSE) {
      $data['title'] = 'Register & Login';
      $this->session->set_flashdata('danger', 'Registration failed. Please try again.');
      redirect('/users');
    } else {
      $this->User_model->register();
      $this->session->set_flashdata('success', 'You are now registered and can log in');
      redirect('/');
    }
  }

  public function login(){
    //check login
    if ($this->session->userdata('logged_in')) {
      $this->session->set_flashdata('danger', 'You are already logged in.');
      redirect('/users');
    }

    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');

    if ($this->form_validation->run() === FALSE) {
      $data['title'] = 'Register & Login';
      $this->session->set_flashdata('danger', 'Login failed. Please try again.');
      redirect('/users');
    } else {
      $username = $this->input->post('username');
      $password = md5($this->input->post('password'));
      $user_id = $this->User_model->login($username, $password);

      if ($user_id) {
        // create session
        $user_data = array(
          'user_id' => $user_id,
          'username' =>$username,
          'logged_in' => true
        );

        $this->session->set_userdata($user_data);

        $this->session->set_flashdata('success', 'You are now logged in');
        redirect('/users');
      } else {
        $this->session->set_flashdata('danger', 'Invalid log in');
        redirect('/users');
      }
    }
  }

  public function logout(){
    $this->session->unset_userdata('logged_in');
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('username');

    $this->session->set_flashdata('success', 'Successfully logged out');
    redirect('/users');
  }

  public function check_username_exists($username){
    $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one.');
    if ($this->User_model->check_username_exists($username)) {
      return true;
    } else {
      return false;
    }
  }

  public function check_email_exists($email){
    $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one.');
    if ($this->User_model->check_email_exists($email)) {
      return true;
    } else {
      return false;
    }
  }
}
