<?php

if (!defined('BASEPATH')) {
    exit('No Direct Script Access Allowed');
}
class Security extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin_login') != true) {
            $url = base_url('login');
            redirect($url);
        }
        $this->load->model('dashboard_model');
    }

    public function index()
    {
        $id_admin = $this->session->userdata('ses_id');
        $datak = $this->dashboard_model->get_login_now($id_admin);
        $q = $datak->row_array();
        $x['fotok'] = $q['foto'];
        $x['usernamenow'] = $q['username'];
        $x['data'] = $this->dashboard_model->get_all_ip();
        $x['online'] = $this->dashboard_model->get_online();
        $this->load->view('admin/security', $x);
    }

    public function check_ip_avalibility()
    {
        if ((strlen($_POST['xip'] < 0)) && (!filter_var(($_POST['xip']), FILTER_VALIDATE_INT))) {
            echo '<script>$("#simpan").attr("disabled", "disabled");</script>
			<label class="text-danger"><i class="fa fa-close" style="color:red"></i><b>  IP tidak valid</b></span></label>';
        } else {
            $this->load->model('dashboard_model');
            if ($this->dashboard_model->is_ip_available($_POST['xip'])) {
                echo '<script>$("#simpan").attr("disabled", "disabled");</script>
				<label class="text-danger"><i class="fa fa-close" style="color:red"></i><b> IP telah terdaftar</b></label>';
            } else {
                echo '<script>document.getElementById("simpan").disabled = false;</script>
				<label class="text-success"><i class="fa fa-check" style="color:green"></i> IP tersediauntuk diblokir</label>';
            }
        }
    }

    public function simpan_ip()
    {
        $ip = strip_tags($this->input->post('xip'));
        $alasan = strip_tags($this->input->post('xalasan'));
        $cp = strip_tags($this->input->post('xcp'));
        $otmc = strip_tags($this->input->post('xotmc'));
        $this->dashboard_model->simpan_ip($ip, $alasan, $cp, $otmc);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('admin/security');
    }

    public function update_ip()
    {
        $kode = strip_tags($this->input->post('kode'));
        $ip = strip_tags($this->input->post('xip'));
        $alasan = strip_tags($this->input->post('xalasan'));
        $cp = strip_tags($this->input->post('xcp'));
        $otmc = strip_tags($this->input->post('xotmc'));
        $this->dashboard_model->update_ip($kode, $ip, $alasan, $cp, $otmc);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('admin/security');
    }

    public function hapus_ip()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->dashboard_model->hapus_ip($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/security');
    }

    public function log_admin()
    {
        $id_admin = $this->session->userdata('ses_id');
        $datak = $this->dashboard_model->get_login_now($id_admin);
        $q = $datak->row_array();
        $x['fotok'] = $q['foto'];
        $x['usernamenow'] = $q['username'];
        $x['online'] = $this->dashboard_model->get_online();
        $x['data'] = $this->dashboard_model->log_admin();
        $this->load->view('admin/log_admin', $x);
    }

    public function log_staff()
    {
        $id_admin = $this->session->userdata('ses_id');
        $datak = $this->dashboard_model->get_login_now($id_admin);
        $q = $datak->row_array();
        $x['fotok'] = $q['foto'];
        $x['usernamenow'] = $q['username'];
        $x['online'] = $this->dashboard_model->get_online();
        $x['data'] = $this->dashboard_model->log_staff();
        $this->load->view('admin/log_staff', $x);
    }
}
