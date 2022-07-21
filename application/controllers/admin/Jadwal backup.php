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
        // print_r($arrayKodeGuru);
        // die;
        $constValue = 0.45;

        foreach ($arrayKelas as $idKelas) {
            $arrayMapel[$idKelas['kelas_alias']] = $this->M_pelajaran->count_mapel_kelas($idKelas['id'])->result_array();

            $tempArray = $arrayMapel[$idKelas['kelas_alias']];

            foreach ($tempArray as $index => $value) {

                $tempArray[$index]['cg_value'] = $value['total_kelas'] / $value['mapel_jp'];
                $tempArray[$index]['conflict_value'] = round($constValue / $tempArray[$index]['cg_value'], 4);
            }

            array_multisort(array_column($tempArray, 'conflict_value'), SORT_DESC, $tempArray);

            // echo $idKelas['kelas_nama'];

            // $this->debug($tempArray);

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

                        // echo 'if'.$num.'|';
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
                    // echo $idx;
                    if ($kdGu == $g['guru_kode']) {
                        $arrayCount[$keys][$kdGu] = $arrayCount[$keys][$kdGu] + $g['mapel_jp'];

                        if ($arrayCount[$keys][$kdGu] > 9) {
                            $switchArray[$keys][] = $idx;
                            // echo 'Hari ' . $keys . ' Key = ' . $idx . ' Total Mengajar ' . $arrayCount[$keys][$kdGu] . '<br>';
                        }
                    }
                }

                // $this->debug($arrayCount);

            }
        }

        // ----------------------------------------------------------------------------------
        // ----------------------------------------------------------------------------------
        // ----------------------------------START ELKO--------------------------------------
        // ----------------------------------------------------------------------------------
        // ----------------------------------------------------------------------------------
        echo '<pre>';
        $total_loop = 0;

        $groupedDayArray = $this->get_jp_guru($groupedDayArray);
        $groupedDayArray = $this->sort_by_guru($groupedDayArray);

        // $groupedDayArray = $this->switcher($groupedDayArray);
        // $groupedDayArray = $this->switcher($groupedDayArray);
        // $groupedDayArray = $this->switcher($groupedDayArray);
        // $groupedDayArray = $this->sort_by_guru($groupedDayArray);
        // $groupedDayArray = $this->get_jp_guru($groupedDayArray);
        $this->debug($groupedDayArray);
        // die;

        // // echo 'total loop: ' . $total_loop;
        // $beban = $this->beban($groupedDayArray);
        // $beban['mantap'] = $this->get_jp_guru($beban['mantap']);
        // $beban['beban']  = $this->get_jp_guru($beban['beban']);

        // $beban = $this->beban_mix($beban);
        // $beban['mantap'] = $this->get_jp_guru($beban['mantap']);
        // $beban['beban']  = $this->get_jp_guru($beban['beban']);
        // $this->debug($beban);
        // die;

        // $beban = $this->beban($beban['mantap']);
        // $beban['mantap'] = $this->get_jp_guru($beban['mantap']);
        // $beban2['beban'] = $this->get_jp_guru($beban['beban']);
        // // array_push($beban['beban'], $beban2['beban']);

        // $beban = $this->beban($beban['mantap']);
        // $beban['mantap'] = $this->get_jp_guru($beban['mantap']);
        // $beban3['beban'] = $this->get_jp_guru($beban['beban']);
        // // array_push($beban['beban'], $beban2['beban']);

        // $beban = $this->beban($beban['mantap']);
        // $beban['mantap'] = $this->get_jp_guru($beban['mantap']);
        // $beban4['beban'] = $this->get_jp_guru($beban['beban']);
        // // array_push($beban['beban'], $beban2['beban']);

        // $beban = $this->beban($beban['mantap']);
        // $beban['mantap'] = $this->get_jp_guru($beban['mantap']);
        // $beban5['beban'] = $this->get_jp_guru($beban['beban']);
        // // array_push($beban['beban'], $beban2['beban']);

        // $beban = $this->beban($beban['mantap']);
        // $beban['mantap'] = $this->get_jp_guru($beban['mantap']);
        // $beban6['beban'] = $this->get_jp_guru($beban['beban']);
        // array_push($beban['beban'], $beban2['beban']);
        // array_push($beban['beban'], $beban2['beban'], $beban3['beban'], $beban4['beban'], $beban5['beban'], $beban6['beban']);

        // $this->debug($beban['mantap']);
        // $this->debug($beban['beban']);
        // $this->debug($beban2['beban']);

        // $beban = $this->beban_mix($beban);
        // $beban['mantap'] = $this->get_jp_guru($beban['mantap']);
        // $beban['beban'] = $this->get_jp_guru($beban['beban']);

        // $this->debug($beban);
        // $this->debug($baru);
        // $this->debug($groupedDayArray);
        echo '</pre>';
    }

    public function beban($groupedDayArray)
    {
        // $groupedDayArray = $this->get_jp_guru($groupedDayArray);
        $beban1 = [];
        $beban2 = [];
        foreach ($groupedDayArray as $i => $value_hari) {
            $guru = '';
            foreach ($value_hari as $j => $value_perhari) {
                // jika lebih dari 9
                if ($value_perhari['total_jp_guru'] > 9) {
                    // if ($value_perhari['guru_kode'] != $guru) {
                    $beban2[$i][$j] = $value_perhari;
                    //     $guru = $value_perhari['guru_kode'];
                    // } else {
                    //     $beban1[$i][$j] = $value_perhari;
                    // }
                } else {
                    $beban1[$i][$j] = $value_perhari;
                    // return $this->beban($beban1);
                }
            }
        }

        return ['mantap' => $beban1, 'beban' => $beban2];
    }

    public function beban_mix($beban)
    {
        $beban1 = $beban['mantap'];
        $beban2 = $beban['beban'];
        $tampung = [];
        // for mantap
        foreach ($beban1 as $i => $beban_hari1) {
            foreach ($beban_hari1 as $j => $beban_perhari1) {

                // for beban
                foreach ($beban2 as $k => $beban_hari2) {
                    foreach ($beban_hari2 as $l => $beban_perhari2) {

                        // cek
                        if (!in_array($beban_perhari2, $tampung)) {
                            if ($beban_perhari1['id_kelas'] == $beban_perhari2['id_kelas'] and $beban_perhari1['mapel_jp'] == $beban_perhari2['mapel_jp']) {
                                if ($beban_perhari1['total_jp_guru'] + $beban_perhari2['mapel_jp'] <= 9) {

                                    array_push($beban1[$i], $beban_perhari2);
                                    unset($beban2[$k][$l]);

                                    array_push($tampung, $beban_perhari2);
                                    break 2;
                                }
                            }
                        }
                    }
                }
            }
        }
        // $this->debug($tampung);
        // die;
        return ['mantap' => $beban1, 'beban' => $beban2];
    }

    // public function switcher($groupedDayArray)
    // {
    //     // switch yg jp guru lebih dari 9
    //     $labelDay = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
    //     $indexDay = 0;
    //     $all_done = true;
    //     // week to day
    //     foreach ($groupedDayArray as $i => $value_hari) {
    //         // day to class
    //         foreach ($value_hari as $j => $value_perhari) {

    //             // if class jp > 9
    //             if ($value_perhari['total_jp_guru'] > 9) {

    //                 // today and next day value
    //                 $l_day = $labelDay[$indexDay];
    //                 $l_next = $labelDay[$indexDay + 1];

    //                 $today = $value_perhari;
    //                 $nextday = $groupedDayArray[$l_next];

    //                 // day to class for next day
    //                 foreach ($nextday as $key => $value_next) {

    //                     // if today class and jp is equal to nextday class
    //                     if ($today['id_kelas'] == $value_next['id_kelas'] and $today['mapel_jp'] == $value_next['mapel_jp']) {

    //                         echo $l_day . '_' . $j . ' <> ' . $l_next . '_' . $key . '<br>';
    //                         // // before switch
    //                         // echo $l_day . '<br>';
    //                         // print_r($groupedDayArray[$l_day][$j]);
    //                         // echo $l_next . '<br>';
    //                         // print_r($groupedDayArray[$l_next][$key]);

    //                         // switch
    //                         $groupedDayArray[$l_day][$j] = $value_next;
    //                         $groupedDayArray[$l_next][$key] = $today;

    //                         // after switch 
    //                         // echo 'after switched' . '<br>';
    //                         // echo $l_day . '<br>';
    //                         // print_r($groupedDayArray[$l_day][$j]);
    //                         // echo $l_next . '<br>';
    //                         // print_r($groupedDayArray[$l_next][$key]);

    //                         // echo '---------- NEXT ----------' . '<br><br><br>';

    //                         // recount total_jp_guru
    //                         $groupedDayArray = $this->get_jp_guru($groupedDayArray);
    //                         break;
    //                     }
    //                 }
    //             }
    //         }
    //         $indexDay++;
    //         if ($indexDay == 4) {
    //             $indexDay = 0;
    //         }
    //     }

    // cek if all already done
    //     if ($all_done)
    //         foreach ($groupedDayArray as $i => $value_hari) {
    //             foreach ($value_hari as $j => $value_perhari) {
    //             }
    //         }
    //     return $groupedDayArray;
    // }

    public function get_jp_guru($groupedDayArray)
    {
        // hitung JP Guru dan Kelas
        foreach ($groupedDayArray as $key_hari => $value_hari) {
            foreach ($value_hari as $key_perhari => $value_perhari) {
                // guru -> masing2 perhari tidak boleh lebih dari 9 jp
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

                // kelas  -> masing2 perhari tidak boleh lebih dari 9 jp

            }
            // print_r($valueel);
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

    // ----------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------
    // -----------------------------------END ELKO---------------------------------------
    // ----------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------

    function convert_1dimension_array($array, $column)
    {
        $arrayReturn = array();
        foreach ($array as $ar) {
            $arrayReturn[] = $ar[$column];
        }
        return $arrayReturn;
    }
}
