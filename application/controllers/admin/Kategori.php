<?php

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin_login') != true) {
            $url = base_url('login');
            redirect($url);
        }
        $this->load->model('dashboard_model');
        $this->load->model('kategori_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $id_admin = $this->session->userdata('ses_id');
        $datak = $this->dashboard_model->get_login_now($id_admin);
        $q = $datak->row_array();
        $x['fotok'] = $q['foto'];
        $x['usernamenow'] = $q['username'];
        $x['data'] = $this->kategori_model->get_all_kategori();
        $x['online'] = $this->dashboard_model->get_online();
        $this->load->view('admin/kategori', $x);
    }

    public function simpan_kategori()
    {
        $kategori = strip_tags($this->input->post('xkategori'));
        $this->kategori_model->simpan_kategori($kategori);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('admin/kategori');
    }

    public function update_kategori()
    {
        $kode = strip_tags($this->input->post('kode'));
        $kategori = strip_tags($this->input->post('xkategori'));
        $this->kategori_model->update_kategori($kode, $kategori);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('admin/kategori');
    }

    public function hapus_kategori()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->kategori_model->hapus_kategori($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/kategori');
    }
}
