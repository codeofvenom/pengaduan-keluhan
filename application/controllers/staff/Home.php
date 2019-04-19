<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Home extends CI_Controller
{
    private $perPage = 2;

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('kepbiro_login') == true) {
            $url = base_url('kepbiro/home');
            redirect($url);
        } elseif ($this->session->userdata('admin_login') == true) {
            $url = base_url('admin/dashboard');
            redirect($url);
        }

        $this->load->database();
        $this->load->library('session');
        $this->load->model('dashboard_model');
        $this->load->model('pengumuman_model');
    }

    public function index()
    {
        if ($this->session->userdata('staff_login') == true) {
            $id_staff = $this->session->userdata('ses_id');
            $datak = $this->dashboard_model->get_login_stnow($id_staff);
            $q = $datak->row_array();
            $data['fotok'] = $q['foto'];
            $data['niss'] = $q['nis'];
            $data['namanw'] = $q['nama'];
            $data['online'] = $this->dashboard_model->get_online();
            $data['pengumuman'] = $this->pengumuman_model->pengumuman_jumlah_kategori();
            $data['jml'] = $this->pengumuman_model->pengumuman_kategori();
            $jum = $this->pengumuman_model->pengumuman();
            $page = $this->uri->segment(4);
            if (!$page) :
                $offset = 0; else :
                $offset = $page;
            endif;
            $limit = 4;
            $config['base_url'] = base_url().'/staff/home/index/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close'] = '</ul></nav></div>';
            $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close'] = '</span></li>';
            $config['cur_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close'] = '</span>Next</li>';
            $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close'] = '</span></li>';
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Next >>';
            $config['prev_link'] = '<< Prev';
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();
            $data['posts'] = $this->pengumuman_model->pengumuman_perpage($offset, $limit);
            $this->load->view('staff/home', $data);
        } else {
            redirect('login');
        }
    }

    public function detail($id)
    {
        if (!empty($id) && $this->session->userdata('staff_login') == true) {
            $id_staff = $this->session->userdata('ses_id');
            $datak = $this->dashboard_model->get_login_stnow($id_staff);
            $q = $datak->row_array();
            $data['fotok'] = $q['foto'];
            $data['niss'] = $q['nis'];
            $data['namanw'] = $q['nama'];
            $data['online'] = $this->dashboard_model->get_online();
            $data['pengumuman'] = $this->pengumuman_model->pengumuman_jumlah_kategori();
            $data['jml'] = $this->pengumuman_model->pengumuman_kategori();
            $jum = $this->pengumuman_model->pengumuman_dkategori($id);
            $page = $this->uri->segment(6);
            if (!$page) :
                $offset = 0; else :
                $offset = $page;
            endif;
            $limit = 4;
            $config['base_url'] = base_url().'/staff/home/detail/'.$id.'/'.'page/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 6;
            $config['full_tag_open'] = '<div class="pagging text-center"><ul class="pagination justify-content-center pull-right">';
            $config['full_tag_close'] = '</ul></div>';
            $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close'] = '</span></li>';
            $config['cur_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close'] = '</span>Next</li>';
            $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close'] = '</span></li>';
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Next >>';
            $config['prev_link'] = '<< Prev';
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();
            $data['posts'] = $this->pengumuman_model->pengumuman_perpage_kategori($id, $offset, $limit);
            // $data['kat'] = $this->kategori_model->get_all_kategori();

            $this->load->view('staff/detail', $data);
        } else {
            redirect('staff/home', 'refresh');
        }
    }

    public function author($author)
    {
        if (!empty($author) && $this->session->userdata('staff_login') == true) {
            $id_staff = $this->session->userdata('ses_id');
            $datak = $this->dashboard_model->get_login_stnow($id_staff);
            $q = $datak->row_array();
            $data['fotok'] = $q['foto'];
            $data['niss'] = $q['nis'];
            $data['namanw'] = $q['nama'];
            $data['online'] = $this->dashboard_model->get_online();
            $data['pengumuman'] = $this->pengumuman_model->pengumuman_jumlah_kategori();
            $data['jml'] = $this->pengumuman_model->pengumuman_kategori();
            $jum = $this->pengumuman_model->pengumuman_author($author);
            $page = $this->uri->segment(6);
            if (!$page) :
                $offset = 0; else :
                $offset = $page;
            endif;
            $limit = 4;
            $config['base_url'] = base_url().'/staff/home/author/'.$author.'/'.'page/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 6;
            $config['full_tag_open'] = '<div class="pagging text-center"><ul class="pagination justify-content-center pull-right">';
            $config['full_tag_close'] = '</ul></div>';
            $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close'] = '</span></li>';
            $config['cur_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close'] = '</span>Next</li>';
            $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close'] = '</span></li>';
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Next >>';
            $config['prev_link'] = '<< Prev';
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();
            $data['posts'] = $this->pengumuman_model->pengumuman_perpage_author($author, $offset, $limit);
            // $data['kat'] = $this->kategori_model->get_all_kategori();

            $this->load->view('staff/author', $data);
        } else {
            redirect('staff/home', 'refresh');
        }
    }

    public function authors($author)
    {
        if (!empty($author) && $this->session->userdata('staff_login') == true) {
            $id_staff = $this->session->userdata('ses_id');
            $datak = $this->dashboard_model->get_login_stnow($id_staff);
            $q = $datak->row_array();
            $data['fotok'] = $q['foto'];
            $data['niss'] = $q['nis'];
            $data['namanw'] = $q['nama'];
            $data['online'] = $this->dashboard_model->get_online();
            $data['pengumuman'] = $this->pengumuman_model->pengumuman_jumlah_kategori();
            $data['jml'] = $this->pengumuman_model->pengumuman_kategori();
            $jum = $this->pengumuman_model->pengumuman_authors($author);
            $page = $this->uri->segment(6);
            if (!$page) :
                $offset = 0; else :
                $offset = $page;
            endif;
            $limit = 4;
            $config['base_url'] = base_url().'/staff/home/author/'.$author.'/'.'page/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 6;
            $config['full_tag_open'] = '<div class="pagging text-center"><ul class="pagination justify-content-center pull-right">';
            $config['full_tag_close'] = '</ul></div>';
            $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close'] = '</span></li>';
            $config['cur_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close'] = '</span>Next</li>';
            $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close'] = '</span></li>';
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Next >>';
            $config['prev_link'] = '<< Prev';
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();
            $data['posts'] = $this->pengumuman_model->pengumuman_perpage_authors($author, $offset, $limit);
            // $data['kat'] = $this->kategori_model->get_all_kategori();

            $this->load->view('staff/author', $data);
        } else {
            redirect('staff/home', 'refresh');
        }
    }
}
