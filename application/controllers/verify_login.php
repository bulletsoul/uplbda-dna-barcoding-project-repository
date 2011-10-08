<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verify_login extends CI_Controller {

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

    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	
    if($this->form_validation->run() == FALSE)
    {
      //Field validation failed.  User redirected to login page
      $this->load->view('main_header');
      $this->load->view('main_view');
      $this->load->view('footer');
    }
    else
    {
      //Go to private area
      redirect('home', 'refresh');
    }
    
  }
  
  
  function check_database($password)
  {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('username');
    
    //query the database
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
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Invalid username or password');
      return FALSE;
    }
  }
}

/* End of file verify_login.php */
/* Location: ./application/controllers/verify_login.php */