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
    $this->load->helper('url');
    $data['my_redirect']= current_url();
    $data['baseurl']= base_url();
    $data['new_url'] = site_url('view_project/show_project');
    $data['nw_url6'] = site_url('upload/lateral_img');
    $data['nw_url7'] = site_url('upload/other_img');
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
  
  function view_gallery()
  {
    $this->load->view('home_header');
    $this->load->view('gallery_view');
    $this->load->view('footer');
  }


}

/* End of file my_projects.php */
/* Location: ./application/controllers/my_projects.php */