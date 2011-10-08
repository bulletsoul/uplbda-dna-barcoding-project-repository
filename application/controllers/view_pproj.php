<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_pproj extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   $this->load->model('project','',TRUE);
   $this->load->model('poultry','',TRUE);
 }

 function get_viewtype()
  {
    if($this->session->userdata('logged_in'))
    {
      $this->load->view('home_header');
    }
    else $this->load->view('user_header');   
  }
  
 function index()
 {
  $this->load->helper(array('form', 'url'));
  $data['my_redirect']= current_url();
  $data['baseurl']= base_url();
  if($this->session->userdata('logged_in')){
   $data['new_url'] = site_url('view_project/show_project_complete');
  }
  else $data['new_url'] = site_url('view_project/show_project_inc');
  $this->get_viewtype();
  $data['list'] = $this->poultry->get_poultry();
  $this->load->view('pproj_view', $data);
  $this->load->view('footer');
 }
}

/* End of file view_pproj.php */
/* Location: ./application/controllers/view_pproj.php */