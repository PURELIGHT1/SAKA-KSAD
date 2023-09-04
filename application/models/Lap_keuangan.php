<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Lap_keuangan extends CI_Model
{
	private $_tbl_keuangan = 'keuangan';
	private $_tbl_jenis_keuangan = 'jenis_keuangan';

	public function listKeuangan($ta)
	{
		return $this->db->query("SELECT k.*,jk.nama_jenis_keuangan, ta.tahun_akademik as nama_ta FROM keuangan k JOIN jenis_keuangan jk ON jk.id_jenis_keuangan = k.jenis_keuangan JOIN tahun_akademik ta ON ta.id_tahun_akademik = k.tahun_akademik WHERE ta.id_tahun_akademik = $ta and k.isdeleted = 0");
	}

	public function listKeuangan_byid($id)
	{
		// $query = $this->db->query("SELECT k.*,jk.nama_jenis_keuangan FROM keuangan k JOIN jenis_keuangan jk ON jk.id_jenis_keuangan = k.jenis_keuangan WHERE id_keuangan = $id");
		// return $query->row();
		return $this->db->get_where($this->_tbl_keuangan, ['id_keuangan' => $id])->row();
	}

	public function listJenisKeuangan()
	{
		return $this->db->order_by('nama_jenis_keuangan','asc')->get_where($this->_tbl_jenis_keuangan)->result();

		// return $this->db->get($this->_tbl_jenis_keuangan)->result();
	}

	public function insertKeuangan($table, $data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function updateKeuangan($id, $table, $data)
	{
		$query = $this->db->where('id_keuangan', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function deleteKeuangan($id)
	{
		$this->db->where('id_keuangan', $id);
		if($this->db->delete($this->_tbl_keuangan))
			return true;
		return false;
	}
	
	public function GetKeuntungan()
	{
		return $this->db->query("SELECT (SELECT SUM(k.uang_kas) + SUM(p.uang_pangkal))total FROM anggota a JOIN kas k ON k.id_kas = a.kas JOIN pangkal p ON p.id_pangkal = a.pangkal WHERE a.ket_uang = 1 AND a.status = 1 ")->result();
	}
	
	public function GetTotalKeuntungan()
	{
		return $this->db->query("SELECT (SELECT SUM(k.jumlah) FROM keuangan k WHERE k.jenis_keuangan=1)total FROM keuangan k")->row();
	}

	public function GetTotalPengeluaran()
	{
		return $this->db->query("SELECT (SELECT SUM(k.jumlah) FROM keuangan k WHERE k.jenis_keuangan=2)total FROM keuangan k")->row();
	}

	public function GetJumlahPendapatan()
	{
		return $this->db->query("SELECT SUM(k.jumlah) as jlh, jk.nama_jenis_keuangan as keuangan , ta.tahun_akademik as ta FROM keuangan k JOIN tahun_akademik ta ON k.tahun_akademik = ta.id_tahun_akademik JOIN jenis_keuangan jk ON k.jenis_keuangan = jk.id_jenis_keuangan where k.jenis_keuangan = '1' and k.isdeleted = '0' GROUP BY k.tahun_akademik ASC;");
	}

	public function GetJumlahPengeluaran()
	{
		return $this->db->query("SELECT SUM(k.jumlah) as jlh, jk.nama_jenis_keuangan as keuangan , ta.tahun_akademik as ta FROM keuangan k JOIN tahun_akademik ta ON k.tahun_akademik = ta.id_tahun_akademik JOIN jenis_keuangan jk ON k.jenis_keuangan = jk.id_jenis_keuangan where k.jenis_keuangan = '2' and k.isdeleted = '0' GROUP BY k.tahun_akademik ASC;");
	}
}
?>