<?php

    class M_guru extends MY_Model
    {
        protected $primary = 'tbl_guru';
       
        // Universal CRUD
        public function insert($table, $data, $batch = false)
        {
            if($batch != false){
                $this->db->insert_batch($table, $data);
            } else { $this->db->insert($table, $data); }

            return $this->db->insert_id();
        }

        public function update($table, $data, $where)
        {
            $this->db->where($where);
            return $this->db->update($table, $data);
        }
        
        public function delete($table, $where)
        {
            $this->db->where($where);
            return $this->db->delete($table);
        }

        // Get Guru
        public function get_all_table_guru()
        {
            // Minimaze data 
            $this->db->select('
                gr.*,
            ');

            return $this->db->get($this->primary.' as gr');
        }

        public function get_all_kode()
        {
              // Minimaze data 
            $this->db->select('
              gr.guru_kode,
            ');

            return $this->db->get($this->primary.' as gr');
        }

        public function get_detail_guru($id)
        {
            // Minimaze data 
            $this->db->select('
                gr.*,
            ');

            $this->db->where('gr.id', $id);
            return $this->db->get($this->primary.' as gr');
        }
    }

?>