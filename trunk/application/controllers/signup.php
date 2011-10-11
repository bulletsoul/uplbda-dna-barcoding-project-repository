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
  /*$this->load->helper('url');
  $proj_id = $this->uri->segment(3);
  $data['proj_id'] = $proj_id;
  $data['redirect_url'] = site_url('verify_signup/verify_signup_table');
  $this->load->view('user_plain_header');
  $this->load->view('signup_table', $data);
  $this->load->view('footer');*/
  
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
  $registerdata = array(
   'username'   => $this->input->get('username'),
   'password'   => md5($this->input->get('password')),
   'email'      => $this->input->get('email')
  );
  
  $this->db->insert('users',$registerdata);
  
 }
}

/* End of file signup.php */
/* Location: ./application/controllers/signup.php */