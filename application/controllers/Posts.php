<?php
class Posts extends CI_Controller {

    public function index($offset = 0){
      //pagination config
      $config['base_url'] = base_url() . 'posts/index/';
      $config['total_rows'] = $this->db->count_all('posts');
      $config['per_page'] = 5;
      $config['uri_segment'] = 3;
      $config['attributes'] = array('class' => 'pagination-link');
      //init pagination
      $this->pagination->initialize($config);

      $data['title'] = 'Latest Posts';

      $data['posts'] = $this->Post_model->get_posts(FALSE, $config['per_page'], $offset);

      $this->load->view('templates/header');
      $this->load->view('posts/index', $data);
      $this->load->view('templates/footer');
    }

    public function view($slug = NULL){
      $data['post'] = $this->Post_model->get_posts($slug);
      $data['categories'] = $this->Post_model->get_categories();
      $post_id = $data['post']['id'];
      $data['comments'] = $this->Comment_model->get_comment($post_id);
      // print_r($data['comments']);
      // die();

      if (empty($data['post'])) {
        show_404();
      }

      $data['title'] = $data['post']['title'];

      $this->load->view('templates/header');
      $this->load->view('posts/view', $data);
      $this->load->view('templates/footer');
    }

    public function create(){
      //check login
      if (!$this->session->userdata('logged_in')) {
        $this->session->set_flashdata('danger', 'You need to log in first.');
        redirect('/users');
      }

      $data['title'] = 'Create Post';
      $data['categories'] = $this->Post_model->get_categories();

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('content', 'Content', 'required');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('templates/header');
        $this->load->view('posts/create', $data);
        $this->load->view('templates/footer');
      } else {
        $config['upload_path'] = './public/img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048000';
        $config['max_width'] = '768';
        $config['max_height'] = '1024';

        $this->load->library('upload', $config);

        // var_dump($_FILES['postimage']);exit; //it goes to xampp/tmp

        if (!$this->upload->do_upload('postimage')) {
          $errors = array('error' => $this->upload->display_errors());
          $post_image = 'placeholder.jpg';
        } else {
          $data = array('upload_data' => $this->upload->data());
          $post_image = $_FILES['postimage']['name'];
        }
        $this->Post_model->create_post($post_image);
        $this->session->set_flashdata('success', 'Post successfully created!');
        redirect('posts');
      }
    }

    public function delete($id){
      //check login
      if (!$this->session->userdata('logged_in')) {
        $this->session->set_flashdata('danger', 'You need to log in first.');
        redirect('/users');
      }

      $this->Post_model->delete_post($id);
      $this->session->set_flashdata('success', 'Post successfully deleted!');
      redirect('posts');
    }

    public function edit($id){
      //check login
      if (!$this->session->userdata('logged_in')) {
        $this->session->set_flashdata('danger', 'You need to log in first.');
        redirect('/users');
      }

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('content', 'Content', 'required');

      if ($this->form_validation->run() === FALSE) {
        redirect($_SERVER['HTTP_REFERER']);
      } else {
        $config['upload_path'] = './public/img/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '2048000';
        $config['max_height'] = '768';
        $config['max_width'] = '1024';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('editpostimage')) {
          $errors = array('error' => $this->upload->display_errors());
          $post_image = 'placeholder.jpg';
        } else {
          $data = array('upload_data' => $this->upload->data());
          $post_image = $_FILES['editpostimage']['name'];
        }

        $this->Post_model->edit_post($id, $post_image);
        $this->session->set_flashdata('success', 'Post successfully edited!');
        redirect('posts');
      }
    }
}
