<?php
Class Docs extends CI_Model
{
     function get_path_name($proj_id)
     {
          $this->db->select('filepath, filename, filedesc');
          $this->db->from('docs');
          $this->db->where('proj_id', $proj_id);
          $query = $this->db->get();
        
          if($query->num_rows() > 0)
          {
              return $query->result();
          }
          
          else return FALSE;
     }
     
     function get_docpath($proj_id)
    {
        $this->db->select('filepath');
        $this->db->from('docs');
        $this->db->where('proj_id', $proj_id);
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
    function get_docname($proj_id)
    {
        $this->db->select('filename');
        $this->db->from('docs');
        $this->db->where('proj_id', $proj_id);
        $this->db->where('filedesc', NULL);
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
}

/* End of file docs.php */
/* Location: ./application/models/docs.php */