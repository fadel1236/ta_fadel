<?php

class M_kelas extends MY_Model
{
    protected $primary = 'tbl_kelas';
    protected $third = 'tbl_ajar';

    // Universal CRUD
    public function insert($table, $data, $batch = false)
    {
        if ($batch != false) {
            $this->db->insert_batch($table, $data);
        } else {
            $this->db->insert($table, $data);
        }

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

    public function get_all_kelas($sel)
    {
        // Minimaze data 
        $this->db->select("
                kls.*
            ");
        if ($sel != "")
            $this->db->where('kelas_level', $sel);

        return $this->db->get($this->primary . ' as kls');
    }

    public function get_kelas_byid($id)
    {
        $this->db->select('
                kls.*
                ');

        $this->db->where('id', $id);
        return $this->db->get($this->primary . ' as kls');
    }
}
