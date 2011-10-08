<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Process_project extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
      $this->load->view('home_header');
      $this->load->view('home_view', $data);
      $this->load->view('footer');
  }
  
}

/* End of file process_project.php */
/* Location: ./application/controllers/process_project.php */