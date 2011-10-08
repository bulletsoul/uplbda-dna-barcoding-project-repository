<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_ls_category extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('project','',TRUE);
    $this->load->model('livestock','',TRUE);
    $this->load->model('user','', TRUE);
  }
  
  function get_viewtype()
  {     
    if($this->session->userdata('logged_in'))
    {
      $this->load->view('home_header');
    }
    else $this->load->view('user_header');   
  }
  
  function bovidae()
  {
   $this->load->helper(array('form', 'url'));
   $this->get_viewtype();
   $data['my_redirect']= current_url();
   $data['new_url1']= site_url('view_project/view_map');
   $data['baseurl']= base_url();
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   $data['list'] = $this->livestock->get_bovidae();
   
   
   $data['ls_category'] = "Bovidae";
   
   $this->load->view('ls_view', $data);
   $this->load->view('footer');
  }
  
  function capridae()
  {
   $this->load->helper(array('form', 'url'));
   $this->get_viewtype();
   $data['my_redirect']= current_url();
   $data['new_url1']= site_url('view_project/view_map');
   $data['baseurl']= base_url();
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   $data['list'] = $this->livestock->get_capridae();
   $data['ls_category'] = "Capridae";
   $this->load->view('ls_view', $data);
   $this->load->view('footer');
  }
  
  function monogastrics()
  {
   $this->load->helper(array('form', 'url'));
   $this->get_viewtype();
   $data['my_redirect']= current_url();
   $data['new_url1']= site_url('view_project/view_map');
   $data['baseurl']= base_url();
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   $data['list'] = $this->livestock->get_monogastrics();
   $data['ls_category'] = "Monogastrics";
   $this->load->view('ls_view', $data);
   $this->load->view('footer');
  }
  
}

/* End of file view_ls_category.php */
/* Location: ./application/controllers/view_ls_category.php */