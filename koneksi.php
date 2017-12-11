<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "datalanding";

// Koneksi dan memilih database di server
$koneksi=mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");
?>
