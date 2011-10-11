<?php
Class Project extends CI_Model
{
 function is_project_existing($breed)
 {
    $this->db->from('project');
    $this->db->where('breed', $breed);
    $this->db->where('is_deleted',0);
    $query = $this->db->get();
    
    if($query->num_rows() == 1)
    {
        return TRUE;
    }
    
    else return FALSE;
 }
 
 function is_seq_existing($dna_seq)
 {
    $this->db->from('project');
    $this->db->where('dna_seq', $dna_seq);
    $query = $this->db->get();
    
    if($query->num_rows() == 1)
    {
        return TRUE;
    }
    
    else return FALSE;
}
 
 function get_proj_id($breed)
 {
    $this->db->select('proj_id');
    $this->db->from('project');
    $this->db->where('breed', $breed);
    $this->db->limit(1);

    $query = $this->db->get();

    if($query->num_rows() == 1)
    {
	return $query->result();
    }

    else
    {
    return FALSE;
    }
 }
 
 function get_breed($proj_id)
 {
    $this->db->select('breed');
    $this->db->from('project');
    $this->db->where('proj_id', $proj_id);
    $this->db->limit(1);

    $query = $this->db->get();

    if($query->num_rows() == 1)
    {
	return $query->result_array();
    }

    else
    {
    return FALSE;
    }
 }
 
 function get_place($proj_id)
{
    $this->db->select('place');
    $this->db->from('project');
    $this->db->where('proj_id', $proj_id);
    $this->db->limit(1);

    $query = $this->db->get();

    if($query->num_rows() == 1)
    {
	return $query->result_array();
    }

    else
    {
    return FALSE;
    }
 }
 
 function get_dna_seq($proj_id)
 {
    $this->db->select('dna_seq');
    $this->db->from('project');
    $this->db->where('proj_id', $proj_id);
    $this->db->limit(1);

    $query = $this->db->get();

    if($query->num_rows() == 1)
    {
	return $query->result();
    }

    else
    {
    return FALSE;
    }
 }
 
 function get_poultry_category()
 {
    $this->db->from('project');
    $this->db->where('proj_category', "poultry");
    $this->db->where('is_deleted',0);
    
    $query = $this->db->get();

    if($query->num_rows() == 1)
    {
	return $query->result_array();
    }

    else return FALSE;
 }
 
 function get_ls_category()
 {
    $this->db->from('project');
    $this->db->where('proj_category', "livestock");
    $this->db->where('is_deleted',0);
    
    $query = $this->db->get();

    if($query->num_rows() == 1)
    {
	return $query->result_array();
    }

    else return FALSE;
 }
 
 function delete_project($proj_id)
 {
    $data = array(
     'is_deleted' => 1
    );
    $this->db->where('proj_id', $proj_id);
    $this->db->update('project', $data);    
 }
 
 function get_proj_category($proj_id)
 {
    $this->db->select('proj_category');
    $this->db->from('project');
    $this->db->where('proj_id', $proj_id);
    
    $query = $this->db->get();
    
    if($query->num_rows() == 1)
    {
	return $query->result();
    }

    else return FALSE;
 }
 
 function get_project_details($proj_id)
 {
    $this->db->from('project');
    $this->db->where('proj_id', $proj_id);
    
    $query = $this->db->get();
    
    if($query->num_rows() == 1)
    {
	return $query->result();
    }

    else return FALSE;
 }
 
 function count_keyword_result($search_text)
 {
    $this->db->from('project');
    $this->db->like('farm_animal',$search_text);
    
    $query = $this->db->get();
    
    return $query->num_rows();
 }
 
 function get_keyword_category($search_text)
 {
    $this->db->select('proj_category');
    $this->db->from('project');
    $this->db->like('farm_animal',$search_text);
    $this->db->like('breed',$search_text);
    $this->db->where('is_deleted',0);
    
    $query = $this->db->get();
    
    if($query->num_rows() > 0)
    {
        return $query->result();
    }
    
    else return FALSE;
    
 }
 
 function sorted_by_breed()
    {
        $this->db->from('project');
        $this->db->order_by('breed','asc');
	$this->db->where('is_deleted',0);
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        
        else return FALSE;
    }
}

/* End of file project.php */
/* Location: ./application/models/project.php */