<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_pproj extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   $this->load->model('project','',TRUE);
   $this->load->model('poultry','',TRUE);
   $this->load->model('images','',TRUE);
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
  $proj_id = $this->uri->segment(4);
  $data['proj_id'] = $proj_id;
  $data['my_redirect']= current_url();
  $data['baseurl']= base_url();
  $data['sortby_breed_asc'] = site_url('view_pproj/sortby/poultry/breed/asc');
  $data['sortby_breed_desc'] = site_url('view_pproj/sortby/poultry/breed/desc');
  $data['sortby_pid_asc'] = site_url('view_pproj/sortby/poultry/pid/asc');
  $data['sortby_pid_desc'] = site_url('view_pproj/sortby/poultry/pid/desc');
  $data['sortby_fa_asc'] = site_url('view_pproj/sortby/poultry/fa/asc');
  $data['sortby_fa_desc'] = site_url('view_pproj/sortby/poultry/fa/desc');
  $data['sortby_place_asc'] = site_url('view_pproj/sortby/poultry/place/asc');
  $data['sortby_place_desc'] = site_url('view_pproj/sortby/poultry/place/desc');
  if($this->session->userdata('logged_in')){
   $data['new_url'] = site_url('view_project/show_project_complete');
  }
  else $data['new_url'] = site_url('view_project/show_project_inc');
  $this->get_viewtype();
  
  $count = $this->poultry->get_total_poultry();
   
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'view_pproj/index';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  
  $data['list'] = $this->poultry->get_poultry($config['per_page'], $offset);
  $this->pagination->initialize($config);
  
  $this->load->view('pproj_view', $data);
  $this->load->view('footer');
 }
 
 function sortby()
 {
  $this->load->helper(array('form', 'url'));
  $proj_id = $this->uri->segment(4);
  $data['proj_id'] = $proj_id;
  $data['my_redirect']= current_url();
  $data['baseurl']= base_url();
  
  $this->load->library('pagination');
  $column = $this->uri->segment(4);
  $order = $this->uri->segment(5);
  $offset = $this->uri->segment(6);
  
  $data['sortby_breed_asc'] = site_url('view_pproj/sortby/poultry/breed/asc');
  $data['sortby_breed_desc'] = site_url('view_pproj/sortby/poultry/breed/desc');
  $data['sortby_pid_asc'] = site_url('view_pproj/sortby/poultry/pid/asc');
  $data['sortby_pid_desc'] = site_url('view_pproj/sortby/poultry/pid/desc');
  $data['sortby_fa_asc'] = site_url('view_pproj/sortby/poultry/fa/asc');
  $data['sortby_fa_desc'] = site_url('view_pproj/sortby/poultry/fa/desc');
  $data['sortby_place_asc'] = site_url('view_pproj/sortby/poultry/place/asc');
  $data['sortby_place_desc'] = site_url('view_pproj/sortby/poultry/place/desc');
  $dimgpath = $this->images->get_dfilepath($proj_id);
  $data['dimgpath'] = $dimgpath;
  
  if($this->session->userdata('logged_in')){
   $data['new_url'] = site_url('view_project/show_project_complete');
  }
  else $data['new_url'] = site_url('view_project/show_project_inc');
  
  $config['per_page'] = 15;
  $count = $this->poultry->get_total_poultry();
  
  if (($column == "breed") && ($order == "asc")) $config['base_url'] = base_url().'view_pproj/sortby/poultry/breed/asc';
      if (($column == "breed") && ($order == "desc")) $config['base_url'] = base_url().'view_pproj/sortby/poultry/breed/desc';
      if (($column == "pid") && ($order == "asc")) $config['base_url'] = base_url().'view_pproj/sortby/poultry/pid/asc';
      if (($column == "pid") && ($order == "desc")) $config['base_url'] = base_url().'view_pproj/sortby/poultry/pid/desc';
      if (($column == "fa") && ($order == "asc")) $config['base_url'] = base_url().'view_pproj/sortby/poultry/fa/asc';
      if (($column == "fa") && ($order == "desc")) $config['base_url'] = base_url().'view_pproj/sortby/poultry/fa/desc';
      if (($column == "place") && ($order == "asc")) $config['base_url'] = base_url().'view_pproj/sortby/poultry/place/asc';
      if (($column == "place") && ($order == "desc")) $config['base_url'] = base_url().'view_pproj/sortby/poultry/place/desc';
  $data['list'] = $this->poultry->get_all_sorted_by($config['per_page'], $offset, $column, $order);
  $config['last_link'] = FALSE;
  $config['total_rows'] = $count;
  $this->pagination->initialize($config);
  
  $this->get_viewtype();
  $this->load->view('pproj_view', $data);
  $this->load->view('footer');
 }
}

/* End of file view_pproj.php */
/* Location: ./application/controllers/view_pproj.php */