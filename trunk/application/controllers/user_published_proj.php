<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_published_proj extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
  $this->load->helper('form');
  $this->load->view('user_header');
  $this->load->view('user_published_proj_view');
  $this->load->view('footer');
 }

}

/* End of file user_published_proj.php */
/* Location: ./application/controllers/user_published_proj.php */