<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Data_staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin_login') != true) {
            $url = base_url('login');
            redirect($url);
        }
        $this->load->model('dashboard_model');
        $this->load->model('staff_model');
        $this->load->model('group_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $id_admin = $this->session->userdata('ses_id');
        $datak = $this->dashboard_model->get_login_now($id_admin);
        $q = $datak->row_array();
        $x['fotok'] = $q['foto'];
        $x['usernamenow'] = $q['username'];
        $x['data'] = $this->staff_model->get_all_staff();
        $x['online'] = $this->dashboard_model->get_online();
        $x['grp'] = $this->group_model->get_all_group();
        $this->load->view('admin/data_staff', $x);
    }

    public function check_nis_avalibility()
    {
        if (strlen($_POST['xnis']) < 7) {
            echo '<label class="text-danger"><i class="fa fa-close" style="color:red"></i><b> NIS tidak valid / inputan NIS harus lebih dari 6 karakter</b></span></label>';
        } else {
            $this->load->model('staff_model');
            if ($this->staff_model->is_nis_available($_POST['xnis'])) {
                echo '<script>$("#simpan").attr("disabled", "disabled");</script>
				<label class="text-danger"><i class="fa fa-close" style="color:red"></i><b> NIS  telah terdaftar</b></label>';
            } else {
                echo '<script>document.getElementById("simpan").disabled = false;</script>
				<label class="text-success"><i class="fa fa-check" style="color:green"></i> NIS tersedia</label>';
            }
        }
    }

    public function simpan_staff()
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
                $nis = $this->input->post('xnis');
                $nama = $this->input->post('xnama');
                $jk = $this->input->post('xjenkel');
                $password = $this->input->post('xpassword');
                $konfirm_password = $this->input->post('xpassword2');
                $group = $this->input->post('xgroup');
                $level = $this->input->post('xlevel');
                $status = $this->input->post('xstatus');
                $creator = $this->session->userdata('ses_username');
                if ($password != $konfirm_password) {
                    echo $this->session->set_flashdata('msg', 'error');
                    redirect('admin/data_staff');
                } else {
                    $this->staff_model->simpan_staff($nis, $nama, $jk, $password, $group, $level, $status, $gambar, $creator);
                    echo $this->session->set_flashdata('msg', 'success');
                    redirect('admin/data_staff');
                }
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/data_staff');
            }
        } else {
            $nis = $this->input->post('xnis');
            $nama = $this->input->post('xnama');
            $jk = $this->input->post('xjenkel');
            $password = $this->input->post('xpassword');
            $konfirm_password = $this->input->post('xpassword2');
            $group = $this->input->post('xgroup');
            $level = $this->input->post('xlevel');
            $status = $this->input->post('xstatus');
            $creator = $this->session->userdata('ses_username');
            if ($password != $konfirm_password) {
                echo $this->session->set_flashdata('msg', 'error');
                redirect('admin/data_staff');
            } else {
                $this->staff_model->simpan_staff_tanpa_gambar($nis, $nama, $jk, $password, $group, $level, $status, $creator);
                echo $this->session->set_flashdata('msg', 'success');
                redirect('admin/data_staff');
            }
        }
    }

    public function hapus_staff()
    {
        $kode = $this->input->post('kode');
        $data = $this->staff_model->get_staff_login($kode);
        $q = $data->row_array();
        $p = $q['foto'];
        $path = base_url().'/assets/img/avatar/staff/'.$p;
        delete_files($path);
        $this->staff_model->hapus_staff($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/data_staff', 'refresh');
    }

    public function update_staff()
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
                $nis = $this->input->post('xnis');
                $nama = $this->input->post('xnama');
                $jk = $this->input->post('xjenkel');
                $password = $this->input->post('xpassword');
                $konfirm_password = $this->input->post('xpassword2');
                $group = $this->input->post('xgroup');
                $level = $this->input->post('xlevel');
                $status = $this->input->post('xstatus');
                $kode = $this->input->post('kode');
                if (empty($password) && empty($konfirm_password)) {
                    $this->staff_model->update_staff_tanpa_pass($kode, $nis, $nama, $jk, $group, $level, $status, $gambar);
                    echo $this->session->set_flashdata('msg', 'info');
                    redirect('admin/data_staff');
                } elseif ($password != $konfirm_password) {
                    echo $this->session->set_flashdata('msg', 'error');
                    redirect('admin/data_staff');
                } else {
                    $this->staff_model->update_staff($kode, $nis, $nama, $jk, $password, $group, $level, $status, $gambar);
                    echo $this->session->set_flashdata('msg', 'info');
                    redirect('admin/data_staff');
                }
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/data_staff');
            }
        } else {
            $kode = $this->input->post('kode');
            $nis = $this->input->post('xnis');
            $nama = $this->input->post('xnama');
            $jk = $this->input->post('xjenkel');
            $password = $this->input->post('xpassword');
            $konfirm_password = $this->input->post('xpassword2');
            $group = $this->input->post('xgroup');
            $level = $this->input->post('xlevel');
            $status = $this->input->post('xstatus');
            if (empty($password) && empty($konfirm_password)) {
                $this->staff_model->update_staff_tanpa_pass_gambar($kode, $nis, $nama, $jk, $group, $level, $status);
                echo $this->session->set_flashdata('msg', 'info');
                redirect('admin/data_staff');
            } elseif ($password != $konfirm_password) {
                echo $this->session->set_flashdata('msg', 'error');
                redirect('admin/data_staff');
            } else {
                $this->staff_model->update_staff_tanpa_gambar($kode, $nis, $nama, $jk, $password, $group, $level, $status);
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/data_staff');
            }
        }
    }
}
