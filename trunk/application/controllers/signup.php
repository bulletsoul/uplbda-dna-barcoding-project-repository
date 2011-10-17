<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
  
 }
 
 function register()
 {
  $this->load->helper(array('form', 'url'));
  $this->load->view('main_header');
  $this->load->view('signup_view');
  $this->load->view('footer');
 }
 
 function check_user()
 {  
  $username = $this->input->get_post('username');
  $result = $this->user->user_exists($username);
  if($result)
  {
   echo "existing";
  }
  else {
   echo "available";
  }
 }
 
 function register_user()
 {
  $username = $this->input->get('username');
  $password = $this->input->get('password');
  $email = $this->input->get('email');
  
  $registerdata = array(
   'username'   => $username,
   'password'   => md5($password),
   'email'      => $email
  );
  
  $this->db->insert('users',$registerdata);
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
  
 }
 
 function login_user()
 {
  $username = $this->input->get('username');
  $password = $this->input->get('password');
  
  $result = $this->user->login($username, $password);
  
  if($result)
    {
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
      echo "valid";
    }
    else echo "invalid";
 }
}

/* End of file signup.php */
/* Location: ./application/controllers/signup.php */