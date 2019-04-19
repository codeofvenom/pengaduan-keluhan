<?php

class Kategori_model extends CI_Model
{
    public function get_all_kategori()
    {
        $query = $this->db->query('select * from kategori');

        return $query;
    }

    public function simpan_kategori($kategori)
    {
        $query = $this->db->query("insert into kategori(nama_kategori) values('$kategori')");

        return $query;
    }

    public function update_kategori($kode, $kategori)
    {
        $query = $this->db->query("update kategori set nama_kategori='$kategori' where id_kategori='$kode'");

        return $query;
    }

    public function hapus_kategori($kode)
    {
        $query = $this->db->query("delete from kategori where id_kategori='$kode'");

        return $query;
    }

    public function get_kategori_byid($id_kategori)
    {
        $query = $this->db->query("select * from kategori where id_kategori='$id_kategori'");

        return $query;
    }
}
