<?php
class Posts extends CI_Controller {

    public function index(){
      $data['title'] = 'Latest Posts';

      $data['posts'] = $this->Post_model->get_posts();

      $this->load->view('templates/header');
      $this->load->view('posts/index', $data);
      $this->load->view('templates/footer');
    }

    public function view($slug = NULL){
      $data['post'] = $this->Post_model->get_posts($slug);
      $data['categories'] = $this->Post_model->get_categories();

      if (empty($data['post'])) {
        show_404();
      }

      $data['title'] = $data['post']['title'];

      $this->load->view('templates/header');
      $this->load->view('posts/view', $data);
      $this->load->view('templates/footer');
    }

    public function create(){
      $data['title'] = 'Create Post';
      $data['categories'] = $this->Post_model->get_categories();

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('content', 'Content', 'required');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('templates/header');
        $this->load->view('posts/create', $data);
        $this->load->view('templates/footer');
      } else {
        $this->Post_model->create_post();
        redirect('posts');
      }
    }

    public function delete($id){
      $this->Post_model->delete_post($id);
      redirect('posts');
    }

    public function edit($id){
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('content', 'Content', 'required');

      if ($this->form_validation->run() === FALSE) {
        redirect($_SERVER['HTTP_REFERER']);
      } else {
        $this->Post_model->edit_post($id);
        redirect('posts');
      }
    }
}
