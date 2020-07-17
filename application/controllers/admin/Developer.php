<?php


class Developer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isLogin();
		guard('admin|pm|ba|qa');
		$this->load->model(array(
			'developer_model',
			'kategori_model',
			'karyawan_model'
		));
	}

	public function index(){
		$data['title'] = "Developer";
		$data['developer'] = $this->developer_model->get();
		$this->load->view('layouts/header', $data);
		$this->load->view('admin/developer/lists', $data);
		$this->load->view('layouts/footer');
	}

	public function create(){
		$data['kategori'] = $this->kategori_model->get();
		$data['karyawan'] = $this->karyawan_model->get();
		$this->load->view('admin/developer/create', $data);
	}
	public function store(){
		$data = $this->input->post();
		$data['id_dev'] = dev_id();
		$save = $this->developer_model->store($data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di simpan','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di simpan','Gagal!')");
		}

		return redirect(site_url('admin/developer'));
	}

	public function edit($id){
		$data['kategori'] = $this->kategori_model->get();
		$data['karyawan'] = $this->karyawan_model->get();
		$data['developer'] = $this->db->get_where('developer', array('id_dev'=>$id))->row_object();
		$data['id'] = $id;

		$this->load->view('admin/developer/edit', $data);
	}

	public function update($id){
		$data = $this->input->post();
		$save = $this->developer_model->update($id,$data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di update','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di update','Gagal!')");
		}

		return redirect(site_url('admin/developer'));
	}

	public function delete($id){
		$delete = $this->developer_model->delete($id);
		if ($delete){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di hapus','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di hapus','Gagal!')");
		}

		return redirect(site_url('admin/developer'));
	}

}
