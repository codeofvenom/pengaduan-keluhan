<?php

class Group_model extends CI_Model
{
    public function get_all_group()
    {
        $query = $this->db->query('SELECT * FROM groups');

        return $query;
    }

    public function simpan_group($group)
    {
        $query = $this->db->query("insert into groups(nama_group) values('$group')");

        return $query;
    }

    public function update_group($kode, $group)
    {
        $query = $this->db->query("update groups set nama_group='$group' where id_group='$kode'");

        return $query;
    }

    public function hapus_group($kode)
    {
        $query = $this->db->query("delete from groups where id_group='$kode'");

        return $query;
    }

    public function get_group_byid($id_group)
    {
        $query = $this->db->query("select * from groups where id_group='$id_group'");

        return $query;
    }
}
