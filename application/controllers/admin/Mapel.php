<?php
Class Mapel extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_pelajaran');
    }

    public function index()
    {
        // Taking from DB
        $data['list'] = $this->M_pelajaran->get_all_table_mapel()->result_array();

        $this->template->load('template_admin','admin/mapel/mapel_manage', $data);
    }

    public function mapel_add()
    {
        $data['inmapel'] = array(
            'id' => 0,
            'mapel_kode' => '',
            'mapel_nama' => '',
            'mapel_jp' => 2,
            'date_regist' => '',
            'total' => 0,
        );

        $data['action'] = 'admin/mapel/mapel_insert';
        $this->template->load('template_admin','admin/mapel/mapel_form', $data);
    }

    public function mapel_insert()
    {
        $post = $this->input->post(); $validate = $post;
        unset($validate['id_guru']); 


        $this->form_rules_required($validate);
        if($this->form_validation->run() != False){
            
            $dataInsert = array(
                'mapel_kode' => $post['kodeMapel'],
                'mapel_nama' => $post['namaMapel'],
                'mapel_jp' => $post['jamMapel'],
            ); 
            
            $id = $this->M_pelajaran->insert('tbl_mapel', $dataInsert);

            $this->M_pelajaran->delete('tbl_ajar', array('id_mapel' => $id));

            if($post['id_guru'] != ''){
                $dataGuru = array();
                foreach(explode(',', substr($post['id_guru'], 0, -1)) as $g){
                    array_push($dataGuru, array(
                        'id_mapel' => $id, 
                        'id_guru' => $g
                    ));
                }  
                
                $this->M_pelajaran->insert('tbl_ajar', $dataGuru, true);
            }

            $this->session->set_flashdata('msg', 'Berhasil Menambahakan Mata Pelajaran|success'); redirect('admin/mapel');

        } else {$this->session->set_flashdata('msg', 'Silahkan Mengisi Inputan Secara Keseluruhan|danger'); redirect($_SERVER['HTTP_REFERER']);}
    }

    public function mapel_edit($id)
    {
        $data['inmapel'] = $this->M_pelajaran->get_mapel_id_only($id)->row_array();
        $data['gurumapel'] = $this->M_pelajaran->get_guru_by_mapel($id)->result_array();

        $data['action'] = 'admin/mapel/mapel_update';
        $this->template->load('template_admin','admin/mapel/mapel_form', $data);
    }

    public function mapel_update()
    {
        $post = $this->input->post(); $validate = $post;
        unset($validate['id_guru']); 

        $this->form_rules_required($validate);
        if($this->form_validation->run() != False){
            
            $dataUpdate = array(
                'mapel_kode' => $post['kodeMapel'],
                'mapel_nama' => $post['namaMapel'],
                'mapel_jp' => $post['jamMapel'],
            ); $this->M_pelajaran->update('tbl_mapel', $dataUpdate, array('id' => $post['id']));

            $this->M_pelajaran->delete('tbl_ajar', array('id_mapel' => $post['id']));

            if($post['id_guru'] != ''){
                $dataGuru = array();
                foreach(explode(',', substr($post['id_guru'], 0, -1)) as $g){
                    array_push($dataGuru, array(
                        'id_mapel' => $post['id'], 
                        'id_guru' => $g
                    ));
                }  
                
                $this->M_pelajaran->insert('tbl_ajar', $dataGuru, true);
            }

            $this->session->set_flashdata('msg', 'Berhasil Menyunting Mata Pelajaran|success'); redirect('admin/mapel');

        } else {$this->session->set_flashdata('msg', 'Silahkan Mengisi Inputan Secara Keseluruhan|danger'); redirect($_SERVER['HTTP_REFERER']);}
    }

    public function mapel_delete()
    {
        $post = $this->input->post();
        
        $this->M_pelajaran->delete('tbl_mapel', array('id' => $post['id']));
        $this->session->set_flashdata('msg', 'Berhasil Menghapus Mata Pelajaran|success'); redirect ('admin/mapel');
    }

}