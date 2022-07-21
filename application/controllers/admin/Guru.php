<?php
Class Guru extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_guru');
    }

    public function index()
    {
        // Taking from DB
        $data['list'] = $this->M_guru->get_all_table_guru()->result_array();

        $this->template->load('template_admin','admin/guru/guru_manage', $data);
    }

    public function guru_add()
    {
        $data['inguru'] = array(
            'id' => 0,
            'guru_kode' => '',
            'guru_nip' => '',
            'guru_nama' => '',
            'guru_jam_ajar' => ''
        );

        $data['action'] = 'admin/guru/guru_insert';
        $this->template->load('template_admin','admin/guru/guru_form', $data);
    }

    public function guru_insert()
    {
        $post = $this->input->post();

        $this->form_rules_required($post);
        if($this->form_validation->run() != False){

            $dataInsert = array( 
                'guru_nip' => $post['nipGuru'], 
                'guru_kode' => $post['kodeGuru'],
                'guru_nama' => $post['namaGuru'], 
                'guru_jam_ajar' => $post['jamAjar'],
            );  $this->M_guru->insert('tbl_guru', $dataInsert);

            $this->session->set_flashdata('msg', 'Berhasil Menambahkan Tenaga Pengajar|success'); redirect('admin/guru');

        } else {$this->session->set_flashdata('msg', 'Silahkan Mengisi Inputan Secara Keseluruhan|danger'); redirect($_SERVER['HTTP_REFERER']);}

    }
    
    public function guru_edit($id)
    {
        $data['inguru'] = $this->M_guru->get_detail_guru($id)->row_array();

        $data['action'] = 'admin/guru/guru_update';
        $this->template->load('template_admin','admin/guru/guru_form', $data);
    }

    public function guru_update()
    {
        $post = $this->input->post();
        $this->form_rules_required($post);

        if($this->form_validation->run() != False){

            $dataUpdate = array( 
                'guru_nip' => $post['nipGuru'], 
                'guru_kode' => $post['kodeGuru'],
                'guru_nama' => $post['namaGuru'], 
                'guru_jam_ajar' => $post['jamAjar'],
            );  $this->M_guru->update('tbl_guru', $dataUpdate, array('id' => $post['id']));

            $this->session->set_flashdata('msg', 'Berhasil Menyunting Tenaga Pengajar|success'); redirect('admin/guru');

        } else {$this->session->set_flashdata('msg', 'Silahkan Mengisi Inputan Secara Keseluruhan|danger'); redirect($_SERVER['HTTP_REFERER']);}
    }

    public function guru_delete()
    {
        $post = $this->input->post();
        
        $this->M_guru->delete('tbl_guru', array('id' => $post['id']));
        $this->session->set_flashdata('msg', 'Berhasil Menghapus Tenaga Pengajar|success'); redirect ('admin/guru');
    }

}