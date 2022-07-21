<?php
defined('BASEPATH') or exit('No direct script access allowed');
class m_widget extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function total_guru()
  {
    $query  = $this->db->query("SELECT * FROM tbl_guru");
    return $query->num_rows();
  }
  public function total_kelas()
  {
    $query  = $this->db->query("SELECT * FROM tbl_kelas");
    return $query->num_rows();
  }
  public function total_mapel()
  {
    $query  = $this->db->query("SELECT * FROM tbl_mapel");
    return $query->num_rows();
  }




  function __destruct()
  {
    $this->db->close();
  }
}
