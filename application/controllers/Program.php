<?php

class Program extends CI_Controller {

  public function index()
  {
    // HOME Page of Register Screen

    $page_data = new stdClass();
    $data = new stdClass();

    $page_data->title = 'Home';


    $this->load->view('header', $page_data);
    $this->load->view('program/home/home', $data);
    $this->load->view('footer');

  }

}