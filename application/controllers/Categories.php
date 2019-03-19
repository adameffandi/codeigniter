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
    $data['title'] = 'Create Category';

    $this->form_validation->set_rules('category_name', 'category_name', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('templates/header');
      $this->load->view('categories/create', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Category_model->create_category();
      redirect('categories');
    }
  }

  public function delete($id){
    $this->Category_model->delete_category($id);
    redirect('categories');
  }

  public function edit($id){
    $this->form_validation->set_rules('category_name', 'category_name', 'required');

    if ($this->form_validation->run() === FALSE) {
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      $this->Category_model->edit_category($id);
      redirect('categories');
    }
  }
}
