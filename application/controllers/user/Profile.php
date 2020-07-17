<?php


class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isLogin();
		guard('user');
		$this->load->model(array(
			'karyawan_model',
			'user_model',
		));
	}

	public function index(){
		$my_id = $this->session->userdata('id');
		$data['dev'] = $this->karyawan_model->get($my_id);
		$data['user'] = $this->db->get_where('user', array('username'=> $my_id))->row_object();
		$data['title'] = "Profile";
		$this->load->view('layouts/header', $data);
		$this->load->view('user/profile', $data);
		$this->load->view('layouts/footer');
	}

	public function update(){
		$my_id = $this->session->userdata('id');
		$data = $this->input->post();
		$update = $this->karyawan_model->update($my_id, $data);
		if ($update){
			$this->session->set_userdata('nama', $this->input->post('nama'));
			$this->session->set_flashdata('info','toastr.success("Profile berhasil di ubah","Success!")');
		}else{
			$this->session->set_flashdata('info','toastr.error("Profile gagal di ubah","Gagal!")');
		}

		return redirect(site_url('user/profile'));
	}

	public function reset(){
		$my_id = $this->session->userdata('id');
		$id_user = $this->db->select('*')->from('user')->where('username', $my_id)->get()->row_object()->id_user;
		$data['password'] = md5($this->input->post('password'));
		$update = $this->user_model->update($id_user, $data);
		if ($update){
			$this->session->set_flashdata('info','toastr.success("Password berhasil di ubah","Success!")');
		}else{
			$this->session->set_flashdata('info','toastr.error("Password gagal di ubah","Gagal!")');
		}

		return redirect(site_url('user/profile'));
	}
}
