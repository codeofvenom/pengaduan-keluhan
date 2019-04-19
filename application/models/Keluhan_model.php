<?php

class Keluhan_model extends CI_Model
{
    public function unique_code($length = 9)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; ++$i) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public function get_all_keluhan($group)
    {
        $query = $this->db->query("select staff.id_level,keluhan.solusi_sementara,keluhan.masalah,keluhan.signmark_bykepbiro,
		keluhan.id_keluhan,keluhan.status,keluhan.priority,DATE_FORMAT(keluhan.created_on,' %d/%m/%Y  %H:%i:%s' )as tanggal,
		keluhan.judul,staff.nama,groups.nama_group,keluhan.id_staff FROM keluhan JOIN staff ON keluhan.id_staff=staff.id_staff
		JOIN groups ON keluhan.id_group=groups.id_group WHERE keluhan.id_group='$group' AND signmark_bykepbiro='0'
		AND (keluhan.status ='1' or keluhan.status ='2') 
		GROUP BY keluhan.priority DESC,tanggal DESC");

        return $query;
    }

    public function all_staff()
    {
        $query = $this->db->query('SELECT staff.id_staff,staff.nama,staff.id_level,groups.nama_group,level.nama_level
		 from staff JOIN level ON staff.id_level=level.id_level JOIN groups ON staff.id_group = groups.id_group');

        return $query->result();
    }

    public function simpan_keluhan($qkd, $group, $level, $staff, $judul, $solusi, $mslh, $prioritas)
    {
        $query = $this->db->query("INSERT INTO keluhan(id_keluhan,id_group,id_staff,judul,
		solusi_sementara,masalah,status,priority) VALUES ('$qkd','$group','$staff','$judul','$solusi','$mslh','1','$prioritas')");

        return $query;
    }

    public function hapus_keluhan($kode)
    {
        $query = $this->db->query("DELETE FROM keluhan WHERE id_keluhan = '$kode'");

        return $query;
    }

    public function check_group($kode, $group)
    {
        $query = $this->db->query("SELECT * FROM keluhan WHERE id_keluhan='$kode' AND id_group='$group'");

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function detail_keluhan($kode, $group)
    {
        $query = $this->db->query("SELECT keluhan.*,staff.nama,staff.id_level,
		DATE_FORMAT(keluhan.created_on,' %d/%m/%Y  %H:%i:%s' )as tanggal,DATE_FORMAT(keluhan.tgl_proses,' %d/%m/%Y  %H:%i:%s' )as tgl_proses,
		DATE_FORMAT(keluhan.tgl_proses2,' %d/%m/%Y  %H:%i:%s' )as tgl_proses2,
		DATE_FORMAT(keluhan.tgl_selesai,' %d/%m/%Y' )as tgl_selesai 
		FROM keluhan JOIN staff ON keluhan.id_staff=staff.id_staff WHERE keluhan.id_keluhan='$kode' AND keluhan.id_group='$group'");

        return $query;
    }

    public function tolak($kode, $notes)
    {
        $query = $this->db->query("UPDATE keluhan SET signmark_bykepbiro='1',status='0',notes='$notes',tgl_selesai=SYSDATE()
		 WHERE id_keluhan='$kode'");

        return $query;
    }

    public function proses($kode)
    {
        $query = $this->db->query("UPDATE keluhan SET signmark_bykepbiro='1',status='2',tgl_proses2=SYSDATE()
		 WHERE id_keluhan='$kode'");

        return $query;
    }

    public function notes($kode, $notes)
    {
        $query = $this->db->query("UPDATE keluhan SET notes='$notes' WHERE id_keluhan='$kode'");

        return $query;
    }

    public function setuju($kode)
    {
        $query = $this->db->query("UPDATE keluhan SET signmark_bykepbiro='1',tgl_selesai=SYSDATE() WHERE id_keluhan='$kode'");

        return $query;
    }

    public function get_all_keluhan_prosesl($group)
    {
        $query = $this->db->query("select staff.id_level,keluhan.solusi_sementara,keluhan.masalah,
		keluhan.id_keluhan,keluhan.status,keluhan.priority,DATE_FORMAT(keluhan.created_on,' %d/%m/%Y  %H:%i:%s' )as tanggal,
		keluhan.judul,staff.nama,groups.nama_group,keluhan.id_staff FROM keluhan JOIN staff ON keluhan.id_staff=staff.id_staff
		JOIN groups ON keluhan.id_group=groups.id_group WHERE keluhan.id_group='$group' AND signmark_bykepbiro='1'
		AND keluhan.status ='2' 
		GROUP BY keluhan.status ASC,keluhan.priority DESC,tanggal DESC");

        return $query;
    }

    public function get_all_keluhan_selesai($group)
    {
        $query = $this->db->query("select keluhan.status,keluhan.signmark_bykepbiro,staff.id_level,
		keluhan.solusi_sementara,keluhan.masalah,keluhan.id_keluhan,keluhan.status,keluhan.priority,
		DATE_FORMAT(keluhan.created_on,' %d/%m/%Y  %H:%i:%s' )as tanggal,keluhan.notes,
		keluhan.judul,staff.nama,groups.nama_group,keluhan.id_staff FROM keluhan JOIN staff ON keluhan.id_staff=staff.id_staff
		JOIN groups ON keluhan.id_group=groups.id_group WHERE keluhan.id_group='$group' 
		AND (signmark_bykepbiro='1' or signmark_bykepbiro='0' )AND keluhan.status ='3' 
		GROUP BY keluhan.status ASC,keluhan.priority DESC,tanggal DESC");

        return $query;
    }

    public function get_all_keluhan_tolak($group)
    {
        $query = $this->db->query("select keluhan.status,keluhan.signmark_bykepbiro,staff.id_level,keluhan.solusi_sementara,keluhan.masalah,
		keluhan.id_keluhan,keluhan.status,keluhan.priority,DATE_FORMAT(keluhan.created_on,' %d/%m/%Y  %H:%i:%s' )as tanggal,keluhan.notes,
		keluhan.judul,staff.nama,groups.nama_group,keluhan.id_staff FROM keluhan JOIN staff ON keluhan.id_staff=staff.id_staff
		JOIN groups ON keluhan.id_group=groups.id_group WHERE keluhan.id_group='$group' 
		AND signmark_bykepbiro='1' AND keluhan.status ='0' 
		GROUP BY keluhan.priority DESC,tanggal DESC");

        return $query;
    }

    public function get_all_komentar($kode)
    {
        $query = $this->db->query("SELECT komentar.*,DATE_FORMAT(komentar.created_on,' %d/%m/%Y  %H:%i:%s' )as jam_komentar,
		staff.foto,staff.nama,staff.id_level FROM komentar JOIN  staff ON komentar.id_staff = staff.id_staff WHERE komentar.id_keluhan='$kode'
		GROUP BY jam_komentar DESC");

        return $query;
    }

    public function tambah_komentar($staff, $comment, $kode)
    {
        $query = $this->db->query("INSERT INTO komentar(id_staff,komentar,id_keluhan) VALUES 
		('$staff','$comment','$kode')");

        return $query;
    }

    public function hapus_komentar($kode)
    {
        $query = $this->db->query("DELETE FROM komentar WHERE id_komentar = '$kode'");

        return $query;
    }

    public function update_keluhan_kepbiro($kode, $judul, $mslh, $prioritas, $status, $solusi)
    {
        $query = $this->db->query("UPDATE keluhan SET judul='$judul',solusi_sementara='$solusi',masalah='$mslh',status='$status',
		priority='$prioritas',signmark_bykepbiro='1' where id_keluhan='$kode'");

        return $query;
    }

    public function update_keluhan_kepbiro_proses($kode, $judul, $mslh, $prioritas, $status, $solusi)
    {
        $query = $this->db->query("UPDATE keluhan SET judul='$judul',solusi_sementara='$solusi',masalah='$mslh',status='$status',
		priority='$prioritas',tgl_proses2=SYSDATE(),signmark_bykepbiro='1' where id_keluhan='$kode'");

        return $query;
    }

    public function update_keluhan_kepbiro_selesai($kode, $judul, $mslh, $prioritas, $status, $solusi)
    {
        $query = $this->db->query("UPDATE keluhan SET judul='$judul',solusi_sementara='$solusi',masalah='$mslh',status='$status',
		priority='$prioritas',tgl_selesai=SYSDATE(),signmark_bykepbiro='1' where id_keluhan='$kode'");

        return $query;
    }

    public function update_keluhan_staff($kode, $judul, $mslh, $prioritas, $status, $solusi)
    {
        $query = $this->db->query("UPDATE keluhan SET judul='$judul',solusi_sementara='$solusi',masalah='$mslh',status='$status',
		priority='$prioritas',signmark_bykepbiro='0' where id_keluhan='$kode'");

        return $query;
    }

    public function update_keluhan_staff_proses($kode, $judul, $mslh, $prioritas, $status, $solusi)
    {
        $query = $this->db->query("UPDATE keluhan SET judul='$judul',solusi_sementara='$solusi',masalah='$mslh',status='$status',
		priority='$prioritas',tgl_proses=SYSDATE(),signmark_bykepbiro='0' where id_keluhan='$kode'");

        return $query;
    }

    public function update_keluhan_staff_selesai($kode, $judul, $mslh, $prioritas, $status, $solusi)
    {
        $query = $this->db->query("UPDATE keluhan SET judul='$judul',solusi_sementara='$solusi',masalah='$mslh',status='$status',
		priority='$prioritas',tgl_selesai=SYSDATE(),signmark_bykepbiro='0' where id_keluhan='$kode'");

        return $query;
    }

    public function update_keluhan_lanjut_kepbiro($kode, $status)
    {
        $query = $this->db->query("UPDATE keluhan SET status='$status',
		signmark_bykepbiro='1'  where id_keluhan='$kode'");

        return $query;
    }

    public function update_keluhan_lanjut_kepbiro_lanjut($kode, $status)
    {
        $query = $this->db->query("UPDATE keluhan SET status='$status',tgl_proses2=SYSDATE(),
		signmark_bykepbiro='1'  where id_keluhan='$kode'");

        return $query;
    }

    public function update_keluhan_lanjut_kepbiro_selesai($kode, $status)
    {
        $query = $this->db->query("UPDATE keluhan SET status='$status',tgl_selesai=SYSDATE(),
		signmark_bykepbiro='1'  where id_keluhan='$kode'");

        return $query;
    }

    public function update_keluhan_lanjut_staff($kode, $status)
    {
        $query = $this->db->query("UPDATE keluhan SET status='$status',tgl_selesai=NULL,
		signmark_bykepbiro='0'  where id_keluhan='$kode'");

        return $query;
    }

    public function update_keluhan_lanjut_staff_selesai($kode, $status)
    {
        $query = $this->db->query("UPDATE keluhan SET status='$status',tgl_selesai=SYSDATE(),
		signmark_bykepbiro='0'  where id_keluhan='$kode'");

        return $query;
    }
}
