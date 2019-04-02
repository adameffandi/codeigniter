<?php
class Categories extends CI_Controller {

  public function index(){
    $data['title'] = 'Categories';

    $data['categories'] = $this->Category_model->get_categories();

    $this->load->view('templates/header');
    $this->load->view('categories/index', $data);
    $this->load->view('templates/footer');
  }

  public function view($id){
    $data['categories'] = $this->Category_model->get_categories($id);
    $data['posts'] = $this->Category_model->get_posts_in_category($id);

    if (empty($data['categories'])) {
      show_404();
    }

    $data['title'] = $data['categories']['category_name'];

    $this->load->view('templates/header');
    $this->load->view('categories/view', $data);
    $this->load->view('templates/footer');
  }

  public function create(){
    //check login
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('danger', 'You need to log in first.');
      redirect('/users');
    }

    $data['title'] = 'Create Category';

    $this->form_validation->set_rules('category_name', 'category_name', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('danger', 'Fail to create category!');
      $this->load->view('templates/header');
      $this->load->view('categories/create', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Category_model->create_category();
      $this->session->set_flashdata('success', 'Category successfully created!');
      redirect('categories');
    }
  }

  public function delete($id){
    //check login
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('danger', 'You need to log in first.');
      redirect('/users');
    }

    $this->Category_model->delete_category($id);
    $this->session->set_flashdata('success', 'Category successfully deleted!');
    redirect('categories');
  }

  public function edit($id){
    //check login
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('danger', 'You need to log in first.');
      redirect('/users');
    }

    $this->form_validation->set_rules('category_name', 'category_name', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('danger', 'Fail to updated category.');
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      $this->Category_model->edit_category($id);
      $this->session->set_flashdata('success', 'Category successfully updated!');
      redirect('categories');
    }
  }
}
