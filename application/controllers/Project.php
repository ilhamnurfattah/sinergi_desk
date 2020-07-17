<?php


class Project extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isLogin();
		guard('admin|pm|ba|qa');
		$this->load->model(array(
			'project_model',
		));
	}

	public function index(){
		$data['title'] = "Project";
		$data['project'] = $this->project_model->get();
		$this->load->view('layouts/header', $data);
		$this->load->view('project/lists', $data);
		$this->load->view('layouts/footer');
	}

	public function create(){
		$this->load->view('project/create');
	}
	public function store(){
		$data = $this->input->post();
		$save = $this->project_model->store($data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di simpan','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di simpan','Gagal!')");
		}

		return redirect(site_url('project'));
	}

	public function edit($id){
		$data['project'] = $this->db->get_where('project', array('id_project'=>$id))->row_object();
		$data['id'] = $id;

		$this->load->view('project/edit', $data);
	}

	public function update($id){
		$data = $this->input->post();
		$save = $this->project_model->update($id,$data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di update','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di update','Gagal!')");
		}

		return redirect(site_url('project'));
	}

	public function delete($id){
		$delete = $this->project_model->delete($id);
		if ($delete){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di hapus','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di hapus','Gagal!')");
		}

		return redirect(site_url('project'));
	}

}
