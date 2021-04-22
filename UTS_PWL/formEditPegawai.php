<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
  require_once "Models/Pegawai.php";
  $pegawai = new Pegawai();
  $divisi = $pegawai->divisiPegawai();
  $data = $_REQUEST["id"];
  $edit = $pegawai->detail($data);
?>

<h3 class="text-center">Tambah Data Pegawai</h3>
</br>
<div class="card offset-2 justify-content-center border-2 bg-light" style="width: 50rem;">
  <div class="card-body">
    <form action="controller/pegawaiController.php" method="POST">
    <div class="form-group row">
        <label for="nip" class="col-4 col-form-label">NIP</label> 
        <div class="col-8">
        <div class="input-group">
            <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fa fa-address-card"></i>
            </div>
            </div> 
            <input id="nip" name="nip" type="text" required="required" class="form-control" value="<?= $edit["nip"]; ?>">
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-4 col-form-label">Nama</label> 
        <div class="col-8">
        <input id="nama" name="nama" type="text" required="required" class="form-control" value="<?= $edit["nama"]; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-4 col-form-label">Email</label> 
        <div class="col-8">
        <input id="email" name="email" type="text" required="required" class="form-control" value="<?= $edit["email"]; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4">Agama</label> 
        <div class="col-8">
            <?php
            $agama = ['Islam', 'Kristen Protestan', 'Kristen Katholik', 'Hindu', 'Budha', 'Khonghucu'];
            $no = 0;
            foreach ($agama as $agama) {
                $drop = ($edit['agama'] == $agama) ? "checked" : "";
            ?>
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="agama" id="agama_<?= $no; ?>" type="radio" required="required" class="custom-control-input" value="<?= $agama;?>" <?=$drop;?>> 
                    <label for="agama_<?= $no; ?>" class="custom-control-label"><?= $agama; ?></label>
                </div>
            <?php
            $no++;
            }
            ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="select" class="col-4 col-form-label"> Divisi</label> 
        <div class="col-8">
        <select id="divisi" name="divisi" required="required" class="custom-select">
            <option value=""> -- Pilih Divisi -- </option>
            <?php
            foreach ($divisi as $divisi) {
                $sel = ($edit["iddivisi"] == $divisi['id']) ? "selected" : "";
            ?>
                <option value="<?= $divisi["id"];?>" <?=$sel;?>><?= $divisi["nama"];?></option>
            <?php
            } 
            ?>
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="foto" class="col-4 col-form-label">Foto</label> 
        <div class="col-8">
        <input id="foto" name="foto" type="text" class="form-control" foto="<?= $edit["foto"]; ?>">
        </div>
    </div> 
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button value="ubah" name="proses" type="submit" class="btn btn-primary">Ubah</button>
            <input type="hidden" name="ids" value="<?=$data;?>">
        </div>
    </div>
    </form>
  </div>
</div>