<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verify_signup extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

   //validation rules
   $this->form_validation->set_rules('username', 'Username', 'required|max_length[12]|callback_username_check');
   $this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email');
   $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|min_length[5]');
   $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
   
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to signup page
     $this->load->view('main_header');
     $this->load->view('signup_view');
     $this->load->view('footer');
   }
   else
   {
    //Insert data in the database
     $registerdata = array(
        'username'   => $this->input->post('username'),
        'password'   => md5($this->input->post('password')),
        'email'      => $this->input->post('email')
     );
            
            $this->db->insert('users',$registerdata);

     $username = $this->input->post('username');
     $password = $this->input->post('password');
     $result = $this->user->login($username, $password);
    
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
          'user_id' => $row->user_id,
          'username' => $row->username
        );
        
        $this->session->set_userdata('logged_in', $sess_array);
        $this->session->set_userdata('user_id', $row->user_id);
      }

     $data['username'] = $registerdata['username'];
     $this->load->view('home_header');
     $this->load->view('home_view', $data);
     $this->load->view('footer');
   }
 }
 
 function username_check($username)
 {
  $result = $this->user->user_exists($username);
    
  if ($result)
  {
   $this->form_validation->set_message('username_check', 'This username is already existing. Choose another.');
   return false;
  }
  
  else{
   return true;
  }
 }

}

/* End of file verify_signup.php */
/* Location: ./application/controllers/verify_signup.php */