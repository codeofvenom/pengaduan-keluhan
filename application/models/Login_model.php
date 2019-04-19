<?php

class Login_model extends CI_Model
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

    public function count_visitor($id_login, $level)
    {
        $user_ip = $_SERVER['REMOTE_ADDR'];
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Other';
        }
        $cek_ip = $this->db->query("SELECT * FROM visitor WHERE IP='$user_ip' AND browser='$agent' AND id_login='$id_login'");
        if ($cek_ip->num_rows() <= 0) {
            $hsl = $this->db->query("INSERT INTO visitor (IP,browser,id_login,kunjungan,id_level) VALUES('$user_ip','$agent','$id_login',1,'$level')");
        } else {
            $hsl = $this->db->query("UPDATE visitor SET kunjungan= kunjungan+1,tanggal_visit_2=SYSDATE() WHERE IP ='$user_ip' AND id_login='$id_login' AND browser='$agent'");
        }

        return $cek_ip;
    }

    public function auth_admin($username, $password)
    {
        $query = $this->db->query("SELECT * FROM admin WHERE (username=? or email=?)
		AND password=SHA1(?) LIMIT 1", array('username' => $username, 'email' => $username, 'password' => $password));

        return $query;
    }

    public function auth_staff($username, $password)
    {
        $query = $this->db->query("SELECT * FROM staff WHERE (nis=?)
		 AND password=SHA1(?) LIMIT 1", array('nis' => $username, 'password' => $password));

        return $query;
    }

    public function cek_active_admin($id, $level)
    {
        $query = $this->db->query("SELECT id_admin,id_level FROM admin  WHERE id_admin='$id' AND id_level='$level' LIMIT 1");

        return $query;
    }

    public function cek_active_staff($id, $level)
    {
        $query = $this->db->query("SELECT id_staff,id_level FROM staff  WHERE id_staff='$id' AND id_level='$level' LIMIT 1");

        return $query;
    }

    public function logoutku($id, $level, $ip)
    {
        $cek_active_admin = $this->db->query("SELECT id_admin,id_level FROM admin  WHERE id_admin='$id' AND id_level='$level' LIMIT 1");
        if ($cek_active_admin->num_rows() <= 0) {
            $query = $this->db->query("UPDATE staff SET online='0',last_login=SYSDATE(),IP='$ip' WHERE id_staff='$id' AND id_level='$level' LIMIT 1");
        } else {
            $query = $this->db->query("UPDATE admin SET online='0',last_login=SYSDATE(),IP='$ip' WHERE id_admin='$id' AND id_level='$level' LIMIT 1");
        }

        return $cek_active_admin;
    }

    public function logout_blokir($id, $level, $ip)
    {
        $cek_active_admin = $this->db->query("SELECT id_admin,id_level FROM admin  WHERE id_admin='$id' AND id_level='$level' LIMIT 1");
        if ($cek_active_admin->num_rows() <= 0) {
            $query = $this->db->query("UPDATE staff SET online='0',active='0',last_login=SYSDATE(),IP='$ip' WHERE id_staff='$id' AND id_level='$level' LIMIT 1");
        } else {
            $query = $this->db->query("UPDATE admin SET online='0',active='0',last_login=SYSDATE(),IP='$ip' WHERE id_admin='$id' AND id_level='$level' LIMIT 1");
        }

        return $cek_active_admin;
    }

    public function admin_online($id, $email, $ip)
    {
        $query = $this->db->query("UPDATE admin SET online ='1',IP='$ip' WHERE (id_admin='$id' AND email='$email')");

        return $query;
    }

    public function staff_online($id, $nis, $ip)
    {
        $query = $this->db->query("UPDATE staff SET online ='1',IP='$ip' WHERE (id_staff='$id' AND nis='$nis')");

        return $query;
    }

    public function get_block($ip)
    {
        $query = $this->db->query("SELECT alasan,DATE_FORMAT(tanggal_mulai,'<b> %d/%m/%Y&nbsp;
		%H:%i:%s</b><br>') AS tanggal_mulai,CP FROM ip_block WHERE IP ='$ip'");

        return $query;
    }
}
