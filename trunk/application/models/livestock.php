<?php
Class Livestock extends CI_Model
{
    /* Called by Controller: sortby */
    function get_sorted_by($num, $offset, $col_name, $order, $category)
    {        
        if (($col_name == 'breed') && ($order == 'asc')){$this->db->order_by('breed','asc');}
	if (($col_name == 'breed') && ($order == 'desc')){$this->db->order_by('breed','desc');}
        if (($col_name == 'fa') && ($order == 'asc')){$this->db->order_by('farm_animal','asc');}
	if (($col_name == 'fa') && ($order == 'desc')){$this->db->order_by('farm_animal','desc');}
        if (($col_name == 'pid') && ($order == 'asc')){$this->db->order_by('project.proj_id','asc');}
	if (($col_name == 'pid') && ($order == 'desc')){$this->db->order_by('project.proj_id','desc');}
	if (($col_name == 'place') && ($order == 'asc')){$this->db->order_by('place','asc');}
	if (($col_name == 'place') && ($order == 'desc')){$this->db->order_by('place','desc');}
        $this->db->where('ls_category', $category)->where('is_deleted',0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
	      
        $query = $this->db->get('project', $num, $offset);
      
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return FALSE;           
    }
    
    function get_all_sorted_by($num, $offset, $user_id, $col_name, $order)
    {
        $this->db->from('project');
        if (($col_name == 'breed') && ($order == 'asc')){$this->db->order_by('breed','asc');}
	if (($col_name == 'breed') && ($order == 'desc')){$this->db->order_by('breed','desc');}
        if (($col_name == 'fa') && ($order == 'asc')){$this->db->order_by('farm_animal','asc');}
	if (($col_name == 'fa') && ($order == 'desc')){$this->db->order_by('farm_animal','desc');}
        if (($col_name == 'pid') && ($order == 'asc')){$this->db->order_by('project.proj_id','asc');}
	if (($col_name == 'pid') && ($order == 'desc')){$this->db->order_by('project.proj_id','desc');}
	if (($col_name == 'place') && ($order == 'asc')){$this->db->order_by('place','asc');}
	if (($col_name == 'place') && ($order == 'desc')){$this->db->order_by('place','desc');}
        $this->db->where('user_id', $user_id)->where('is_deleted',0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
	$this->db->limit($num, $offset);
      
        $query = $this->db->get();
      
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return FALSE;           
    }
    
    function get_bovidae($num, $offset)
    {
        $this->db->where('ls_category', "Bovidae")->where('is_deleted',0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
	      
        $query = $this->db->get('project', $num, $offset);
      
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return FALSE;           
    }
    
    function get_total_bovidae()
    {
        $this->db->from('project')->where('ls_category', "Bovidae")->where('is_deleted', 0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
      
	$query = $this->db->get();
        return $query->num_rows();
    }
    
    function get_capridae($num, $offset)
    {
        $this->db->where('ls_category', "Capridae")->where('is_deleted',0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
      
        $query = $this->db->get('project', $num, $offset);
        
        if($query->num_rows() > 0)
	{
            return $query->result();
	}
	else return FALSE;
    }
        
    function get_total_capridae()
    {
        $this->db->from('project')->where('ls_category', "Capridae")->where('is_deleted', 0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
      
	$query = $this->db->get();
        return $query->num_rows();
    }
    
    function get_monogastrics($num, $offset)
    {
        $this->db->where('ls_category', "Monogastrics");
	$this->db->where('is_deleted', 0)->where('is_deleted',0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
      
        $query = $this->db->get('project', $num, $offset);
        
        if($query->num_rows() > 0)
	{
            return $query->result();
	}
	else return FALSE;
    }
    
    function get_total_monogastrics()
    {
        $this->db->from('project')->where('ls_category', "Monogastrics")->where('is_deleted', 0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
      
	$query = $this->db->get();
        return $query->num_rows();
    }
    
    function get_user_lproj($num, $offset, $user_id)
    {
        $this->db->from('project');
        $this->db->order_by('breed','asc');
        $this->db->where('user_id', $user_id)->where('is_deleted', 0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
	$this->db->limit($num, $offset);
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
    function get_total_user_lproj($user_id)
    {
        $this->db->from('project');
        $this->db->order_by('breed','asc');
        $this->db->where('user_id', $user_id)->where('is_deleted', 0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
	
	$query = $this->db->get();
        
        return $query->num_rows();
    }
    
    function get_total_livestock()
    {
	$this->db->from('project')->where('is_deleted', 0)->where('proj_category',"livestock");
        
        $query = $this->db->get();
	return $query->num_rows();
    }
    
     function get_livestock_details($proj_id)
    {
        $this->db->from('livestock');
        $this->db->where('proj_id', $proj_id);
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
}

/* End of file livestock.php */
/* Location: ./application/models/livestock.php */