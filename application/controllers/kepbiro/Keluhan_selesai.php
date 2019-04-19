<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Keluhan_selesai extends CI_Controller
{
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
            $data['data'] = $this->keluhan_model->get_all_keluhan_selesai($group);
            $this->load->view('kepbiro/keluhan_selesai', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

    public function update_keluhan()
    {
        if ($this->session->userdata('kepbiro_login') == true) {
            $kode = strip_tags($this->input->post('kode'));
            $status = strip_tags($this->input->post('xstatus'));
            if ($status == '3') {
                $this->keluhan_model->update_keluhan_lanjut_kepbiro($kode, $status);
                redirect('kepbiro/keluhan_selesai', 'refresh');
            } elseif ($status == '2') {
                $this->keluhan_model->update_keluhan_lanjut_kepbiro_lanjut($kode, $status);
                redirect('kepbiro/keluhan_selesai', 'refresh');
            } else {
                $this->keluhan_model->update_keluhan_lanjut_staff($kode, $status);
                redirect('kepbiro/keluhan_selesai', 'refresh');
            }
        } else {
            redirect('login', 'refresh');
        }
    }

    public function setuju_keluhan()
    {
        if ($this->session->userdata('kepbiro_login') == true) {
            $kode = strip_tags($this->input->post('kode'));
            $this->keluhan_model->setuju($kode);
            redirect('kepbiro/keluhan_selesai', 'refresh');
        } else {
            redirect('login', 'refresh');
        }
    }
}
