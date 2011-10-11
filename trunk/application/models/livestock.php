<?php
Class Livestock extends CI_Model
{
    /* Called by Controller: sortby */
    function get_sorted_by($category, $col_name)
    {
        $this->db->from('project');
        if ($col_name == 'breed'){$this->db->order_by('breed','asc');}
        if ($col_name == 'farm_animal'){$this->db->order_by('farm_animal','asc');}
        if ($col_name == 'breed_code'){$this->db->order_by('breed_code','asc');}
        if ($col_name == 'fa_code'){$this->db->order_by('fa_code','asc');}
        $this->db->where('ls_category', $category)->where('is_deleted',0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
      
        $query = $this->db->get();
      
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return FALSE;           
    }
    
    function get_all_sorted_by($col_name, $user_id)
    {
        $this->db->from('project');
        if ($col_name == 'breed'){$this->db->order_by('breed','asc');}
        if ($col_name == 'farm_animal'){$this->db->order_by('farm_animal','asc');}
        if ($col_name == 'breed_code'){$this->db->order_by('breed_code','asc');}
        if ($col_name == 'fa_code'){$this->db->order_by('fa_code','asc');}
        $this->db->where('user_id', $user_id)->where('is_deleted',0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
      
        $query = $this->db->get();
      
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return FALSE;           
    }
    
    function get_bovidae()
    {
        $this->db->from('project');
        $this->db->where('ls_category', "Bovidae")->where('is_deleted',0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
      
        $query = $this->db->get();
      
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return FALSE;           
    }
    
    function get_capridae()
    {
        $this->db->from('project');
        $this->db->where('ls_category', "Capridae")->where('is_deleted',0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
      
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
	{
            return $query->result();
	}
	else return FALSE;
    }
        
    function get_monogastrics()
    {
        $this->db->from('project');
        $this->db->where('ls_category', "Monogastrics")->where('is_deleted',0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
      
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
	{
            return $query->result();
	}
	else return FALSE;
    }
    
    function get_user_lproj($user_id)
    {
        $this->db->from('project');
        $this->db->order_by('breed','asc');
        $this->db->where('user_id', $user_id)->where('is_deleted',0);
        $this->db->join('livestock', 'livestock.proj_id = project.proj_id');
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
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