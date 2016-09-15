<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class User extends CI_Controller{

    public function __construct()
    {
      parent::__construct();
      $this->load->library(array('session'));
      $this->load->helper(array('url'));
      $this->load->model(array('user_model'));
    }

    public function index()
    {
      $this->login();
    } // END index Function

    public function register()
    {
      if(@$_SESSION['is_admin'] != 1)
      {
        redirect('/');
      }
      // create the data object
      $data = new stdClass();

      // load form helper and validation library
      $this->load->helper('form');
      $this->load->library('form_validation');

      // set validation rules
      $this->form_validation->set_rules(
        'username',
        'Username',
        'trim|required|alpha_numeric|min_length[4]');

      $this->form_validation->set_rules(
        'name',
        'Name',
        'trim|required|min_length[4]');


      $this->form_validation->set_rules('password',
        'Password',
        'trim|required|min_length[4]');

      $this->form_validation->set_rules('password_confirm',
        'Confirm Password',
        'trim|required|min_length[4]|matches[password]');

      if ($this->form_validation->run() === false)
      {

        // validation not ok, send validation errors to the view
        $this->load->view('header');
        $this->load->view('user/register/register', $data);
        $this->load->view('footer');

      }
      else
      {

        // set variables from the form
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->user_model->create_user($username, $password))
        {

          // user creation ok
          $this->load->view('header');
          $this->load->view('user/register/register_success', $data);
          $this->load->view('footer');

        }
        else
        {

          // user creation failed, this should never happen
          $data->error = 'There was a problem creating your new account. Please try again.';

          // send error to the view
          $this->load->view('header');
          $this->load->view('user/register/register', $data);
          $this->load->view('footer');

        }

      }

    } // END register Function

    public function login()
    {
      if(isset($_SESSION['user_id']))
      {
        redirect('/program');
      }

      // create the data object
      $data = new stdClass();
      $page_data = new stdClass();

      // Page Data
      $page_data->title = 'Login';

      // load form helper and validation library
      $this->load->helper('form');
      $this->load->library('form_validation');

      // set validation rules
      $this->form_validation->set_rules(
        'username',
        'Username',
        'required|alpha_numeric');

      $this->form_validation->set_rules(
        'password',
        'Password',
        'required');

      if ($this->form_validation->run() == false)
      {

        // validation not ok, send validation errors to the view
        $this->load->view('header', $page_data);
        $this->load->view('user/login/login');
        $this->load->view('footer');

      }
      else
      {

        // set variables from the form
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->user_model->resolve_user_login($username, $password))
        {

          $user_id = $this->user_model->get_user_id_from_username($username);
          $user    = $this->user_model->get_user($user_id);

          // set session user datas
          $_SESSION['user_id']      = (int)$user->id;
          $_SESSION['username']     = (string)$user->username;
          $_SESSION['logged_in']    = (bool)true;
          $_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
          $_SESSION['is_admin']     = (bool)$user->is_admin;

          // user login ok
          $this->load->view('header', $page_data);
          $this->load->view('user/login/login_success', $data);
          $this->load->view('footer');

        }
        else
        {

          // login failed
          $data->error = 'Wrong username or password.';

          // send error to the view
          $this->load->view('header', $page_data);
          $this->load->view('user/login/login', $data);
          $this->load->view('footer');

        }

      }

    } // END login Function

    public function logout()
    {

      // create the data object
      $data = new stdClass();

      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
      {

        // remove session datas
        foreach ($_SESSION as $key => $value)
        {
          unset($_SESSION[$key]);
        }

        // user logout ok
        $this->load->view('header');
        $this->load->view('user/logout/logout_success', $data);
        $this->load->view('footer');

      }
      else
      {

        // there user was not logged in, we cannot logged him out,
        // redirect him to site root
        redirect('/');

      }

    } // END logout Function


  } // END USER CLASS