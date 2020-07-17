<?php


class Departemen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isLogin();
		guard('admin|pm|ba|qa');
		$this->load->model(array(
			'departemen_model',
		));
	}

	public function index(){
		$data['title'] = "Departemen";
		$data['departemen'] = $this->departemen_model->get();
		$this->load->view('layouts/header', $data);
		$this->load->view('admin/departemen/lists', $data);
		$this->load->view('layouts/footer');
	}

	public function create(){
		$this->load->view('admin/departemen/create');
	}
	public function store(){
		$data = $this->input->post();
		$save = $this->departemen_model->store($data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di simpan','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di simpan','Gagal!')");
		}

		return redirect(site_url('admin/departemen'));
	}

	public function edit($id){
		$data['departemen'] = $this->db->get_where('departemen', array('id_dept'=>$id))->row_object();
		$data['id'] = $id;

		$this->load->view('admin/departemen/edit', $data);
	}

	public function update($id){
		$data = $this->input->post();
		$save = $this->departemen_model->update($id,$data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di update','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di update','Gagal!')");
		}

		return redirect(site_url('admin/departemen'));
	}

	public function delete($id){
		$delete = $this->departemen_model->delete($id);
		if ($delete){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di hapus','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di hapus','Gagal!')");
		}

		return redirect(site_url('admin/departemen'));
	}

}
