<?php
session_start();
include "config/connection.php";
include "library/phpqrcode/qrlib.php";
// login
if ($_GET["act"] == 'login') {
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $pengguna = mysqli_query($conn, "SELECT * FROM pengguna where username='$username'");
        $user = mysqli_fetch_assoc($pengguna);

        //verify password
        if (password_verify($_POST["password"], $user["password"])) {
            $_SESSION["username"] = $user["username"];
            header("location:admin.php");
        } else {
            header("location:login.php");
        }
    } else {
        include "login.php";
    }
}


// register
if ($_GET["act"] == 'register') {
    if (isset($_POST["daftar"])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = mysqli_query($conn, "INSERT INTO pengguna(username,password) VALUES('$username','$password')");
        $_SESSION["message"] = "Berhasil Membuat Akun !";
        header("location:login.php");
    }
    include "register.php";
}

// logout
if ($_GET["act"] == 'logout') {
    if (isset($_POST["logout"])) {
        session_destroy();
        header("location:login.php");
    }
}

// tambah informasi
if ($_GET["act"] == 'tambah-informasi') {
    if (isset($_POST["tambah-informasi"])) {
        $kode_informasi = $_POST["kode_informasi"];
        $informasi = $_POST["informasi"];
        $kategori = $_POST["kategori"];

        $tempdir = "temp/"; //Nama folder tempat menyimpan file qrcode
        if (!file_exists($tempdir)) //Buat folder bername temp
            mkdir($tempdir);


        //simpan file kedalam folder temp dengan nama 001.png
        $qrcodefile = $kode_informasi . ".png";

        $insert_informasi = mysqli_query($conn, "INSERT INTO informasi(kode_informasi,informasi,qrcode,id_kategori) VALUES('$kode_informasi','$informasi','$qrcodefile','$kategori')");
        if ($insert_informasi) {
            QRcode::png($kode_informasi, $tempdir . "$kode_informasi.png");
        }

        header("location:admin.php?menu=informasi");
    }
}


// tambah kategori
if ($_GET["act"] == 'tambah-kategori') {
    if (isset($_POST["tambah-kategori"])) {
        $kategori = $_POST["kategori"];
        $query = mysqli_query($conn, "INSERT INTO kategori(kategori) VALUES('$kategori')");
        header("location:admin.php?menu=informasi");
    }
}


// hapus informasi
if ($_GET["act"] == 'hapus-informasi') {
    if (isset($_POST["hapus-informasi"])) {
        $kode_informasi = $_POST["kode_informasi"];
        $query = mysqli_query($conn, "DELETE FROM informasi WHERE kode_informasi='$kode_informasi'");
        $qrcodefilename = $kode_informasi . ".png";
        //hapus qrcode
        unlink("temp/$qrcodefilename");

        header("location:admin.php?menu=informasi");
    }
}


// update informasi
if ($_GET["act"] == 'update-informasi') {
    if (isset($_POST["update-informasi"])) {
        $kode_informasi = $_POST["kode_informasi"];
        $informasi = $_POST["informasi"];
        $kategori = $_POST["kategori"];

        $tempdir = "temp/"; //Nama folder tempat menyimpan file qrcode
        if (!file_exists($tempdir)) //Buat folder bername temp
            mkdir($tempdir);


        //simpan file kedalam folder temp dengan nama 001.png
        $qrcodefile = $kode_informasi . ".png";

        $query = mysqli_query($conn, "UPDATE informasi SET informasi='$informasi',qrcode='$qrcodefile',id_kategori='$kategori' WHERE kode_informasi='$kode_informasi'");

        if ($query) {
            QRcode::png($kode_informasi, $tempdir . "$kode_informasi.png");
        }

        header("location:admin.php?menu=informasi");
    }
}
