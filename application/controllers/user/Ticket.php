<?php


class Ticket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isLogin();
		guard('user|admin|pm|qa|ba');
		$this->load->model(array(
			'ticket_model',
			'tracking_model',
			'modul_model',
			'project_model',
			'developer_model',
		));
	}

	public function index(){
		$data['title'] = "Ticket";
		$data['ticket'] = $this->ticket_model->my_ticket($this->session->userdata('id'));

		$this->load->view('layouts/header', $data);
		$this->load->view('user/lists', $data);
		$this->load->view('layouts/footer');
	}

	public function create(){
		$data['title'] = "Create Ticket";
		$data['modul'] = $this->modul_model->get();
		$data['project'] = $this->project_model->get();
		$this->load->view('layouts/header', $data);
		$this->load->view('user/create', $data);
		$this->load->view('layouts/footer');
	}

	public function store(){
		$data = $this->input->post();
		$data['id_ticket'] = ticket_id();
		$data['tanggal'] = date('Y-m-d h:i:s');
		$data['reported'] = $this->session->userdata('id');
		$save = $this->ticket_model->store($data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di simpan','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di simpan','Gagal!')");
		}

		return redirect(site_url('user/ticket'));
	}

	public function edit($id){
		$data['title'] = "Edit Ticket";
		$data['modul'] = $this->modul_model->get();
		$data['project'] = $this->project_model->get();
		$data['ticket'] = $this->db->get_where('ticket', array('id_ticket'=>$id))->row_object();
		$data['id'] = $id;

		$this->load->view('layouts/header', $data);
		$this->load->view('user/edit', $data);
		$this->load->view('layouts/footer');

	}

	public function update($id){
		$data = $this->input->post();
		$save = $this->ticket_model->update($id,$data);
		if ($save){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di update','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di update','Gagal!')");
		}

		return redirect(site_url('user/ticket'));
	}

	public function delete($id){
		$delete = $this->ticket_model->delete($id);
		if ($delete){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di hapus','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di hapus','Gagal!')");
		}

		return redirect(site_url('user/ticket'));
	}

	public function view($id){
		$data['title'] = "View Ticket";
		$data['developer'] = $this->developer_model->get();
		$data['ticket'] = $this->ticket_model->get($id);
		$data['tracking'] = $this->tracking_model->get($id);
		$data['id'] = $id;

		$this->load->view('layouts/header', $data);
		$this->load->view('user/view', $data);
		$this->load->view('layouts/footer');
	}

	public function tracking_store($id_ticket){
		$data_ticket = array(
			'status' => $this->input->post('status'),
		);

		$data_tracking = array(
			'tanggal' => date('Y-m-d h:i:s'),
			'status' => $this->input->post('status'),
			'id_ticket' => $id_ticket,
			'deskripsi' => $this->input->post('deskripsi'),
			'id_user' => $this->session->userdata('id')
		);

		$this->ticket_model->update($id_ticket, $data_ticket);
		$this->tracking_model->store($data_tracking);
		$this->session->set_flashdata('info',"toastr.success('Ticket telah di aprove!','Success!')");

		return redirect(site_url('user/ticket'));
	}

}
