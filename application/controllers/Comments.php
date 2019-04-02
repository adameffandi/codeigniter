<?php
class Comments extends CI_Controller {

  public function create($id){

    $this->form_validation->set_rules('title', 'comment_title', 'required');
    $this->form_validation->set_rules('content', 'comment_content', 'required');

    if ($this->form_validation->run() === FALSE) {
      redirect('categories');
    } else {
      $this->Comment_model->create_comment($id);
      $this->session->set_flashdata('success', 'Comment successfully posted!');
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  public function delete($id){
    $this->Comment_model->delete_comment($id);
    $this->session->set_flashdata('success', 'Comment successfully deleted!');
    redirect('posts');
  }

  public function edit($id){
    $this->form_validation->set_rules('comment_title', 'comment_title', 'required');
    $this->form_validation->set_rules('comment_content', 'comment_content', 'required');

    if ($this->form_validation->run() === FALSE) {
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      $this->Comment_model->edit_category($id);
      $this->session->set_flashdata('success', 'Comment successfully edited!');
      redirect('categories');
    }
  }
}
