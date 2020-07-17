<?php

class User_model extends CI_Model
{
	public $table = 'user';
	public $primary = 'id_user';

	public function get($id = null){
		if ($id == null){
			return $this->db->select('*')
				->from($this->table)
				->join('karyawan as kar','kar.nik=user.username')
				->get()->result();
		}else{
			return $this->db->select('*')
				->from($this->table)
				->join('karyawan as kar','kar.nik=user.username')
				->where($this->primary, $id)
				->get()->result();
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
}
