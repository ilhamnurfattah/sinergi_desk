<?php


class Ticket_model extends CI_Model
{
	public $table = 'ticket';
	public $primary = 'id_ticket';

	public function get($id = null){
		if ($id == null){
			$sub = $this->db->select('id_ticket,defact_category, prioriti, nama_modul, nama_project, kar.nama as pelapor, id_dev, tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, tic.status,progress')
				->from("$this->table as tic")
				->join('karyawan as kar','kar.nik=tic.reported')
				->join('project','project.id_project=tic.project_id')
				->join('modul','modul.id_modul=tic.modul_id')
				->get_compiled_select();
			return $this->db->select('id_ticket,defact_category, prioriti,  nama_modul, nama_project,pelapor,tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, m.status,progress, m.id_dev, nama as developer')
				->from("($sub) as m")
				->join('developer as dev','dev.id_dev=m.id_dev','left')
				->join('karyawan as kar','kar.nik=dev.nik','left')
				->get()->result();
		}else{
			$sub = $this->db->select('id_ticket,defact_category, prioriti, nama_modul, nama_project, kar.nama as pelapor, id_dev, tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, tic.status,progress')
				->from("$this->table as tic")
				->join('karyawan as kar','kar.nik=tic.reported')
				->join('project','project.id_project=tic.project_id')
				->join('modul','modul.id_modul=tic.modul_id')
				->where($this->primary, $id)
				->get_compiled_select();
			return $this->db->select('id_ticket,defact_category, prioriti,  nama_modul, nama_project,pelapor,tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, m.status,progress, m.id_dev, nama as developer')
				->from("($sub) as m")
				->join('developer as dev','dev.id_dev=m.id_dev','left')
				->join('karyawan as kar','kar.nik=dev.nik','left')
				->get()->row_object();
		}
	}

	public function get_aproval($id = null){
	if ($id == null){
		$sub = $this->db->select('id_ticket,defact_category, prioriti, nama_modul, nama_project, kar.nama as pelapor, id_dev, tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, tic.status,progress')
			->from("$this->table as tic")
			->join('karyawan as kar','kar.nik=tic.reported')
			->join('project','project.id_project=tic.project_id')
			->join('modul','modul.id_modul=tic.modul_id')
			->get_compiled_select();
		return $this->db->select('id_ticket,defact_category, prioriti,  nama_modul, nama_project,pelapor,tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, m.status,progress, m.id_dev, nama as developer')
			->from("($sub) as m")
			->join('developer as dev','dev.id_dev=m.id_dev','left')
			->join('karyawan as kar','kar.nik=dev.nik','left')
			->where('m.id_dev', null)
			->get()->result();
	}else{
		$sub = $this->db->select('id_ticket,defact_category, prioriti, nama_modul, nama_project, kar.nama as pelapor, id_dev, tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, tic.status,progress')
			->from("$this->table as tic")
			->join('karyawan as kar','kar.nik=tic.reported')
			->join('project','project.id_project=tic.project_id')
			->join('modul','modul.id_modul=tic.modul_id')
			->where($this->primary, $id)
			->get_compiled_select();
		return $this->db->select('id_ticket,defact_category, prioriti,  nama_modul, nama_project,pelapor,tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, m.status,progress, m.id_dev, nama as developer')
			->from("($sub) as m")
			->join('developer as dev','dev.id_dev=m.id_dev','left')
			->join('karyawan as kar','kar.nik=dev.nik','left')
			->where('m.id_dev', null)
			->get()->row_object();
	}
}

	public function get_assignements($id = null){
		if ($id == null){
			$sub = $this->db->select('id_ticket,defact_category, prioriti, nama_modul, nama_project, kar.nama as pelapor, id_dev, tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, tic.status,progress')
				->from("$this->table as tic")
				->join('karyawan as kar','kar.nik=tic.reported')
				->join('project','project.id_project=tic.project_id')
				->join('modul','modul.id_modul=tic.modul_id')
				->get_compiled_select();
			return $this->db->select('id_ticket,defact_category, prioriti,  nama_modul, nama_project,pelapor,tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, m.status,progress, m.id_dev, nama as developer')
				->from("($sub) as m")
				->join('developer as dev','dev.id_dev=m.id_dev')
				->join('karyawan as kar','kar.nik=dev.nik')
				->get()->result();
		}else{
			$sub = $this->db->select('id_ticket,defact_category, prioriti, nama_modul, nama_project, kar.nama as pelapor, id_dev, tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, tic.status,progress')
				->from("$this->table as tic")
				->join('karyawan as kar','kar.nik=tic.reported')
				->join('project','project.id_project=tic.project_id')
				->join('modul','modul.id_modul=tic.modul_id')
				->where($this->primary, $id)
				->get_compiled_select();
			return $this->db->select('id_ticket,defact_category, prioriti,  nama_modul, nama_project,pelapor,tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, m.status,progress, m.id_dev, nama as developer')
				->from("($sub) as m")
				->join('developer as dev','dev.id_dev=m.id_dev')
				->join('karyawan as kar','kar.nik=dev.nik')
				->get()->row_object();
		}
	}

	public function store($data){
		return $this->db->insert($this->table, $data);
	}

	public function update($id, $data){
		return $this->db->where($this->primary, $id)->update($this->table,$data);
	}

	public function delete($id){
		return $this->db->where($this->primary, $id)->delete($this->table);
	}

	public function my_ticket($nik){
		$sub = $this->db->select('id_ticket,defact_category, prioriti, nama_modul, nama_project, kar.nama as pelapor, id_dev, tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, tic.status,progress')
			->from("$this->table as tic")
			->join('karyawan as kar','kar.nik=tic.reported')
			->join('project','project.id_project=tic.project_id')
			->join('modul','modul.id_modul=tic.modul_id')
			->where('reported', $nik)
			->get_compiled_select();
		return $this->db->select('id_ticket,defact_category, prioriti,  nama_modul, nama_project,pelapor,tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, m.status,progress, m.id_dev, nama as developer')
			->from("($sub) as m")
			->join('developer as dev','dev.id_dev=m.id_dev','left')
			->join('karyawan as kar','kar.nik=dev.nik','left')
			->get()->result();
	}

	public function my_assignements($nik){
		$sub = $this->db->select('id_ticket,defact_category, prioriti, nama_modul, nama_project, kar.nama as pelapor, id_dev, tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, tic.status,progress')
			->from("$this->table as tic")
			->join('karyawan as kar','kar.nik=tic.reported')
			->join('project','project.id_project=tic.project_id')
			->join('modul','modul.id_modul=tic.modul_id')
			->get_compiled_select();
		return $this->db->select('id_ticket,defact_category, prioriti,  nama_modul, nama_project,pelapor,tanggal, tanggal_proses, tanggal_solved, problem_summary, problem_detail, m.status,progress, m.id_dev, nama as developer')
			->from("($sub) as m")
			->join('developer as dev','dev.id_dev=m.id_dev')
			->join('karyawan as kar','kar.nik=dev.nik')
			->where('dev.nik', $nik)
			->get()->result();

	}
}
