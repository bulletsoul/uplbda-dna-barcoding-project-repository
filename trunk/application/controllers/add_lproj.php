<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_lproj extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
  $this->load->helper(array('form', 'url'));
  $this->load->view('home_header');
  $this->load->view('add_lproj_view');
  $this->load->view('footer');
 }

}

/* End of file add_lproj.php */
/* Location: ./application/controllers/add_lproj.php */