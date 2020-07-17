<?php


class Assignements extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isLogin();
		guard('user');
		$this->load->model(array(
			'ticket_model',
			'tracking_model',
			'modul_model',
			'project_model',
			'user_model',
		));
	}

	public function index(){
		$data['title'] = "Assignements";
		$data['ticket'] = $this->ticket_model->my_assignements($this->session->userdata('id'));

		$this->load->view('layouts/header', $data);
		$this->load->view('dev/lists', $data);
		$this->load->view('layouts/footer');
	}

	public function response($id){
		$data['title'] = "Response";
		$data['ticket'] = $this->ticket_model->get($id);
		$data['tracking'] = $this->tracking_model->get($id);
		$data['id'] = $id;

		$this->load->view('layouts/header', $data);
		$this->load->view('dev/view', $data);
		$this->load->view('layouts/footer');
	}

	public function tracking_store($id_ticket){
		$data_ticket = array(
			'status' => $this->input->post('status'),
			'progress' => $this->input->post('progress'),
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

		return redirect(site_url('dev/assignements'));
	}

}
