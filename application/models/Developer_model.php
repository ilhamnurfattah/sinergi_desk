<?php


class Developer_model extends CI_Model
{
	public $table = 'developer';
	public $primary = 'id_dev';

	public function get($id = null){
		if ($id == null){
			return $this->db->select('*,dev.id_dev')
				->from("$this->table as dev")
				->join('karyawan as kar','kar.nik=dev.nik')
				->join('kategori as kat','kat.id_kategori=dev.id_kategori')
				->group_by('dev.id_dev')
				->get($this->table)->result();
		}else{
			return $this->db->select('*,dev.id_dev')
				->from("$this->table as dev")
				->join('karyawan as kar','kar.nik=dev.nik')
				->join('kategori as kat','kat.id_kategori=dev.id_kategori')
				->where($this->primary,$id)
				->group_by('dev.id_dev')
				->get($this->table)->row_object();
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
