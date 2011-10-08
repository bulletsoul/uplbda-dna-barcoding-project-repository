<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sortby extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   $this->load->model('livestock','',TRUE);
   $this->load->model('poultry','',TRUE);
   $this->load->model('project','',TRUE);
 }

 function index()
 {
  $this->load->helper('url');
    $data['my_redirect']= current_url();
    $data['baseurl']= base_url();
    $data['new_url'] = site_url('view_project/show_project');
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $user_id = $session_data['user_id'];
      $data['result_poultry'] = $this->poultry->get_user_pproj($user_id);
      $data['result_livestock'] = $this->livestock->get_user_lproj($user_id);
      $this->load->view('home_header');
      $this->load->view('edit_proj_view', $data);
      $this->load->view('footer');
    }
 }

 function get_viewtype()
 {     
  if($this->session->userdata('logged_in'))
  {
    $this->load->view('home_header');
    
  }
  else $this->load->view('user_header');   
 }
 
 function get_ls_category($ls_category)
 {
  if ($ls_category == 'bovidae')
   {
    return "Bovidae";
   }
   
   if ($ls_category == 'capridae')
   {
    return "Capridae";
   }
   
   if ($ls_category == 'monogastrics')
   {
    return "Monogastrics";
   }
 }
 
 function my_projects()
 {
  $this->load->helper(array('form', 'url'));
  $this->get_viewtype();
  $col_name = $this->uri->segment(3);
  $category = $this->uri->segment(4);
  $ls_category = $this->uri->segment(5);
  $data['my_redirect']= current_url();
  $data['baseurl']= base_url();
  $data['new_url'] = site_url('view_project/show_project');
  if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
  $session_data = $this->session->userdata('logged_in');
  $user_id = $session_data['user_id'];
  
  if($category == 'livestock')
  {
   $data['result_poultry'] = $this->poultry->get_user_pproj($user_id);
   $data['result_livestock'] = $this->livestock->get_all_sorted_by($col_name, $user_id);
   $this->load->view('edit_proj_view', $data);
  }
  
  if ($category == 'poultry')
  {
   $data['result_poultry'] = $this->poultry->get_sorted_by($col_name, $user_id);
   $data['result_livestock'] = $this->livestock->get_user_lproj($user_id);
   $this->load->view('edit_proj_view', $data);
  }
  
  $this->load->view('footer');
 }

 function view_projects()
 {
  $this->get_viewtype();
  $col_name = $this->uri->segment(3);
  $category = $this->uri->segment(4);
  $ls_category = $this->uri->segment(5);
  $data['my_redirect']= current_url();
  $data['baseurl']= base_url();
  $data['new_url'] = site_url('view_project/show_project');
  if($this->session->userdata('logged_in')){
   $data['new_url'] = site_url('view_project/show_project_complete');
  }
   else $data['new_url'] = site_url('view_project/show_project_inc');
  
  if ($category == 'livestock')
   {
    $data['ls_category'] = $category = $this->get_ls_category($ls_category);
    $data['list'] = $this->livestock->get_sorted_by($category, $col_name);
    $this->load->view('ls_view', $data);
   }
   
   if ($category == 'poultry')
   {
    $data['list'] = $this->poultry->get_sorted_by($col_name);
    $this->load->view('pproj_view', $data);
   }
  
  $this->load->view('footer');
 }
 
}

/* End of file sortby.php */
/* Location: ./application/controllers/sortby.php */