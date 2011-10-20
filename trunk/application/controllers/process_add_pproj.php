<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process_add_pproj extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   $this->load->model('project','',TRUE);
   $this->load->model('poultry','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
   
   //validation rules
   $this->form_validation->set_rules('breed', 'Breed', 'required|max_length[30]');
   $this->form_validation->set_rules('breed_code', 'Breed code', 'required|exact_length[3]|callback_is_existing');
   $this->form_validation->set_rules('farm_animal', 'Farm animal', 'required|max_length[30]');
   $this->form_validation->set_rules('fa_code', 'Farm animal code', 'required|exact_length[2]');
   $this->form_validation->set_rules('dna_seq', 'DNA sequence', 'required|max_length[1000]|callback_dnaseq_check');
   $this->form_validation->set_rules('sex', 'Sex', 'required');
   $this->form_validation->set_rules('weight', 'Weight', 'max_length[10]|callback_float_check');
   $this->form_validation->set_rules('wing_length', 'Wing length', 'max_length[10]|callback_float_check');
   $this->form_validation->set_rules('neck_length', 'Neck length', 'max_length[10]|callback_float_check');
   $this->form_validation->set_rules('breast_length', 'Breast length', 'max_length[10]|callback_float_check');
   $this->form_validation->set_rules('shank_length', 'Shank length', 'max_length[10]|callback_float_check');
   $this->form_validation->set_rules('beak_length', 'Beak length', 'max_length[10]|callback_float_check');
   $this->form_validation->set_rules('comb_type', 'Comb type', 'max_length[20]');
   $this->form_validation->set_rules('eye_color', 'Eye color', 'max_length[20]');
   $this->form_validation->set_rules('earlobe_color', 'Earlobe color', 'max_length[20]');
   $this->form_validation->set_rules('shank_color', 'Shank color', 'max_length[20]');
   $this->form_validation->set_rules('bill_beak_color', 'Beak color', 'max_length[20]');
   $this->form_validation->set_rules('bill_beak_color', 'Bill color', 'max_length[20]');
   $this->form_validation->set_rules('random_egg', 'Random egg weight', 'callback_float_check');
   $this->form_validation->set_rules('incubation_period', 'Incubation period', 'callback_float_check');
   $this->form_validation->set_rules('sampling_date', 'Sampling date', 'required|callback_dateformat_check');
   $this->form_validation->set_rules('sample_type', 'Sample type', 'required|max_length[10]');
   $this->form_validation->set_rules('origin', 'Origin', 'required|max_length[50]');
   $this->form_validation->set_rules('owner', 'Owner', 'max_length[30]|required');
   $this->form_validation->set_rules('proj_desc', 'Project description', 'required|min_length[15]|max_length[300]');
   
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to Add Poultry Project page
     $this->load->view('home_header');
     $this->load->view('add_pproj_view');
     $this->load->view('footer');
   }
   else
   {
    $res = $this->session->userdata('user_id');
    $category = "poultry";
    
    //insert data in the database
    $registerdata_proj = array(
     'user_id' => $res,
     'proj_category' => $category,
     'breed'   => $this->input->post('breed'),
     'dna_seq'   => $this->input->post('dna_seq'),
     'farm_animal'   => $this->input->post('farm_animal'),
     'breed_code'   => $this->input->post('breed_code'),
     'fa_code'   => $this->input->post('fa_code'),
     'sex'   => $this->input->post('sex'),
     'weight'   => $this->input->post('weight'),
     'sampling_date'   => $this->input->post('sampling_date'),
     'sample_type'   => $this->input->post('sample_type'),
     'origin'   => $this->input->post('origin'),
     'owner'   => $this->input->post('owner'),
     'proj_desc'   => $this->input->post('proj_desc')
    ); //data array for the table project
    
    $this->db->insert('project',$registerdata_proj);
        
    $breed = $this->input->get_post('breed');
    
    //retrieves proj_id value from project table
    foreach($this->project->get_proj_id($breed) as $row)
    {
     $result = $row->proj_id;
    }
   
    $registerdata_poultry = array(
     'proj_id'   => $result,
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
     'bill_beak_color'   => $this->input->post('bill_color'),
     'random_egg' => $this->input->post('random_egg'),
     'incubation_period' => $this->input->post('incubation_period')
    );
    
    $this->db->insert('poultry',$registerdata_poultry);
    
    echo "You have successfully added a new project!";
    redirect('home', 'refresh');
   }
 }
 
 function is_existing($breed)
 {
  if($this->project->is_project_existing($breed))
  {
   $this->form_validation->set_message('is_existing', anchor('add_pproj', 'PROJECT ALREADY EXISTING. Click to add another project.'));
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
  else {return TRUE;}
 }
 
 function dateformat_check($str)
 {
  if (! preg_match ("/(0[1-9]|1[012])[\/](0[1-9]|[12][0-9]|3[01])[\/]((19|20)\d\d)/", $str))
  {
   $this->form_validation->set_message('dateformat_check', 'Please enter the date in the mm/dd/yyyy format.');
   return FALSE;
  }
  
  else {return TRUE;}
 }
 
 function dnaseq_check($str)
 {
  if (! preg_match("/[ACTG]|[actg]{8,}+/", $str))
  {
   $this->form_validation->set_message('dnaseq_check', 'Invalid DNA sequence format.');
   return FALSE;
  }
    
  else return TRUE;
 }
 
}
 /* callback for x/y-coord
 function coord_check($str)
 {
  
 }*/
 
/* End of file process_add_pproj.php */
/* Location: ./application/controllers/process_add_pproj.php */