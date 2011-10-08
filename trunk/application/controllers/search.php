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
  $this->load->helper(array('form'));
  if($this->session->userdata('logged_in'))
  {
   $data['new_url'] = site_url('view_project/show_project_complete'); 
  }
  else $data['new_url'] = site_url('view_project/show_project_inc');
  $search_text = $this->input->post('search_text');
  $count = $this->project->count_keyword_result($search_text);
  
  $offset = $this->uri->segment(2,0);
  
  $this->load->library('pagination');
  
  $config['uri_segment'] = 2;
  $config['base_url'] = base_url().'search';
  $config['total_rows'] = $count;
  $config['per_page'] = 10;
  
  $this->pagination->initialize($config);
  
  $this->db->select('breed, proj_id, proj_desc');
  $this->db->like('farm_animal',$search_text);
  $this->db->or_like('breed',$search_text);
  $this->db->or_like('proj_desc',$search_text);
  $this->db->limit($config['per_page'], $offset); // Only get the results for this "page"
  $query = $this->db->get('project');

  $data['search_text'] = $search_text;
  $data['results'] = $query->result();
  $this->load->view('search_header');
  $this->load->view('search_results_view', $data);
  $this->load->view('footer');
 }
 
 function advanced_search()
 {
  echo "yehey"; 
 }
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */