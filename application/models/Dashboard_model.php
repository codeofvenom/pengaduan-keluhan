<?php

class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function check_block_ip()
    {
        $this->db->where('IP', $_SERVER['REMOTE_ADDR']);
        $query = $this->db->get('ip_block');
        if ($query->num_rows() == 0) {
            return false;
        }

        return true;
    }

    public function get_login_now($id_admin)
    {
        $query = $this->db->query("SELECT * FROM admin WHERE id_admin = '$id_admin'");

        return $query;
    }

    public function get_login_stnow($id_staff)
    {
        $query = $this->db->query("SELECT * FROM staff WHERE id_staff = '$id_staff'");

        return $query;
    }

    public function get_foto_admku($adm)
    {
        $query = $this->db->query("SELECT foto FROM admin WHERE id_admin='$adm'");

        return $query;
    }

    public function get_username_admku($adm)
    {
        $query = $this->db->query("SELECT username FROM admin WHERE id_admin='$adm'");

        return $query;
    }

    public function get_count_all()
    {
        $query = $this->db->query('SELECT(SELECT COUNT(id_staff) FROM staff)+ 
		(SELECT COUNT(id_admin)FROM admin ) AS jumlah LIMIT 1');

        return $query->row()->jumlah;
    }

    public function get_count_admin()
    {
        $query = $this->db->query('SELECT COUNT(id_admin) AS jumlah FROM admin LIMIT 1');

        return $query->row()->jumlah;
    }

    public function get_count_staff()
    {
        $query = $this->db->query("SELECT COUNT(id_staff) AS jumlah FROM staff WHERE id_level ='3' LIMIT 1");

        return $query->row()->jumlah;
    }

    public function get_count_kepbiro()
    {
        $query = $this->db->query("SELECT COUNT(id_staff) AS jumlah FROM staff WHERE id_level ='2' LIMIT 1");

        return $query->row()->jumlah;
    }

    public function get_online()
    {
        $query = $this->db->query('SELECT(SELECT COUNT(id_staff) FROM staff WHERE online = 1)+ 
		(SELECT COUNT(admin.id_admin)FROM admin WHERE online = 1 ) AS online');

        return $query->row()->online;
    }

    public function get_all_ip()
    {
        $query = $this->db->query("SELECT ip_block.*,DATE_FORMAT(tanggal_mulai,'<b>&nbsp;%d/%m/%Y</b>') AS tanggal_mulai FROM ip_block");

        return $query;
    }

    public function is_ip_available($xip)
    {
        $this->db->where('IP', $xip);
        $query = $this->db->get('ip_block');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function simpan_ip($ip, $alasan, $cp, $otmc)
    {
        $query = $this->db->query("INSERT INTO ip_block(IP,alasan,CP,automatic) VALUES ('$ip', '$alasan','$cp','$otmc')");

        return $query;
    }

    public function update_ip($kode, $ip, $alasan, $cp, $otmc)
    {
        $query = $this->db->query("UPDATE ip_block SET IP='$ip',alasan='$alasan',CP='$cp',automatic='$otmc' WHERE id_ip_block='$kode'");

        return $query;
    }

    public function hapus_ip($kode)
    {
        $query = $this->db->query("DELETE  FROM ip_block WHERE id_ip_block='$kode' ");

        return $query;
    }

    public function log_admin()
    {
        $query = $this->db->query("SELECT username,foto,active,DATE_FORMAT(last_login,'<b> %d/%m/%Y </b><br>&nbsp;&nbsp;&nbsp;
		%H:%i:%s') AS last_login,visitor.browser,visitor.IP,visitor.kunjungan,DATE_FORMAT(visitor.tanggal_visit,'<b> %d/%m/%Y </b><br>&nbsp;&nbsp;&nbsp;
		%H:%i:%s') AS tanggal_visit,DATE_FORMAT(visitor.tanggal_visit_2,'<b> %d/%m/%Y </b><br>&nbsp;&nbsp;&nbsp;
		%H:%i:%s') AS tanggal_visit_2 FROM admin JOIN visitor ON admin.id_level=visitor.id_level AND
		admin.username = visitor.id_login INNER JOIN level ON admin.id_level=level.id_level");

        return $query;
    }

    public function log_staff()
    {
        $query = $this->db->query("SELECT nama,foto,active,DATE_FORMAT(last_login,'<b> %d/%m/%Y </b><br>&nbsp;&nbsp;&nbsp;
		%H:%i:%s') AS last_login,visitor.browser,level.nama_level,visitor.IP,visitor.kunjungan,DATE_FORMAT(visitor.tanggal_visit,'<b> %d/%m/%Y </b><br>&nbsp;&nbsp;&nbsp;
		%H:%i:%s') AS tanggal_visit,DATE_FORMAT(visitor.tanggal_visit_2,'<b> %d/%m/%Y </b><br>&nbsp;&nbsp;&nbsp;
		%H:%i:%s') AS tanggal_visit_2 FROM staff JOIN visitor ON staff.id_level=visitor.id_level AND
		staff.nis = visitor.id_login INNER JOIN level ON staff.id_level=level.id_level");

        return $query;
    }
}
