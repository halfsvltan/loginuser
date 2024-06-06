<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        cek_login(); // Pastikan fungsi cek_login() terdefinisi dengan benar
    }

    public function index() {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        
        $this->load->view('adm/header', $data);
        $this->load->view('adm/sidebar', $data);
        $this->load->view('adm/topbar', $data);
        $this->load->view('adm/index', $data);
        $this->load->view('adm/footer');
    }
}
