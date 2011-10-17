<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_ls_category extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('project','',TRUE);
    $this->load->model('livestock','',TRUE);
    $this->load->model('user','', TRUE);
    $this->load->model('images','', TRUE);
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
   $proj_id = $this->uri->segment(4);
   $data['proj_id'] = $proj_id;
   $data['my_redirect']= current_url();
   $data['new_url1']= site_url('view_project/view_map');
   $data['baseurl']= base_url();

$data['sortby_breed_desc'] = site_url('sortby/breed_desc_bovidae');
   $data['sortby_pid_asc'] = site_url('sortby/pid_asc_bovidae');
   $data['sortby_pid_desc'] = site_url('sortby/pid_desc_bovidae');
   $data['sortby_fa_asc'] = site_url('sortby/fa_asc_bovidae');
   $data['sortby_fa_desc'] = site_url('sortbyfa_desc_bovidae');
   $data['sortby_place_asc'] = site_url('sortby/place_asc_bovidae');
   $data['sortby_place_desc'] = site_url('sortby/place_desc_bovidae');
   $data['column'] = 'Breed';
   $data['order'] = 'ascending';

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
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_bovidae($config['per_page'], $offset);

  
  $this->pagination->initialize($config);
   
   $this->get_viewtype();
   $this->load->view('ls_view', $data);
   $this->load->view('footer');
  }
  
  function capridae()
  {
   $this->load->helper(array('form', 'url'));
   $proj_id = $this->uri->segment(4);
   $data['proj_id'] = $proj_id;
   $this->get_viewtype();
   $data['my_redirect']= current_url();
   $data['new_url1']= site_url('view_project/view_map');
   $data['baseurl']= base_url();

   $data['sortby_breed_desc'] = site_url('sortby/breed_desc_capridae');
   $data['sortby_pid_asc'] = site_url('sortby/pid_asc_capridae');
   $data['sortby_pid_desc'] = site_url('sortby/pid_desc_capridae');
   $data['sortby_fa_asc'] = site_url('sortby/fa_asc_capridae');
   $data['sortby_fa_desc'] = site_url('sortbyfa_desc_capridae');
   $data['sortby_place_asc'] = site_url('sortby/place_asc_capridae');
   $data['sortby_place_desc'] = site_url('sortby/place_desc_capridae');
   $data['column'] = 'Breed';
   $data['order'] = 'ascending';

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
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_capridae($config['per_page'], $offset);
  
  $this->pagination->initialize($config);
   
   $this->load->view('ls_view', $data);
   $this->load->view('footer');
  }
  
  function monogastrics()
  {
   $this->load->helper(array('form', 'url'));
   $proj_id = $this->uri->segment(4);
   $data['proj_id'] = $proj_id;
   $this->get_viewtype();
   $data['my_redirect']= current_url();
   $data['new_url1']= site_url('view_project/view_map');
   $data['baseurl']= base_url();

$data['sortby_breed_desc'] = site_url('sortby/breed_desc_monogastrics');
   $data['sortby_pid_asc'] = site_url('sortby/pid_asc_monogastrics');
   $data['sortby_pid_desc'] = site_url('sortby/pid_desc_monogastrics');
   $data['sortby_fa_asc'] = site_url('sortby/fa_asc_monogastrics');
   $data['sortby_fa_desc'] = site_url('sortbyfa_desc_monogastrics');
   $data['sortby_place_asc'] = site_url('sortby/place_asc_monogastrics');
   $data['sortby_place_desc'] = site_url('sortby/place_desc_monogastrics');
   $data['column'] = 'Breed';
   $data['order'] = 'ascending';
   
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
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_monogastrics($config['per_page'], $offset);
  
  $this->pagination->initialize($config);
   $this->load->view('ls_view', $data);
   $this->load->view('footer');

}

/* End of file view_ls_category.php */
/* Location: ./application/controllers/view_ls_category.php */