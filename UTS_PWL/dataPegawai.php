<?php
  require_once "Models/Pegawai.php";
  $pegawai = new Pegawai();
  $all = $pegawai->alldata();
?>

<h3>Data Pegawai</h3>
<a href="index.php?hal=formPegawai" class="btn btn-success">Tambah</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">nip</th>
      <th scope="col">nama</th>
      <th scope="col">email</th>
      <th scope="col">agama</th>
      <th scope="col">divisi</th>
      <th scope="col">foto</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody >
  <?php
  $no = 1;
  foreach ($all as $all) {
  ?>
    <tr>
      <td><?=$no;?></td>
      <td><?=$all["nip"];?></td>
      <td><?=$all["nama"];?></td>
      <td><?=$all["email"];?></td>
      <td><?=$all["agama"];?></td>
      <td><?=$all["divisi"];?></td>
      <td><?=$all["foto"];?></td>
      <td>
       <form method="POST" action="controller/pegawaiController.php">
          <a href="index.php?hal=detailPegawai&id=<?= $all["id"]; ?>" class="btn btn-primary">Detail</a>
          <?php
          $role = isset($member['role']) ? $member['role'] : null;
          if (isset($member)) {
          ?>
           <a href="index.php?hal=formEditPegawai&id=<?= $all["id"]; ?>" class="btn btn-primary">Ubah</a>
          <?php
            if($role != 'staff') {
          ?>
           <button class="btn btn-danger" name="proses" value="hapus" onclick="return confirm('Data yang dipilih akan dihapus?')">Hapus</button>
           <input type="hidden" name="ids" value="<?= $all['id'];?>">
          <?php
            }
          }
          ?>
        </form>
      </td>
    </tr>
  <?php
  $no++; }
  ?>
  </tbody>
</table>