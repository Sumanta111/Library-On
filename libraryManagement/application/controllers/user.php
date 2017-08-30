<?php
class User extends CI_Controller{

	public function index(){
		$this->load->view('homepage');
	}

	public function login(){
		if($this->session->userdata('uid')){
			return redirect('user_dashboard');
			}
		$this->load->view('login_view');
	}
	public function user_login(){
		$this->form_validation->set_rules('email','Email','required|max_length[40]');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<b><p class="text-danger">','</p></b>');
		if($this->form_validation->run()){
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$this->load->model('user_login_model');
			$id=$this->user_login_model->login_user($email,$password);
			if($id){
				$this->session->set_userdata('uid',$id);
				return redirect('user_dashboard');
			}
			else{
				$this->session->set_flashdata('login_failed','Credentials not matched!  Unautherized Professor.');
				return redirect('user/login');
			}
		}
		else{
			$this->load->view('login_view');
		}
	}
	public function logout(){
		$this->session->unset_userdata('uid');
		return redirect('user');
	}

	public function reg(){
		$this->load->view('register_view');
	}
	public function user_reg(){
		$this->form_validation->set_rules('fname','First Name','required|max_length[30]');
		$this->form_validation->set_rules('lname','Last Name','required|max_length[30]');
		$this->form_validation->set_rules('email','Email','required|max_length[40]');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<b><p class="text-danger">','</p></b>');
		if($this->form_validation->run()){
			$inp=$this->input->post();
			unset($inp['submit']);
			$this->load->model('user_login_model');
			if($this->user_login_model->reg_user($inp)){
				$this->session->set_flashdata('feedback','Registration Successful.Please Login to go to Profile');
				$this->session->set_flashdata('feedback_class','alert alert-dark');
			}
			else{
				$this->session->set_flashdata('feedback','Registration Failed.Try again later');
				$this->session->set_flashdata('feedback_class','alert alert-danger');
			}
			return redirect('user/login');
		}
		else{
			$this->load->view('register_view');
		}
	}
}
?>