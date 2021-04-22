<?php
class Member {
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    // login (login.php)
    public function login($data) {
        $sql = "SELECT * FROM member WHERE username = ? AND password = SHA1(MD5(?))";
        $gather = $this->koneksi->prepare($sql);
        $gather->execute($data);
        $result = $gather->fetch();
        return $result;
    }

}