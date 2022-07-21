<?php
class Kelas extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_kelas');
        $this->load->model('admin/M_pelajaran');
    }

    public function index()
    {
        $data['list'] = $this->M_kelas->get_all_kelas("")->result_array();
        $this->template->load('template_admin', 'admin/kelas/kelas_manage', $data);
    }

    public function kelas_add()
    {
        $data['inkelas'] = array(
            'id' => 0,
            // 'kelas_level' => '',
            'kelas_nama' => '',
            'kelas_alias' => '',
            'kelas_jenis' => '',
        );


        $data['mapel'] = $this->M_pelajaran->get_mapel_and_guru()->result_array();

        $data['action'] = 'admin/kelas/kelas_insert';
        $this->template->load('template_admin', 'admin/kelas/kelas_form', $data);
    }

    public function kelas_insert()
    {
        $post = $this->input->post();
        $validate = $post;
        unset($validate['id_ajar']);

        $this->form_rules_required($validate);
        if ($this->form_validation->run() != False) {

            $dataInsert = array(
                'kelas_level' => 10,
                // 'kelas_level' => $post['levelKelas'],
                'kelas_nama' => $post['namaKelas'],
                'kelas_alias' => $post['aliasKelas'],
                'kelas_jenis' => $post['jenisKelas'],
            );

            $id = $this->M_kelas->insert('tbl_kelas', $dataInsert);

            $this->M_pelajaran->delete('tbl_aktivitas', array('id_kelas' => $id));

            if ($post['id_ajar'] != '') {
                $dataMapel = array();
                foreach (explode(',', substr($post['id_ajar'], 0, -1)) as $g) {
                    array_push($dataMapel, array(
                        'id_kelas' => $id,
                        'id_ajar' => $g
                    ));
                }

                $this->M_pelajaran->insert('tbl_aktivitas', $dataMapel, true);
            }

            $this->session->set_flashdata('msg', 'Berhasil Mendaftarkan Kelas Beserta Mata Pelajarannya|success');
            redirect('admin/kelas');
        } else {
            $this->session->set_flashdata('msg', 'Silahkan Mengisi Inputan Secara Keseluruhan|danger');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function kelas_edit($id)
    {
        $data['inkelas'] = $this->M_kelas->get_kelas_byid($id)->row_array();
        $data['regist_mapel'] = $this->M_pelajaran->get_kelas_mapel_byid($id)->result_array();

        // $this->debug($data['regist_mapel']);
        // die;

        $data['mapel'] = $this->M_pelajaran->get_mapel_and_guru()->result_array();

        $data['action'] = 'admin/kelas/kelas_update';
        $this->template->load('template_admin', 'admin/kelas/kelas_form', $data);
    }

    public function kelas_update()
    {
        $post = $this->input->post();
        $validate = $post;
        unset($validate['id_ajar']);

        $this->form_rules_required($validate);
        if ($this->form_validation->run() != False) {

            $dataInsert = array(
                'kelas_level' => 10,
                // 'kelas_level' => $post['levelKelas'],
                'kelas_nama' => $post['namaKelas'],
                'kelas_alias' => $post['aliasKelas'],
                'kelas_jenis' => $post['jenisKelas'],
            );

            $this->M_kelas->update('tbl_kelas', $dataInsert, array('id' => $post['id']));

            $this->M_pelajaran->delete('tbl_aktivitas', array('id_kelas' => $post['id']));

            if ($post['id_ajar'] != '') {
                $dataMapel = array();
                foreach (explode(',', substr($post['id_ajar'], 0, -1)) as $g) {
                    array_push($dataMapel, array(
                        'id_kelas' => $post['id'],
                        'id_ajar' => $g
                    ));
                }

                $this->M_pelajaran->insert('tbl_aktivitas', $dataMapel, true);
            }

            $this->session->set_flashdata('msg', 'Berhasil Menyunting Kelas Beserta Mata Pelajarannya|success');
            redirect('admin/kelas');
        } else {
            $this->session->set_flashdata('msg', 'Silahkan Mengisi Inputan Secara Keseluruhan|danger');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function kelas_delete()
    {
        $post = $this->input->post();

        $this->M_kelas->delete('tbl_kelas', array('id' => $post['id']));
        $this->session->set_flashdata('msg', 'Berhasil Menghapus Kelas|success');
        redirect('admin/kelas');
    }
}
