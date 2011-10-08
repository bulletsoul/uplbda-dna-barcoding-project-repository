<?php
Class User extends CI_Model
{
	function login($username, $password)
	{
		$this->db->select('user_id, username, password');
		$this->db->from('users');
                $array = array('username'=>$username, 'password'=>md5($password));
                $this->db->where($array);
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
        
 function user_exists($username)
 {
 $this->db->where("username",$username);
 $query=$this->db->get("users");
  
  if($query->num_rows() == 1)
  {
   return TRUE;
  }
  
  else {
   return FALSE;
  }
 }
 
}

/* End of file user.php */
/* Location: ./application/models/user.php */