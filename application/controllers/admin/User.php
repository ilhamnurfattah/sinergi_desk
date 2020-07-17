<?php


class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isLogin();
		guard('admin');
		$this->load->model(array(
			'user_model',
			'karyawan_model',
		));
	}

	public function index(){
		$data['title'] = "User Managemen";
		$data['user'] = $this->user_model->get();
		$this->load->view('layouts/header', $data);
		$this->load->view('admin/user/lists', $data);
		$this->load->view('layouts/footer');
	}

	public function create(){
		$data['karyawan'] = $this->karyawan_model->get();
		$this->load->view('admin/user/create', $data);
	}
	public function store(){
		$data = $this->input->post();
		$pass = $this->input->post('password');
		unset($data['password']);
		$data['password'] = md5($pass);
		$save = $this->user_model->store($data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di simpan','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di simpan','Gagal!')");
		}

		return redirect(site_url('admin/user'));
	}

	public function edit($id){
		$data['karyawan'] = $this->karyawan_model->get();
		$data['user'] = $this->db->get_where('user', array('id_user'=>$id))->row_object();
		$data['id'] = $id;

		$this->load->view('admin/user/edit', $data);
	}

	public function edit_password($id){
		$data['user'] = $this->db->get_where('user', array('id_user'=>$id))->row_object();
		$data['id'] = $id;

		$this->load->view('admin/user/password', $data);
	}

	public function update_password($id){
		$pass = $this->input->post('password');
		$data['password'] = md5($pass);
		$save = $this->user_model->update($id,$data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di update','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di update','Gagal!')");
		}

		return redirect(site_url('admin/user'));
	}

	public function update($id){
		$data = $this->input->post();
		$save = $this->user_model->update($id,$data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di update','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di update','Gagal!')");
		}

		return redirect(site_url('admin/user'));
	}

	public function delete($id){
		$delete = $this->user_model->delete($id);
		if ($delete){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di hapus','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di hapus','Gagal!')");
		}

		return redirect(site_url('admin/user'));
	}

}
