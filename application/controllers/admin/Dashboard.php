<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_widget");
    }

    public function index()

    {
        $data['guru']         = $this->m_widget->total_guru();
        // print_r($data['guru']);
        // die;
        $data['mapel']         = $this->m_widget->total_mapel();
        $data['kelas']         = $this->m_widget->total_kelas();
        // redirect('auth');
        // $this->load->view('maintenance/still_working.php');
        $this->template->load('template_admin', 'admin/dashboard_page', $data);
    }
}
