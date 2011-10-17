<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_projects extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('project','',TRUE);
    $this->load->model('livestock','',TRUE);
    $this->load->model('poultry','',TRUE);
  }
  
  //method for loading the view for user's own projects
  function index()
  {
    
  }
  
  function sortby()
  {
    $data['my_redirect']= current_url();
    $data['baseurl']= base_url();
    $data['new_url'] = site_url('view_project/show_project');
    $this->load->library('pagination');
    $category = $this->uri->segment(3);
    $column = $this->uri->segment(4);
    $order = $this->uri->segment(5);
    $offset = $this->uri->segment(6);
    
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $config['per_page'] = 15;
    if ($category == "poultry")
    {
      $data['sortby_breed_asc'] = site_url('my_projects/sortby/poultry/breed/asc');
      $data['sortby_breed_desc'] = site_url('my_projects/sortby/poultry/breed/desc');
      $data['sortby_pid_asc'] = site_url('my_projects/sortby/poultry/pid/asc');
      $data['sortby_pid_desc'] = site_url('my_projects/sortby/poultry/pid/desc');
      $data['sortby_fa_asc'] = site_url('my_projects/sortby/poultry/fa/asc');
      $data['sortby_fa_desc'] = site_url('my_projects/sortby/poultry/fa/desc');
      $data['sortby_place_asc'] = site_url('my_projects/sortby/poultry/place/asc');
      $data['sortby_place_desc'] = site_url('my_projects/sortby/poultry/place/desc');
      $count = $this->poultry->get_total_user_pproj($user_id);
      if (($column == "breed") && ($order == "asc")) $config['base_url'] = base_url().'my_projects/sortby/poultry/breed/asc';
      if (($column == "breed") && ($order == "desc")) $config['base_url'] = base_url().'my_projects/sortby/poultry/breed/desc';
      if (($column == "pid") && ($order == "asc")) $config['base_url'] = base_url().'my_projects/sortby/poultry/pid/asc';
      if (($column == "pid") && ($order == "desc")) $config['base_url'] = base_url().'my_projects/sortby/poultry/pid/desc';
      if (($column == "fa") && ($order == "asc")) $config['base_url'] = base_url().'my_projects/sortby/poultry/fa/asc';
      if (($column == "fa") && ($order == "desc")) $config['base_url'] = base_url().'my_projects/sortby/poultry/fa/desc';
      if (($column == "place") && ($order == "asc")) $config['base_url'] = base_url().'my_projects/sortby/poultry/place/asc';
      if (($column == "place") && ($order == "desc")) $config['base_url'] = base_url().'my_projects/sortby/poultry/place/desc';
      $data['result_poultry'] = $this->poultry->get_sorted_by($config['per_page'], $offset, $user_id, $column, $order);
    } else {
      $data['sortby_breed_asc'] = site_url('my_projects/sortby/livestock/breed/asc');
      $data['sortby_breed_desc'] = site_url('my_projects/sortby/livestock/breed/desc');
      $data['sortby_pid_asc'] = site_url('my_projects/sortby/livestock/pid/asc');
      $data['sortby_pid_desc'] = site_url('my_projects/sortby/livestock/pid/desc');
      $data['sortby_fa_asc'] = site_url('my_projects/sortby/livestock/fa/asc');
      $data['sortby_fa_desc'] = site_url('my_projects/sortby/livestock/fa/desc');
      $data['sortby_place_asc'] = site_url('my_projects/sortby/livestock/place/asc');
      $data['sortby_place_desc'] = site_url('my_projects/sortby/livestock/place/desc');
      $count = $this->livestock->get_total_user_lproj($user_id);
      if (($column == "breed") && ($order == "asc")) $config['base_url'] = base_url().'my_projects/sortby/livestock/breed/asc';
      if (($column == "breed") && ($order == "desc")) $config['base_url'] = base_url().'my_projects/sortby/livestock/breed/desc';
      if (($column == "pid") && ($order == "asc")) $config['base_url'] = base_url().'my_projects/sortby/livestock/pid/asc';
      if (($column == "pid") && ($order == "desc")) $config['base_url'] = base_url().'my_projects/sortby/livestock/pid/desc';
      if (($column == "fa") && ($order == "asc")) $config['base_url'] = base_url().'my_projects/sortby/livestock/fa/asc';
      if (($column == "fa") && ($order == "desc")) $config['base_url'] = base_url().'my_projects/sortby/livestock/fa/desc';
      if (($column == "place") && ($order == "asc")) $config['base_url'] = base_url().'my_projects/sortby/livestock/place/asc';
      if (($column == "place") && ($order == "desc")) $config['base_url'] = base_url().'my_projects/sortby/livestock/place/desc';
      $data['result_livestock'] = $this->livestock->get_all_sorted_by($config['per_page'], $offset, $user_id, $column, $order);
    }
    $config['last_link'] = FALSE;
    $config['total_rows'] = $count;
    
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    if ($category == "poultry") $this->load->view('my_poultry_projects_view',$data);
    else $this->load->view('my_livestock_projects_view',$data);
    $this->load->view('footer');
  }
  
  function index_livestock()
  {
    return $data = array (
    'my_redirect' => current_url(),
    'baseurl' => base_url(),
    'new_url' => site_url('view_project/show_project'),
    'sortby_breed_asc' => site_url('my_projects/sortby_breed_asc_livestock'),
    'sortby_breed_desc' => site_url('my_projects/sortby_breed_desc_livestock'),
    'sortby_pid_asc' => site_url('my_projects/sortby_pid_asc_livestock'),
    'sortby_pid_desc' => site_url('my_projects/sortby_pid_desc_livestock'),
    'sortby_fa_asc' => site_url('my_projects/sortby_fa_asc_livestock'),
    'sortby_fa_desc' => site_url('my_projects/sortby_fa_desc_livestock'),
    'sortby_place_asc' => site_url('my_projects/sortby_place_asc_livestock'),
    'sortby_place_desc' => site_url('my_projects/sortby_place_desc_livestock')
    );
  }
  
  function index_poultry()
  {
    return $data = array (
    'my_redirect' => current_url(),
    'baseurl' => base_url(),
    'new_url' => site_url('view_project/show_project'),
    'sortby_breed_asc' => site_url('my_projects/sortby_breed_asc_poultry'),
    'sortby_breed_desc' => site_url('my_projects/sortby_breed_desc_poultry'),
    'sortby_pid_asc' => site_url('my_projects/sortby_pid_asc_poultry'),
    'sortby_pid_desc' => site_url('my_projects/sortby_pid_desc_poultry'),
    'sortby_fa_asc' => site_url('my_projects/sortby_fa_asc_poultry'),
    'sortby_fa_desc' => site_url('my_projects/sortby_fa_desc_poultry'),
    'sortby_place_asc' => site_url('my_projects/sortby_place_asc_poultry'),
    'sortby_place_desc' => site_url('my_projects/sortby_place_desc_poultry')
    );
  }
  
  function sortby_breed_asc_livestock()
  {
    $data = $this->index_livestock();
    $data['column'] = 'Breed';
    $data['order'] = 'ascending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->livestock->get_total_user_lproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_breed_asc_livestock';
    $config['total_rows'] = $count;
    $config['last_link'] = FALSE;
    $config['first_link'] = '<<';
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_livestock'] = $this->livestock->get_all_sorted_by($config['per_page'], $offset, $user_id, 'breed', 'asc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_livestock_projects_view',$data);
    $this->load->view('footer');
  }
  
  function sortby_breed_desc_livestock()
  {
    $data = $this->index_livestock();
    $data['column'] = 'Breed';
    $data['order'] = 'descending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->livestock->get_total_user_lproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_breed_desc_livestock';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
    $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_livestock'] = $this->livestock->get_all_sorted_by($config['per_page'], $offset, $user_id, 'breed', 'desc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_livestock_projects_view',$data);
    $this->load->view('footer');
  }
  
  function sortby_pid_asc_livestock()
  {
    $data = $this->index_livestock();
    $data['column'] = 'Project ID';
    $data['order'] = 'ascending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->livestock->get_total_user_lproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_pid_asc_livestock';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
    $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_livestock'] = $this->livestock->get_all_sorted_by($config['per_page'], $offset, $user_id, 'pid', 'asc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_livestock_projects_view',$data);
    $this->load->view('footer');
  }
  
  function sortby_pid_desc_livestock()
  {
    $data = $this->index_livestock();
    $data['column'] = 'Project ID';
    $data['order'] = 'descending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->livestock->get_total_user_lproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_pid_desc_livestock';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
    $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_livestock'] = $this->livestock->get_all_sorted_by($config['per_page'], $offset, $user_id, 'pid', 'desc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_livestock_projects_view',$data);
    $this->load->view('footer');
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
  
  function sortby_breed_asc_poultry()
  {
    $data = $this->index_poultry();
    $data['column'] = 'Breed';
    $data['order'] = 'ascending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->poultry->get_total_user_pproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_breed_asc_poultry';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
    $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_poultry'] = $this->poultry->get_sorted_by($config['per_page'], $offset, $user_id, 'breed', 'asc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_poultry_projects_view',$data);
    $this->load->view('footer');
  }
  
  function sortby_breed_desc_poultry()
  {
    $data = $this->index_poultry();
    $data['column'] = 'Breed';
    $data['order'] = 'descending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->poultry->get_total_user_pproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_breed_desc_poultry';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
    $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_poultry'] = $this->poultry->get_sorted_by($config['per_page'], $offset, $user_id, 'breed', 'desc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_poultry_projects_view',$data);
    $this->load->view('footer');
  }
  
  function sortby_pid_asc_poultry()
  {
    $data = $this->index_poultry();
    $data['column'] = 'Project ID';
    $data['order'] = 'ascending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->poultry->get_total_user_pproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_pid_asc_poultry';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
    $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_poultry'] = $this->poultry->get_sorted_by($config['per_page'], $offset, $user_id, 'pid', 'asc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_poultry_projects_view',$data);
    $this->load->view('footer');
  }
  
  function sortby_pid_desc_poultry()
  {
    $data = $this->index_poultry();
    $data['column'] = 'Project ID';
    $data['order'] = 'descending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->poultry->get_total_user_pproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_pid_desc_poultry';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
    $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_poultry'] = $this->poultry->get_sorted_by($config['per_page'], $offset, $user_id, 'pid', 'desc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_poultry_projects_view',$data);
    $this->load->view('footer');
  }
  
  function sortby_place_asc_poultry()
  {
    $data = $this->index_poultry();
    $data['column'] = 'Place';
    $data['order'] = 'ascending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->poultry->get_total_user_pproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_place_asc_poultry';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
    $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_poultry'] = $this->poultry->get_sorted_by($config['per_page'], $offset, $user_id, 'place', 'asc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_poultry_projects_view',$data);
    $this->load->view('footer');
  }
  
  function sortby_place_desc_poultry()
  {
    $data = $this->index_poultry();
    $data['column'] = 'Place';
    $data['order'] = 'descending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->poultry->get_total_user_pproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_place_desc_poultry';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
    $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_poultry'] = $this->poultry->get_sorted_by($config['per_page'], $offset, $user_id, 'place', 'desc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_poultry_projects_view',$data);
    $this->load->view('footer');
  }
  
  function sortby_fa_asc_poultry()
  {
    $data = $this->index_poultry();
    $data['column'] = 'Farm animal';
    $data['order'] = 'ascending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->poultry->get_total_user_pproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_fa_asc_poultry';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
    $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_poultry'] = $this->poultry->get_sorted_by($config['per_page'], $offset, $user_id, 'fa', 'asc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_poultry_projects_view',$data);
    $this->load->view('footer');
  }
  
  function sortby_fa_desc_poultry()
  {
    $data = $this->index_poultry();
    $data['column'] = 'Farm animal';
    $data['order'] = 'descending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->poultry->get_total_user_pproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/sortby_fa_desc_poultry';
    $config['total_rows'] = $count;
    $config['first_link'] = '<<';
    $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_poultry'] = $this->poultry->get_sorted_by($config['per_page'], $offset, $user_id, 'fa', 'desc');
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_poultry_projects_view',$data);
    $this->load->view('footer');
  }
  
  
  function my_livestock_projects()
  {
    $data = $this->index_livestock();
    $data['column'] = 'Breed';
    $data['order'] = 'ascending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->livestock->get_total_user_lproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/my_livestock_projects';
    $config['total_rows'] = $count;
    $config['last_link'] = FALSE;
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_livestock'] = $this->livestock->get_user_lproj($config['per_page'], $offset, $user_id);
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_livestock_projects_view',$data);
    $this->load->view('footer');
  }
  
  function my_poultry_projects()
  {
    $data = $this->index_poultry();
    $data['column'] = 'Breed';
    $data['order'] = 'ascending';
   
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    
    $count = $this->poultry->get_total_user_pproj($user_id);
    
    $this->load->library('pagination');
    
    $offset = $this->uri->segment(3);
    $config['base_url'] = base_url().'my_projects/my_poultry_projects';
    $config['total_rows'] = $count;
    $config['last_link'] = FALSE;
    $config['first_link'] = '<<';
    $config['per_page'] = 15;
    $config['next_link'] = 'Next >';
    $config['prev_link'] = '< Previous';
    $config['display_pages'] = FALSE;
   
    $data['result_poultry'] = $this->poultry->get_user_pproj($config['per_page'], $offset, $user_id);
    $this->pagination->initialize($config);
  
    $this->load->view('home_header');
    $this->load->view('my_poultry_projects_view',$data);
    $this->load->view('footer');
  }
  
  function edit_project()
  {
    $this->load->helper(array('form', 'url'));
    $proj_id = $this->uri->segment(3);
    $data['my_current_url'] = current_url();
    $data['new_url'] = site_url('view_project/show_project');
    $data['nw_url'] = site_url('my_projects/edit_project');
    $data['edit_proj_url'] = site_url('process_edit_proj/edit_project');
    $data['nw_url1'] = site_url('upload/doc');
    $data['nw_url2'] = site_url('upload/dorsal_img');
    $data['nw_url5'] = site_url('upload/ventral_img');
    $data['nw_url6'] = site_url('upload/lateral_img');
    $data['nw_url7'] = site_url('upload/other_img');
    $data['nw_url3'] = site_url('upload/vid');
    $data['proj_id'] = $proj_id;
    $proj_details = $this->project->get_project_details($proj_id);
    $data['project_details'] = $proj_details;
    foreach($proj_details as $row){
      $data['breed_name'] = $row->breed;
    }
    $proj_category = $this->project->get_proj_category($proj_id);
    $data['project_category'] = $proj_category;
    foreach($proj_category as $item){
     foreach($item as $row){
      if($row == "livestock")
      {
       $ls_details = $this->livestock->get_livestock_details($proj_id);
       $data['ls_details'] = $ls_details;
      }
      else
      {
       $poultry_details = $this->poultry->get_poultry_details($proj_id);
       $data['poultry_details'] = $poultry_details;
      }
     }
    }
    $this->load->view('project_header_view', $data);
    $this->load->view('modify_project_view', $data);
    $this->load->view('footer');
  }
  
  function view_sequence()
  {
    $this->load->helper(array('form', 'url'));
    $proj_id = $this->uri->segment(3);
    $data['new_url'] = site_url('view_project/show_project');
    $data['nw_url'] = site_url('my_projects/edit_project');
    $data['nw_url1'] = site_url('upload/doc');
    $data['nw_url2'] = site_url('upload/dorsal_img');
    $data['nw_url5'] = site_url('upload/ventral_img');
    $data['nw_url3'] = site_url('upload/vid');
    $data['nw_url6'] = site_url('upload/lateral_img');
    $data['nw_url7'] = site_url('upload/other_img');
    $data['proj_id'] = $proj_id;
    $result = $this->project->get_breed($proj_id);
    foreach ($result as $item){
      foreach ($item as $row){
        $data['breed'] = $row;
      }
    }
    $result = $this->project->get_dna_seq($proj_id);
    foreach($result as $item){
      $data['dna_seq'] = $item->dna_seq;
    }
    
    $this->load->view('project_header_view', $data);
    $this->load->view('sequence_view', $data);
    $this->load->view('footer');
  }
 
  //method for deleting a project
  function delete_project()
  {
    $proj_id = $this->input->get('proj_id');
    $this->project->delete_project($proj_id);
  }
  
}

/* End of file my_projects.php */
/* Location: ./application/controllers/my_projects.php */