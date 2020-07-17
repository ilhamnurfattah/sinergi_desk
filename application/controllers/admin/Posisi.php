<?php


class Posisi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isLogin();
		guard('admin|pm|ba|qa');
		$this->load->model(array(
			'posisi_model',
		));
	}

	public function index(){
		$data['title'] = "Posisi";
		$data['posisi'] = $this->posisi_model->get();
		$this->load->view('layouts/header', $data);
		$this->load->view('admin/posisi/lists', $data);
		$this->load->view('layouts/footer');
	}

	public function create(){
		$this->load->view('admin/posisi/create');
	}
	public function store(){
		$data = $this->input->post();
		$save = $this->posisi_model->store($data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di simpan','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di simpan','Gagal!')");
		}

		return redirect(site_url('admin/posisi'));
	}

	public function edit($id){
		$data['posisi'] = $this->db->get_where('posisi', array('id_posisi'=>$id))->row_object();
		$data['id'] = $id;

		$this->load->view('admin/posisi/edit', $data);
	}

	public function update($id){
		$data = $this->input->post();
		$save = $this->posisi_model->update($id,$data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di update','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di update','Gagal!')");
		}

		return redirect(site_url('admin/posisi'));
	}

	public function delete($id){
		$delete = $this->posisi_model->delete($id);
		if ($delete){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di hapus','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di hapus','Gagal!')");
		}

		return redirect(site_url('admin/posisi'));
	}

}
