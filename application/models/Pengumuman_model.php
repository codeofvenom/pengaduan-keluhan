<?php

class Pengumuman_model extends CI_Model
{
    public function unique_code()
    {
        $query = $this->db->query('select max(id_pengumuman) as max_code FROM pengumuman');

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 9, 4);

        $max_pngmn = $max_fix + 1;

        $tanggal = $time = date('d');
        $bulan = $time = date('m');
        $tahun = $time = date('Y');
        $fav = mt_rand(100, 931) + (13 * (mt_rand(3, 7) - 26));
        $kd = 'PNGMN'.$fav.$tahun.$bulan.$tanggal.sprintf('%04s', $max_pngmn);

        return $kd;
    }

    public function get_all_pengumuman()
    {
        $query = $this->db->query("SELECT pengumuman.id_pengumuman,pengumuman.judul,kategori.nama_kategori,
		pengumuman.pengumuman,pengumuman.id_kategori,DATE_FORMAT(pengumuman_tanggal,'<b> %d/%m/%Y</b> <br>&nbsp; %H:%i:%s') AS tanggal,pengumuman.author FROM pengumuman INNER JOIN
		kategori ON pengumuman.id_kategori=kategori.id_kategori
		ORDER BY pengumuman.id_pengumuman DESC");

        return $query;
    }

    public function simpan_pengumuman($qkd, $judul, $kategori, $isi, $author)
    {
        $query = $this->db->query("INSERT INTO pengumuman(id_pengumuman,id_kategori,judul,pengumuman,author) VALUES ('$qkd','$kategori','$judul','$isi','$author')");

        return $query;
    }

    public function simpan_pengumuman_staff($qkd, $judul, $kategori, $isi, $author, $nis)
    {
        $query = $this->db->query("INSERT INTO pengumuman(id_pengumuman,id_kategori,judul,pengumuman,author,nis) VALUES ('$qkd','$kategori','$judul','$isi','$author','$nis')");

        return $query;
    }

    public function hapus_pengumuman($kode)
    {
        $query = $this->db->query("DELETE FROM pengumuman WHERE id_pengumuman='$kode'");

        return $query;
    }

    public function hapus_pengumuman_staff($kode, $nis)
    {
        $query = $this->db->query("DELETE FROM pengumuman WHERE id_pengumuman='$kode' AND nis='$nis'");

        return $query;
    }

    public function update_pengumuman($kode, $judul, $kategori, $isi)
    {
        $query = $this->db->query("UPDATE pengumuman SET id_kategori='$kategori',judul='$judul',pengumuman='$isi' where id_pengumuman='$kode'");

        return $query;
    }

    public function pengumuman()
    {
        $hsl = $this->db->query("SELECT pengumuman.id_pengumuman,pengumuman.judul,kategori.nama_kategori,
		pengumuman.pengumuman,pengumuman.id_kategori,DATE_FORMAT(pengumuman_tanggal,'<b> %d/%m/%Y</b> <br>&nbsp; %H:%i:%s') AS tanggal,pengumuman.author FROM pengumuman INNER JOIN
		kategori ON pengumuman.id_kategori=kategori.id_kategori
		ORDER BY  pengumuman.pengumuman_tanggal  DESC");

        return $hsl;
    }

    public function pengumuman_dkategori($id)
    {
        $hsl = $this->db->query("SELECT pengumuman.id_pengumuman,pengumuman.judul,kategori.nama_kategori,
		pengumuman.pengumuman,pengumuman.id_kategori,DATE_FORMAT(pengumuman_tanggal,'<b> %d/%m/%Y</b> <br>&nbsp; %H:%i:%s') AS tanggal,pengumuman.author FROM pengumuman INNER JOIN
		kategori ON pengumuman.id_kategori=kategori.id_kategori WHERE pengumuman.id_kategori = '$id'
		ORDER BY  pengumuman.pengumuman_tanggal  DESC");

        return $hsl;
    }

    public function pengumuman_author($author)
    {
        $hsl = $this->db->query("SELECT pengumuman.id_pengumuman,pengumuman.judul,kategori.nama_kategori,
		pengumuman.pengumuman,pengumuman.id_kategori,DATE_FORMAT(pengumuman_tanggal,'<b> %d/%m/%Y</b> <br>&nbsp; %H:%i:%s') AS tanggal,pengumuman.author FROM pengumuman INNER JOIN
		kategori ON pengumuman.id_kategori=kategori.id_kategori WHERE pengumuman.author LIKE  '%$author%'
		ORDER BY  pengumuman.pengumuman_tanggal  DESC");

        return $hsl;
    }

    public function pengumuman_authors($author)
    {
        $hsl = $this->db->query("SELECT pengumuman.id_pengumuman,pengumuman.judul,kategori.nama_kategori,
		pengumuman.pengumuman,pengumuman.id_kategori,DATE_FORMAT(pengumuman_tanggal,'<b> %d/%m/%Y</b> <br>&nbsp; %H:%i:%s') AS tanggal,pengumuman.author FROM pengumuman INNER JOIN
		kategori ON pengumuman.id_kategori=kategori.id_kategori WHERE pengumuman.nis='$author'
		ORDER BY  pengumuman.pengumuman_tanggal  DESC");

        return $hsl;
    }

    public function get_all_count()
    {
        $sql = 'SELECT COUNT(*) as tol_records FROM pengumuman';
        $result = $this->db->query($sql)->row();

        return $result;
    }

    public function pengumuman_perpage($offset, $limit)
    {
        $hsl = $this->db->query("SELECT pengumuman.id_pengumuman,pengumuman.judul,kategori.nama_kategori,pengumuman.nis,pengumuman.pengumuman,pengumuman.id_kategori,MONTHNAME(pengumuman_tanggal) AS bulan,DATE_FORMAT(pengumuman_tanggal,'%Y')AS tahun,
		DATE_FORMAT(pengumuman_tanggal,'%d')AS tanggal,DATE_FORMAT(pengumuman_tanggal,'%H:%i') AS jam,pengumuman.author FROM pengumuman  JOIN kategori ON pengumuman.id_kategori=kategori.id_kategori ORDER BY pengumuman.pengumuman_tanggal DESC limit $offset,$limit");

        return $hsl;
    }

    public function pengumuman_perpage_kategori($id, $offset, $limit)
    {
        $hsl = $this->db->query("SELECT pengumuman.id_pengumuman,pengumuman.judul,kategori.nama_kategori,pengumuman.nis,pengumuman.pengumuman,pengumuman.id_kategori,MONTHNAME(pengumuman_tanggal) AS bulan,DATE_FORMAT(pengumuman_tanggal,'%Y')AS tahun,
		DATE_FORMAT(pengumuman_tanggal,'%d')AS tanggal,DATE_FORMAT(pengumuman_tanggal,'%H:%i') AS jam,pengumuman.author FROM pengumuman 
		 JOIN kategori ON pengumuman.id_kategori=kategori.id_kategori WHERE pengumuman.id_kategori = '$id'
		 ORDER BY pengumuman.pengumuman_tanggal DESC limit $offset,$limit");

        return $hsl;
    }

    public function pengumuman_perpage_author($author, $offset, $limit)
    {
        $hsl = $this->db->query("SELECT pengumuman.id_pengumuman,pengumuman.judul,kategori.nama_kategori,pengumuman.nis,pengumuman.pengumuman,pengumuman.id_kategori,MONTHNAME(pengumuman_tanggal) AS bulan,DATE_FORMAT(pengumuman_tanggal,'%Y')AS tahun,
    	DATE_FORMAT(pengumuman_tanggal,'%d')AS tanggal,DATE_FORMAT(pengumuman_tanggal,'%H:%i') AS jam,pengumuman.author FROM pengumuman
    	 JOIN kategori ON pengumuman.id_kategori=kategori.id_kategori WHERE pengumuman.author LIKE '%$author%' 
    	 ORDER BY pengumuman.pengumuman_tanggal DESC limit $offset,$limit");

        return $hsl;
    }

    public function pengumuman_perpage_authors($author, $offset, $limit)
    {
        $hsl = $this->db->query("SELECT pengumuman.id_pengumuman,pengumuman.judul,kategori.nama_kategori,pengumuman.nis,pengumuman.pengumuman,pengumuman.id_kategori,MONTHNAME(pengumuman_tanggal) AS bulan,DATE_FORMAT(pengumuman_tanggal,'%Y')AS tahun,
    	DATE_FORMAT(pengumuman_tanggal,'%d')AS tanggal,DATE_FORMAT(pengumuman_tanggal,'%H:%i') AS jam,pengumuman.author FROM pengumuman
    	 JOIN kategori ON pengumuman.id_kategori=kategori.id_kategori WHERE pengumuman.nis LIKE '%$author%' 
    	 ORDER BY pengumuman.pengumuman_tanggal DESC limit $offset,$limit");

        return $hsl;
    }

    public function pengumuman_jumlah_kategori()
    {
        $hsl = $this->db->query('SELECT kategori.id_kategori,kategori.nama_kategori  FROM kategori');

        return $hsl;
    }

    public function pengumuman_kategori()
    {
        $hsl = $this->db->query('SELECT pengumuman.*,COUNT(*) as jumlah FROM pengumuman INNER JOIN kategori ON 
		pengumuman.id_kategori=kategori.id_kategori GROUP BY pengumuman.id_kategori');

        return $hsl;
    }
}
