<?php


class Tracking_model extends CI_Model
{
	public $table = 'tracking';
	public $primary = 'id_tracking';

	public function get($id = null){
		return $this->db->select('*')
			->from('tracking as trac')
			->join('karyawan as kar','kar.nik=trac.id_user')
			->where('id_ticket', $id)
			->order_by('trac.tanggal','ASC')
			->get()->result();
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
}
