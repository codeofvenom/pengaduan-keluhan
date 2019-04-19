<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin_login') != true) {
            $url = base_url('login');
            redirect($url);
        }
        if ($this->session->userdata('staff_login') == true) {
            $url = base_url('staff/home');
            redirect($url);
        }

        $this->load->model('dashboard_model');
        $this->load->model('admin_model');
        $this->load->library('upload');
    }

    public function index()
    {
        if ($this->dashboard_model->check_block_ip()) {
            redirect(site_url('block'), 'refresh');
        } else {
            if ($this->session->userdata('admin_login') == true) {
                redirect('admin/edit_profilku');
            } else {
                $this->load->view('login');
            }
        }
    }

    public function edit_profilku()
    {
        if ($this->dashboard_model->check_block_ip()) {
            redirect(site_url('block'), 'refresh');
        } else {
            if ($this->session->userdata('admin_login') == true) {
                $adm = $this->session->userdata('ses_id');
                $x['data'] = $this->admin_model->get_profilku($adm);
                $x['online'] = $this->dashboard_model->get_online();
                $this->load->view('admin/edit_profilku', $x);
            } else {
                $this->load->view('login');
            }
        }
    }

    public function update_profil()
    {
        $config['upload_path'] = './assets/img/avatar/admin/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/avatar/admin/'.$gbr['file_name'];
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = '80%';
                $config['width'] = 350;
                $config['height'] = 350;
                $config['new_image'] = './assets/img/avatar/admin/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
                $kode = $this->input->post('kode');
                $username = $this->input->post('xusername');
                $email = $this->input->post('xemail');
                $password = $this->input->post('xpassword');
                $konfirm_password = $this->input->post('xpassword2');
                $status = $this->input->post('xstatus');
                if (empty($password) && empty($konfirm_password)) {
                    $this->admin_model->update_admin_tanpa_pass($kode, $username, $email, $status, $gambar);
                    echo $this->session->set_flashdata('msg', 'info');
                    redirect('admin/admin/edit_profilku');
                } elseif ($password != $konfirm_password) {
                    echo $this->session->set_flashdata('msg', 'error');
                    redirect('admin/admin/edit_profilku');
                } else {
                    $this->admin_model->update_admin($kode, $username, $email, $password, $status, $gambar);
                    echo $this->session->set_flashdata('msg', 'info');
                    redirect('admin/admin/edit_profilku');
                }
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/admin/edit_profilkuu');
            }
        } else {
            $kode = $this->input->post('kode');
            $nama = $this->input->post('xnama');
            $username = $this->input->post('xusername');
            $password = $this->input->post('xpassword');
            $konfirm_password = $this->input->post('xpassword2');
            $email = $this->input->post('xemail');
            $status = $this->input->post('xstatus');
            if (empty($password) && empty($konfirm_password)) {
                $this->admin_model->update_admin_tanpa_pass_gambar($kode, $username, $email, $status);
                echo $this->session->set_flashdata('msg', 'info');
                redirect('admin/admin/edit_profilku');
            } elseif ($password != $konfirm_password) {
                echo $this->session->set_flashdata('msg', 'error');
                redirect('admin/admin/edit_profilku');
            } else {
                $this->admin_model->update_admin_tanpa_gambar($kode, $username, $email, $password, $status);
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/admin/edit_profilku');
            }
        }
    }
}
