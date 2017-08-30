<?php
class Admin extends CI_Controller{
	public function index(){
		if($this->session->userdata('ad_id')){
			return redirect('admin_dashboard');
			}
		$this->load->view('admin/admin_login_view.php');
	}
	public function admin_login(){
		$this->form_validation->set_rules('email','Email','required|max_length[40]');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<b><p class="text-danger">','</p></b>');
		if($this->form_validation->run()){
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$this->load->model('admin_login_model');
			$id=$this->admin_login_model->login_admin($email,$password);
			if($id){
				$this->session->set_userdata('ad_id',$id);
				return redirect('admin_dashboard');
			}
			else{
				$this->session->set_flashdata('login_failed','Admin Credentials not matched!.');
				return redirect('admin');
			}
		}
		else{
			$this->load->view('admin/admin_login_view');
		}
	}
	public function logout(){
		$this->session->unset_userdata('ad_id');
		return redirect('admin');
	}
}
?>