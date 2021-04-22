<?php
  require_once "Models/Pegawai.php";
  $pegawai = new Pegawai();
  $data = $_REQUEST["id"];
  $details = $pegawai->detail($data);

?>

nip : <?= $details["nip"]; ?> </br>
nama : <?= $details["nama"]; ?> </br>
email : <?= $details["email"]; ?> </br>
agama : <?= $details["agama"]; ?> </br>
divisi : <?= $details["divisi"]; ?> </br>
foto : <?= $details["foto"]; ?> </br>

</br></br>

<a href="index.php?hal=dataPegawai" class="btn btn-danger">Kembali</a>