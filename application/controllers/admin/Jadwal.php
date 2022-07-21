<?php
class Jadwal extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_kelas');
        $this->load->model('admin/M_guru');
        $this->load->model('admin/M_pelajaran');
    }

    public function index()
    {
        $data['list'] = $this->M_kelas->get_all_kelas("")->result_array();
        $this->template->load('template_admin', 'admin/jadwal/jadwal_manage', $data);
    }

    public function lihat_jadwal2()
    {
        $data['list'] = $this->M_kelas->get_all_kelas("")->result_array();
        $this->template->load('template_admin', 'admin/jadwal/lihat_jadwal', $data);
    }

    public function lihat_jadwal()
    {

        $arrayKelas = $this->M_kelas->get_all_kelas('10')->result_array();
        $arrayKodeGuru = $this->convert_1dimension_array($this->M_guru->get_all_kode()->result_array(), 'guru_kode');
        $constValue = 0.45;

        foreach ($arrayKelas as $idKelas) {
            $arrayMapel[$idKelas['kelas_alias']] = $this->M_pelajaran->count_mapel_kelas($idKelas['id'])->result_array();

            $tempArray = $arrayMapel[$idKelas['kelas_alias']];

            foreach ($tempArray as $index => $value) {

                $tempArray[$index]['cg_value'] = $value['total_kelas'] / $value['mapel_jp'];
                $tempArray[$index]['conflict_value'] = round($constValue / $tempArray[$index]['cg_value'], 4);
            }

            array_multisort(array_column($tempArray, 'conflict_value'), SORT_DESC, $tempArray);

            $j = 0;
            $num = 0;

            while (count($tempArray) > 0) {
                $lastIndex = 0;

                foreach ($tempArray as $index => $value) {
                    $skip = 0;
                    $oldnum = $num;
                    $num += $value['mapel_jp'];

                    if ($value['mapel_jp'] == 2 || $value['mapel_jp'] == 4) {
                        if ($value['mapel_jp'] == $lastIndex) {
                            $skip = 1;
                        }
                    }

                    if ($num <= 9 && $skip != 1) {

                        $arrayHari[$idKelas['kelas_nama']][$j][] = $value;
                        unset($tempArray[$index]);

                        if ($num == 8 || $num == 9) {
                            $num = 0;
                            $j++;
                        }
                    } else {
                        $num = $oldnum;
                    }

                    $lastIndex = $value['mapel_jp'];
                }
            }
        }

        $labelDay = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $groupedDayArray = array();
        foreach ($arrayHari as $ary) {
            foreach ($ary as $idx => $ar) {
                foreach ($ar as $r) {
                    $groupedDayArray[$labelDay[$idx]][] = $r;
                }
            }
        }

        foreach ($arrayKodeGuru as $kdGu) {
            foreach ($groupedDayArray as $keys => $gr) {
                $arrayCount[$keys][$kdGu] = 0;
                foreach ($gr as $idx => $g) {
                    if ($kdGu == $g['guru_kode']) {
                        $arrayCount[$keys][$kdGu] = $arrayCount[$keys][$kdGu] + $g['mapel_jp'];

                        if ($arrayCount[$keys][$kdGu] > 9) {
                            $switchArray[$keys][] = $idx;
                        }
                    }
                }
            }
        }

        $groupedDayArray = $this->get_jp_guru($groupedDayArray);
        $groupedDayArray = $this->sort_by_guru($groupedDayArray);

        // $this->debug($groupedDayArray);

        $data['jadwal'] = $groupedDayArray;
        $data['list'] = $this->M_kelas->get_all_kelas("")->result_array();
        $this->template->load('template_admin', 'admin/jadwal/lihat_jadwal', $data);
    }

    public function get_jp_guru($groupedDayArray)
    {
        foreach ($groupedDayArray as $key_hari => $value_hari) {
            foreach ($value_hari as $key_perhari => $value_perhari) {
                $jp_guru = 0;
                $jp_kelas = 0;
                foreach ($value_hari as $key => $value) {
                    if ($value['guru_kode'] == $value_perhari['guru_kode']) {
                        $jp_guru = $jp_guru + $value['mapel_jp'];
                    }
                    if ($value['id_kelas'] == $value_perhari['id_kelas']) {
                        $jp_kelas = $jp_kelas + $value['mapel_jp'];
                    }
                }
                $groupedDayArray[$key_hari][$key_perhari]['total_jp_guru'] = $jp_guru;
                $groupedDayArray[$key_hari][$key_perhari]['total_jp_kelas'] = $jp_kelas;
            }
        }
        return $groupedDayArray;
    }

    public function get_jp_guru_copy($data, $guru_kode)
    {
        $jp = 0;
        foreach ($data as $key => $value) {
            if ($data['guru_kode'] == $guru_kode) {
                $jp = $jp + $data['mapel_jp'];
            }
        }
        return $jp;
    }

    public function sort_by_guru($groupedDayArray)
    {
        foreach ($groupedDayArray as $key2 => $today) {
            $sortArray = array();
            foreach ($today as $class) {
                foreach ($class as $key => $value) {
                    if (!isset($sortArray[$key])) {
                        $sortArray[$key] = array();
                    }
                    $sortArray[$key][] = $value;
                }
            }
            array_multisort($sortArray['guru_kode'], SORT_ASC, $groupedDayArray[$key2]);
        }

        return $groupedDayArray;
    }

    function convert_1dimension_array($array, $column)
    {
        $arrayReturn = array();
        foreach ($array as $ar) {
            $arrayReturn[] = $ar[$column];
        }
        return $arrayReturn;
    }
}
