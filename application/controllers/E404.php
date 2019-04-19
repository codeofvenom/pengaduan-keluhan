<?php

if (!defined('BASEPATH')) {
    exit('No Direct Script Access Allowed');
}
class E404 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('login_model');
    }

    public function index()
    {
        if ($this->login_model->check_block_ip()) {
            redirect(site_url('block'), 'refresh');
        } else {
            if ($this->session->userdata('admin_login') == true) {
                redirect(site_url('admin/dashboard'), 'refresh');
            }
            if ($this->session->userdata('staff_login') == true) {
                redirect(site_url('staff/home'), 'refresh');
            }
            if ($this->session->userdata('kepbiro_login') == true) {
                redirect(site_url('kepbiro/home'), 'refresh');
            } else {
                $this->load->view('e404.php');
            }
        }
    }
}
