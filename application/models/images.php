<?php
Class Images extends CI_Model
{    
     function get_dfilepath($proj_id)
    {
        $this->db->select('filepath');
        $this->db->from('images');
        $this->db->where('proj_id', $proj_id);
        $this->db->where('view_type', "Dorsal");
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
    function get_vfilepath($proj_id)
    {
        $this->db->select('filepath');
        $this->db->from('images');
        $this->db->where('proj_id', $proj_id);
        $this->db->where('view_type', "Ventral");
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
    function get_lfilepath($proj_id)
    {
        $this->db->select('filepath');
        $this->db->from('images');
        $this->db->where('proj_id', $proj_id);
        $this->db->where('view_type', "Lateral");
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
    function get_ofilepath($proj_id)
    {
        $this->db->select('filepath');
        $this->db->from('images');
        $this->db->where('proj_id', $proj_id);
        $this->db->where('view_type', "Other");
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
    function get_dfilename($proj_id)
    {
        $this->db->select('filename');
        $this->db->from('images');
        $this->db->where('proj_id', $proj_id);
        $this->db->where('view_type', "Dorsal");
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
    function get_vfilename($proj_id)
    {
        $this->db->select('filename');
        $this->db->from('images');
        $this->db->where('proj_id', $proj_id);
        $this->db->where('view_type', "Ventral");
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
    function get_lfilename($proj_id)
    {
        $this->db->select('filename');
        $this->db->from('images');
        $this->db->where('proj_id', $proj_id);
        $this->db->where('view_type', "Lateral");
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
    function get_ofilename($proj_id)
    {
        $this->db->select('filename');
        $this->db->from('images');
        $this->db->where('proj_id', $proj_id);
        $this->db->where('view_type', "Other");
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
}

/* End of file images.php */
/* Location: ./application/models/images.php */