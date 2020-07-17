<?php


class Karyawan_model extends CI_Model
{
	public $table = 'karyawan';
	public $primary = 'nik';

	public function get($id=null){
		if ($id == null){
			return $this->db->select('*')
				->from("$this->table as kar")
				->join('departemen as dep','kar.id_dept=dep.id_dept')
				->join('posisi as pos','kar.id_posisi=pos.id_posisi')
				->get()->result();
		}else{
			return $this->db->select('*')
				->from("$this->table as kar")
				->join('departemen as dep','kar.id_dept=dep.id_dept')
				->join('posisi as pos','kar.id_posisi=pos.id_posisi')
				->where($this->primary, $id)
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

}
