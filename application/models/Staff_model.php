<?php

class Staff_model extends CI_Model
{
    public function get_all_staff()
    {
        $query = $this->db->query("SELECT staff.*,DATE_FORMAT(created_on,'<b>&nbsp; %d/%m/%Y </b><br>&nbsp;&nbsp;&nbsp;
		%H:%i:%s') AS created_on,DATE_FORMAT(last_login,'<b> %d/%m/%Y </b><br>&nbsp;&nbsp;&nbsp;
		%H:%i:%s') AS last_login,level.nama_level,groups.nama_group FROM staff JOIN level 
		ON staff.id_level=level.id_level JOIN groups ON staff.id_group = groups.id_group");

        return $query;
    }

    public function get_profilku($stf)
    {
        $query = $this->db->query("SELECT * FROM staff WHERE id_staff='$stf'");

        return $query;
    }

    public function update_staffku_tanpa_pass($kode, $nama, $gambar)
    {
        $hsl = $this->db->query("UPDATE staff set nama='$nama',
		foto='$gambar' where id_staff='$kode'");

        return $hsl;
    }

    public function update_staffku($kode, $nama, $password, $gambar)
    {
        $hsl = $this->db->query("UPDATE staff set nama='$nama',
		password='$password',foto='$gambar' where id_staff='$kode'");

        return $hsl;
    }

    public function update_staffku_tanpa_pass_gambar($kode, $nama)
    {
        $hsl = $this->db->query("UPDATE staff set nama='$nama' where id_staff='$kode'");

        return $hsl;
    }

    public function update_staffku_tanpa_gambar($kode, $nama, $password)
    {
        $hsl = $this->db->query("UPDATE staff set nama='$nama',password='$password' where id_staff='$kode'");

        return $hsl;
    }

    public function is_nis_available($xnis)
    {
        $this->db->where('nis', $xnis);
        $query = $this->db->get('staff');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function simpan_staff($nis, $nama, $jk, $password, $group, $level, $status, $gambar, $creator)
    {
        $hsl = $this->db->query("INSERT INTO staff(id_level,id_group,nis,nama,gender,password,foto,created_by,active) VALUES ('$level','$group','$nis','$nama','$jk',SHA1('$password'),'$gambar','$creator','$status')");

        return $hsl;
    }

    public function simpan_staff_tanpa_gambar($nis, $nama, $jk, $password, $group, $level, $status, $creator)
    {
        $hsl = $this->db->query("INSERT INTO staff(id_level,id_group,nis,nama,gender,password,created_by,active) VALUES ('$level','$group','$nis','$nama','$jk',SHA1('$password'),'$creator','$status')");

        return $hsl;
    }

    public function get_staff_login($kode)
    {
        $hsl = $this->db->query("SELECT * FROM staff where id_staff='$kode'");

        return $hsl;
    }

    public function hapus_staff($kode)
    {
        $hsl = $this->db->query("DELETE FROM staff where id_staff='$kode'");

        return $hsl;
    }

    public function update_staff_tanpa_pass($kode, $nis, $nama, $jk, $password, $group, $level, $status, $gambar)
    {
        $hsl = $this->db->query("UPDATE staff set nis='$nis',nama='$nama',gender='$jk',
		id_group='$group',id_level='$level',foto='$gambar',active='$status' where id_staff='$kode'");

        return $hsl;
    }

    public function update_staff($kode, $nis, $nama, $jk, $password, $group, $level, $status, $gambar)
    {
        $hsl = $this->db->query("UPDATE staff set nis='$nis',nama='$nama',gender='$jk',
		password='$password',id_group='$group',id_level='$level',foto='$gambar',active='$status' where id_staff='$kode'");

        return $hsl;
    }

    public function update_staff_tanpa_pass_gambar($kode, $nis, $nama, $jk, $group, $level, $status)
    {
        $hsl = $this->db->query("UPDATE staff set nis='$nis',nama='$nama',gender='$jk',
		id_group='$group',id_level='$level',active='$status' where id_staff='$kode'");

        return $hsl;
    }

    public function update_staff_tanpa_gambar($kode, $nis, $nama, $jk, $password, $group, $level, $status)
    {
        $hsl = $this->db->query("UPDATE staff set nis='$nis',nama='$nama',gender='$jk',
		password='$password',id_group='$group',id_level='$level',active='$status' where id_staff='$kode'");

        return $hsl;
    }

    public function update_profil_gambar($kode, $nis, $email, $status, $gambar)
    {
        $hsl = $this->db->query("UPDATE staff set nis='$nis',email='$email',
		foto='$gambar',active='$status' where id_staff='$kode'");

        return $hsl;
    }

    public function update_profil($kode, $nis, $email, $status)
    {
        $hsl = $this->db->query("UPDATE staff set nis='$nis',email='$email',active='$status' where id_staff='$kode'");

        return $hsl;
    }
}
