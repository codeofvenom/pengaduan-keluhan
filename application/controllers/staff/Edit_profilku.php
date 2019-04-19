<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Edit_profilku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('staff_login') != true) {
            $url = base_url('login');
            redirect($url);
        }
        if ($this->session->userdata('kepbiro_login') == true) {
            $url = base_url('kepbiro/home');
            redirect($url);
        }
        if ($this->session->userdata('admin_login') == true) {
            $url = base_url('admin/dashboard');
            redirect($url);
        }
        $this->load->model('staff_model');
        $this->load->model('dashboard_model');
        $this->load->library('upload');
    }

    public function index()
    {
        if ($this->dashboard_model->check_block_ip()) {
            redirect(site_url('block'), 'refresh');
        } else {
            if ($this->session->userdata('staff_login') == true) {
                $stf = $this->session->userdata('ses_id');
                $x['data'] = $this->staff_model->get_profilku($stf);
                $x['online'] = $this->dashboard_model->get_online();
                $this->load->view('staff/edit_profilku', $x);
            } else {
                $this->load->view('login');
            }
        }
    }

    public function update_profil()
    {
        $config['upload_path'] = './assets/img/avatar/staff/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/avatar/staff/'.$gbr['file_name'];
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = '80%';
                $config['width'] = 350;
                $config['height'] = 350;
                $config['new_image'] = './assets/img/avatar/staff/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
                $kode = $this->input->post('kode');
                $nama = $this->input->post('xnama');
                $password = $this->input->post('xpassword');
                $konfirm_password = $this->input->post('xpassword2');
                if (empty($password) && empty($konfirm_password)) {
                    $this->staff_model->update_staffku_tanpa_pass($kode, $nama, $gambar);
                    echo $this->session->set_flashdata('msg', 'info');
                    redirect('staff/edit_profilku');
                } elseif ($password != $konfirm_password) {
                    echo $this->session->set_flashdata('msg', 'error');
                    redirect('staff/edit_profilku');
                } else {
                    $this->staff_model->update_staffku($kode, $nama, $password, $gambar);
                    echo $this->session->set_flashdata('msg', 'info');
                    redirect('staff/edit_profilku');
                }
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('staff/edit_profilkuu');
            }
        } else {
            $kode = $this->input->post('kode');
            $nama = $this->input->post('xnama');
            $password = $this->input->post('xpassword');
            $konfirm_password = $this->input->post('xpassword2');
            if (empty($password) && empty($konfirm_password)) {
                $this->staff_model->update_staffku_tanpa_pass_gambar($kode, $nama);
                echo $this->session->set_flashdata('msg', 'info');
                redirect('staff/edit_profilku');
            } elseif ($password != $konfirm_password) {
                echo $this->session->set_flashdata('msg', 'error');
                redirect('staff/edit_profilku');
            } else {
                $this->staff_model->update_staffku_tanpa_gambar($kode, $nama, $password);
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('staff/edit_profilku');
            }
        }
    }
}
