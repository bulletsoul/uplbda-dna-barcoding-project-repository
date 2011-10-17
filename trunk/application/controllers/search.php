<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   $this->load->model('livestock','',TRUE);
   $this->load->model('poultry','',TRUE);
   $this->load->model('project','',TRUE);
 }
  
 /* default search is animal or breed */
 function index()
 {
  
 }
 
 function get_viewtype()
  {     
    if($this->session->userdata('logged_in'))
    {
      $this->load->view('home_header');
    }
    else $this->load->view('user_header');   
  }
  
 function basic_search()
 {
  $this->load->helper(array('form'));
  if($this->session->userdata('logged_in'))
  {
   $data['new_url'] = site_url('view_project/show_project_complete'); 
  }
  else $data['new_url'] = site_url('view_project/show_project_inc');
  $search_text = $this->input->post('search_text');
  $count = $this->project->count_keyword_result($search_text);
    
  $this->load->library('pagination');
  
  $offset = $this->uri->segment(3);
  $config['base_url'] = base_url().'search/basic_search';
  $config['total_rows'] = $count;
  $config['per_page'] = 10;
  $config['first_link'] = '<<';
  $config['last_link'] = FALSE;
  $config['next_link'] = 'Next >';
  $config['prev_link'] = '< Previous';
  $config['display_pages'] = FALSE;
  $data['results'] = $this->project->get_basic_search_result($config['per_page'], $offset, $search_text);
  $data['search_text'] = $search_text;
  $this->pagination->initialize($config);
  
  $this->get_viewtype();
  $this->load->view('search_results_view', $data);
  $this->load->view('footer');
 }
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */