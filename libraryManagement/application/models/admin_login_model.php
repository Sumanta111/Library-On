<?php
class Admin_login_model extends CI_Model{

	public function login_admin($email,$password){
		$q=$this->db->where(['email'=>$email,'password'=>$password])
				 ->GET('admin_reg');
		if($q->num_rows()){
			return $q->row()->admin_id;
		}
		else{
			return FALSE;
		}
	}
}

?>