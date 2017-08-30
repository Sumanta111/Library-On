<?php
class Admin_dashboard_model extends CI_Model{

	public function getbookinfo($limit,$offset){
		$q=$this->db->limit($limit,$offset)
					->get('book_info');
		return $q->result();
	}
	public function num_books(){
		$q=$this->db->get('book_info');
		return $q->num_rows();
	}
	public function new_book($x){
		return $q=$this->db->insert('book_info',$x);
	}
	public function find_req(){
		$q=$this->db->get('req_book');
		return $q->result();
	}
	public function find_req_single($req_id){
		$q=$this->db->where('req_id',$req_id)
					->get('req_book');
		return $q->row();
	}
	public function find_book_id($book_id){
		$q=$this->db->select(['av_book','avs_book'])
					->where('book_id',$book_id)
					->get('book_info');
		return $q->row();
	}

	public function update_book_id($book_id,$update){
		$this->db->where('book_id',$book_id)
					->update('book_info',['av_book'=>$update]);
	}
	public function update_avs_book($book_id){
		$this->db->where('book_id',$book_id)
				 ->update('book_info',['avs_book'=>"n"]);
	}

	public function availed_info($book_name,$author_name,$book_id,$av_user_id,$av_user_fname,$av_user_lname,$issue_date,$sub_date){
		return $this->db->insert('availed_book',['book_name'=>$book_name,'author_name'=>$author_name,'book_id'=>$book_id,'av_user_id'=>$av_user_id,'av_user_fname'=>$av_user_fname,'av_user_lname'=>$av_user_lname,'issue_date'=>$issue_date,'sub_date'=>$sub_date]);
	}
	public function remove_req($req_id){
		return $this->db->delete('req_book',['req_id'=>$req_id]);
	}

	public function availed_book_info(){
		$q=$this->db->get('availed_book');
		return $q->result();
	}
	public function availed_book_info_count($uid,$book_id){
		$q=$this->db->where(['u_id'=>$uid,'book_id'=>$book_id])
					->get('fine_info');
		return $q->num_rows();
	}
	public function fine_input($book_id,$book_name,$fname,$lname,$u_id){
		return $this->db->insert('fine_info',['book_id'=>$book_id,'book_name'=>$book_name,'fname'=>$fname,'lname'=>$lname,'u_id'=>$u_id]);
	}
	public function fine_info(){
		$q=$this->db->get('fine_info');
		return $q->result();
	}
}

?>