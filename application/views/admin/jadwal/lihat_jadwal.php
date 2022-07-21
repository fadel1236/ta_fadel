<div class="px-4 py-3">

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h3 class="m-b-10" style="font-weight:bold">Halaman Manajemen Kelas</h3>
                        <p>Berikut merupakan halaman untuk mengelola kelas dan mata pelajaran yang dimilikinya </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="button-place mb-3">
        <!-- <a href="<?= base_url('admin/kelas/kelas_add') ?>" class="btn btn-unique"><i class="fas fa-plus"></i> Tambah Kelas</a> -->

        <a href="" class="btn btn-unique"><i class="fas fa-sync-alt"></i> Muat Ulang Halaman</a>
    </div>

    <?php $ck = '';
    if ($ck = $this->session->flashdata('msg')) { ?>
        <div class="row">
            <div class="col-12">
                <label class="w-100 alert alert-<?= explode('|', $ck)[1] ?>" for=""><b><?= explode('|', $ck)[0] ?></b></label>
            </div>
        </div>
    <?php }; ?>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap table-font-sm" id="simpleTable" style="width:100% !important; font-size:12px">
                            <thead>
                                <tr>
                                    <th>Jam\Hari</th>
                                    <th>Senin</th>
                                    <th>Selasa</th>
                                    <th>rabu</th>
                                    <th>Kamis</th>
                                    <th>Jumat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $jam[1] = '08.00-08.45';
                                $jam[2] = '08.45-09.30';
                                $jam[3] = '09.30-10.15';
                                $jam[4] = '10.15-11.00';
                                $jam[5] = '11.00-11.45';
                                $jam[6] = '11.45-12.30';
                                $jam[7] = '12.30-13.15';
                                $jam[8] = '13.15-14.00';
                                $jam[9] = '14.00-14.45';
                                $jam[10] = '14.45-15.30';
                                $jam[11] = '15.30-16.15';
                                $labelDay = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

                                ?>
                                <?php foreach ($jam as $ja => $waktu) { ?>
                                    <?php if ($ja == 1) { ?>
                                        <tr>
                                            <td><?php echo $waktu ?></td>
                                            <td>Apel Pagi</td>
                                            <td>Apel Pagi</td>
                                            <td>Apel Pagi</td>
                                            <td>Apel Pagi</td>
                                            <td>Apel Pagi</td>
                                        </tr>
                                    <?php } elseif ($ja == 6) { ?>
                                        <tr>
                                            <td><?php echo $waktu ?></td>
                                            <td>Jam Istirahat</td>
                                            <td>Jam Istirahat</td>
                                            <td>Jam Istirahat</td>
                                            <td>Jam Istirahat</td>
                                            <td>Jam Istirahat</td>
                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <td><?php echo $waktu ?></td>
                                            <?php foreach ($labelDay as $day) { ?>

                                                <td></td>

                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>

                                <!-- 
                                    <?php
                                    foreach ($list as $l) { ?>
                                    <tr>
                                        <td width="5%"><?= $no ?></td>
                                        <td width="5%"><?= ucwords($l['kelas_level']) ?></td>
                                        <td><?= ucwords($l['kelas_nama']) ?></td>
                                        <td><?= ucwords($l['kelas_jenis']) ?></td>
                                        <td width="10%">
                                            <a href="<?= base_url() ?>admin/jadwal/lihat_jadwal/<?= $l['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                        $no++;
                                    };
                                ?> 
                                    -->

                            </tbody>
                        </table>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#simpleTable').DataTable({
                                // "lengthChange": false,   
                                // "searching" : false,
                            });
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered w-25" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <?= form_open('admin/kelas/kelas_delete') ?>
                    <input type="hidden" name="id" id="idUserDelete" value="">

                    <h6 class="text-center mb-3">Apakah yakin ingin menghapus?</h6>
                    <div class="form-group text-center m-0">
                        <button type="button" data-dismiss="modal" class="btn-secondary btn-sm btn">Tidak, Jangan Hapus</button>
                        <button type="submit" id="confirmDelBtn" class="btn-danger btn-sm btn">Iya, saya yakin</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>

        <script>
            const btn = document.querySelectorAll('.deleteBtn');

            for (let i = 0; i < btn.length; i++) {
                btn[i].addEventListener('click', function() {
                    document.querySelector('#idUserDelete').value = this.value;
                });
            }
        </script>

    </div>