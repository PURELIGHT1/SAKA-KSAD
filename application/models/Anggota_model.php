<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
	public function anggota_getAll($ta, $status = null)
	{
		if(strlen($status) > 0 && $status != 'all') {
			return $this->db->query("SELECT * FROM anggota 
				JOIN prodi ON anggota.prodi = prodi.id_prodi 
				JOIN status ON anggota.status = status.id_status 
				JOIN tahun_akademik ta ON anggota.tahun_akademik = ta.id_tahun_akademik
				WHERE status.id_status = $status AND ta.id_tahun_akademik = $ta ORDER BY anggota.nama ASC");
		}else{
			return $this->db->query("SELECT * FROM anggota 
				JOIN prodi ON anggota.prodi = prodi.id_prodi 
				JOIN status ON anggota.status = status.id_status 
				JOIN tahun_akademik ta ON anggota.tahun_akademik = ta.id_tahun_akademik
				WHERE ta.id_tahun_akademik = $ta ORDER BY anggota.nama ASC");
		}
	}
	
		public function anggota_getAll3($ta, $status = null)
	{
		if(strlen($status) > 0 && $status != 'all') {
			return $this->db->query("SELECT * FROM anggota 
				JOIN prodi ON anggota.prodi = prodi.id_prodi 
				JOIN status ON anggota.status = status.id_status 
				JOIN tahun_akademik ta ON anggota.tahun_akademik = ta.id_tahun_akademik
				JOIN pangkal p ON anggota.pangkal = p.id_pangkal
				JOIN kas k ON anggota.kas = k.id_kas
				JOIN ket_uang ku ON anggota.ket_uang = ku.id_ket_uang
				WHERE status.id_status = $status AND ta.id_tahun_akademik = $ta ORDER BY anggota.nama ASC");
		}else{
			return $this->db->query("SELECT * FROM anggota 
				JOIN prodi ON anggota.prodi = prodi.id_prodi 
				JOIN status ON anggota.status = status.id_status 
				JOIN tahun_akademik ta ON anggota.tahun_akademik = ta.id_tahun_akademik
				JOIN pangkal p ON anggota.pangkal = p.id_pangkal
				JOIN kas k ON anggota.kas = k.id_kas
				JOIN ket_uang ku ON anggota.ket_uang = ku.id_ket_uang
				WHERE ta.id_tahun_akademik = $ta ORDER BY anggota.nama ASC");
		}
	}
	
	public function anggota_getAll2($ta, $status = null)
	{
		if (strlen($status) > 0 && $status != 'all') {
			return $this->db->query("SELECT * FROM anggota 
				JOIN prodi ON anggota.prodi = prodi.id_prodi 
				JOIN status ON anggota.status = status.id_status 
				JOIN tahun_akademik ta ON anggota.tahun_akademik = ta.id_tahun_akademik
				WHERE status.id_status = $status AND ta.id_tahun_akademik = $ta AND anggota.pengurus = 'Tentor' ORDER BY anggota.nama ASC");
		} else {
			return $this->db->query("SELECT * FROM anggota 
				JOIN prodi ON anggota.prodi = prodi.id_prodi 
				JOIN status ON anggota.status = status.id_status 
				JOIN tahun_akademik ta ON anggota.tahun_akademik = ta.id_tahun_akademik
				WHERE ta.id_tahun_akademik = $ta AND anggota.pengurus = 'Tentor' ORDER BY anggota.nama ASC");
		}
	}

	public function anggota_aktif($ta)
	{
		return $this->db->query("SELECT COUNT(id_anggota) AS anggota_aktif FROM anggota JOIN tahun_akademik ta ON anggota.tahun_akademik = ta.id_tahun_akademik WHERE status = 1 AND ta.id_tahun_akademik = $ta")->row_array();
	}

	public function anggota_pasif()
	{
		return $this->db->query('SELECT COUNT(id_anggota) AS anggota_pasif FROM anggota WHERE status = 0')->row_array();
	}

	public function anggota_baru($ta)
	{
		return $this->db->query("SELECT COUNT(id_anggota) AS anggota_aktif FROM anggota JOIN tahun_akademik ta ON anggota.tahun_akademik = ta.id_tahun_akademik WHERE ta.id_tahun_akademik = $ta")->row_array();
	}

	// public function chart_anggota()
	// {
	// 	return $this->db->query("SELECT k.*,COUNT(k.tahun_akademik) AS total FROM anggota a JOIN tahun_akademik k ON a.`tahun_akademik`=k.`id_tahun_akademik` GROUP BY tahun_akademik")->result();
	// }

	public function total_anggota()
	{
		return $this->db->query("SELECT COUNT(*) as total_anggota FROM 
			(SELECT COUNT(id_anggota) AS jumlah FROM anggota GROUP BY npm) total")->row_array();
	}

	public function anggota_getById($id)
	{
		$query = $this->db->query("SELECT * FROM anggota JOIN prodi ON anggota.prodi = prodi.id_prodi JOIN status ON anggota.status = status.id_status where id_anggota = $id");
		return $query->row();
	}
	
	public function anggota_getById2($id)
	{
		$query = $this->db->query("SELECT * FROM anggota JOIN prodi ON anggota.prodi = prodi.id_prodi JOIN status ON anggota.status = status.id_status JOIN kas ON anggota.kas = kas.id_kas JOIN pangkal ON anggota.pangkal = pangkal.id_pangkal JOIN ket_uang ON anggota.ket_uang = ket_uang.id_ket_uang where id_anggota = $id");
		return $query->row();
	}

	public function anggota_insert($table, $data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function anggota_update ($id, $table, $data)
	{
		$query = $this->db->where('id_anggota', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}
	
	public function hapus_anggota($table, $id_anggota)
	{
		$query = $this->db->where('id_anggota',$id_anggota);
		$query = $this->db->delete($table);
		return $query;
	}
}

?>