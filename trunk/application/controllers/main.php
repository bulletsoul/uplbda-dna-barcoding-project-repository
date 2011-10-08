<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
  $this->load->helper('form');
  $this->load->view('main_header');
  $this->load->view('main_view');
  $this->load->view('footer');
 }

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */