<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process_edit_proj extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   $this->load->model('project','',TRUE);
   $this->load->model('poultry','',TRUE);
   $this->load->model('livestock','',TRUE);
 }

 function index()
 {
 
  
 }
 
 function edit_project()
 {
  $this->load->library('form_validation');
   $proj_id = $this->uri->segment(3);
   
   $data_project = array(
    'weight' => $this->input->post('weight'),
    'sampling_date' => $this->input->post('sampling_date'),
    'sample_type' => $this->input->post('sample_type'),
    'origin' => $this->input->post('origin'),
    'owner' => $this->input->post('owner'),
    'proj_desc' => $this->input->post('proj_desc')
   );

   $this->db->where('proj_id', $proj_id);
   $this->db->update('project', $data_project);
   
   $data_livestock = array(
    'male_maxweight' => $this->input->post('male_maxweight'),
    'female_maxweight' => $this->input->post('female_maxweight'),
    'height' => $this->input->post('height'),
    'body_length' => $this->input->post('body_length'),
    'heart_girth' => $this->input->post('heart_girth'),
    'midriff_girth' => $this->input->post('midriff_girth'),
    'flank_girth' => $this->input->post('flank_girth'),
    'leg_length' => $this->input->post('leg_length'),
    'snout_length' => $this->input->post('snout_length'),
    'ear_length' => $this->input->post('ear_length'),
    'tail_length' => $this->input->post('tail_length')
   );
   
   $this->db->where('proj_id', $proj_id);
   $this->db->update('livestock', $data_livestock);
  
 $data_poultry = array(
  'wing_length'   => $this->input->post('wing_length'),
  'neck_length'   => $this->input->post('neck_length'),
  'breast_length'   => $this->input->post('breast_length'),
  'shank_length'   => $this->input->post('shank_length'),
  'beak_length'   => $this->input->post('beak_length'),
  'comb_type'   => $this->input->post('comb_type'),
  'earlobe_color'   => $this->input->post('earlobe_color'),
  'eye_color'   => $this->input->post('eye_color'),
  'shank_color'   => $this->input->post('shank_color'),
  'bill_beak_color'   => $this->input->post('beak_color'),
  'bill_beak_color'   => $this->input->post('bill_color')
 );
 
 $this->db->where('proj_id', $proj_id);
 $this->db->update('poultry', $data_poultry);
 
 $this->show_project();
 }
 
 function show_project()
 {
  $proj_id = $this->uri->segment(3);
  $data['new_url'] = site_url('view_project/show_project');
  $data['barcode_url'] = site_url('view_project/view_straight_barcode');
  $data['nw_url'] = site_url('my_projects/edit_project');
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
 
 function dateformat_check($str)
 {
  if (!preg_match ("/(0[1-9]|1[012])[\/](0[1-9]|[12][0-9]|3[01])[\/]((19|20)\d\d)/", $str))
  {
   $this->form_validation->set_message('dateformat_check', 'Please enter the date in the mm/dd/yyyy format.');
   return FALSE;
  }
  
  else {return TRUE;}
 }
}

/* End of file process_edit_proj.php */
/* Location: ./application/controllers/process_edit_proj.php */