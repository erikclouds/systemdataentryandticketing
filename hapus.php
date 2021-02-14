<?php
session_start();
// error_reporting(0);
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])){
header("location:login.php");
exit;
}
$conn = mysqli_connect("localhost", "root", "", "db_malangindah") or die('Tidak terhubung ke MySQL : ' . mysqli_error());
  $id = $_GET["id_reservasi"];
  $jamsekarang = date("H");
  $tglsekarang = date("d-m-Y");
  $waktusekarang = date("i");
  $harisekarang = date("l");
  $jamsekarang += 6;
  $update = "Dibatalkan Oleh : ".$_SESSION['username']." ".$harisekarang.", ".$tglsekarang." " .$jamsekarang." : ".$waktusekarang;
  $query="UPDATE data_penumpang SET status_reservasi = 'BATAL', perubahan ='$update' where id_reservasi = '$id'";
  mysqli_query($conn, $query);
  header("location:Reservasi_Batal.php");
?>