<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
                $this->load->model('project','',TRUE);
                $this->load->model('docs','',TRUE);
                $this->load->model('images','',TRUE);
                $this->load->model('videos','',TRUE);
                $this->load->model('poultry','',TRUE);
                $this->load->model('livestock','',TRUE);
	}
	
	function dorsal_img()
	{
		$proj_id = $this->uri->segment(3);
                $data['proj_id'] = $proj_id;
		$data['new_url'] = site_url('view_project/show_project');
		$data['nw_url'] = site_url('my_projects/edit_project');
		$data['nw_url1'] = site_url('upload/doc');
		$data['nw_url2'] = site_url('upload/dorsal_img');
                $data['nw_url5'] = site_url('upload/ventral_img');
                $data['nw_url6'] = site_url('upload/lateral_img');
                $data['nw_url7'] = site_url('upload/other_img');
		$data['nw_url3'] = site_url('upload/vid');
		$data['nw_url4'] = site_url('my_projects/view_sequence');
                $data['nw_url8'] = site_url('upload/set_doc_file_desc');
                $data['nw_url9'] = site_url('upload/set_vid_file_desc');
		$proj_details = $this->project->get_project_details($proj_id);
			$data['project_details'] = $proj_details;
			foreach($proj_details as $row){
		       $data['breed_name'] = $row->breed;
		      }
                $this->load->view('project_header_view', $data);
		$data = array('css'=>'<link rel="stylesheet" type="text/css" href="'.base_url().'application/uploadify/uploadify.css"/>',
                              'src'=>'<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
		<script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.min.js"></script>
                <script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.uploadify.v2.1.0.min.js"></script>');
		$data['type'] = "Dorsal Images";
                $this->load->view('upload_view',$data);
                $this->load->view('footer');
	}
	
        function ventral_img()
	{
		$proj_id = $this->uri->segment(3);
                $data['proj_id'] = $proj_id;
		$data['new_url'] = site_url('view_project/show_project');
		$data['nw_url'] = site_url('my_projects/edit_project');
		$data['nw_url1'] = site_url('upload/doc');
		$data['nw_url2'] = site_url('upload/dorsal_img');
                $data['nw_url5'] = site_url('upload/ventral_img');
                $data['nw_url6'] = site_url('upload/lateral_img');
                $data['nw_url7'] = site_url('upload/other_img');
		$data['nw_url3'] = site_url('upload/vid');
		$data['nw_url4'] = site_url('my_projects/view_sequence');
		$data['nw_url8'] = site_url('upload/set_doc_file_desc');
                $data['nw_url9'] = site_url('upload/set_vid_file_desc');
                $proj_details = $this->project->get_project_details($proj_id);
			$data['project_details'] = $proj_details;
			foreach($proj_details as $row){
		       $data['breed_name'] = $row->breed;
		      }
                $this->load->view('project_header_view', $data);
		$data = array('css'=>'<link rel="stylesheet" type="text/css" href="'.base_url().'application/uploadify/uploadify.css"/>',
                              'src'=>'<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
		<script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.min.js"></script>
                <script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.uploadify.v2.1.0.min.js"></script>');
		$data['type'] = "Ventral Images";
                $this->load->view('upload_view',$data);
                $this->load->view('footer');
	}
        
        function lateral_img()
	{
		$proj_id = $this->uri->segment(3);
                $data['proj_id'] = $proj_id;
		$data['new_url'] = site_url('view_project/show_project');
		$data['nw_url'] = site_url('my_projects/edit_project');
		$data['nw_url1'] = site_url('upload/doc');
		$data['nw_url2'] = site_url('upload/dorsal_img');
                $data['nw_url5'] = site_url('upload/ventral_img');
                $data['nw_url6'] = site_url('upload/lateral_img');
                $data['nw_url7'] = site_url('upload/other_img');
		$data['nw_url3'] = site_url('upload/vid');
		$data['nw_url4'] = site_url('my_projects/view_sequence');
		$data['nw_url8'] = site_url('upload/set_doc_file_desc');
                $data['nw_url9'] = site_url('upload/set_vid_file_desc');
                $proj_details = $this->project->get_project_details($proj_id);
			$data['project_details'] = $proj_details;
			foreach($proj_details as $row){
		       $data['breed_name'] = $row->breed;
		      }
                $this->load->view('project_header_view', $data);
		$data = array('css'=>'<link rel="stylesheet" type="text/css" href="'.base_url().'application/uploadify/uploadify.css"/>',
                              'src'=>'<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
		<script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.min.js"></script>
                <script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.uploadify.v2.1.0.min.js"></script>');
		$data['type'] = "Lateral Images";
                $this->load->view('upload_view',$data);
                $this->load->view('footer');
	}
        
        function other_img()
	{
		$proj_id = $this->uri->segment(3);
                $data['proj_id'] = $proj_id;
		$data['new_url'] = site_url('view_project/show_project');
		$data['nw_url'] = site_url('my_projects/edit_project');
		$data['nw_url1'] = site_url('upload/doc');
		$data['nw_url2'] = site_url('upload/dorsal_img');
                $data['nw_url5'] = site_url('upload/ventral_img');
                $data['nw_url6'] = site_url('upload/lateral_img');
                $data['nw_url7'] = site_url('upload/other_img');
		$data['nw_url3'] = site_url('upload/vid');
		$data['nw_url4'] = site_url('my_projects/view_sequence');
		$data['nw_url8'] = site_url('upload/set_doc_file_desc');
                $data['nw_url9'] = site_url('upload/set_vid_file_desc');
                $docname = $this->docs->get_docname($proj_id);
                $data['docname'] = $this->docs->get_docname($proj_id);
                $vidname = $this->videos->get_vidname($proj_id);
                $data['vidname'] = $this->videos->get_vidname($proj_id);
                $proj_details = $this->project->get_project_details($proj_id);
			$data['project_details'] = $proj_details;
			foreach($proj_details as $row){
		       $data['breed_name'] = $row->breed;
		      }
                $this->load->view('project_header_view', $data);
		$data = array('css'=>'<link rel="stylesheet" type="text/css" href="'.base_url().'application/uploadify/uploadify.css"/>',
                              'src'=>'<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
		<script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.min.js"></script>
                <script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.uploadify.v2.1.0.min.js"></script>');
		$data['type'] = "Other Images";
                $this->load->view('upload_view',$data);
                $this->load->view('footer');
	}
      
        function doc()
	{
		$proj_id = $this->uri->segment(3);
                $data['proj_id'] = $proj_id;
		$data['new_url'] = site_url('view_project/show_project');
		$data['nw_url'] = site_url('my_projects/edit_project');
		$data['nw_url1'] = site_url('upload/doc');
		$data['nw_url2'] = site_url('upload/dorsal_img');
                $data['nw_url5'] = site_url('upload/ventral_img');
                $data['nw_url6'] = site_url('upload/lateral_img');
                $data['nw_url7'] = site_url('upload/other_img');
		$data['nw_url3'] = site_url('upload/vid');
		$data['nw_url4'] = site_url('my_projects/view_sequence');
		$data['nw_url8'] = site_url('upload/set_doc_file_desc');
                $data['nw_url9'] = site_url('upload/set_vid_file_desc');
                $docname = $this->docs->get_docname($proj_id);
                $data['docname'] = $this->docs->get_docname($proj_id);
                $vidname = $this->videos->get_vidname($proj_id);
                $data['vidname'] = $this->videos->get_vidname($proj_id);
                $proj_details = $this->project->get_project_details($proj_id);
			$data['project_details'] = $proj_details;
			foreach($proj_details as $row){
		       $data['breed_name'] = $row->breed;
		      }
                $this->load->view('project_header_view', $data);
		$data = array('css'=>'<link rel="stylesheet" type="text/css" href="'.base_url().'application/uploadify/uploadify.css"/>',
                              'src'=>'<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
		<script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.min.js"></script>
                <script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.uploadify.v2.1.0.min.js"></script>');
		$data['type'] = "Documents";
                $this->load->view('upload_view',$data);
                $this->load->view('footer');
	}
        
        function vid()
	{
                $proj_id = $this->uri->segment(3);
                $data['proj_id'] = $proj_id;
		$data['new_url'] = site_url('view_project/show_project');
		$data['nw_url'] = site_url('my_projects/edit_project');
		$data['nw_url1'] = site_url('upload/doc');
		$data['nw_url2'] = site_url('upload/dorsal_img');
                $data['nw_url5'] = site_url('upload/ventral_img');
                $data['nw_url6'] = site_url('upload/lateral_img');
                $data['nw_url7'] = site_url('upload/other_img');
		$data['nw_url3'] = site_url('upload/vid');
		$data['nw_url4'] = site_url('my_projects/view_sequence');
		$data['nw_url8'] = site_url('upload/set_doc_file_desc');
                $data['nw_url9'] = site_url('upload/set_vid_file_desc');
                $docname = $this->docs->get_docname($proj_id);
                $data['docname'] = $this->docs->get_docname($proj_id);
                $vidname = $this->videos->get_vidname($proj_id);
                $data['vidname'] = $this->videos->get_vidname($proj_id);
                $proj_details = $this->project->get_project_details($proj_id);
			$data['project_details'] = $proj_details;
			foreach($proj_details as $row){
		       $data['breed_name'] = $row->breed;
		      }
                $this->load->view('project_header_view', $data);
		$data = array('css'=>'<link rel="stylesheet" type="text/css" href="'.base_url().'application/uploadify/uploadify.css"/>',
                              'src'=>'<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
		<script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.min.js"></script>
                <script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.uploadify.v2.1.0.min.js"></script>');
		$data['type'] = "Videos";
                $this->load->view('upload_view',$data);
                $this->load->view('footer');
	}
        
        function set_doc_file_desc()
        {
                $proj_id = $this->uri->segment(3);
                $data['proj_id'] = $proj_id;
                $data['new_url'] = site_url('view_project/show_project');
                $data['nw_url'] = site_url('my_projects/edit_project');
                $data['nw_url1'] = site_url('upload/doc');
                $data['nw_url2'] = site_url('upload/dorsal_img');
                $data['nw_url5'] = site_url('upload/ventral_img');
                $data['nw_url6'] = site_url('upload/lateral_img');
                $data['nw_url7'] = site_url('upload/other_img');
                $data['nw_url3'] = site_url('upload/vid');
                $data['nw_url4'] = site_url('my_projects/view_sequence');
                $data['nw_url8'] = site_url('upload/set_doc_file_desc');
                $data['nw_url9'] = site_url('upload/set_vid_file_desc');
                $docname = $this->docs->get_docname($proj_id);
                $data['docname'] = $this->docs->get_docname($proj_id);
                $vidname = $this->videos->get_vidname($proj_id);
                $data['vidname'] = $this->videos->get_vidname($proj_id);
                $proj_details = $this->project->get_project_details($proj_id);
                $data['project_details'] = $proj_details;
                foreach($proj_details as $row){
		       $data['breed_name'] = $row->breed;
		      }
                $this->load->view('project_header_view', $data);
                $data = array('css'=>'<link rel="stylesheet" type="text/css" href="'.base_url().'application/uploadify/uploadify.css"/>',
                                    'src'=>'<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
                      <script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.min.js"></script>
                      <script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.uploadify.v2.1.0.min.js"></script>');
                $data['type'] = "Documents";
                $this->load->view('desc_view',$data);
                $this->load->view('footer');
        }
        
        function set_vid_file_desc()
        {
                $proj_id = $this->uri->segment(3);
                $data['proj_id'] = $proj_id;
                $data['new_url'] = site_url('view_project/show_project');
                $data['nw_url'] = site_url('my_projects/edit_project');
                $data['nw_url1'] = site_url('upload/doc');
                $data['nw_url2'] = site_url('upload/dorsal_img');
                $data['nw_url5'] = site_url('upload/ventral_img');
                $data['nw_url6'] = site_url('upload/lateral_img');
                $data['nw_url7'] = site_url('upload/other_img');
                $data['nw_url3'] = site_url('upload/vid');
                $data['nw_url4'] = site_url('my_projects/view_sequence');
                $data['nw_url8'] = site_url('upload/set_doc_file_desc');
                $data['nw_url9'] = site_url('upload/set_vid_file_desc');
                $docname = $this->docs->get_docname($proj_id);
                $data['docname'] = $this->docs->get_docname($proj_id);
                $vidname = $this->videos->get_vidname($proj_id);
                $data['vidname'] = $this->videos->get_vidname($proj_id);
                $proj_details = $this->project->get_project_details($proj_id);
                $data['project_details'] = $proj_details;
                foreach($proj_details as $row){
		       $data['breed_name'] = $row->breed;
		      }
                $this->load->view('project_header_view', $data);
                $data = array('css'=>'<link rel="stylesheet" type="text/css" href="'.base_url().'application/uploadify/uploadify.css"/>',
                                    'src'=>'<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
                      <script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.min.js"></script>
                      <script type="text/javascript" language="javascript" src="'.base_url().'application/uploadify/jquery.uploadify.v2.1.0.min.js"></script>');
                $data['type'] = "Videos";
                $this->load->view('desc_view',$data);
                $this->load->view('footer');
        }
        
	function uploadify()
	{
                $this->load->view('project_header_view');
		$file = $this->input->post('filearray');
		//$data['json'] = json_decode($file);
		$this->load->view('uploadify',$data); //to be changed to redirect to the breed's project home view
                $this->load->view('footer');
	}
        
}


/* End of file upload.php */
/* Location: ./system/application/controllers/upload.php */