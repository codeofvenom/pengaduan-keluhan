<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Keluhan_selesai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('kepbiro_login') == true) {
            $url = base_url('kepbiro/home');
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
        if ($this->session->userdata('staff_login') == true) {
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
            $this->load->view('staff/keluhan_selesai', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

    public function detail($kode)
    {
        if ($this->session->userdata('staff_login') == true) {
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
                    $this->load->view('staff/detail_keluhan', $data);
                } else {
                    redirect('staff/keluhan_selesai', 'refresh');
                }
            } else {
                redirect('staff/keluhan_selesai', 'refresh');
            }
        } else {
            redirect('login', 'refresh');
        }
    }
}
