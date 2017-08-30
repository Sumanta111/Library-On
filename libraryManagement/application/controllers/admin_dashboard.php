<?php
class Admin_dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('ad_id')){
			return redirect('admin');
		}
	}
	public function index(){
		$this->load->library('pagination');
		$this->load->model('admin_dashboard_model');
		$config=[
					'base_url'  => base_url("admin_dashboard/index"),
					'per_page'  => 5,
					'total_rows' =>$this->admin_dashboard_model->num_books(),
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

		$books=$this->admin_dashboard_model->getbookinfo($config['per_page'],$this->uri->segment(3,0));
		$this->load->view('admin/admin_dashboard_view',['books'=>$books]);
	}
	public function new_book(){
		$this->load->view('admin/admin_new_book_view.php');
	}
	public function new_book_save(){
		$this->form_validation->set_rules('name_book','Book Name','required|max_length[30]');
		$this->form_validation->set_rules('auther_book','Author Name','required|max_length[30]');
		$this->form_validation->set_rules('av_book','Availability','required|numeric');
		$this->form_validation->set_error_delimiters('<b><p class="text-danger">','</p></b>');
		if($this->form_validation->run()){
			$inp=$this->input->post();
			unset($inp['submit']);
			$this->load->model('admin_dashboard_model');
			if($this->admin_dashboard_model->new_book($inp)){
				$this->session->set_flashdata('feedback','New Book Successfully save');
				$this->session->set_flashdata('feedback_class','alert alert-success');
			}
			else{
				$this->session->set_flashdata('feedback','Book Save failed..');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
			}
			return redirect('admin_dashboard');
		}
		else{
			$this->load->view('admin/admin_new_book_view');
		}
	}	


	public function pend_book(){
		$this->load->model('admin_dashboard_model');
		$result=$this->admin_dashboard_model->find_req();
		$this->load->view('admin/admin_pending_view',['result'=>$result]);
	}

	public function approve_req($req_id){
		$this->load->model('admin_dashboard_model');
		$issue_date=date('d/m/Y', strtotime('+0 day'));
		$submission_date=date('d/m/Y', strtotime('+10 day'));
		$r=$this->admin_dashboard_model->find_req_single($req_id);

		$count=$this->admin_dashboard_model->find_book_id($r->req_book_id);
		if(($count->av_book)>1){
		$this->admin_dashboard_model->availed_info($r->req_book,$r->req_auther,$r->req_book_id,$r->req_user_id,$r->req_fname,$r->req_lname,$issue_date,$submission_date);
		$this->admin_dashboard_model->remove_req($req_id);

		$new_count=($count->av_book - 1);
		$this->admin_dashboard_model->update_book_id($r->req_book_id,$new_count);
		}
		else{
			//update(avail_book_status-->n)
			$this->admin_dashboard_model->update_avs_book($r->req_book_id);
			//flash message-->book is not available....
			$this->session->set_flashdata('feedback','Only one book Available.At least 2 books required to approve the request..Limit is 2...');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
		}
		return redirect('admin_dashboard/pend_book');
	}
	public function delete_req($req_id){
		$this->load->model('admin_dashboard_model');
		if($this->admin_dashboard_model->remove_req($req_id)){
			$this->session->set_flashdata('feedback','Request Deleted..');
			$this->session->set_flashdata('feedback_class','alert alert-danger');
		}
		return redirect('admin_dashboard/pend_book');
	}
	public function availed_book(){
		$this->load->model('admin_dashboard_model');
		$result=$this->admin_dashboard_model->availed_book_info();
		$this->load->view('admin/admin_availed_view',['result'=>$result]);
	}

	public function fine_list(){
		$this->load->model('admin_dashboard_model');
		$result=$this->admin_dashboard_model->availed_book_info();
		foreach($result as $i){
			$submission_date=$i->sub_date;
			$issue_date=$i->issue_date;
			$d= date_parse_from_format("d/m/Y", $submission_date);
			$sub_day=$d["day"];
			$sub_month=$d["month"];

			$d= date_parse_from_format("d/m/Y", $issue_date);
			$iss_day=$d["day"];
			$iss_month=$d["month"];


			$current_date=date('d/m/Y', strtotime('+0 day'));
			$cd= date_parse_from_format("d/m/Y", $current_date);
			$cd_day=$cd["day"];
			$cd_month=$cd["month"];

			if($cd_month==$sub_month){
				if($cd_day > $sub_day){
					//fine
					if($this->admin_dashboard_model->availed_book_info_count($i->av_user_id,$i->book_id)==0)
						$this->admin_dashboard_model->fine_input($i->book_id,$i->book_name,$i->av_user_fname,$i->av_user_lname,$i->av_user_id);
				}
			}
			else{

				if($cd_day < $sub_day){
					if(!$this->admin_dashboard_model->availed_book_info_count($i->av_user_id,$i->book_id)==0)
					$this->admin_dashboard_model->fine_input($i->book_id,$i->book_name,$i->av_user_fname,$i->av_user_lname,$i->av_user_id);
				}

			}
		}
		return redirect('admin_dashboard/fine_list_info');
	}

	public function fine_list_info(){
		$this->load->model('admin_dashboard_model');
		$result=$this->admin_dashboard_model->fine_info();
		$this->load->view('admin/admin_fine_list_view',['result'=>$result]);
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
				$this->load->view('admin/admin_search_view',['books'=>$books]);
		}
	}

}

?>