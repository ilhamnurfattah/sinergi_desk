<?php


class Karyawan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isLogin();
		guard('admin|pm|ba|qa');
		$this->load->model(array(
			'karyawan_model',
			'kategori_model',
			'departemen_model',
			'posisi_model',
		));
	}

	public function index(){
		$data['title'] = "Karyawan";
		$data['karyawan'] = $this->karyawan_model->get();
		$this->load->view('layouts/header', $data);
		$this->load->view('admin/karyawan/lists', $data);
		$this->load->view('layouts/footer');
	}

	public function create(){
		$data['title'] = "Create Karyawan";
		$data['posisi'] = $this->posisi_model->get();
		$data['departemen'] = $this->departemen_model->get();

		$this->load->view('layouts/header',$data);
		$this->load->view('admin/karyawan/create', $data);
		$this->load->view('layouts/footer');
	}
	public function store(){
		$data = $this->input->post();
		$data['nik'] = generate_kode();
		$save = $this->karyawan_model->store($data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di simpan','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di simpan','Gagal!')");
		}

		return redirect(site_url('admin/karyawan'));
	}

	public function edit($id){
		$data['title'] = "Edit Karyawan";
		$data['posisi'] = $this->posisi_model->get();
		$data['departemen'] = $this->departemen_model->get();
		$data['karyawan'] = $this->db->get_where('karyawan', array('nik'=>$id))->row_object();
		$data['id'] = $id;

		$this->load->view('layouts/header', $data);
		$this->load->view('admin/karyawan/edit', $data);
		$this->load->view('layouts/footer');
	}

	public function update($id){
		$data = $this->input->post();
		$save = $this->karyawan_model->update($id,$data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di update','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di update','Gagal!')");
		}

		return redirect(site_url('admin/karyawan'));
	}

	public function delete($id){
		$delete = $this->karyawan_model->delete($id);
		if ($delete){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di hapus','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di hapus','Gagal!')");
		}

		return redirect(site_url('admin/karyawan'));
	}

}
