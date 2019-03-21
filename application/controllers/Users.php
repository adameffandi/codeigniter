<?php
class Users extends CI_Controller {

  public function index(){
    $data['title'] = 'Register & Login';

    $this->load->view('templates/header');
    $this->load->view('users/index', $data);
    $this->load->view('templates/footer');
  }

  public function register(){
    $this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('email', 'email', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');

    if ($this->form_validation->run() === FALSE) {
      redirect('/');
    } else {
      $this->User_model->create_user($id);
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  public function login(){
    $data['title'] = 'Latest Posts';

    $data['posts'] = $this->User_model->get_posts();

    $this->load->view('templates/header');
    $this->load->view('posts/index', $data);
    $this->load->view('templates/footer');
  }
}
