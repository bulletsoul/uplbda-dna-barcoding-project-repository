<?php
Class Poultry extends CI_Model
{
    function get_poultry()
    {
        $this->db->from('project');
        $this->db->order_by('farm_animal', 'asc');
        $this->db->where('proj_category', "poultry");
        $this->db->join('poultry', 'poultry.proj_id = project.proj_id');
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
    function get_sorted_by($col_name, $user_id) {
        $this->db->from('project');
        if ($col_name == 'breed'){$this->db->order_by('breed', 'asc');}
        if ($col_name == 'farm_animal'){$this->db->order_by('farm_animal', 'asc');}
        if ($col_name == 'breed_code'){$this->db->order_by('breed_code', 'asc');}
        if ($col_name == 'fa_code'){$this->db->order_by('fa_code', 'asc');}
        $this->db->where('proj_category', "poultry");
        $this->db->where('user_id', $user_id);
        $this->db->join('poultry', 'poultry.proj_id = project.proj_id');
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
    function get_user_pproj($user_id)
    {
        $this->db->from('project');
        $this->db->order_by('breed','asc');
        $this->db->where('user_id', $user_id);
        $this->db->join('poultry', 'poultry.proj_id = project.proj_id');
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
    function get_poultry_details($proj_id)
    {
        $this->db->from('poultry');
        $this->db->where('proj_id', $proj_id);
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
}

/* End of file poultry.php */
/* Location: ./application/models/poultry.php */