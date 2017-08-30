<?php
class User_dashboard_model extends CI_Model{

	public function getbookinfo($limit,$offset){
		$q=$this->db->where('avs_book','y')
					->limit($limit,$offset)
					->get('book_info');
		return $q->result();
	}
	public function num_books(){
		$q=$this->db->get('book_info');
		return $q->num_rows();
	}
	public function getSingleBook($bookid){
		$q=$this->db->select(['name_book','auther_book'])
					->where('book_id',$bookid)
					->get('book_info');
		return $q->row();
	}
	public function userinfo($id){
		$q=$this->db->select(['fname','lname'])
					->where('user_id',$id)
					->get('user_reg');
		return $q->row();
	}
	public function reqinfo($array){
		$q=$this->db->insert('req_book',$array);
		return $q;
	}
	public function req_query($userid,$req_book_id){
		$q=$this->db->where(['req_user_id'=>$userid,'req_book_id'=>$req_book_id])
				 ->get('req_book');
		return $q->num_rows();
	}
	public function reqinfo_get(){
		$id=$this->session->userdata('uid');
		$q=$this->db->where('req_user_id',$id)
					->get('req_book');
		return $q->result();
	}
	public function delete_req($id,$req_book_id){
		return $this->db->delete('req_book',['req_user_id'=>$id,'req_book_id'=>$req_book_id]);
	}
	public function availed_books(){
		$userid=$this->session->userdata('uid');
		$q=$this->db->select(['book_name','author_name','issue_date','sub_date'])
					->where('av_user_id',$userid)
					->get('availed_book');
		return $q->result();
	}
	public function find_fine(){
		$userid=$this->session->userdata('uid');
		$q=$this->db->select(['book_name','fine_amount'])
					->where('u_id',$userid)
					->get('fine_info');
		return $q->result();
	}
	public function search($query){
		$q=$this->db->from('book_info')
					->like('name_book',$query)
					->get();
		return $q->result();
	}
}

?>