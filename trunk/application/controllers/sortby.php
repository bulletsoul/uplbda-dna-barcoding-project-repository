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

 function index_poultry()
 {
   return $data = array ('sortby_breed_asc' => site_url('sortby/breed_asc_poultry'),
   'sortby_breed_desc' => site_url('sortby/breed_desc_poultry'),
   'sortby_pid_asc' => site_url('sortby/pid_asc_poultry'),
   'sortby_pid_desc' => site_url('sortby/pid_desc_poultry'),
   'sortby_fa_asc' => site_url('sortby/fa_asc_poultry'),
   'sortby_fa_desc' => site_url('sortby/fa_desc_poultry'),
   'sortby_place_asc' => site_url('sortby/place_asc_poultry'),
   'sortby_place_desc' => site_url('sortby/place_desc_poultry'),
   'my_redirect' => current_url(),
   'new_url1' => site_url('view_project/view_map'),
   'baseurl' => base_url()
   );
 }
 
 function sortby_place_asc_livestock()
  {
    $data = $this->index_livestock();
    $data['column'] = 'Place';
    $data['order'] = 'ascending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->livestock->get_total_user_lproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_place_asc_livestock';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_livestock'] = $this->livestock->get_all_sorted_by($config['per_page'], $offset, $user_id, 'place', 'asc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_livestock_projects_view',$data);
    $this->load->view('footer');
  }
  
  function sortby_place_desc_livestock()
  {
    $data = $this->index_livestock();
    $data['column'] = 'Place';
    $data['order'] = 'descending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->livestock->get_total_user_lproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_place_desc_livestock';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_livestock'] = $this->livestock->get_all_sorted_by($config['per_page'], $offset, $user_id, 'place', 'desc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_livestock_projects_view',$data);
    $this->load->view('footer');
  }
  
  function sortby_fa_asc_livestock()
  {
    $data = $this->index_livestock();
    $data['column'] = 'Farm animal';
    $data['order'] = 'ascending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->livestock->get_total_user_lproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_fa_asc_livestock';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_livestock'] = $this->livestock->get_all_sorted_by($config['per_page'], $offset, $user_id, 'fa', 'asc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_livestock_projects_view',$data);
    $this->load->view('footer');
  }
  
  function sortby_fa_desc_livestock()
  {
    $data = $this->index_livestock();
    $data['column'] = 'Farm animal';
    $data['order'] = 'descending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->livestock->get_total_user_lproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_fa_desc_livestock';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_livestock'] = $this->livestock->get_all_sorted_by($config['per_page'], $offset, $user_id, 'fa', 'desc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_livestock_projects_view',$data);
    $this->load->view('footer');
  }

 function breed_asc_poultry()
 {
  $data = $this->index_poultry();
   $data['column'] = 'Breed';
   $data['order'] = 'ascending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   $this->get_viewtype();
   
   $count = $this->poultry->get_total_poultry();
   
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/breed_asc_poultry';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
$config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  
  $data['list'] = $this->poultry->get_all_sorted_by($config['per_page'], $offset, 'breed', 'asc');
  $this->pagination->initialize($config);
  
  $this->load->view('pproj_view', $data);
  $this->load->view('footer');
 }

 function breed_desc_poultry()
 {
   $data = $this->index_poultry();
   $data['column'] = 'Breed';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   $this->get_viewtype();
   
   $count = $this->poultry->get_total_poultry();
   
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/breed_desc_poultry';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
$config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  
  $data['list'] = $this->poultry->get_all_sorted_by($config['per_page'], $offset, 'breed', 'desc');
  $this->pagination->initialize($config);
  
  $this->load->view('pproj_view', $data);
  $this->load->view('footer');
 }
 
 function pid_asc_poultry()
 {
  $data = $this->index_poultry();
   $data['column'] = 'Project ID';
   $data['order'] = 'ascending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   $this->get_viewtype();
   
   $count = $this->poultry->get_total_poultry();
   
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/pid_asc_poultry';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
$config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  
  $data['list'] = $this->poultry->get_all_sorted_by($config['per_page'], $offset, 'pid', 'asc');
  $this->pagination->initialize($config);
  
  $this->load->view('pproj_view', $data);
  $this->load->view('footer');
 }

 function pid_desc_poultry()
 {
  $data = $this->index_poultry();
   $data['column'] = 'Project ID';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   $this->get_viewtype();
   
   $count = $this->poultry->get_total_poultry();
   
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/pid_desc_poultry';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
$config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  
  $data['list'] = $this->poultry->get_all_sorted_by($config['per_page'], $offset, 'pid', 'desc');
  $this->pagination->initialize($config);
  
  $this->load->view('pproj_view', $data);
  $this->load->view('footer');
 }
 
 function fa_asc_poultry()
 {
  $data = $this->index_poultry();
   $data['column'] = 'Farm animal';
   $data['order'] = 'ascending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   $this->get_viewtype();
   
   $count = $this->poultry->get_total_poultry();
   
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/fa_asc_poultry';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
$config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  
  $data['list'] = $this->poultry->get_all_sorted_by($config['per_page'], $offset, 'fa', 'asc');
  $this->pagination->initialize($config);
  
  $this->load->view('pproj_view', $data);
  $this->load->view('footer');
 }

 function fa_desc_poultry()
 {
  $data = $this->index_poultry();
   $data['column'] = 'Farm animal';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   $this->get_viewtype();
   
   $count = $this->poultry->get_total_poultry();
   
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/fa_desc_poultry';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
$config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  
  $data['list'] = $this->poultry->get_all_sorted_by($config['per_page'], $offset, 'fa', 'desc');
  $this->pagination->initialize($config);
  
  $this->load->view('pproj_view', $data);
  $this->load->view('footer');
 }

 function place_asc_poultry()
 {
  $data = $this->index_poultry();
   $data['column'] = 'Place';
   $data['order'] = 'ascending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   $this->get_viewtype();
   
   $count = $this->poultry->get_total_poultry();
   
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/place_asc_poultry';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
$config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  
  $data['list'] = $this->poultry->get_all_sorted_by($config['per_page'], $offset, 'place', 'asc');
  $this->pagination->initialize($config);
  
  $this->load->view('pproj_view', $data);
  $this->load->view('footer');
 }

 function place_desc_poultry()
 {
  $data = $this->index_poultry();
   $data['column'] = 'Place';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   $this->get_viewtype();
   
   $count = $this->poultry->get_total_poultry();
   
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/place_desc_poultry';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
$config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  
  $data['list'] = $this->poultry->get_all_sorted_by($config['per_page'], $offset, 'place', 'desc');
  $this->pagination->initialize($config);
  
  $this->load->view('pproj_view', $data);
  $this->load->view('footer');
 }
 
 function index_bovidae()
 {
   return $data = array ('sortby_breed_asc' => site_url('sortby/breed_asc_bovidae'),
   'sortby_breed_desc' => site_url('sortby/breed_desc_bovidae'),
   'sortby_pid_asc' => site_url('sortby/pid_asc_bovidae'),
   'sortby_pid_desc' => site_url('sortby/pid_desc_bovidae'),
   'sortby_fa_asc' => site_url('sortby/fa_asc_bovidae'),
   'sortby_fa_desc' => site_url('sortby/fa_desc_bovidae'),
   'sortby_place_asc' => site_url('sortby/place_asc_bovidae'),
   'sortby_place_desc' => site_url('sortby/place_desc_bovidae'),
   'my_redirect' => current_url(),
   'new_url1' => site_url('view_project/view_map'),
   'baseurl' => base_url()
   );
 }

 function index_monogastrics()
 {
   return $data = array ('sortby_breed_asc' => site_url('sortby/breed_asc_monogastrics'),
   'sortby_breed_desc' => site_url('sortby/breed_desc_monogastrics'),
   'sortby_pid_asc' => site_url('sortby/pid_asc_monogastrics'),
   'sortby_pid_desc' => site_url('sortby/pid_desc_monogastrics'),
   'sortby_fa_asc' => site_url('sortby/fa_asc_monogastrics'),
   'sortby_fa_desc' => site_url('sortby/fa_desc_monogastrics'),
   'sortby_place_asc' => site_url('sortby/place_asc_monogastrics'),
   'sortby_place_desc' => site_url('sortby/place_desc_monogastrics'),
   'my_redirect' => current_url(),
   'new_url1' => site_url('view_project/view_map'),
   'baseurl' => base_url()
   );
 }
 
 function index_capridae()
 {
   return $data = array ('sortby_breed_asc' => site_url('sortby/breed_asc_capridae'),
   'sortby_breed_desc' => site_url('sortby/breed_desc_capridae'),
   'sortby_pid_asc' => site_url('sortby/pid_asc_capridae'),
   'sortby_pid_desc' => site_url('sortby/pid_desc_capridae'),
   'sortby_fa_asc' => site_url('sortby/fa_asc_capridae'),
   'sortby_fa_desc' => site_url('sortby/fa_desc_capridae'),
   'sortby_place_asc' => site_url('sortby/place_asc_capridae'),
   'sortby_place_desc' => site_url('sortby/place_desc_capridae'),
   'my_redirect' => current_url(),
   'new_url1' => site_url('view_project/view_map'),
   'baseurl' => base_url()
   );
 }
 
 function get_viewtype()
 {     
  if($this->session->userdata('logged_in'))
  {
    $this->load->view('home_header');
    
  }
  else $this->load->view('user_header');   
 }
   
 function breed_asc_bovidae()
 {
  $data = $this->index_bovidae();
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
  $config['base_url'] = base_url().'sortby/breed_asc_bovidae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'breed', 'asc', 'bovidae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function breed_asc_capridae()
 {
  $data = $this->index_capridae();
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
  $config['base_url'] = base_url().'sortby/breed_asc_capridae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
$config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'breed', 'asc', 'capridae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function breed_asc_monogastrics()
 {
  $data = $this->index_monogastrics();
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
  $config['base_url'] = base_url().'sortby/breed_asc_monogastrics';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
$config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'breed', 'asc', 'monogastrics');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function pid_asc_bovidae()
 {
  $data = $this->index_bovidae();
   $data['column'] = 'Project ID';
   $data['order'] = 'ascending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_bovidae();
   $data['ls_category'] = "Bovidae";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/pid_asc_bovidae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
$config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'pid', 'asc', 'bovidae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function pid_asc_capridae()
 {
  $data = $this->index_capridae();
   $data['column'] = 'Project ID';
   $data['order'] = 'ascending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_capridae();
   $data['ls_category'] = "Capridae";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/pid_asc_capridae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'pid', 'asc', 'capridae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function pid_asc_monogastrics()
 {
  $data = $this->index_monogastrics();
   $data['column'] = 'Project ID';
   $data['order'] = 'ascending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_monogastrics();
   $data['ls_category'] = "Monogastrics";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/pid_asc_monogastrics';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'pid', 'asc', 'monogastrics');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function fa_asc_bovidae()
 {
   $data = $this->index_bovidae();
   $data['column'] = 'Farm animal';
   $data['order'] = 'ascending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_bovidae();
   $data['ls_category'] = "Bovidae";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/fa_asc_bovidae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'fa', 'asc', 'bovidae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function fa_asc_capridae()
 {
   $data = $this->index_capridae();
   $data['column'] = 'Farm animal';
   $data['order'] = 'ascending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_capridae();
   $data['ls_category'] = "Capridae";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/fa_asc_capridae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'fa', 'asc', 'capridae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function fa_asc_monogastrics()
 {
   $data = $this->index_monogastrics();
   $data['column'] = 'Farm animal';
   $data['order'] = 'ascending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_monogastrics();
   $data['ls_category'] = "Monogastrics";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/fa_asc_monogastrics';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'fa', 'asc', 'monogastrics');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function place_asc_bovidae()
 {
   $data = $this->index_bovidae();
   $data['column'] = 'Farm animal';
   $data['order'] = 'ascending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_bovidae();
   $data['ls_category'] = "Bovidae";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/place_asc_bovidae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'place', 'asc', 'bovidae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function place_asc_capridae()
 {
   $data = $this->index_capridae();
   $data['column'] = 'Farm animal';
   $data['order'] = 'ascending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_capridae();
   $data['ls_category'] = "Capridae";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/place_asc_capridae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'place', 'asc', 'capridae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function place_asc_monogastrics()
 {
   $data = $this->index_monogastrics();
   $data['column'] = 'Farm animal';
   $data['order'] = 'ascending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_monogastrics();
   $data['ls_category'] = "Monogastrics";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/place_asc_monogastrics';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'place', 'asc', 'monogastrics');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function breed_desc_bovidae()
 {
  $data = $this->index_bovidae();
   $data['column'] = 'Breed';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_bovidae();
   $data['ls_category'] = "Bovidae";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/breed_desc_bovidae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'breed', 'desc', 'bovidae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function breed_desc_capridae()
 {
  $data = $this->index_capridae();
   $data['column'] = 'Breed';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_capridae();
   $data['ls_category'] = "Capridae";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/breed_desc_capridae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'breed', 'desc', 'capridae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function breed_desc_monogastrics()
 {
  $data = $this->index_monogastrics();
   $data['column'] = 'Breed';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_monogastrics();
   $data['ls_category'] = "Monogastrics";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/breed_desc_monogastrics';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'breed', 'desc', 'monogastrics');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function pid_desc_bovidae()
 {
  $data = $this->index_bovidae();
   $data['column'] = 'Project ID';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_bovidae();
   $data['ls_category'] = "Bovidae";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/pid_desc_bovidae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'pid', 'desc', 'bovidae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function pid_desc_capridae()
 {
  $data = $this->index_capridae();
   $data['column'] = 'Project ID';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_capridae();
   $data['ls_category'] = "Capridae";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/pid_desc_capridae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'pid', 'desc', 'capridae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function pid_desc_monogastrics()
 {
  $data = $this->index_monogastrics();
   $data['column'] = 'Project ID';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_monogastrics();
   $data['ls_category'] = "Monogastrics";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/pid_desc_monogastrics';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'pid', 'desc', 'monogastrics');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function fa_desc_bovidae()
 {
   $data = $this->index_bovidae();
   $data['column'] = 'Farm animal';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_bovidae();
   $data['ls_category'] = "Bovidae";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/fa_desc_bovidae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'fa', 'desc', 'bovidae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function fa_desc_capridae()
 {
   $data = $this->index_capridae();
   $data['column'] = 'Farm animal';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_capridae();
   $data['ls_category'] = "Capridae";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/fa_desc_capridae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'fa', 'desc', 'capridae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function fa_desc_monogastrics()
 {
   $data = $this->index_monogastrics();
   $data['column'] = 'Farm animal';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_monogastrics();
   $data['ls_category'] = "Monogastrics";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/fa_desc_monogastrics';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'fa', 'desc', 'monogastrics');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function place_desc_bovidae()
 {
   $data = $this->index_bovidae();
   $data['column'] = 'Farm animal';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_bovidae();
   $data['ls_category'] = "Bovidae";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/place_desc_bovidae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'place', 'desc', 'bovidae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function place_desc_capridae()
 {
   $data = $this->index_capridae();
   $data['column'] = 'Farm animal';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_capridae();
   $data['ls_category'] = "Capridae";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/place_desc_capridae';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'place', 'desc', 'capridae');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
 
 function place_desc_monogastrics()
 {
   $data = $this->index_monogastrics();
   $data['column'] = 'Farm animal';
   $data['order'] = 'descending';
   
   if($this->session->userdata('logged_in')){
    $data['new_url'] = site_url('view_project/show_project_complete');
   }
   else $data['new_url'] = site_url('view_project/show_project_inc');
   
   $count = $this->livestock->get_total_monogastrics();
   $data['ls_category'] = "Monogastrics";
  
  $this->load->library('pagination');
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'sortby/place_desc_monogastrics';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['list'] = $this->livestock->get_sorted_by($config['per_page'], $offset, 'place', 'desc', 'monogastrics');
  
  $this->pagination->initialize($config);
   
  $this->get_viewtype();
  $this->load->view('ls_view', $data);
  $this->load->view('footer');
 }
}

/* End of file sortby.php */
/* Location: ./application/controllers/sortby.php */