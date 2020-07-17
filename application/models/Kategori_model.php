<?php


class Kategori_model extends CI_Model
{
	public $table = 'kategori';
	public $primary = 'id_kategori';

	public function get($id = null){
		if ($id == null){
			return $this->db->get($this->table)->result();
		}else{
			return $this->db->where($this->primary, $id)->get($this->table)->row_object();
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
