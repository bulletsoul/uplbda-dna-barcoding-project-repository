<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process_add_filedesc extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   $this->load->model('project','',TRUE);
   $this->load->model('videos','',TRUE);
   $this->load->model('docs','',TRUE);
 }

 function index()
 {
 
   
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
 
 
 function add_filedesc()
 {
   $this->load->library('form_validation');
   $proj_id = $this->uri->segment(3);
   $doc_name = $this->docs->get_docname($proj_id);
   $vid_name = $this->videos->get_vidname($proj_id);
   
$total = $this->input->post('total');
$ftype = $this->input->post('filetype');
$data['ftype'] = $ftype;

if($ftype == "Documents"){
 for($ctr = 1; $ctr<$total+1; $ctr++){
 $str = 'filedesc'.$ctr;
 $file_desc[$ctr] = $this->input->post($str);
 $data_docs = array(
   'filedesc' => $file_desc[$ctr]
                    );
 
   $fdesc = $doc_name[$ctr-1];
    $this->db->where('filename', $fdesc->filename);
    $this->db->update('docs', $data_docs);
  }
}
elseif($ftype == "Videos"){
 for($ctr = 1; $ctr<$total+1; $ctr++){
 $str = 'filedesc'.$ctr;
 $file_desc[$ctr] = $this->input->post($str);
 $data_docs = array(
   'filedesc' => $file_desc[$ctr]
                    );
 
   $fdesc = $vid_name[$ctr-1];
    $this->db->where('filename', $fdesc->filename);
    $this->db->update('videos', $data_docs);
  }
 
}
else {
 $data['error'] = "error";
}
$this->show_project();
}
}


/* End of file process_add_filedesc.php */
/* Location: ./application/controllers/process_add_filedesc.php */