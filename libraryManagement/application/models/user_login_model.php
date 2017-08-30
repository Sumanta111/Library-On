<?php
class User_login_model extends CI_Model{
	public function reg_user($array){
		return $this->db->insert('user_reg',$array);
	}
	public function login_user($email,$password){
		$q=$this->db->where(['email'=>$email,'password'=>$password])
				 ->GET('user_reg');
		if($q->num_rows()){
			return $q->row()->user_id;
		}
		else{
			return FALSE;
		}
	}
}

?>