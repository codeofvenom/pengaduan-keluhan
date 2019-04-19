<?php

if (!defined('BASEPATH')) {
    exit('No Direct Script Access Allowed');
}
class Group extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin_login') != true) {
            $url = base_url('login');
            redirect($url);
        }
        $this->load->model('dashboard_model');
        $this->load->model('group_model');
    }

    public function index()
    {
        $id_admin = $this->session->userdata('ses_id');
        $datak = $this->dashboard_model->get_login_now($id_admin);
        $q = $datak->row_array();
        $x['fotok'] = $q['foto'];
        $x['usernamenow'] = $q['username'];
        $x['data'] = $this->group_model->get_all_group();
        $x['online'] = $this->dashboard_model->get_online();
        $this->load->view('admin/group', $x);
    }

    public function simpan_group()
    {
        $group = strip_tags($this->input->post('xgroup'));
        $this->group_model->simpan_group($group);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('admin/group');
    }

    public function update_group()
    {
        $kode = strip_tags($this->input->post('kode'));
        $group = strip_tags($this->input->post('xgroup'));
        $this->group_model->update_group($kode, $group);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('admin/group');
    }

    public function hapus_group()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->group_model->hapus_group($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/group');
    }
}
