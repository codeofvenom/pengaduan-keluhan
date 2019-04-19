<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('login_model');
        // $this->output->enable_profiler(true);
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
                $this->load->view('login');
            }
        }
    }

    public function auth()
    {
        $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES, 'UTF-8');
        $cek_staff = $this->login_model->auth_staff($username, $password);

        if ($cek_staff->num_rows() > 0) {
            $data = $cek_staff->row_array();
            if ($data['id_level'] == '3' && $data['active'] == '1') { //Akses staff
                $this->session->set_userdata('staff_login', true);
                $this->session->set_userdata('level', '3');
                $this->session->set_userdata('ses_id', $data['id_staff']);
                $this->session->set_userdata('ses_group', $data['id_group']);
                $this->session->set_userdata('ses_nis', $data['nis']);
                $this->session->set_userdata('ses_nama', $data['nama']);
                $this->session->set_userdata('last', $data['last_login']);
                $id = $this->session->userdata('ses_id');
                $nis = $this->session->userdata('ses_nis');
                $level = $this->session->userdata('level');
                $ip = $_SERVER['REMOTE_ADDR'];
                $id_login = $this->session->userdata('ses_nis');
                $this->login_model->staff_online($id, $nis, $ip);
                $this->login_model->count_visitor($id_login, $level);

                redirect('staff/home');
            } elseif ($data['id_level'] == '2' && $data['active'] == '1') { // Akses kepala biro
                $this->session->set_userdata('kepbiro_login', true);
                $this->session->set_userdata('level', '2');
                $this->session->set_userdata('ses_id', $data['id_staff']);
                $this->session->set_userdata('ses_group', $data['id_group']);
                $this->session->set_userdata('ses_nis', $data['nis']);
                $this->session->set_userdata('ses_nama', $data['nama']);
                $id = $this->session->userdata('ses_id');
                $nis = $this->session->userdata('ses_nis');
                $ip = $_SERVER['REMOTE_ADDR'];
                $level = $this->session->userdata('level');
                $id_login = $this->session->userdata('ses_nis');
                $this->login_model->staff_online($id, $nis, $ip);
                $this->login_model->count_visitor($id_login, $level);
                redirect('kepbiro/home');
            } elseif ($data['id_level'] == '3' && $data['active'] == '0') {
                $url = base_url('login');
                echo $this->session->set_flashdata('msg', 'Account sedang di deactive silahkan hubungi Administrator');
                redirect($url);
            } elseif ($data['id_level'] == '2' && $data['active'] == '0') {
                $url = base_url('login');
                echo $this->session->set_flashdata('msg', 'Account sedang di deactive silahkan hubungi Administrator');
                redirect($url);
            } else {
                $url = base_url('login');
                echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
                redirect($url);
            }
        } else {
            $cek_admin = $this->login_model->auth_admin($username, $password);
            if ($cek_admin->num_rows() > 0) {
                $data = $cek_admin->row_array();
                if ($data['id_level'] == '1' && $data['active'] == '1') {
                    $this->session->set_userdata('admin_login', true);
                    $this->session->set_userdata('level', '1');
                    $this->session->set_userdata('ses_id', $data['id_admin']);
                    $this->session->set_userdata('ses_username', $data['username']);
                    $this->session->set_userdata('ses_email', $data['email']);
                    $this->session->set_userdata('foto', $data['foto']);
                    $id = $this->session->userdata('ses_id');
                    $email = $this->session->userdata('ses_email');
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $level = $this->session->userdata('level');
                    $id_login = $this->session->userdata('ses_username');
                    $this->login_model->count_visitor($id_login, $level);
                    $this->login_model->admin_online($id, $email, $ip);
                    redirect('admin/dashboard');
                } elseif ($data['id_level'] == '1' && $data['active'] == '0') {
                    echo $this->session->set_flashdata('msg', 'Account sedang di deactive silahkan hubungi Administrator');
                    redirect('login');
                }
            } else {
                echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $level = $this->session->userdata('level');
        $id = $this->session->userdata('ses_id');
        $ip = $_SERVER['REMOTE_ADDR'];

        $this->login_model->logoutku($id, $level, $ip);
        $this->session->sess_destroy();
        redirect(site_url('login'), 'refresh');
    }
}
