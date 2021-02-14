<?php
session_start();
if (!isset($_SESSION['username'])){
header("location:login.php");
exit;
}if ($_SESSION['jabatan_user'] == 'ADMIN') {
  header("location:index.php");
}
?>

<?php

require "./fpdf/fpdf.php";
require "Connection.php";
$conn = mysqli_connect('localhost', 'root', '', 'db_malangindah');
$id = $_GET['id'];

$q2 = mysqli_query( $conn, "SELECT * FROM kuota
WHERE id_kuota like '%".$id."%'" ); 

$q = mysqli_query( $conn, "SELECT * FROM data_penumpang
WHERE id_kuota like '%".$id."%' ORDER BY seat" );	

  while ($data = mysqli_fetch_array($q)) {
    $jam = $data['jam'];;
    $tanggal = $data['tanggal_berangkat'];

    $kotaasal = $data['kotaasal'];
    $kotatujuan = $data['kotatujuan'];
  }

  while ($dt = mysqli_fetch_array($q2)) {
    $armada = $dt['armada'];
    $jenis = $dt['jenis'];
  }

  $jamsekarang = date("H");
  $tglsekarang = date("d-m-Y");
  $waktusekarang = date("i");
  $harisekarang = date("l");
  $jamsekarang += 5;
  if ($jamsekarang >= 24){
    $jamsekarang -= 24;

  }
  if ($harisekarang == 'Saturday') {
    $harisekarang == 'Monday';
  }
  $Print = "Di Cetak Oleh ".$_SESSION['username']." ".$harisekarang.", ".$tglsekarang." " .$jamsekarang." : ".$waktusekarang;


$kotaasal = strtoupper($kotaasal);
$kotatujuan = strtoupper($kotatujuan);
$tanggal = date('d-m-yy',strtotime($tanggal));
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","", 12);
$pdf = new FPDF('L','mm','Legal');
        // L = lanscape P= potrait
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',40);
        $ya = 44;
        // mencetak string 
        $pdf->Cell(340,18,'DATA MANIFEST',3,1,'C');
        $pdf->SetFont('Arial','B',22);
        $pdf->Cell(340,3,$kotaasal." - ".$kotatujuan,0,1,'C');

        $pdf->SetFont('Arial','B',22);
        $pdf->Cell(340,1,"",0,1,'C');

        $pdf->Cell(10,6,'',30,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,6,' SUPIR ',0,0);
        $pdf->Cell(235,6,' : ',0,0);
        $pdf->Cell(35,6,' KEBERANGKATAN',0,0);
        $pdf->Cell(5,6,' : '.$jam.' / '.$tanggal,0,0);

        $pdf->Cell(10,5,'',30,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,6,' JENIS ',0,0);
        $pdf->Cell(235,6,' : '.$jenis,0,0);
        $pdf->Cell(35,6,' ARMADA',0,0);
        $pdf->Cell(5,6,' : '.$armada,0,0);

        $pdf->SetLineWidth(1);
        $pdf->Line(13,36,340,36);
        $pdf->SetLineWidth(0);
        $pdf->Line(13,37,340,37);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',30,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(11,10,' Seat ',1,0);
        $pdf->Cell(27,10,' No Telepon',1,0,'C');
        $pdf->Cell(35,10,' Nama',1,0);
        $pdf->Cell(90,10,' Alamat Jemput',1,0);
        $pdf->Cell(90,10,' Alamat Tujuan',1,0);
        $pdf->Cell(23,10,' Agen',1,0,'C');
        $pdf->Cell(28,10,' Rincian',1,0,'C');
        $pdf->Cell(26,10,' TOP',1,0,'C');
        // $pdf->Cell(23,6,' Total Tiket',1,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Ln();

$query = mysqli_query( $conn, "SELECT seat, nomor_telepon, nama, alamat_jemput, alamat_tujuan, dp, luar_batas, harga_tiket, total_tiket, agen_pendaftar, status FROM data_penumpang
WHERE id_kuota like '%".$id."%' and status_reservasi = 'ACTIVE' ORDER BY seat ASC" ); 

        while ($row = mysqli_fetch_array($query)){
          $pdf->Cell(3,1,'',15,1);
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(11,20,'No '.$row['seat'],1,0,'C');
          $pdf->Cell(27,20,$row['nomor_telepon'],1,0,'C');
          $pdf->Cell(35,20,$row['nama'],1,0);
          $pdf->Cell(90,20,$row['alamat_jemput'],1,0);
          $pdf->Cell(90,20,$row['alamat_tujuan'],1,0);
          $pdf->Cell(23,20,"  ".$row['agen_pendaftar']."  ",1,0,'C');
          $pdf->Cell(28,20,'',1,4,'C');
          for ($i=0; $i <= 4; $i++) {
            if ($i == 4) {
              $pdf->Cell(28,-5, "LB    : ".$row['luar_batas'], 0,4);
             }elseif ($i == 3) {
               $pdf->Cell(28,-5,"DP    : ".$row['dp'], 0,4);
             }elseif ($i == 2) {
               $pdf->Cell(28,-5,"Tiket : ".$row['harga_tiket'], 0,4);
             }elseif ($i == 1) {
               $pdf->Cell(28,-5,"Total : ".$row['total_tiket'], 0,4);
             }

          }

          $pdf->Cell(54,20,"                           ".$row['status'],1,3,'C');
        }
          $pdf->Cell(-470,10,$Print,0,0,'C');
          $pdf->Ln();

$pdf->Output();
?>