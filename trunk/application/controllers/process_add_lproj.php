<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process_add_lproj extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   $this->load->model('project','',TRUE);
   $this->load->model('livestock','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

   //Cascading Rules
   $this->form_validation->set_rules('breed', 'Breed', 'required|max_length[30]');
   $this->form_validation->set_rules('breed_code', 'Breed code', 'required|exact_length[3]|alpha|callback_is_existing');
   $this->form_validation->set_rules('farm_animal', 'Farm Animal', 'required|max_length[30]');
   $this->form_validation->set_rules('fa_code', 'Farm Animal Code', 'required|exact_length[2]|alpha');
   $this->form_validation->set_rules('ls_category', 'Category', 'required');
   $this->form_validation->set_rules('sex', 'Sex', 'required');
   $this->form_validation->set_rules('dna_seq', 'DNA Sequence', 'required|max_length[1000]|callback_dnaseq_check');
   $this->form_validation->set_rules('weight', 'Weight', 'callback_float_check');
   $this->form_validation->set_rules('male_maxweight', 'Male (max. weight)', 'callback_float_check');
   $this->form_validation->set_rules('female_maxweight', 'Female (max. weight)', 'callback_float_check');
   $this->form_validation->set_rules('height', 'Height', 'callback_float_check');
   $this->form_validation->set_rules('body_length', 'Body Length', 'callback_float_check');
   $this->form_validation->set_rules('heart_girth', 'Heart Girth', 'callback_float_check');
   $this->form_validation->set_rules('midriff_girth', 'Midriff Girth', 'callback_float_check');
   $this->form_validation->set_rules('flank_girth', 'Flank Girth', 'callback_float_check');
   $this->form_validation->set_rules('leg_length', 'Leg Length', 'callback_float_check');
   $this->form_validation->set_rules('snout_length', 'Snout Length', 'callback_float_check');
   $this->form_validation->set_rules('ear_length', 'Ear Length', 'callback_float_check');
   $this->form_validation->set_rules('tail_length', 'Tail Length', 'callback_float_check');
   $this->form_validation->set_rules('sampling_date', 'Sampling Date', 'callback_dateformat_check|required');
   $this->form_validation->set_rules('sample_type', 'Sample Type', 'alpha|required');
   $this->form_validation->set_rules('origin', 'Origin', 'max_length[50]|required');
   $this->form_validation->set_rules('owner', 'Owner', 'maxlength[30]|required');
   $this->form_validation->set_rules('proj_desc', 'Project Description', 'max_length[300]|required');
   
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to signup page
     $this->load->view('home_header');
     $this->load->view('add_lproj_view');
     $this->load->view('footer');
   }
   else
   {
    $res = $this->session->userdata('user_id');
    $category = "livestock";
    //Insert data in the database
    $registerdata_proj = array(
        'user_id' => $res,
        'proj_category' => $category,
        'breed' => $this->input->post('breed'),
        'breed_code' => $this->input->post('breed_code'),
        'farm_animal' => $this->input->post('farm_animal'),
        'fa_code' => $this->input->post('fa_code'),
        'dna_seq' => $this->input->post('dna_seq'),
        'sex' => $this->input->post('sex'),
        'weight' => $this->input->post('weight'),
        'sampling_date' => $this->input->post('sampling_date'),
        'sample_type' => $this->input->post('sample_type'),
        'origin' => $this->input->post('origin'),
        'owner' => $this->input->post('owner'),
        'proj_desc' => $this->input->post('proj_desc')
     );
               
            $breed = $this->input->get_post('breed');
            
            $this->db->insert('project',$registerdata_proj);
            
            foreach($this->project->get_proj_id($breed) as $row)
            {
             $result = $row->proj_id;
            }
     
     $registerdata_livestock = array(
        'proj_id' => $result,
        'ls_category' => $this->input->post('ls_category'),
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
         $this->db->insert('livestock',$registerdata_livestock);
               
         redirect('home', 'refresh');
   }

 }
 
 function is_existing($breed_code)
 {
  if($this->project->is_project_existing($breed_code))
  {
   $this->form_validation->set_message('is_existing', anchor('add_pproj', 'Project already exists. Click to add another project.'));
   return FALSE;
  }
  else return TRUE;
 }
 
 function dnaseq_check($str)
 {
  if (!preg_match("/[ACTG]|[atcg]{8,}+/", $str))
  {
   $this->form_validation->set_message('dnaseq_check', 'Invalid DNA sequence format.');
   return FALSE;
  }
  else return TRUE;
 }
 
 function dateformat_check($str)
 {
  if (!preg_match ("/(0[1-9]|1[012])[\/](0[1-9]|[12][0-9]|3[01])[\/]((19|20)\d\d)/", $str))
  {
   $this->form_validation->set_message('dateformat_check', 'Please enter the date in the mm/dd/yyyy format.');
   return FALSE;
  }
  else return TRUE;
 }
 
 function float_check($str)
 {  
  if (! preg_match("/^([0-9]\.[0-9])*$/", $str))
  {
   $this->form_validation->set_message('float_check', 'Please enter the input in decimal form.');
   return FALSE;
  }
  
  else return TRUE;
 }
 
}

/* End of file process_add_lproj.php */
/* Location: ./application/controllers/process_add_lproj.php */