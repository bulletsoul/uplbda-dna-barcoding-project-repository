<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import_csvfiles extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   $this->load->model('project','',TRUE);
 }

   function index()
   {
    $this->load->library('csvreader');

    if ($this->db->count_all_results('project') == 0)
    {
     /***************************** POULTRY *****************************/
     $filePath = site_url().'application/uploads/imports/poultry.csv';
     $csv_data = $this->csvreader->parse_file($filePath);
	  
     $proj_category = 'poultry';
     $res = '1';
     foreach($csv_data as $item){
      $registerdata_proj = array(
       'user_id' => $res,
       'proj_category' => $proj_category,
       'dna_seq' => $item['dna_seq'],
       'animal_name' => $item['animal_name'],
       'breed'   => $item['breed'],
       'farm_animal'   => $item['farm_animal'],
       'breed_code'   => $item['breed_code'],
       'fa_code'   => $item['fa_code'],
       'sex'   => $item['sex'],
       'weight'   => $item['weight'],
       'sampling_date'   => $item['sampling_date'],
       'sample_type'   => $item['sample_type'],
       'origin'   => $item['origin'],
       'owner'   => $item['owner'],
       'place' => $item['place'],
       'purpose' => $item['purpose']
      );
      $this->db->insert('project',$registerdata_proj);
	      
      $breed = $item['breed'];
	       
      foreach($this->project->get_proj_id($breed) as $row)
      {
       $proj_id = $row->proj_id;
      }
	       
      $registerdata_poultry = array(
       'proj_id'   => $proj_id,
       'wing_length'   => $item['wing'],
       'neck_length'   => $item['neck'],
       'breast_length'   => $item['breast'],
       'shank_length'   => $item['shank'],
       'beak_length'   => $item['beak'],
       'comb_type'   => $item['comb_type'],
       'earlobe_color'   => $item['earlobe_color'],
       'eye_color'   => $item['eye_color'],
       'shank_color'   => $item['shank_color'],
       'bill_beak_color'   => $item['bill_beak_color'],
       'random_egg'   => $item['random_egg'],
       'incubation_period' => $item['incubation_period']
      );	
      $this->db->insert('poultry',$registerdata_poultry);
     }
     
     /***************************** BOVIDAE *****************************/
     $filePath = site_url().'application/uploads/imports/bovidae.csv';
     $csv_data = $this->csvreader->parse_file($filePath);
     
     $proj_category = 'livestock';
     $res = '1';
     foreach($csv_data as $item){
      $registerdata_proj = array(
       'user_id' => $res,
       'proj_category' => $proj_category,
       'dna_seq' => $item['dna_seq'],
       'animal_name' => $item['animal_name'],
       'breed'   => $item['breed'],
       'farm_animal'   => $item['farm_animal'],
       'breed_code'   => $item['breed_code'],
       'fa_code'   => $item['fa_code'],
       'sex'   => $item['sex'],
       'weight'   => $item['weight'],
       'sampling_date'   => $item['sampling_date'],
       'sample_type'   => $item['sample_type'],
       'origin'   => $item['origin'],
       'owner'   => $item['owner'],
       'place' => $item['place'],
       'purpose' => $item['purpose'],
       'proj_desc' => $item['proj_desc']
      );
      $this->db->insert('project',$registerdata_proj);
	      
      $breed = $item['breed'];
	       
      foreach($this->project->get_proj_id($breed) as $row)
      {
       $proj_id = $row->proj_id;
      }
	 
      $ls_category = 'bovidae';      
      $registerdata_bovidae = array(
       'proj_id'   => $proj_id,
       'ls_category' => $ls_category,
       'birth_date' => $item['birth_date'],
       'height' => $item['height'],
       'body_length' => $item['body_length'],
       'sire' => $item['sire'],
       'dam' => $item['dam'],
       'heart_girth' =>  $item['heart_girth'],
       'tail_length' => $item['tail'],
       'age' => $item['age']
      );
      $this->db->insert('livestock',$registerdata_bovidae);
     }
     
     /***************************** CAPRIDAE *****************************/
     $filePath = site_url().'application/uploads/imports/capridae.csv';
     $csv_data = $this->csvreader->parse_file($filePath);
     
     $proj_category = 'livestock';
     $res = '1';
     foreach($csv_data as $item){
      $registerdata_proj = array(
       'user_id' => $res,
       'proj_category' => $proj_category,
       'dna_seq' => $item['dna_seq'],
       'animal_name' => $item['animal_name'],
       'breed'   => $item['breed'],
       'farm_animal'   => $item['farm_animal'],
       'breed_code'   => $item['breed_code'],
       'fa_code'   => $item['fa_code'],
       'sex'   => $item['sex'],
       'weight'   => $item['weight'],
       'sampling_date'   => $item['sampling_date'],
       'sample_type'   => $item['sample_type'],
       'origin'   => $item['origin'],
       'owner'   => $item['owner'],
       'place' => $item['place'],
       'purpose' => $item['purpose'],
       'proj_desc' => $item['proj_desc']
      );
      $this->db->insert('project',$registerdata_proj);
	      
      $breed = $item['breed'];
	       
      foreach($this->project->get_proj_id($breed) as $row)
      {
       $proj_id = $row->proj_id;
      }
	 
      $ls_category = 'capridae';      
      $registerdata_capridae = array(
       'proj_id'   => $proj_id,
       'ls_category' => $ls_category,
       'birth_date' => $item['birth_date'],
       'height' => $item['height'],
       'body_length' => $item['body_length'],
       'sire' => $item['sire'],
       'dam' => $item['dam'],
       'heart_girth' =>  $item['heart_girth'],
       'tail_length' => $item['tail'],
       'age' => $item['age']
      );
      $this->db->insert('livestock',$registerdata_capridae);
     }
     
     /***************************** MONOGASTRICS *****************************/
     $filePath = site_url().'application/uploads/imports/monogastrics.csv';
     $csv_data = $this->csvreader->parse_file($filePath);
     
     $proj_category = 'livestock';
     $res = '1';
     foreach($csv_data as $item){
      $registerdata_proj = array(
       'user_id' => $res,
       'proj_category' => $proj_category,
       'dna_seq' => $item['dna_seq'],
       'animal_name' => $item['animal_name'],
       'breed'   => $item['breed'],
       'farm_animal'   => $item['farm_animal'],
       'breed_code'   => $item['breed_code'],
       'fa_code'   => $item['fa_code'],
       'sex'   => $item['sex'],
       'weight'   => $item['weight'],
       'sampling_date'   => $item['sampling_date'],
       'sample_type'   => $item['sample_type'],
       'origin'   => $item['origin'],
       'owner'   => $item['owner'],
       'place' => $item['place'],
       'purpose' => $item['purpose']
      );
      $this->db->insert('project',$registerdata_proj);
	      
      $breed = $item['breed'];
	       
      foreach($this->project->get_proj_id($breed) as $row)
      {
       $proj_id = $row->proj_id;
      }
	 
      $ls_category = 'monogastrics';      
      $registerdata_monogastrics = array(
       'proj_id'   => $proj_id,
       'ls_category' => $ls_category,
       'birth_date' => $item['birth_date'],
       'male_maxweight' => $item['male_maxweight'],
       'female_maxweight' => $item['female_maxweight'],
       'height' => $item['height'],
       'body_length' => $item['body_length'],
       'sire' => $item['sire'],
       'dam' => $item['dam'],
       'heart_girth' =>  $item['heart_girth'],
       'midriff_girth' => $item['midriff_girth'],
       'flank_girth' => $item['flank_girth'],
       'tail_length' => $item['tail'],
       'leg_length' => $item['leg'],
       'snout_length' => $item['snout'],
       'ear_length' => $item['ears']
      );
      $this->db->insert('livestock',$registerdata_monogastrics);
     }
    } //end of if ($this->db->count_all_results('project'))
    
    else { redirect('home', 'refresh');}
   }
}

/* End of file import_csvfile.php */
/* Location: ./application/controllers/import_csvfile.php */