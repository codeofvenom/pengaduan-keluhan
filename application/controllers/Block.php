<?php

if (!defined('BASEPATH')) {
    exit('No Direct Script Access Allowed');
}
class Block extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('login_model');
        if ($this->login_model->check_block_ip() == false) {
            redirect(site_url('login'), 'refresh');
        }
    }

    public function index()
    {
        $level = $this->session->userdata('level');
        $id = $this->session->userdata('ses_id');
        $ip = $_SERVER['REMOTE_ADDR'];

        $this->login_model->logout_blokir($id, $level, $ip);
        $this->session->sess_destroy();
        $data['block'] = $this->login_model->get_block($ip);
        $this->load->view('block.php', $data);
    }
}
