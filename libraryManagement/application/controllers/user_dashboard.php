<?php
class User_dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('uid')){
			return redirect('user/login');
		}
	}
	public function index(){
		$this->load->library('pagination');
		$this->load->model('user_dashboard_model');
		$config=[
					'base_url'  => base_url("user_dashboard/index"),
					'per_page'  => 5,
					'total_rows' =>$this->user_dashboard_model->num_books(),
					'full_tag_open' => "<ul class='pagination'>",
					'full_tag_close'=> '</ul>',
					'next_tag_open' => '<li>',
					'next_tag_close' => '</li>',
					'prev_tag_open'  =>'<li>',
					'prev_tag_close'  =>'</li>',
					'num_tag_open'  =>'<li>',
					'num_tag_close' =>'</li>',
					'cur_tag_open' =>"<li class='active'><a>",
					'cur_tag_close'=>'</a></li>'
				];
		$this->pagination->initialize($config);

		$books=$this->user_dashboard_model->getbookinfo($config['per_page'],$this->uri->segment(3,0));
		$this->load->view('user/user_profile_dashboard_view',['books'=>$books]);
	}

	public function req_book($req_book_id){
		$req_user_id=$this->session->userdata('uid');
		$this->load->model('user_dashboard_model');
		$book=$this->user_dashboard_model->getSinglebook($req_book_id);
		$user=$this->user_dashboard_model->userinfo($req_user_id);
		$array = array('req_book'=>$book->name_book,'req_auther'=>$book->auther_book,'req_book_id'=>$req_book_id,'req_fname'=>$user->fname,'req_lname'=>$user->lname,'req_user_id'=>$req_user_id);

		if($this->user_dashboard_model->req_query($req_user_id,$req_book_id)){
			$this->session->set_flashdata('feedback',"You have already requested for this book.Wait for the librarian's action");
			$this->session->set_flashdata('feedback_class','alert alert-warning');
		}
		else{
			if($this->user_dashboard_model->reqinfo($array)){
			$this->session->set_flashdata('feedback','You have successfully requested for this book.Wait until it has approved');
			$this->session->set_flashdata('feedback_class','alert alert-success');
		}
		else{
			$this->session->set_flashdata('feedback','Some error occured...Please try again..');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
		}
		}
		return redirect('user_dashboard');
	}

	public function req_info(){
		$this->load->model('user_dashboard_model');
		$info=$this->user_dashboard_model->reqinfo_get();
		$this->load->view('user/user_req_info_view',['info'=>$info]);
	}
	public function delete_req($book_id){
		$this->load->model('user_dashboard_model');
		$user_id=$this->session->userdata('uid');
		if($this->user_dashboard_model->delete_req($user_id,$book_id)){
			$this->session->set_flashdata('feedback',"Request Successfully deleted..");
			$this->session->set_flashdata('feedback_class','alert alert-success');
		}
		else{
			$this->session->set_flashdata('feedback','Some error Occured..try again..');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
		}
		return redirect('user_dashboard/req_info');
	}
	public function availed_books(){
		$this->load->model('user_dashboard_model');
		$result=$this->user_dashboard_model->availed_books();
		$this->load->view('user/user_availed_books_view',['result'=>$result]);
	}
	public function fine_note(){
		$this->load->model('user_dashboard_model');
		$result=$this->user_dashboard_model->find_fine();
		$this->load->view('user/user_fine_view',['result'=>$result]);
	}
	public function search(){
		$this->form_validation->set_rules('search_item','Search','required');
		$this->form_validation->set_error_delimiters('<b><p>','</p></b>');
		if(!$this->form_validation->run())
			$this->index();
		else{
			$query=$this->input->post('search_item');
			$this->load->model('user_dashboard_model');
			$books=$this->user_dashboard_model->search($query);
				$this->load->view('user/user_search_view',['books'=>$books]);
		}
	}
}
?>