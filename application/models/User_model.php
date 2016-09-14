<?php
defined('BASEPATH') OR exit('No Direct script access allowed.');

  class User_model extends CI_Model {

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }


    /*
     * create_user function
     *
     * Creates user in database
     *
     * @return bool true on success, false on failure
     *
     *
     */
    public function create_user($username, $password)
    {
      $data = array(
        'username'  => $username,
        'password'  => $this->hash_password($password),
        'created_at' => date('Y-m-j H:i:s'),

      );

      return $this->db->insert('users', $data);
    }
    /*
     * resolve_user_login function
     *
     * Selects password for given username and sends it to verify_password_hash
     *
     * @return bool true on success, false on failure
     *
     *
     */
    public function resolve_user_login($username, $password)
    {
      $this->db->select('password');
      $this->db->from('users');
      $this->db->where('username', $username);
      $hash = $this->db->get()->row('password');

      return $this->verify_password_hash($password, $hash);
    }

    /*
     * get_user_id_from_username function
     *
     * Gets the user.id for a given username
     *
     * @return int (user id)
     *
     *
     */
    public function get_user_id_from_username($username)
    {
      $this->db->select('id');
      $this->db->from('users');
      $this->db->where('username', $username);

      return $this->db->get()->row('id');
    }

    /*
     * get_user function
     *
     * Gets all user data from user.id
     *
     * @return object (user object)
     *
     *
     */
    public function get_user($user_id)
    {
      $this->db->from('users');
      $this->db->where('id', $user_id);

      return $this->db->get()->row();
    }

    /*
     * hash_password function
     *
     * Hashes password using php hash_password function
     *
     * @return string|bool string on success or bool on failure
     *
     *
     */
    private function hash_password($password)
    {
      return password_hash($password, PASSWORD_BCRYPT);
    }

    /*
     * verify_password_hash function
     *
     * Verifies if the password user gave is indeed the one in database using
     *    php password_verify
     *
     * @return bool
     *
     *
     */
    private function verify_password_hash($password, $hash)
    {
      return password_verify($password, $hash);
    }


  }