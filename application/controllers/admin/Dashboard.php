<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('dashboard_model');
        if ($this->session->userdata('admin_login') != true) {
            $url = base_url('login');
            redirect($url);
        }
    }

    public function index()
    {
        if ($this->session->userdata('admin_login') == true) {
            $id_admin = $this->session->userdata('ses_id');
            $datak = $this->dashboard_model->get_login_now($id_admin);
            $q = $datak->row_array();
            $data['fotok'] = $q['foto'];
            $data['usernamenow'] = $q['username'];
            $data['count_admin'] = $this->dashboard_model->get_count_admin();
            $data['count_staff'] = $this->dashboard_model->get_count_staff();
            $data['count_kepbiro'] = $this->dashboard_model->get_count_kepbiro();
            $data['count_all'] = $this->dashboard_model->get_count_all();
            $data['online'] = $this->dashboard_model->get_online();
            $data['nama'] = $this->session->userdata('ses_username');
            $this->load->view('admin/Dashboard', $data);
        } else {
            redirect('login');
        }
    }
}
