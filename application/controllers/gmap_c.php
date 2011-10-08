<?PHP
class Gmap_c extends CI_Controller{
function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');	
	}
function index(){
$this->load->library('cigooglemapapi');
$this->cigooglemapapi->setAPIKey('ABQIAAAAPcIqYFzfeZun1VJzEfnothR3YVSwz7IUGLmi70Cr54Frl0Nd2BSfFSQE0-Y1LTMkaRjnQ1bskrWkKA'); 

$this->cigooglemapapi->addMarkerByAddress('Bungahan, Cuenca, Batangas, Philippines','PJ Pizza','<b>PJ Pizza</b>');
$this->load->view('gmap');
}
}
?>