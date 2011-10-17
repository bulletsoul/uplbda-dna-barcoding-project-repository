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

 function index()
 {
  $this->load->helper(array('form', 'url'));
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
  $config['base_url'] = base_url().'view_pproj/index';
  $config['total_rows'] = $count;
  $config['per_page'] = 15;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $config['last_link'] = FALSE;
  
  $data['list'] = $this->poultry->get_poultry($config['per_page'], $offset);
  $this->pagination->initialize($config);
  
  $this->load->view('pproj_view', $data);
  $this->load->view('footer');
 }
 
 
}

/* End of file view_pproj.php */
/* Location: ./application/controllers/view_pproj.php */