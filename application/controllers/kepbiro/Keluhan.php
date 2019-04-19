<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Keluhan extends CI_Controller
{
    private $perPage = 2;

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('staff_login') == true) {
            $url = base_url('staff/home');
            redirect($url);
        }
        if ($this->session->userdata('admin_login') == true) {
            $url = base_url('admin/dashboard');
            redirect($url);
        }
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        $this->load->model('dashboard_model');
        $this->load->model('keluhan_model');
    }

    public function index()
    {
        if ($this->session->userdata('kepbiro_login') == true) {
            $id_staff = $this->session->userdata('ses_id');
            $datak = $this->dashboard_model->get_login_stnow($id_staff);
            $group = $this->session->userdata('ses_group');
            $q = $datak->row_array();
            $data['niss'] = $q['nis'];
            $data['levls'] = $q['id_level'];
            $data['idstk'] = $q['id_staff'];
            $data['fotok'] = $q['foto'];
            $data['namanw'] = $q['nama'];
            $data['online'] = $this->dashboard_model->get_online();
            $data['staff'] = $this->keluhan_model->all_staff();
            $data['data'] = $this->keluhan_model->get_all_keluhan($group);

            $this->load->view('kepbiro/keluhan', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

    public function simpan_keluhan()
    {
        $qkd = $this->keluhan_model->unique_code();
        $group = $this->session->userdata('ses_group');
        $staff = $this->session->userdata('ses_id');
        $level = $this->session->userdata('level');
        $judul = strip_tags($this->input->post('xjudul'));
        $mslh = strip_tags($this->input->post('xmasalah'));
        $prioritas = strip_tags($this->input->post('xprioritas'));
        if (!empty($this->input->post('xsolusi'))) {
            $solusi = strip_tags($this->input->post('xsolusi'));
        } else {
            $solusi = '';
        }
        $this->keluhan_model->simpan_keluhan($qkd, $group, $level, $staff, $judul, $solusi, $mslh, $prioritas);

        redirect('kepbiro/keluhan', 'refresh');
    }

    public function hapus_keluhan()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->keluhan_model->hapus_keluhan($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('kepbiro/keluhan', 'refresh');
    }

    public function detail($kode)
    {
        if ($this->session->userdata('kepbiro_login') == true) {
            if (!empty($kode)) {
                $kode = $this->uri->segment(4);
                $group = $this->session->userdata('ses_group');
                $cb = $this->keluhan_model->check_group($kode, $group);
                if ($cb == true) {
                    $id_staff = $this->session->userdata('ses_id');
                    $datak = $this->dashboard_model->get_login_stnow($id_staff);
                    $q = $datak->row_array();
                    $data['niss'] = $q['nis'];
                    $data['levls'] = $q['id_level'];
                    $data['idstk'] = $q['id_staff'];
                    $data['fotok'] = $q['foto'];
                    $data['namanw'] = $q['nama'];
                    $data['online'] = $this->dashboard_model->get_online();
                    $data['data'] = $this->keluhan_model->detail_keluhan($kode, $group);
                    $data['comment'] = $this->keluhan_model->get_all_komentar($kode);
                    $this->load->view('kepbiro/detail_keluhan', $data);
                } else {
                    redirect('kepbiro/keluhan', 'refresh');
                }
            } else {
                redirect('kepbiro/keluhan', 'refresh');
            }
        } else {
            redirect('login', 'refresh');
        }
    }

    public function tambah_komentar()
    {
        $staff = $this->session->userdata('ses_id');
        $comment = strip_tags($this->input->post('xcomment'));
        $kode = strip_tags($this->input->post('kode'));
        $this->keluhan_model->tambah_komentar($staff, $comment, $kode);
        redirect('kepbiro/keluhan', 'refresh');
    }

    public function hapus_komentar()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->keluhan_model->hapus_komentar($kode);
        redirect('kepbiro/keluhan', 'refresh');
    }

    public function tolak()
    {
        if ($this->session->userdata('kepbiro_login') == true) {
            $kode = strip_tags($this->input->post('kode'));
            if (!empty($this->input->post('xnotes'))) {
                $notes = strip_tags($this->input->post('xnotes'));
            } else {
                $notes = '-';
            }
            $this->keluhan_model->tolak($kode, $notes);
            redirect('kepbiro/keluhan', 'refresh');
        } else {
            redirect('login', 'refresh');
        }
    }

    public function proses_maju()
    {
        if ($this->session->userdata('kepbiro_login') == true) {
            $kode = strip_tags($this->input->post('kode'));
            $this->keluhan_model->proses($kode);
            redirect('kepbiro/keluhan', 'refresh');
        } else {
            redirect('login', 'refresh');
        }
    }

    public function update_keluhan()
    {
        if ($this->session->userdata('kepbiro_login') == true) {
            $staff = $this->session->userdata('ses_id');
            $level = $this->session->userdata('level');
            $kode = strip_tags($this->input->post('kode'));
            $judul = strip_tags($this->input->post('xjudul'));
            $mslh = strip_tags($this->input->post('xmasalah'));
            $prioritas = strip_tags($this->input->post('xprioritas'));
            $status = strip_tags($this->input->post('xstatus'));
            if (!empty($this->input->post('xsolusi'))) {
                $solusi = strip_tags($this->input->post('xsolusi'));
            } else {
                $solusi = '';
            }
            if ($status == '3') {
                $this->keluhan_model->update_keluhan_kepbiro_selesai($kode, $judul, $mslh, $prioritas, $status, $solusi);
                redirect('kepbiro/keluhan', 'refresh');
            } elseif ($status == '2') {
                $this->keluhan_model->update_keluhan_kepbiro_proses($kode, $judul, $mslh, $prioritas, $status, $solusi);
                redirect('kepbiro/keluhan', 'refresh');
            } else {
                $this->keluhan_model->update_keluhan_staff($kode, $judul, $mslh, $prioritas, $status, $solusi);
                redirect('kepbiro/keluhan', 'refresh');
            }
        } else {
            redirect('login', 'refresh');
        }
    }
}
