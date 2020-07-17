<?php


class Ticket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isLogin();
		guard('admin|pm|qa|ba');
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
		$data['ticket'] = $this->ticket_model->get();

		$this->load->view('layouts/header', $data);
		$this->load->view('ticket/lists', $data);
		$this->load->view('layouts/footer');
	}

	public function create(){
		$data['title'] = "Create Ticket";
		$data['modul'] = $this->modul_model->get();
		$data['project'] = $this->project_model->get();
		$this->load->view('layouts/header', $data);
		$this->load->view('ticket/create', $data);
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

		return redirect(site_url('ticket'));
	}

	public function edit($id){
		$data['title'] = "Edit Ticket";
		$data['modul'] = $this->modul_model->get();
		$data['project'] = $this->project_model->get();
		$data['ticket'] = $this->db->get_where('ticket', array('id_ticket'=>$id))->row_object();
		$data['id'] = $id;

		$this->load->view('layouts/header', $data);
		$this->load->view('ticket/edit', $data);
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

		return redirect(site_url('ticket'));
	}

	public function delete($id){
		$delete = $this->ticket_model->delete($id);
		if ($delete){
			$this->session->set_flashdata('info', "toastr.success('Data berhasil di hapus','Success!')");
		}else{
			$this->session->set_flashdata('info', "toastr.error('Data gagal di hapus','Gagal!')");
		}

		return redirect(site_url('ticket'));
	}

	public function view($id){
		$data['developer'] = $this->developer_model->get();
		$data['ticket'] = $this->ticket_model->get($id);
		$data['tracking'] = $this->tracking_model->get($id);
		$data['id'] = $id;

		$this->load->view('layouts/header', $data);
		$this->load->view('ticket/view', $data);
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

		return redirect(site_url('ticket'));
	}

	public function aproval(){
		$data['title'] = "Aproval";
		$data['ticket'] = $this->ticket_model->get_aproval();

		$this->load->view('layouts/header', $data);
		$this->load->view('ticket/aproval', $data);
		$this->load->view('layouts/footer');
	}

	public function aprove_ticket($id){
		$data['title'] = "Aproval Ticket";
		$data['developer'] = $this->developer_model->get();
		$data['ticket'] = $this->ticket_model->get_aproval($id);
		$data['id'] = $id;

		$this->load->view('layouts/header', $data);
		$this->load->view('ticket/aproval_ticket', $data);
		$this->load->view('layouts/footer');
	}

	public function aprove_store($id_ticket){
		$data_ticket = array(
			'tanggal_proses' => date('Y-m-d h:i:s'),
			'status' => 'Open',
			'id_dev' => $this->input->post('id_dev')
		);

		$data_tracking = array(
			'tanggal' => date('Y-m-d h:i:s'),
			'status' => 'Open',
			'id_ticket' => $id_ticket,
			'deskripsi' => $this->input->post('deskripsi'),
			'id_user' => $this->session->userdata('id')
		);

		$this->ticket_model->update($id_ticket, $data_ticket);
		$this->tracking_model->store($data_tracking);
		$this->session->set_flashdata('info',"toastr.success('Ticket telah di aprove!','Success!')");

		return redirect(site_url('ticket/aproval'));
	}



}
