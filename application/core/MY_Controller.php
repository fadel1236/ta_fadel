<?php

    class MY_Controller extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function form_rules_required($data, $required = 'required|trim')
        {
            foreach($data as $key => $value){
                $this->form_validation->set_rules($key, strtoupper($key), $required);
            }
        }

        public function form_rules_required_multiple($data, $rules = 'required|trim')
        {
            $this->form_validation->set_error_delimiters('<small style="color:red">', '</small>');
            foreach($data as $key => $value){
                if(is_array($data[$key]) == true){
                    foreach($data[$key] as $keyTwo => $val){
                        $this->form_validation->set_rules($key.'['.$keyTwo.']', 'Form Harus Diisi Dan Tidak Boleh Kosong', $rules);
                    }
                } else { $this->form_validation->set_rules($key, strtoupper($key), $rules); }
            }
        } 

        public function file_upload($path, $name, $type = 'gif|jpg|jpeg|png|docx')
        {
            $config['upload_path']          = $path;
            $config['allowed_types']        = $type;
            $config['overwrite']			= true;
            $config['encrypt_name']         = TRUE;
    
            $this->load->library('upload', $config);
    
            if($bool = $this->upload->do_upload($name)){
                return $this->upload->data();
            }else {
                echo $this->upload->display_errors();
                die;
            }
        }

        function debug($params)
        {
            if(is_array($params) == true){
                echo '<pre>';
                    print_r($params);
                echo '</pre>';
            } else {
                var_dump($params);
            }
        }
    }
    

?>