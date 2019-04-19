<?php

class Pengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin_login') != true) {
            $url = base_url('login');
            redirect($url);
        }
        $this->load->model('dashboard_model');
        $this->load->model('pengumuman_model');
        $this->load->model('kategori_model');
    }

    public function index()
    {
        $id_admin = $this->session->userdata('ses_id');
        $datak = $this->dashboard_model->get_login_now($id_admin);
        $q = $datak->row_array();
        $x['fotok'] = $q['foto'];
        $x['usernamenow'] = $q['username'];
        $x['data'] = $this->pengumuman_model->get_all_pengumuman();
        $x['online'] = $this->dashboard_model->get_online();
        $x['kat'] = $this->kategori_model->get_all_kategori();
        $this->load->view('admin/pengumuman', $x);
    }

    public function simpan_pengumuman()
    {
        $qkd = $this->pengumuman_model->unique_code();
        $judul = strip_tags($this->input->post('xjudul'));
        $kategori = strip_tags($this->input->post('xkategori'));
        $isi = strip_tags($this->input->post('xisi'));
        $adm = $this->session->userdata('ses_id');
        $author = ucfirst($this->session->userdata('ses_username'));
        $this->pengumuman_model->simpan_pengumuman($qkd, $judul, $kategori, $isi, $author);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('admin/pengumuman', 'refresh');
    }

    public function hapus_pengumuman()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->pengumuman_model->hapus_pengumuman($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/pengumuman', 'refresh');
    }

    public function update_pengumuman()
    {
        $kode = strip_tags($this->input->post('kode'));
        $judul = strip_tags($this->input->post('xjudul'));
        $kategori = strip_tags($this->input->post('xkategori'));
        $isi = strip_tags($this->input->post('xisi'));
        $this->pengumuman_model->update_pengumuman($kode, $judul, $kategori, $isi);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('admin/pengumuman', 'refresh');
    }
}
