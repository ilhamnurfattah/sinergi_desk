<?php

/**
 * 
 */
class Home extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		isLogin();
		guard('user');
	}

	public function index()
	{
		$nik = $this->session->userdata('id');

		$data['title'] = "Dashboard";
		$data['open'] = $this->db->get_where('ticket',array('status'=>'Open', 'reported'=> $nik))->result();
		$data['fixed'] = $this->db->get_where('ticket',array('status'=>'Fixed', 'reported'=> $nik))->result();
		$data['re_open'] = $this->db->get_where('ticket',array('status'=>'Re-Open', 'reported'=> $nik))->result();
		$data['closed'] = $this->db->get_where('ticket',array('status'=>'Closed', 'reported'=> $nik))->result();

		$data['minor'] = $this->db->get_where('ticket',array('defact_category'=>'minor', 'reported'=> $nik))->result();
		$data['major'] = $this->db->get_where('ticket',array('defact_category'=>'major', 'reported'=> $nik))->result();
		$data['critical'] = $this->db->get_where('ticket',array('defact_category'=>'critical', 'reported'=> $nik))->result();
		$data['cosmetics'] = $this->db->get_where('ticket',array('defact_category'=>'cosmetics', 'reported'=> $nik))->result();

		$sub1 = $this->db->select('count(id_ticket)')->from('ticket')->where('defact_category = "minor" and project_id=t.project_id')->where('reported', $nik)->get_compiled_select();
		$sub2 = $this->db->select('count(id_ticket)')->from('ticket')->where('defact_category = "major" and project_id=t.project_id')->where('reported', $nik)->get_compiled_select();
		$sub3 = $this->db->select('count(id_ticket)')->from('ticket')->where('defact_category = "critical" and project_id=t.project_id')->where('reported', $nik)->get_compiled_select();
		$sub4 = $this->db->select('count(id_ticket)')->from('ticket')->where('defact_category = "cosmetics" and project_id=t.project_id')->where('reported', $nik)->get_compiled_select();

		$data['project'] = $this->db->select("id_ticket,project_id,nama_project, ($sub1) as minor, ($sub2) as major, ($sub3) as critical, ($sub4) as cosmetics")
			->from('ticket as t')
			->join('project','project.id_project=t.project_id')
			->where('reported', $nik)
			->group_by('project_id')
			->get()->result();

		$this->load->view('layouts/header', $data);
		$this->load->view('user/home', $data);
		$this->load->view('layouts/footer');
	}

	public function project($project_id){
		$nik = $this->session->userdata('id');

		$pro = $this->db->select('*')->from('project')->where('id_project', $project_id)->get()->row_object();
		$data['title'] = $pro->nama_project;

		$data['open'] = $this->db->get_where('ticket',array('status'=>'Open','project_id'=> $project_id, 'reported'=> $nik))->result();
		$data['fixed'] = $this->db->get_where('ticket',array('status'=>'Fixed','project_id'=> $project_id, 'reported'=> $nik))->result();
		$data['re_open'] = $this->db->get_where('ticket',array('status'=>'Re-Open','project_id'=> $project_id, 'reported'=> $nik))->result();
		$data['closed'] = $this->db->get_where('ticket',array('status'=>'closed','project_id'=> $project_id, 'reported'=> $nik))->result();

		$data['minor'] = $this->db->get_where('ticket',array('defact_category'=>'minor','project_id'=> $project_id, 'reported'=> $nik))->result();
		$data['major'] = $this->db->get_where('ticket',array('defact_category'=>'major','project_id'=> $project_id, 'reported'=> $nik))->result();
		$data['critical'] = $this->db->get_where('ticket',array('defact_category'=>'critical','project_id'=> $project_id, 'reported'=> $nik))->result();
		$data['cosmetics'] = $this->db->get_where('ticket',array('defact_category'=>'cosmetics','project_id'=> $project_id, 'reported'=> $nik))->result();

		$sub1 = $this->db->select('count(id_ticket)')->from('ticket')->where('defact_category = "minor" and modul_id=t.modul_id')->where('project_id', $project_id)->where('reported', $nik)->get_compiled_select();
		$sub2 = $this->db->select('count(id_ticket)')->from('ticket')->where('defact_category = "major" and modul_id=t.modul_id')->where('project_id', $project_id)->where('reported', $nik)->get_compiled_select();
		$sub3 = $this->db->select('count(id_ticket)')->from('ticket')->where('defact_category = "critical" and modul_id=t.modul_id')->where('project_id', $project_id)->where('reported', $nik)->get_compiled_select();
		$sub4 = $this->db->select('count(id_ticket)')->from('ticket')->where('defact_category = "cosmetics" and modul_id=t.modul_id')->where('project_id', $project_id)->where('reported', $nik)->get_compiled_select();

		$sub5 = $this->db->select('count(id_ticket)')->from('ticket')->where('status = "Open" and modul_id=t.modul_id')->where('project_id', $project_id)->where('reported', $nik)->get_compiled_select();
		$sub6 = $this->db->select('count(id_ticket)')->from('ticket')->where('status = "Fixed"  and modul_id=t.modul_id')->where('project_id', $project_id)->where('reported', $nik)->get_compiled_select();
		$sub7 = $this->db->select('count(id_ticket)')->from('ticket')->where('status = "Re-Opem"  and modul_id=t.modul_id')->where('project_id', $project_id)->where('reported', $nik)->get_compiled_select();
		$sub8 = $this->db->select('count(id_ticket)')->from('ticket')->where('status = "Closed"  and modul_id=t.modul_id')->where('project_id', $project_id)->where('reported', $nik)->get_compiled_select();
		$sub9 = $this->db->select('count(id_ticket)')->from('ticket')->where('status = "Need Confirmation"  and modul_id=t.modul_id')->where('project_id', $project_id)->where('reported', $nik)->get_compiled_select();

		$data['modul'] = $this->db->select("id_ticket, modul_id,nama_modul, ($sub1) as minor, ($sub2) as major, ($sub3) as critical, ($sub4) as cosmetics")
			->from('ticket as t')
			->join('modul','modul.id_modul=t.modul_id')
			->where('project_id', $project_id)
			->where('reported', $nik)
			->group_by('modul_id')
			->get()->result();

		$data['status_modul'] = $this->db->select("id_ticket, modul_id,nama_modul, ($sub5) as open, ($sub6) as fixed, ($sub7) as re_open, ($sub8) as closed, ($sub9) as need_confirmation")
			->from('ticket as t')
			->join('modul','modul.id_modul=t.modul_id')
			->where('project_id', $project_id)
			->where('reported', $nik)
			->group_by('modul_id')
			->get()->result();
//		echo "<pre>";
//		print_r($data['title']);
//		die();
		$this->load->view('layouts/header', $data);
		$this->load->view('user/home_project', $data);
		$this->load->view('layouts/footer');
	}
}
