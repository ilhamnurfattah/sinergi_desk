<?php


class Modul extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isLogin();
		guard('admin|pm|ba|qa');
		$this->load->model(array(
			'modul_model',
		));
	}

	public function index(){
		$data['title'] = "Modul";
		$data['modul'] = $this->modul_model->get();
		$this->load->view('layouts/header', $data);
		$this->load->view('modul/lists', $data);
		$this->load->view('layouts/footer');
	}

	public function create(){
		$this->load->view('modul/create');
	}
	public function store(){
		$data = $this->input->post();
		$save = $this->modul_model->store($data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di simpan','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di simpan','Gagal!')");
		}

		return redirect(site_url('modul'));
	}

	public function edit($id){
		$data['modul'] = $this->db->get_where('modul', array('id_modul'=>$id))->row_object();
		$data['id'] = $id;

		$this->load->view('modul/edit', $data);
	}

	public function update($id){
		$data = $this->input->post();
		$save = $this->modul_model->update($id,$data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di update','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di update','Gagal!')");
		}

		return redirect(site_url('modul'));
	}

	public function delete($id){
		$delete = $this->modul_model->delete($id);
		if ($delete){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di hapus','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di hapus','Gagal!')");
		}

		return redirect(site_url('modul'));
	}

}
