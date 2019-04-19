<?php

class Admin_model extends CI_Model
{
    public function get_profilku($adm)
    {
        $query = $this->db->query("SELECT admin.* FROM admin INNER JOIN level ON admin.id_level=level.id_level WHERE id_admin='$adm'");

        return $query;
    }

    public function get_admin_login($kode)
    {
        $hsl = $this->db->query("SELECT * FROM admin where id_admin='$kode'");

        return $hsl;
    }

    public function update_admin_tanpa_pass($kode, $username, $email, $status, $gambar)
    {
        $hsl = $this->db->query("UPDATE admin set username='$username',email='$email',
		foto='$gambar',active='$status' where id_admin='$kode'");

        return $hsl;
    }

    public function update_admin($kode, $username, $email, $password, $status, $gambar)
    {
        $hsl = $this->db->query("UPDATE admin set username='$username',email='$email',
		password=SHA1('$password'),foto='$gambar',active='$status' where id_admin='$kode'");

        return $hsl;
    }

    public function update_admin_tanpa_pass_gambar($kode, $username, $email, $status)
    {
        $hsl = $this->db->query("UPDATE admin set username='$username',email='$email',active='$status' where id_admin='$kode'");

        return $hsl;
    }

    public function update_admin_tanpa_gambar($kode, $username, $email, $password, $status)
    {
        $hsl = $this->db->query("UPDATE admin set username='$username',email='$email',password=SHA1('$password'),active='$status' where id_admin='$kode'");

        return $hsl;
    }
}
