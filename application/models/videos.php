<?php
Class Videos extends CI_Model
{    
     function get_videopath($proj_id)
    {
        $this->db->select('filepath');
        $this->db->from('videos');
        $this->db->where('proj_id', $proj_id);
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
    
}

/* End of file videos.php */
/* Location: ./application/models/videos.php */