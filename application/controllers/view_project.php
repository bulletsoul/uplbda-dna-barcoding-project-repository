<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_project extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('form');
   $this->load->helper('url');
   $this->load->model('user','',TRUE);
   $this->load->model('docs','',TRUE);
   $this->load->model('images','',TRUE);
   $this->load->model('videos','',TRUE); 
   $this->load->model('project','',TRUE);
   $this->load->model('poultry','',TRUE);
   $this->load->model('livestock','',TRUE);
 }
  
 function index()
 {
  $proj_id = $this->input->get('proj_id');
 }
 
  function show_project()
 {
  $proj_id = $this->uri->segment(3);
  $data['redirect_url'] = site_url('signup/check_user');
  $data['barcode_url'] = site_url('view_project/view_straight_barcode');
  $data['new_url'] = site_url('view_project/show_project');
  $data['nw_url'] = site_url('my_projects/edit_project');
  $data['nw_url1'] = site_url('upload/doc');
  $data['nw_url2'] = site_url('upload/dorsal_img');
  $data['nw_url5'] = site_url('upload/ventral_img');
  $data['nw_url6'] = site_url('upload/lateral_img');
  $data['nw_url7'] = site_url('upload/other_img');
  $data['nw_url3'] = site_url('upload/vid');
  $data['nw_url8'] = site_url('upload/set_doc_file_desc');
  $data['nw_url9'] = site_url('upload/set_vid_file_desc');
  $data['proj_id'] = $proj_id;
  $proj_details = $this->project->get_project_details($proj_id);
  $data['project_details'] = $proj_details;
  foreach($proj_details as $row){
   $data['breed_name'] = $row->breed;
  }
  $dimgpath = $this->images->get_dfilepath($proj_id);
  $data['dimgpath'] = $dimgpath;
  $vimgpath = $this->images->get_vfilepath($proj_id);
  $data['vimgpath'] = $vimgpath;
  $limgpath = $this->images->get_lfilepath($proj_id);
  $data['limgpath'] = $limgpath;
  $oimgpath = $this->images->get_ofilepath($proj_id);
  $data['oimgpath'] = $oimgpath;
  $videopath = $this->videos->get_videopath($proj_id);
  $data['videopath'] = $videopath;
  $docpath = $this->docs->get_path_name($proj_id);
  $data['docpath'] = $docpath;
  $proj_category = $this->project->get_proj_category($proj_id);
  foreach($proj_category as $item){
   if($item->proj_category == "livestock")
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
  $dna_seq = $this->project->get_dna_seq($proj_id);
  foreach($dna_seq as $item){
   $data['dna_seq'] = $item->dna_seq;
  }
  
  $this->load->view('project_header_view', $data);
  $this->load->view('project_view', $data);
  $this->load->view('footer');
 }
 
 function show_project_inc()
 {
  $this->load->helper(array('form', 'url'));
  $proj_id = $this->uri->segment(3);
  $data['redirect_url'] = site_url('signup/check_user');
  $data['complete_proj_url'] = site_url('view_project/show_project_complete');
  $data['proj_id'] = $proj_id;
  $data['new_url'] = site_url('view_project/show_project');
  $proj_details = $this->project->get_project_details($proj_id);
  $data['project_details'] = $proj_details;
  foreach($proj_details as $row){
   $data['breed_name'] = $row->breed;
  }
  $proj_category = $this->project->get_proj_category($proj_id);
  foreach($proj_category as $item){
   if($item->proj_category == "livestock")
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
  
  $this->load->view('user_plain_header');
  $this->load->view('user_project_view', $data);
  $this->load->view('footer');
 }
 
 function show_project_complete()
 {
  $this->load->helper(array('form', 'url'));
  $proj_id = $this->uri->segment(3);
  $data['proj_id'] = $proj_id;
  $data['new_url'] = site_url('view_project/show_project');
  $data['barcode_url'] = site_url('view_project/view_straight_barcode');
  $proj_details = $this->project->get_project_details($proj_id);
  foreach($proj_details as $row){
   $data['breed_name'] = $row->breed;
  }
  $data['project_details'] = $proj_details;
  $dimgpath = $this->images->get_dfilepath($proj_id);
  $data['dimgpath'] = $dimgpath;
  $vimgpath = $this->images->get_vfilepath($proj_id);
  $data['vimgpath'] = $vimgpath;
  $limgpath = $this->images->get_lfilepath($proj_id);
  $data['limgpath'] = $limgpath;
  $oimgpath = $this->images->get_ofilepath($proj_id);
  $data['oimgpath'] = $oimgpath;
  $videopath = $this->videos->get_videopath($proj_id);
  $data['videopath'] = $videopath;
  $docpath = $this->docs->get_path_name($proj_id);
  $data['docpath'] = $docpath;
  $proj_category = $this->project->get_proj_category($proj_id);
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
  $dna_seq = $this->project->get_dna_seq($proj_id);
  foreach($dna_seq as $item){
   $data['dna_seq'] = $item->dna_seq;
  }
  
  $place = $this->project->get_place($proj_id);
    foreach ($place as $item){
      foreach ($item as $row){
        $data['place'] = $row;
      }
    }
  
  $this->load->library('cigooglemapapi');
  $this->cigooglemapapi->setAPIKey('ABQIAAAAPcIqYFzfeZun1VJzEfnothR3YVSwz7IUGLmi70Cr54Frl0Nd2BSfFSQE0-Y1LTMkaRjnQ1bskrWkKA'); 
  $this->cigooglemapapi->addMarkerByAddress("$row",$row,"<b>$row</b>");
  
  
  $this->load->view('member_plain_header');
  $this->load->view('member_project_view', $data);
  $this->load->view('gmap'); 
  $this->load->view('footer');
 }
 
 function view_map()
 {
  $proj_id = $this->uri->segment(3);
  $this->load->library('cigooglemapapi');
  $this->cigooglemapapi->setAPIKey('ABQIAAAAPcIqYFzfeZun1VJzEfnothR3YVSwz7IUGLmi70Cr54Frl0Nd2BSfFSQE0-Y1LTMkaRjnQ1bskrWkKA');
  $this->load->view('member_plain_header');
  $place = $this->project->get_place($proj_id);
    foreach ($place as $item){
      foreach ($item as $row){
       if (($geocode = $this->cigooglemapapi->getGeoCode($row)) === false)
         $data['is_marker'] = "false";
        else {
         $data['is_marker'] = "true";
         $this->cigooglemapapi->addMarkerByAddress("$row",$row,"<b>$row</b>");
        }
      }
    }
  $this->load->view('gmap', $data); 
  $this->load->view('footer');
  
 }
 
 function view_straight_barcode()
 {
  $proj_id = $this->uri->segment(3);
  $dna_seq = $this->project->get_dna_seq($proj_id);
  foreach($dna_seq as $item){
   $data['dna_seq'] = $item->dna_seq;
  }
  $this->load->view('straight_barcode_view', $data);
 }
}

/* End of file view_project.php */
/* Location: ./application/controllers/view_project.php */