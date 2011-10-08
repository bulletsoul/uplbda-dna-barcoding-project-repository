<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
   if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
      $this->load->view('home_header');
      $this->load->view('home_view', $data);
      $this->load->view('footer');
    }
    else
    {
      //If no session, redirect to login page
      redirect('main', 'refresh');
    }
  }
  
  function logout()
  {
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('home', 'refresh');
  }
 
  function about()
  {
   if($this->session->userdata('logged_in'))
    {
      $this->load->view('home_header');
    }
    else $this->load->view('user_header');
   $this->load->view('about_view');
   $this->load->view('footer');
  }
  
  function contact()
  {
   if($this->session->userdata('logged_in'))
    {
      $this->load->view('home_header');
    }
    else $this->load->view('user_header');
   $this->load->view('contact_view');
   $this->load->view('footer');
  }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */