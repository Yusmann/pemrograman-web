<?php
class Pegawai {
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    //method semua data
    public function alldata(){
        $sql = "SELECT pegawai.*, divisi.nama as divisi FROM pegawai INNER JOIN divisi on divisi.id = pegawai.iddivisi ORDER BY pegawai.id DESC";
        $gather = $this->koneksi->query($sql);
        return $gather;
    }

    //method untuk foreign key table divisi di pegawai
    public function divisiPegawai() {
        $sql = "SELECT * FROM divisi";
        $gather = $this->koneksi->query($sql);
        return $gather;
    }

    //method tambah pegawai (controller)
    public function tambahPegawai($data) {
        $sql = "INSERT INTO pegawai (nip,nama,email,agama,iddivisi,foto) VALUES(?,?,?,?,?,?)";
        $gather = $this->koneksi->prepare($sql);
        $gather->execute($data);
    }

    //method detail pegawai
    public function detail($data){
        $sql = "SELECT pegawai.*, divisi.nama as divisi from pegawai inner join divisi on divisi.id = pegawai.iddivisi where pegawai.id = ?";
        $gather = $this->koneksi->prepare($sql);
        $gather->execute([$data]);
        $result = $gather ->fetch();
        return $result;
    }

    //method ubah pegawai (controller)
    public function ubah($data) {
        $sql = "UPDATE pegawai SET nip=?, nama=?, email=?, agama=?, iddivisi=?, foto=? WHERE pegawai.id=?";
        $gather = $this->koneksi->prepare($sql);
        $gather->execute($data);
    }

    //method hapus pegawai (controller)
    public function hapus($id) {
        $sql = "DELETE FROM pegawai WHERE id=?";
        $gather = $this->koneksi->prepare($sql);
        $gather->execute($id);
    }

}