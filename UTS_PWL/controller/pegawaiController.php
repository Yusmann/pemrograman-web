<?php
require_once "../koneksi.php";
require_once "../Models/Pegawai.php";

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$agama = $_POST['agama'];
$iddivisi = $_POST['divisi'];
$foto = $_POST['foto'];
$tombol = $_POST['proses'];

$list = [$nip, $nama, $email, $agama, $iddivisi, $foto];

$pegawai = new Pegawai();
switch($tombol) {
    case 'tambah' :
        $pegawai->tambahPegawai($list);
        break;
     
    case 'ubah' :
        $list[] = $_POST['ids'];
        $pegawai->ubah($list);
        break;

    case 'hapus' :
        $id[] = $_POST['ids'];
        $pegawai->hapus($id);
        break;
    default:
        header('Location: http://localhost/pemrograman-web-main/UTS_PWL/index.php?hal=dataPegawai');
        break;

    }

header('Location: http://localhost/pemrograman-web-main/UTS_PWL/index.php?hal=dataPegawai');