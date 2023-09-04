<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pertemuan_model extends CI_Model
{
    public function pertemuan_getAll()
    {
        $query = $this->db->query("SELECT * FROM pertemuan");
        return $query;
    }

    public function pertemuan_getAll2($kelas)
    {
        if ($kelas == "all") {
            return $this->db->query("SELECT * FROM pertemuan");
        } else {
            return $this->db->query("SELECT * FROM pertemuan WHERE kelas = '$kelas'");
        }
    }
    
    public function pertemuan_getAll3($kelas)
    {
        if ($kelas == "all") {
            return $this->db->query("SELECT * FROM pertemuan WHERE status_pertemuan = 1");
        } else {
            return $this->db->query("SELECT * FROM pertemuan WHERE kelas = '$kelas' AND status_pertemuan = 1");
        }
    }


    public function getPertemuan()
    {
        return $this->db->query("SELECT * FROM pertemuan ORDER BY id_pertemuan DESC LIMIT 100")->result();
    }
    
    public function getTanggal()
    {
        $tgl = date("Y-m-d");
        return $this->db->query("SELECT tanggal_pertemuan, open, closed FROM pertemuan WHERE tanggal_pertemuan = '$tgl' AND status_pertemuan = 1")->result();
    }

    public function pertemuan_getById($id_pertemuan)
    {
        $query = $this->db->query("SELECT * FROM pertemuan where id_pertemuan = $id_pertemuan");
        return $query->row();
    }

    public function pertemuan_insert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function pertemuan_update($id, $table, $data)
    {
        $query = $this->db->where('id_pertemuan', $id);
        $query = $this->db->update($table, $data);
        return $query;
    }

    public function pertemuan_delete($table, $id)
    {
        $query = $this->db->where('id_pertemuan', $id);
        $query = $this->db->delete($table);
        return $query;
    }
}
