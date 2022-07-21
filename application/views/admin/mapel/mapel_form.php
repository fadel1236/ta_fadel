<div class="px-4 py-3">

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h3 class="m-b-10" style="font-weight:bold">Halaman Detail Mata Pelajaran</h3>
                        <p>Berikut merupakan halaman detail dan informasi dari mata pelajaran</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="button-place mb-3">
        <a href="<?= $_SERVER['HTTP_REFERER']?>" class="btn btn-unique"><i class="fas fa-arrow-left"></i> Kembali Ke Halaman Berikutnya</a>

        <a href="" class="btn btn-unique"><i class="fas fa-sync-alt"></i> Muat Ulang Halaman</a>
    </div>

    <?php $ck = ''; if($ck = $this->session->flashdata('msg')) {?>
    <div class="row">
        <div class="col-12">
            <label class="w-100 alert alert-<?= explode('|', $ck)[1]?>" for=""><b><?= explode('|', $ck)[0]?></b></label>
        </div>
    </div>
    <?php }; ?>

    <?= form_open_multipart($action)?>
    <?= form_hidden('id', $inmapel['id']) ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 style="font-weight:bold">Informasi Mata Pelajaran</h6>
                    <hr>

                    <div class="form-group row">
                        <label for="" class="col-3">Nama Mata Pelajaran </label>
                        <div class="col-9">
                            <input type="text" name="namaMapel" id="" class="form-control form-control-sm" value="<?= $inmapel['mapel_nama']?>" placeholder="Contoh : Fisika Dasar">
                            <small>Masukkan nama pelajaran disini</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-3">Kode Mata Pelajaran </label>
                        <div class="col-9">
                            <input type="text" name="kodeMapel" id="" class="form-control form-control-sm" value="<?= $inmapel['mapel_kode']?>" placeholder="Contoh : A012">
                            <small>Masukkan nama pelajaran disini</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-3">Durasi Pelajaran Dalam Seminggu </label>
                        <div class="col-9">
                            <input type="number" min="1" name="jamMapel" id="" class="form-control form-control-sm" value="<?= $inmapel['mapel_jp']?>">
                            <small>Masukkan durasi pelajaran dengan angka, semisal apabila 2 jam pelajaran masukkan 2, dan seterusnya</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 style="font-weight:bold">Guru Mata Pelajaran</h6>
                    <hr>

                    <div class="form-group row">
                        <label for="" class="col-3">Pilih Guru</label>
                        <div class="col-5">
                            <?= cmb_dinamis('','tbl_guru','guru_nama','id','','ASC', null, 'optGuru')?>
                        </div> <div class="col-1"></div>
                        <button type="button" class="col-3 w-100 btn btn-unique" id="addGuruBtn"><i class="fas fa-plus pr-1"></i> Tambah Guru</button>
                    </div>

                    <hr>
                    
                    <div class="form-group" id="bodyAppendGuru">

                        <?php $id_guru = '';if(isset($gurumapel)){
                                foreach($gurumapel as $g) { $id_guru .= $g['id'].','?>
                                <label for="" class="btn-unique py-1 px-2 infoGuru" style="border-radius:3px;"><?= $g['guru_nama']?>
                                    <button type="button" class="deleteBtn" style="background:transparent; border:none; padding:0; margin-left:10px;" value="<?= $g['id'] ?>">
                                        <i class="fas fa-trash-alt" style="color:red"></i>
                                    </button>
                                </label>
                        <?php }} ?>

                    </div>
                    <small style="color:red;"></small>

                    <input type="hidden" name="id_guru" id="idGuru" value="<?= $id_guru ?>">

                </div>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-unique w-100">Simpan Perubahan</button>
        </div>
    </div>
    <?= form_close()?>

</div>

<script>    

    // Add guru 
    let arrayNamaGuru = []; let arrayIdGuru = [];
    document.querySelectorAll('.infoGuru').forEach(a => {
       arrayNamaGuru.push(a.firstChild.data.trim());
       arrayIdGuru.push(a.getElementsByTagName('button')[0].value);
    });;

    let targetAppend = document.querySelector('#bodyAppendGuru');

    const btnAddGuru = document.querySelector('#addGuruBtn');
    btnAddGuru.addEventListener('click', function() {
        let targetOpt = document.querySelector('#optGuru');
        let idGuru = targetOpt.value;
        let namaGuru = targetOpt.options[targetOpt.selectedIndex].text;
        let strAlert = '';

        if(!arrayIdGuru.includes(idGuru)){

            arrayIdGuru.push(idGuru);
            arrayNamaGuru.push(namaGuru);

            let html = ``;   let valuePost = '';
            for(let i=0; i < arrayIdGuru.length; i++){
                valuePost += arrayIdGuru[i]+',';
                html += `
                    <label for="" class="btn-unique py-1 px-2 infoGuru" style="border-radius:3px;">${arrayNamaGuru[i]}
                        <button type="button" class="deleteBtn" style="background:transparent; border:none; padding:0; margin-left:10px;" value="${arrayIdGuru[i]}">
                            <i class="fas fa-trash-alt" style="color:red"></i>
                        </button>
                    </label>
                `;
            }
            
            targetAppend.innerHTML = html;
            document.querySelector('#idGuru').value = valuePost;

        } else {strAlert = 'Guru Telah Terdaftar Pada Mata Pelajaran Ini'};
        targetAppend.nextSibling.nextSibling.innerHTML = strAlert;
    });

    // DeleteBtn
    btnEvent(document.querySelectorAll('.deleteBtn'));

    document.querySelector('#addGuruBtn').addEventListener('click', function(){

        btnEvent(document.querySelectorAll('.deleteBtn'));

    });

    function btnEvent(deleteBtn) {
        deleteBtn.forEach(a => {
            a.addEventListener('click', function(){
                let index = arrayIdGuru.indexOf(a.value);      
                arrayIdGuru.splice(index, 1);

                a.parentElement.remove();

                console.log(a);

                let valuePost = '';
                for(let i=0; i < arrayIdGuru.length; i++){
                    valuePost += arrayIdGuru[i]+',';
                } document.querySelector('#idGuru').value = valuePost;
            });
        });
    }

   


</script>