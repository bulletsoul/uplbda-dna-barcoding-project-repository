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
  
  $this->db->select('breed, proj_id, proj_desc')->where('is_deleted',0);
  $this->db->where('farm_animal',$search_text)->where('is_deleted',0);
  $this->db->where('breed',$search_text)->where('is_deleted',0);
  $this->db->where('proj_desc',$search_text)->where('is_deleted',0);
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
  $config['per_page'] = $count;
  
  $this->pagination->initialize($config);
  
  $proj_type = $this->input->post('proj_type');
  $ls_category = $this->input->post('ls_category');
  $sex = $this->input->post('sex');
  $color = $this->input->post('color');
  $origin = $this->input->post('origin');
  
  $this->db->select('breed, project.proj_id')->where('is_deleted',0);
  $this->db->from('project');
  $this->db->order_by('breed','asc');
  $this->db->where('proj_category',$proj_type)->where('is_deleted',0);
  $this->db->where('sex',$sex)->where('is_deleted',0);
  $this->db->like('origin',$origin)->where('is_deleted',0);
  if ($proj_type == 'livestock'){
   $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
   $this->db->where('ls_category',$ls_category)->where('is_deleted',0);
  }
  else
  {
   $this->db->join('poultry', 'poultry.proj_id = project.proj_id');
   $this->db->like('earlobe_color',$color)->where('is_deleted',0);
   $this->db->or_like('shank_color',$color)->where('is_deleted',0);
   $this->db->or_like('eye_color',$color)->where('is_deleted',0);
   $this->db->or_like('bill_beak_color',$color)->where('is_deleted',0);
  }
  
  $this->db->limit($config['per_page'], $offset); // Only get the results for this "page"
  $query = $this->db->get();
  
  $data['search_text'] = $search_text;
  $data['results'] = $query->result();
  $this->load->view('search_header');
  $this->load->view('search_results_view', $data);
  $this->load->view('footer');
 }
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */