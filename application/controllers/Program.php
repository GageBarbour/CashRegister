<?php

class Program extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library(array('session'));
    $this->load->helper(array('url'));
    $this->load->model(array('user_model'));
    if(!isset($_SESSION['user_id']))
    {
      redirect('/');
    } // LOGIN CHECK
  }

  public function index()
  {
    // HOME Page of Register Screen
    // Will show Current orders, Admin panel fashion

    $page_data = new stdClass();
    $data = new stdClass();

    $page_data->title = 'Home';

    // Load Views
    $this->load->view('header', $page_data);
    $this->load->view('program/home/home', $data);
    $this->load->view('footer');

  }

  public function start_new_order()
  {
    // Start new order
    $page_data = new stdClass();
    $data = new stdClass();

    $page_data->title = 'Home';


    // Load Views
    $this->load->view('header', $page_data);
    $this->load->view('program/order/new_order', $data);
    $this->load->view('footer');
  }

}