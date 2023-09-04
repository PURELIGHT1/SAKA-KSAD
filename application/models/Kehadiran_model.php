<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kehadiran_model extends CI_Model
{
    private $_absen = 'absen';
    
    public function kehadiran_getAll()
    {
        $query = $this->db->query("SELECT * FROM absen ab
                                    JOIN pertemuan p ON ab.pertemuan = p.id_pertemuan
                                    JOIN tahun_akademik ta ON ab.tahun_akademik = ta.id_tahun_akademik");
        return $query;
    }

    public function kehadiran_getAll2()
    {
        $query = $this->db->query("SELECT a.*, ab.*, p.*
                                    FROM anggota a, absen ab
                                    JOIN pertemuan p ON ab.pertemuan = p.id_pertemuan
                                    JOIN tahun_akademik ta ON ab.tahun_akademik = ta.id_tahun_akademik
                                    WHERE a.npm = ab.npm");
        return $query;
    }
    
    public function kehadiran_getAll3($ta, $pert)
    {
        if (strlen($pert) > 0 && $pert != 'all') {
            return $this->db->query("SELECT a.*, ab.*, p.* FROM anggota a, absen ab 
				JOIN pertemuan p ON ab.pertemuan = p.id_pertemuan
                JOIN tahun_akademik ta ON ab.tahun_akademik = ta.id_tahun_akademik
				WHERE a.npm = ab.npm AND p.id_pertemuan = $pert AND ta.id_tahun_akademik = $ta");
        } else {
            return $this->db->query("SELECT a.*, ab.*, p.* FROM anggota a, absen ab 
				JOIN pertemuan p ON ab.pertemuan = p.id_pertemuan
                JOIN tahun_akademik ta ON ab.tahun_akademik = ta.id_tahun_akademik
				WHERE a.npm = ab.npm AND ta.id_tahun_akademik = $ta");
        }
    }

    public function kehadiran_getAll4($ta, $pert)
    {
        if (strlen($pert) > 0 && $pert != 'all') {
            return $this->db->query("SELECT a.nama as nama, ab.*, p.*, SUM(ab.status_kehadiran = 'Hadir')hadir, SUM(ab.status_kehadiran = 'Izin')izin, SUM(ab.status_kehadiran = 'Alpha')alpha FROM absen ab
                JOIN anggota a ON a.npm = ab.npm
                JOIN pertemuan p ON ab.pertemuan = p.id_pertemuan
                JOIN tahun_akademik ta ON ab.tahun_akademik = ta.id_tahun_akademik
				WHERE a.npm = ab.npm AND p.id_pertemuan = $pert AND ta.id_tahun_akademik = $ta GROUP BY ab.npm");
        } else {
            return $this->db->query("SELECT a.nama as nama, ab.*, p.*, SUM(ab.status_kehadiran = 'Hadir')hadir, SUM(ab.status_kehadiran = 'Izin')izin, SUM(ab.status_kehadiran = 'Alpha')alpha FROM absen ab
                JOIN anggota a ON a.npm = ab.npm
                JOIN pertemuan p ON ab.pertemuan = p.id_pertemuan
                JOIN tahun_akademik ta ON ab.tahun_akademik = ta.id_tahun_akademik
				WHERE a.npm = ab.npm AND ta.id_tahun_akademik = $ta GROUP BY ab.npm");
        }
    }
    
     public function kehadiran_getById($id_kehadiran)
    {
        $query = $this->db->query("SELECT * FROM absen JOIN tahun_akademik ON absen.tahun_akademik = tahun_akademik.id_tahun_akademik JOIN pertemuan ON absen.pertemuan = pertemuan.id_pertemuan where id = $id_kehadiran");
        return $query->row();
        // return $this->db->get_where($this->_absen, ['id' => $id]);
    }
    
    public function kehadiran_filter($ta, $pert)
    {

        return $this->db->query("SELECT a.*, ab.* FROM anggota a, absen ab 
			JOIN pertemuan p ON p.id_pertemuan = ab.pertemuan
			JOIN tahun_akademik ta ON ab.tahun_akademik = ta.id_tahun_akademik
			WHERE ta.id_tahun_akademik = $ta AND p.id_pertemuan =  $pert AND a.npm = ab.npm");
    }

    public function kehadiran_update($id, $table, $data)
    {
        $query = $this->db->where('id', $id);
        $query = $this->db->update($table, $data);
        return $query;
    }

    public function kehadiran_insert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function kehadiran_delete($id, $table)
    {
        $query = $this->db->where('id', $id);
        $query = $this->db->delete($table);
        return $query;
    }
}
