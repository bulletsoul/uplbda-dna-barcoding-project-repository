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
   $data['sortby_breed_asc'] = site_url('view_ls_category/sortby/bovidae/breed/asc');
      $data['sortby_breed_desc'] = site_url('view_ls_category/sortby/bovidae/breed/desc');
      $data['sortby_pid_asc'] = site_url('view_ls_category/sortby/bovidae/pid/asc');
      $data['sortby_pid_desc'] = site_url('view_ls_category/sortby/bovidae/pid/desc');
      $data['sortby_fa_asc'] = site_url('view_ls_category/sortby/bovidae/fa/asc');
      $data['sortby_fa_desc'] = site_url('view_ls_category/sortby/bovidae/fa/desc');
      $data['sortby_place_asc'] = site_url('view_ls_category/sortby/bovidae/place/asc');
      $data['sortby_place_desc'] = site_url('view_ls_category/sortby/bovidae/place/desc');
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_bovidae();
   $data['ls_category'] = "Bovidae";

  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'view_ls_category/bovidae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  
  $data['list'] = $this->livestock->get_bovidae($config['per_page'], $offset);
  //$data['results'] = $this->project->get_basic_search_result($config['per_page'], $offset, $search_text);
  
  $this->pagination->initialize($config);
   
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
   $data['sortby_breed_asc'] = site_url('view_ls_category/sortby/capridae/breed/asc');
      $data['sortby_breed_desc'] = site_url('view_ls_category/sortby/capridae/breed/desc');
      $data['sortby_pid_asc'] = site_url('view_ls_category/sortby/capridae/pid/asc');
      $data['sortby_pid_desc'] = site_url('view_ls_category/sortby/capridae/pid/desc');
      $data['sortby_fa_asc'] = site_url('view_ls_category/sortby/capridae/fa/asc');
      $data['sortby_fa_desc'] = site_url('view_ls_category/sortby/capridae/fa/desc');
      $data['sortby_place_asc'] = site_url('view_ls_category/sortby/capridae/place/asc');
      $data['sortby_place_desc'] = site_url('view_ls_category/sortby/capridae/place/desc');
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
  
   $count = $this->livestock->get_total_capridae();
   $data['ls_category'] = "Capridae";

  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'view_ls_category/capridae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  
  $data['list'] = $this->livestock->get_capridae($config['per_page'], $offset);
  //$data['results'] = $this->project->get_basic_search_result($config['per_page'], $offset, $search_text);
  
  $this->pagination->initialize($config);
   
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
   $data['sortby_breed_asc'] = site_url('view_ls_category/sortby/monogastrics/breed/asc');
   $data['sortby_breed_desc'] = site_url('view_ls_category/sortby/monogastrics/breed/desc');
   $data['sortby_pid_asc'] = site_url('view_ls_category/sortby/monogastrics/pid/asc');
   $data['sortby_pid_desc'] = site_url('view_ls_category/sortby/monogastrics/pid/desc');
   $data['sortby_fa_asc'] = site_url('view_ls_category/sortby/monogastrics/fa/asc');
   $data['sortby_fa_desc'] = site_url('view_ls_category/sortby/monogastrics/fa/desc');
   $data['sortby_place_asc'] = site_url('view_ls_category/sortby/monogastrics/place/asc');
   $data['sortby_place_desc'] = site_url('view_ls_category/sortby/monogastrics/place/desc'); 
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_monogastrics();
   $data['ls_category'] = "Monogastrics";

  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'view_ls_category/monogastrics';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  
  $data['list'] = $this->livestock->get_monogastrics($config['per_page'], $offset);
  //$data['results'] = $this->project->get_basic_search_result($config['per_page'], $offset, $search_text);
  
  $this->pagination->initialize($config);
   $this->load->view('ls_view', $data);
   $this->load->view('footer');
  }
  
  function sortby()
  {
    $this->load->helper(array('form', 'url'));
    $this->get_viewtype();
    $data['my_redirect']= current_url();
    $data['new_url1']= site_url('view_project/view_map');
    $data['baseurl']= base_url();
    
    $this->load->library('pagination');
    $ls_category = $this->uri->segment(3);
    $column = $this->uri->segment(4);
    $order = $this->uri->segment(5);
    $offset = $this->uri->segment(6);
    
    $data['sortby_breed_asc'] = site_url('view_ls_category/sortby/monogastrics/breed/asc');
    $data['sortby_breed_desc'] = site_url('view_ls_category/sortby/monogastrics/breed/desc');
    $data['sortby_pid_asc'] = site_url('view_ls_category/sortby/monogastrics/pid/asc');
    $data['sortby_pid_desc'] = site_url('view_ls_category/sortby/monogastrics/pid/desc');
    $data['sortby_fa_asc'] = site_url('view_ls_category/sortby/monogastrics/fa/asc');
    $data['sortby_fa_desc'] = site_url('view_ls_category/sortby/monogastrics/fa/desc');
    $data['sortby_place_asc'] = site_url('view_ls_category/sortby/monogastrics/place/asc');
    $data['sortby_place_desc'] = site_url('view_ls_category/sortby/monogastrics/place/desc');
    
    if($this->session->userdata('logged_in')){
      $data['new_url'] = site_url('view_project/show_project_complete');
     }
     else $data['new_url'] = site_url('view_project/show_project_inc');
    
    $config['per_page'] = 15;
    if($ls_category == 'monogastrics')
    {
      $data['sortby_breed_asc'] = site_url('view_ls_category/sortby/monogastrics/breed/asc');
      $data['sortby_breed_desc'] = site_url('view_ls_category/sortby/monogastrics/breed/desc');
      $data['sortby_pid_asc'] = site_url('view_ls_category/sortby/monogastrics/pid/asc');
      $data['sortby_pid_desc'] = site_url('view_ls_category/sortby/monogastrics/pid/desc');
      $data['sortby_fa_asc'] = site_url('view_ls_category/sortby/monogastrics/fa/asc');
      $data['sortby_fa_desc'] = site_url('view_ls_category/sortby/monogastrics/fa/desc');
      $data['sortby_place_asc'] = site_url('view_ls_category/sortby/monogastrics/place/asc');
      $data['sortby_place_desc'] = site_url('view_ls_category/sortby/monogastrics/place/desc');
      $count = $this->livestock->get_total_monogastrics();
      if (($column == "breed") && ($order == "asc")) $config['base_url'] = base_url().'view_ls_category/sortby/monogastrics/breed/asc';
      if (($column == "breed") && ($order == "desc")) $config['base_url'] = base_url().'view_ls_category/sortby/monogastrics/breed/desc';
      if (($column == "pid") && ($order == "asc")) $config['base_url'] = base_url().'view_ls_category/sortby/monogastrics/pid/asc';
      if (($column == "pid") && ($order == "desc")) $config['base_url'] = base_url().'view_ls_category/sortby/monogastrics/pid/desc';
      if (($column == "fa") && ($order == "asc")) $config['base_url'] = base_url().'view_ls_category/sortby/monogastrics/fa/asc';
      if (($column == "fa") && ($order == "desc")) $config['base_url'] = base_url().'view_ls_category/sortby/monogastrics/fa/desc';
      if (($column == "place") && ($order == "asc")) $config['base_url'] = base_url().'view_ls_category/sortby/monogastrics/place/asc';
      if (($column == "place") && ($order == "desc")) $config['base_url'] = base_url().'view_ls_category/sortby/monogastrics/place/desc';
      $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, $column, $order, $ls_category);
      $data['ls_category'] = "Monogastrics";
    }
    
    if($ls_category == 'capridae')
    {
      $data['sortby_breed_asc'] = site_url('view_ls_category/sortby/capridae/breed/asc');
      $data['sortby_breed_desc'] = site_url('view_ls_category/sortby/capridae/breed/desc');
      $data['sortby_pid_asc'] = site_url('view_ls_category/sortby/capridae/pid/asc');
      $data['sortby_pid_desc'] = site_url('view_ls_category/sortby/capridae/pid/desc');
      $data['sortby_fa_asc'] = site_url('view_ls_category/sortby/capridae/fa/asc');
      $data['sortby_fa_desc'] = site_url('view_ls_category/sortby/capridae/fa/desc');
      $data['sortby_place_asc'] = site_url('view_ls_category/sortby/capridae/place/asc');
      $data['sortby_place_desc'] = site_url('view_ls_category/sortby/capridae/place/desc');
      $count = $this->livestock->get_total_capridae();
      if (($column == "breed") && ($order == "asc")) $config['base_url'] = base_url().'view_ls_category/sortby/capridae/breed/asc';
      if (($column == "breed") && ($order == "desc")) $config['base_url'] = base_url().'view_ls_category/sortby/capridae/breed/desc';
      if (($column == "pid") && ($order == "asc")) $config['base_url'] = base_url().'view_ls_category/sortby/capridae/pid/asc';
      if (($column == "pid") && ($order == "desc")) $config['base_url'] = base_url().'view_ls_category/sortby/capridae/pid/desc';
      if (($column == "fa") && ($order == "asc")) $config['base_url'] = base_url().'view_ls_category/sortby/capridae/fa/asc';
      if (($column == "fa") && ($order == "desc")) $config['base_url'] = base_url().'view_ls_category/sortby/capridae/fa/desc';
      if (($column == "place") && ($order == "asc")) $config['base_url'] = base_url().'view_ls_category/sortby/capridae/place/asc';
      if (($column == "place") && ($order == "desc")) $config['base_url'] = base_url().'view_ls_category/sortby/capridae/place/desc';
      $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, $column, $order, $ls_category);
      $data['ls_category'] = "Capridae";
    }
    
    if ($ls_category == 'bovidae')
    {
      $data['sortby_breed_asc'] = site_url('view_ls_category/sortby/bovidae/breed/asc');
      $data['sortby_breed_desc'] = site_url('view_ls_category/sortby/bovidae/breed/desc');
      $data['sortby_pid_asc'] = site_url('view_ls_category/sortby/bovidae/pid/asc');
      $data['sortby_pid_desc'] = site_url('view_ls_category/sortby/bovidae/pid/desc');
      $data['sortby_fa_asc'] = site_url('view_ls_category/sortby/bovidae/fa/asc');
      $data['sortby_fa_desc'] = site_url('view_ls_category/sortby/bovidae/fa/desc');
      $data['sortby_place_asc'] = site_url('view_ls_category/sortby/bovidae/place/asc');
      $data['sortby_place_desc'] = site_url('view_ls_category/sortby/bovidae/place/desc');
      $count = $this->livestock->get_total_bovidae();
      if (($column == "breed") && ($order == "asc")) $config['base_url'] = base_url().'view_ls_category/sortby/bovidae/breed/asc';
      if (($column == "breed") && ($order == "desc")) $config['base_url'] = base_url().'view_ls_category/sortby/bovidae/breed/desc';
      if (($column == "pid") && ($order == "asc")) $config['base_url'] = base_url().'view_ls_category/sortby/bovidae/pid/asc';
      if (($column == "pid") && ($order == "desc")) $config['base_url'] = base_url().'view_ls_category/sortby/bovidae/pid/desc';
      if (($column == "fa") && ($order == "asc")) $config['base_url'] = base_url().'view_ls_category/sortby/bovidae/fa/asc';
      if (($column == "fa") && ($order == "desc")) $config['base_url'] = base_url().'view_ls_category/sortby/bovidae/fa/desc';
      if (($column == "place") && ($order == "asc")) $config['base_url'] = base_url().'view_ls_category/sortby/bovidae/place/asc';
      if (($column == "place") && ($order == "desc")) $config['base_url'] = base_url().'view_ls_category/sortby/bovidae/place/desc';
      $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, $column, $order, $ls_category);
      $data['ls_category'] = "Bovidae";
    }
    
    $config['last_link'] = FALSE;
    $config['total_rows'] = $count;
    $this->pagination->initialize($config);
    $this->load->view('ls_view', $data);
    $this->load->view('footer'); 
  }//end of sortby
}

/* End of file view_ls_category.php */
/* Location: ./application/controllers/view_ls_category.php */