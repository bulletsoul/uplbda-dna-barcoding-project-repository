<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_pproj extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('project','', TRUE);
 }

 function index()
 {
  $this->load->helper(array('form', 'url'));
  $this->load->view('home_header');
  $this->load->view('add_pproj_view');
  $this->load->view('footer');
 }
}

/* End of file add_proj.php */
/* Location: ./application/controllers/add_proj.php */