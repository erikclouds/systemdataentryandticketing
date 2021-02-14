<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])){
header("location:login.php");
exit;
}
    ?>
<!DOCTYPE html>
<html lang="en">

<head oncontextmenu="return false;">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Reservasi</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="datepicker/datepicker.css">
  <link rel="stylesheet" href="css/keren.css">

  <style type="text/css">
    .tombolreschedule{
    border: lightgrey solid 1px;
    border-radius: 5px 5px 5px 5px;
    height: 35px;
    width: 80px;
    padding: 5px 5px 5px 5px;
    color: whitesmoke;
    background: green;
    cursor:pointer;
    }


  </style>
</head>

<body onload="start()">
  <!-- container section start -->
  <section id="container" class="">
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>
      <div class="top-nav notification-row">
        <ul class="nav pull-right top-menu">
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username"><?php echo $_SESSION['username'];?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </header>

    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Reguler</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="Reservasi_Batal.php" class="">
                          <i class="icon_document_alt"></i>
                          <span>Batal Reservasi</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="Data_Reservasi.php" class="">
                          <i class="icon_document_alt"></i>
                          <span>Data Reservasi</span>
            </a>
          </li>
<?php
          if ($_SESSION['jabatan_user'] == "SUPERADMIN"){
            echo ' 
            <li class="sub-menu">
                      <a href="data_pengguna.php" class="">
                          <i class="icon_document_alt"></i>
                          <span>Data Pengguna</span>
                      </a>
                      </li>

               
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Monitor GPA</span>
                          <span class="menu-arrow arrow_carrot-down"></span>
                      </a>
            <ul class="sub" style="display: none;">
              <li><a class="" href="data_agen.php"><i class="icon_document_alt"></i>Per Agen</a></li>
              <li><a class="" href="data_penumpang.php"><i class="icon_document_alt"></i>Per Penumpang</a></li>
            </ul>
          </li>

            <li class="sub-menu">
                      <a href="Kuota.php" class="">
                          <i class="icon_document_alt"></i>
                          <span>Kuota</span>
                      </a>
                      </li>
                      <li class="sub-menu">
                        <a href="manifest.php" class="">
                          <i class="icon_document_alt"></i>
                          <span>Manifest</span>
                        </a>
                      </li>

                  ';

          }

?>
          <li class="sub-menu">
            <a class="">
                          <span>Malangindah v 1.0</span>
            </a>
          </li>
        </div>
        </ul>
    </aside>
  </section>
<br>
<br>
<br>
<form action="" method="post" name="form1" id="form1">
<section id="main-content">
<section class="panel">  
  <br>
          <table class="table table-striped table-advance table-hover" >
              <tr>
                <th><i class="fa fa-book"></i> Tanggal berangkat :</th>
                <th >
                <input type="text" id="tgl" class="kolomtext" placeholder="Tanggal" name="tanggal" value="<?php echo date('Y-m-d');?>" required>
              </tr>
              <tr>
                <th><i class="fa fa-map-marker"></i> Kota Asal :</th>
                <th>
                <select class="pilihan" name="Kotaasal">
                  <option value="Malang">Malang</option>
                  <option value="Yogyakarta">Yogyakarta</option>
                  <option value="Denpasar">Denpasar</option>
                  <option value="Tulungagung">Tulungagung</option>
                  <option value="Blitar">Blitar</option>
                </select>
                </th>
              </tr>
              <tr>
                <th><i class="fa fa-map-marker"></i> Kota Tujuan :</th>
                <th>
                <select class="pilihan" name="Kotatujuan">
                  <option value="Malang">Malang</option>
                  <option value="Yogyakarta">Yogyakarta</option>
                  <option value="Denpasar">Denpasar</option>
                  <option value="Tulungagung">Tulungagung</option>
                  <option value="Blitar">Blitar</option>
                </select>
                </th>
              </tr>
              <tr>
                <th><i class="fa fa-car"></i>&nbsp;Armada :</th>
                <th>
                <select class="pilihan" name="Armada" >
                  <option value="Hi-Ace">Hi-Ace</option>
                  <option value="Dutro">Dutro</option>
                  <option value="Elf">Elf</option>
                  <option value="Mini Bus">Mini Bus</option>
                  <option value="Bus">Bus</option>
                </select>
                </th>
              </tr>
              <tr>
                <th><input type="hidden"></th>
                <th>
                <button type="submit" Class="tombolcari" name ="cari" >Cari</button></th>
              </tr>
          </table>
  <header class="panel-heading">
    Kuota Tersedia
  </header>
  <br>
          <table class="table table-striped table-advance table-hover" >
          <tbody>
              <tr>
                <th>No</th>
                <th>Armada</th>
                <th>Kota Asal</th>
                <th>Kota Tujuan</th>
                <th>Jam Keberangkatan</th>
                <th>Sisa Seat</th>
                <th>Pengaturan</th>
              </tr>
          </tbody>
          <?php

         if(isset($_POST['Kotaasal']) and isset($_POST['Kotatujuan']) and isset($_POST['tanggal']) and isset($_POST['Armada'])){
          $tmp_duduk = 0;
          $conn = mysqli_connect("localhost", "root", "", "db_malangindah");
          $Kotaasal = $_POST['Kotaasal'];
          $Kotatujuan = $_POST['Kotatujuan'];
          $tanggal = $_POST['tanggal'];
          $armada = $_POST['Armada'];
          $_POST['Armada'] = $armada;
          $query = mysqli_query($conn, "SELECT kuota from kuota where tanggal like '%".$tanggal."%' and kotaasal like '%".$Kotaasal."%' and kotatujuan like '%".$Kotatujuan."%' and armada like '%".$armada."%' and jenis like '%REGULER%' ORDER BY jam ASC" );       
          $no=0;
          $jumlahpenumpang=1;
          while ($data = mysqli_fetch_array($query)) {
            $Kuota[] = $data['kuota'];

          }
          $_POST['tanggal'] = $tanggal;
        $jamberangkat = mysqli_query($conn, "SELECT jam, id_kuota FROM kuota where tanggal like '%".$tanggal."%' and kotaasal like '%".$Kotaasal."%' and kotatujuan like '%".$Kotatujuan."%' and armada like '%".$armada."%' and jenis like '%REGULER%' ORDER BY jam ASC" );        
          $n=1;
          $no=0;
          $urutjam = 0;
        
          $m_query = mysqli_query($conn, "SELECT jam, id_kuota FROM kuota WHERE tanggal like '%".$tanggal."%' and armada like '%".$armada."%' and kotaasal like '%".$Kotaasal."%' and kotatujuan like '%".$Kotatujuan."%' ORDER BY jam ASC" );        
          $seatterpakai=1;
          while ($d = mysqli_fetch_array($m_query)) {
            $jm[] = $d['jam']; 
            $id_kuota[] = $d['id_kuota']; 
          }
          $f = count($id_kuota);
          $ji = array_unique($id_kuota);
          $ji = count($ji);

          $f = count($jm);
          $j = array_unique($jm);
          $j = count($j);
          for ($i=0; $i < $ji; $i++) { 
            unset($tmp_duduk);
            $m_sql = mysqli_query($conn, "SELECT seat FROM data_penumpang WHERE  id_kuota like '%".$id_kuota[$i]."%' and tanggal_berangkat like '%".$tanggal."%' and kotaasal like '%".$Kotaasal."%' and kotatujuan like '%".$Kotatujuan."%' and jam like '%".$jm[$i]."%' and status_reservasi = 'ACTIVE' ORDER BY seat ASC" );       
            while ($d2 = mysqli_fetch_array($m_sql)) {
              $tmp_duduk[] = $d2['seat'];
            if ($i == 0) {
              $jam0 = $tmp_duduk;
            }elseif ($i == 1) {
              $jam1 = $tmp_duduk;
            }elseif ($i == 2) {
              $jam2 = $tmp_duduk;
            } elseif ($i == 3) {
              $jam3 = $tmp_duduk;
            } elseif ($i == 4) {
              $jam4 = $tmp_duduk;
            } elseif ($i == 5) {
              $jam5 = $tmp_duduk;
            } elseif ($i == 6) {
              $jam6 = $tmp_duduk;
            } elseif ($i == 7) {
              $jam7 = $tmp_duduk;
            } elseif ($i == 8) {
              $jam8 = $tmp_duduk;
            } elseif ($i == 9) {
              $jam9 = $tmp_duduk;
            }
          }
         }

              $nomer = 0;
          while ($j = mysqli_fetch_array($jamberangkat)) {
            if ($nomer == 0) {
                if (empty($jam0)){
                  $jml_seat = null;
                  $jml_seat = 0;
                }else{
                  $jml_seat = $jam0;
                  $jml_seat = count($jml_seat);
                }
            }elseif ($nomer == 1) {
                if (empty($jam1)){
                  $jml_seat = null;
                  $jml_seat = 0;
                }else{
                  $jml_seat = $jam1;
                  $jml_seat = count($jml_seat);
                }
            }elseif ($nomer == 2) {
                if (empty($jam2)){
                  $jml_seat = null;
                  $jml_seat = 0;
                }else{
                  $jml_seat = $jam2;
                  $jml_seat = count($jml_seat);
                }
            } elseif ($nomer == 3) {
                if (empty($jam3)){
                  $jml_seat = null;
                  $jml_seat = 0;
                }else{
                  $jml_seat = $jam3;
                  $jml_seat = count($jml_seat);
                }
            } elseif ($nomer == 4) {
                if (empty($jam4)){
                  $jml_seat = null;
                  $jml_seat = 0;
                }else{
                  $jml_seat = $jam4;
                  $jml_seat = count($jml_seat);
                }
            } elseif ($nomer == 5) {
                if (empty($jam5)){
                  $jml_seat = null;
                  $jml_seat = 0;
                }else{
                  $jml_seat = $jam5;
                  $jml_seat = count($jml_seat);
                }
            } elseif ($nomer == 6) {
                if (empty($jam6)){
                  $jml_seat = null;
                  $jml_seat = 0;
                }else{
                  $jml_seat = $jam6;
                  $jml_seat = count($jml_seat);
                }
            } elseif ($nomer == 7) {
                if (empty($jam7)){
                  $jml_seat = null;
                  $jml_seat = 0;
                }else{
                  $jml_seat = $jam7;
                  $jml_seat = count($jml_seat);
                }
            } elseif ($nomer == 8) {
                if (empty($jam8)){
                  $jml_seat = null;
                  $jml_seat = 0;
                }else{
                  $jml_seat = $jam8;
                  $jml_seat = count($jml_seat);
                }
            } elseif ($nomer == 9) {
                if (empty($jam9)){
                  $jml_seat = null;
                  $jml_seat = 0;
                }else{
                  $jml_seat = $jam9;
                  $jml_seat = count($jml_seat);
                }
            }

            $urutjam++;
            ?>
            <tr>  
              <td><?php echo $n++?><input type="hidden" name="<?php echo "hdid".$urutjam;?>" id="<?php echo "hdid".$urutjam;?>" value="<?php echo $j['id_kuota']; ?>"></td>
              <td><input type="hidden" name="arm" value="<?php echo $armada; ?>"><?php echo $armada; ?></td>
              <td><input type="hidden" name="ktasal" value="<?php echo $Kotaasal; ?>"><?php echo $Kotaasal; ?></td>
              <td><input type="hidden" name="kttujuan" value="<?php echo $Kotatujuan; ?>"><?php echo $Kotatujuan; ?></td>
              <td><input type="hidden" name="<?php echo "hjam".$urutjam;?>" id="<?php echo "hjam".$urutjam;?>"value="<?php echo $j['jam']; ?>">
              <?php echo $j['jam']; ?></td>
              <td>
                <?php
                $isinya = $Kuota[$no] - $jml_seat;
                 if ($isinya == 0){
                  $isinya = "Penuh!";
                }
                echo $isinya;
                ?>
                  
                </td>
              <td>
            <?php echo    '<button type="submit" onclick="pilih'.$nomer.'()" data-toggle="modal" data-target="#exampleModal" data-isi="Seat"  class="tombolcari" id="detail'.$nomer.'" name="detail">Detail</button>'; ?>
              </td>
            </tr>
            <?php
      $nomer++;
      $no++;  
      }
      $_POST['armada'] = $armada;
    }else {
      $jm[] = 0;
      $jam0 = 0;
      $urutjam=0;
    }

    
    if(isset($_POST['detail'])){
      $isiseat=0;
    }elseif(!isset($_POST['detail'])){
      $isiseat=0;
    }
    ?>

          
<input type="hidden" name="id_kursi" id="id_kursi" value="">



<input type="hidden" name="id_seat" id="id_seat" value="">        
  </table>
</section>
</section>
<div  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel">Tempat Duduk</h5>
        <button type="button" class="close" data-dismiss="modal" onclick="btn_close()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
          <input type="hidden" name="isi" value="<?php echo $armada;?>">
          <table>
      <?php

        if ($armada == "Hi-Ace") {
          if ($Kotaasal == "Yogyakarta" || $Kotatujuan == "Yogyakarta") {
          echo  '<tr>
          <center>
            <td style="margin:5px; padding:5px;">
              <button type="button" class="tombolsimpan" onclick="pilihseat1()" id="no1" value="">No 1</button>
              <input type="hidden" class="tombolsimpan" id=1 name="seat1" value=""></input>
            </td>
            <td style="margin:5px; padding:5px;">&nbsp;</td>
            <td style="margin:5px; padding:5px;"><div class="tombolcari" id="sopir">Sopir</div></td>
            </center>
          </tr>';
          $seat=1;
          for ($tr=1; $tr <= 3; $tr++) {    
            echo    '<tr>';
              $isiseat = 10;
              for ($r=0; $r < 3; $r++) {
                $seat++; 
                echo    '<center>
                        <td style="margin:5px; padding:5px;">
                        <button type="button" class="tombolsimpan" onclick="pilihseat'.$seat.'()" id="no'.$seat.'" value= "'.$seat.'"> No '.$seat.'</button>
                        <input type="hidden" class="tombolsimpan" id="'.$seat.'" name="seat'.$seat.'" value=""></input>
                        </td>
                        
                        </center>';
                }

            }
            echo '</tr>'; 
          }elseif ($Kotaasal == "Denpasar" || $Kotatujuan == "Denpasar") {
            echo  '<tr>
            <center>
              <td style="margin:5px; padding:5px;">
              <button type="button" class="tombolsimpan" onclick="pilihseat1()" id="no1">No 1</button>
              <input type="hidden" class="tombolsimpan" id="1" name="seat1" value=""></input>
              </td>
              <td style="margin:5px; padding:5px;">&nbsp;</td>
              <td style="margin:5px; padding:5px;">&nbsp;</td>
              <td style="margin:5px; padding:5px;"><div class="tombolcari" id="sopir">Sopir</div></td>
              </center>
            </tr>';
            $seat=1;
            for ($tr=1; $tr <= 3; $tr++) {    
              echo    '<tr>';
              $isiseat = 9;
                for ($row=1; $row <= 4; $row++) {
                    $seat++; 
                    if ($row == 3 || $row == 2 ) {

                          if ($tr==3) {
                            echo    '<center>
                                    <td style="margin:5px; padding:5px;">
                                    <button type="button" class="tombolsimpan" onclick="pilihseat'.$seat.'()" id="no'.$seat.'"> No '.$seat.'</button>
                                    <input type="hidden" class="tombolsimpan" id="'.$seat.'" name="seat'.$seat.'" value=""></input>
                                    </td>
                                    </center>';
                          }else {
                            $seat--;
                            echo    '<center>
                                    <td style="margin:5px; padding:5px;"></td>
                                    </center>';
                          }

                    }else {
                      echo    '<center>
                              <td style="margin:5px; padding:5px;">
                              <button type="button" class="tombolsimpan" onclick="pilihseat'.$seat.'()" id="no'.$seat.'"> No '.$seat.'</button>
                              <input type="hidden" class="tombolsimpan" id="'.$seat.'" name="seat'.$seat.'" value=""></input>
                              </td>
                              </center>';
                  }
                }
            }
          }
        }
        elseif ($armada == "Elf") {
            echo  '<tr>
            <center>
              <td style="margin:5px; padding:5px;">
              <button type="button" class="tombolsimpan" onclick="pilihseat1()" id="no1">No 1</button>
              <input type="hidden" class="tombolsimpan" id="1" name="seat1" value=""></input>
              </td>
              <td style="margin:5px; padding:5px;">
              <button type="button" class="tombolsimpan" onclick="pilihseat2()" id="no2">No 2</button>
              <input type="hidden" class="tombolsimpan" id="2" name="seat2" value=""></input>
              </td>
              <td style="margin:5px; padding:5px;"><div class="tombolcari" id="sopir">Sopir</div></td>
              </center>
            </tr>';
            $seat=2;
            for ($tr=1; $tr <= 4; $tr++) {    
              echo    '<tr>';
              if ($Kotaasal == "Denpasar" || $Kotatujuan == "Denpasar") {
                $isiseat = 14;
                for ($r=0; $r < 3; $r++) {
                  $seat++; 
                  echo    '<center>
                          <td style="margin:5px; padding:5px;">
                          <button type="button" class="tombolsimpan" onclick="pilihseat'.$seat.'()" id="no'.$seat.'"> No '.$seat.'</button>
                          <input type="hidden" class="tombolsimpan" id="'.$seat.'" name="seat'.$seat.'" value=""></input>
                           </td>
                          </center>';
                  }
        }
      }

        }elseif ($armada == "Mini Bus") {
          echo  '<tr>
          <center>
          <td style="margin:5px; padding:5px;"><div class="tombolcari" id="kernet">Kernet</div></td>
            <td style="margin:5px; padding:5px;">&nbsp;</td>
            <td style="margin:5px; padding:5px;">&nbsp;</td>
            <td style="margin:5px; padding:5px;">&nbsp;</td>
            <td style="margin:5px; padding:5px;"><div class="tombolcari" id="sopir">Sopir</div></td>
            </center>
          </tr>
          <tr>
          <center>
            <td style="margin:5px; padding:5px;">&nbsp;</td>
            <td style="margin:5px; padding:5px;">&nbsp;</td>
            <td style="margin:5px; padding:5px;">
            <button type="button" class="tombolsimpan" onclick="pilihseat36()" id="no36"> No 36</button>
            <input type="hidden" class="tombolsimpan" id="36" name="seat36" value=""></input>
            </td>
            <td style="margin:5px; padding:5px;">&nbsp;</td>
            <td style="margin:5px; padding:5px;">&nbsp;</td>
            </center>
          </tr>';
          $seat=0;
          for ($tr=1; $tr <= 9; $tr++) {    
            echo    '<tr>';
              $isiseat = 36;
              if ($tr == 5) {
                echo '<tr>
                <center>
                <td style="margin:5px; padding:5px;"><div class="tombolcari" id="toilet">Toilet</div></td>
                <td style="margin:5px; padding:5px;">&nbsp;</td>
                <td style="margin:5px; padding:5px;">&nbsp;</td>
                <td style="margin:5px; padding:5px;">
                <button type="button" class="tombolsimpan" onclick="pilihseat17()" id="no17"> No 17</button>
                <input type="hidden" class="tombolsimpan" id="17" name="seat17" value=""></input>
                </td>
                <td style="margin:5px; padding:5px;">
                <button type="button" class="tombolsimpan" onclick="pilihseat18()" id="no18"> No 18</button>
                <input type="hidden" class="tombolsimpan" id="18" name="seat18" value=""></input>
                </td>
                  </center>
                </tr>';
                $seat+=2;
              }elseif($tr == 9) {
                echo '<tr>';
                for ($belakang=1; $belakang <= 5 ; $belakang++) { 
                  $seat++;
                  echo '
                  <center>
                  <td style="margin:5px; padding:5px;">
                  <button type="button" class="tombolsimpan" onclick="pilihseat'.$seat.'()" id="no'.$seat.'"> No '.$seat.'</button>
                  <input type="hidden" class="tombolsimpan" id="'.$seat.'" name="seat'.$seat.'" value=""></input>
                  </td>                    
                  </center>';
                }
                echo '</tr>';
                  $seat--;
                }else{
                for ($r=0; $r < 5; $r++) {
                  $seat++; 
                  if ($r == 2) {
                    $seat--;
                    echo    '<center>
                            <td style="margin:5px; padding:5px;">&nbsp;</td>
                            </center>';
                  }else{
                    echo    '<center>
                            <td style="margin:5px; padding:5px;">
                            <button type="button" class="tombolsimpan" onclick="pilihseat'.$seat.'()" id="no'.$seat.'"> No '.$seat.'</button>
                            <input type="hidden" class="tombolsimpan" id="'.$seat.'" name="seat'.$seat.'" value=""></input>
                            </td>
                            </center>';
                  }
  
                }
              }

              echo    '</tr>';
          }

        }elseif ($armada == "Bus") {
          echo  '<tr>
          <center>
            <td style="margin:5px; padding:5px;">&nbsp;</td>
            <td style="margin:5px; padding:5px;">&nbsp;</td>
            <td style="margin:5px; padding:5px;">&nbsp;</td>
            <td style="margin:5px; padding:5px;">&nbsp;</td>
            <td style="margin:5px; padding:5px;">&nbsp;</td>
            <td style="margin:5px; padding:5px;"><div class="tombolcari" id="sopir">Sopir</div></td>
            </center>
          </tr>
          <tr>';
          $seat=0;
          for ($tr=1; $tr <= 12; $tr++) {    
            echo    '<tr>';
              $isiseat = 59;
              if ($tr == 11) {
                echo '<tr>
                <center>
                <td style="margin:5px; padding:5px;">&nbsp;</td>
                <td style="margin:5px; padding:5px;">&nbsp;</td>
                <td style="margin:5px; padding:5px;">&nbsp;</td>
                <td style="margin:5px; padding:5px;">
                <button type="button" class="tombolsimpan" onclick="pilihseat51()" id="no51"> No 51</button>
                <input type="hidden" class="tombolsimpan" id="51" name="seat51" value=""></input>
                </td>
                <td style="margin:5px; padding:5px;">
                <button type="button" class="tombolsimpan" onclick="pilihseat52()" id="no52"> No 52</button>
                <input type="hidden" class="tombolsimpan" id="52" name="seat52" value=""></input>
                </td>
                <td style="margin:5px; padding:5px;">
                <button type="button" class="tombolsimpan" onclick="pilihseat53()" id="no53"> No 53</button>
                <input type="hidden" class="tombolsimpan" id="53" name="seat53" value=""></input>
                </td>
                  </center>
                </tr>';
                $seat+=3;
              }elseif($tr == 12) {
                echo '<tr>';
                for ($belakang=1; $belakang <= 6 ; $belakang++) { 
                  $seat++;
                  echo '
                  <center>
                  <td style="margin:5px; padding:5px;">
                  <button type="button" class="tombolsimpan" onclick="pilihseat'.$seat.'()" id="no'.$seat.'"> No '.$seat.'</button>
                  <input type="hidden" class="tombolsimpan" id="'.$seat.'" name="seat'.$seat.'" value=""></input>
                  </td>                    
                  </center>';
                }
                echo '</tr>';
                  $seat--;
                }else{
                for ($r=0; $r < 6; $r++) {
                  $seat++; 
                  if ($r == 2) {
                    $seat--;
                    echo    '<center>
                            <td style="margin:5px; padding:5px;">&nbsp;</td>
                            </center>';
                  }else{
                    echo    '<center>
                            <td style="margin:5px; padding:5px;">
                            <button type="button" class="tombolsimpan" onclick="pilihseat'.$seat.'()" id="no'.$seat.'"> No '.$seat.'</button>
                            <input type="hidden" class="tombolsimpan" id="'.$seat.'" name="seat'.$seat.'" value=""></input>
                            </td>
                            </center>';
                  }
  
                }
              }

              echo    '</tr>';
          }

        }

      ?>
            </table>
          </div>       
      </div>
      <table>
        <tr>
          <td>
          <label for="sopir" style="margin:10px; padding:10px;"><b>Pesan Untuk : </b></label>
          <input type="text" id="totalpnp" disabled="disabled" style="width:18px;"><b>&nbsp;Orang</b> 
          </td>
        </tr>
      </table>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" onclick="btn_close()" data-dismiss="modal">Close</button>
      <a href="" onclick="document.form1.method='post'; document.form1.action = 'Reservasi.php'; document.form1.submit();">
      <button type="submit" Class="tombolreschedule" name ="reschedule" id="pesan">Reschedule</button>
      </a>
      </div>
    </div>
  </div>
</div>
<?php

if(isset($_POST['reschedule'])){
  $conn = mysqli_connect("localhost", "root", "", "db_malangindah");
  $id = $_GET['id_reservasi'];
  $Kotaasal = $_POST['ktasal'];
  $Kotatujuan = $_POST['kttujuan'];
  $tanggal = $_POST['tanggal'];
  $query="UPDATE data_penumpang SET tanggal_berangkat = '$tanggal', kotaasal='$Kotaasal', kotatujuan='$Kotatujuan', Perubahan ='$update'
                 where id_reservasi='$id'";
  mysqli_query($conn, $query);
}


?>
</form>
  <script src="js/jquery.js"></script>
  <script src="js/javascriptgue.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <script src="datepicker/bootstrap-datepicker.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="js/javascriptgue.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

  <script>
    $(function () {
    $('#tgl').datepicker({
      dateFormat: "yy-mm-dd",
      autoclose: true
  });
  });
  </script>
  

<script type="text/javascript">
    $(document).ready(function(){
        $('button').click(function () {
          $('.plus').slideToggle({
            duration: 350,
            easing: 'swing'
          });
        });
    });
</script>
 
 <script type="text/javascript">
    $(document).ready(function(){
      $('#tombol').click(function(){
        $('#modal-kotak , #bg').fadeIn("slow");
      });
      $('#tombol-tutup').click(function(){
        $('#modal-kotak , #bg').fadeOut("slow");
      });
    });
  </script>

<script type="text/javascript">
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('isi')
    var modal = $(this)
    modal.find('.modal-title').text('Submit Masukan Paket  ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })
</script>



      <script>
              function start() {
                var i = 1;
                for (let i = 1; i <= <?php echo $isiseat; ?>; i++) {
                    document.getElementById("no"+i).style.backgroundColor = "rgb(225, 232, 237)";
                    document.getElementById("no"+i).style.color = "#221f1f";
                  }
                  document.getElementById("totalpnp").style.backgroundColor = "#f0f0f0";
                  document.getElementById("totalpnp").style.border = "0px";
              }
              document.getElementById("pesan").disabled = true;
      </script>
<?php
for ($pilihseat=1; $pilihseat <= $isiseat; $pilihseat++) { 
  ?>
  <script>
    function pilihseat<?php echo $pilihseat.'()'; ?> {
              var no<?php echo $pilihseat; ?> = document.getElementById("no<?php echo $pilihseat; ?>").style.backgroundColor;
              var xx = document.getElementById("totalpnp").value;
              xx = Number(xx);
            if (no<?php echo $pilihseat; ?> == "rgb(225, 232, 237)"){
              document.getElementById("no<?php echo $pilihseat; ?>").style.backgroundColor = "rgb(66, 133, 244)";
              xx = xx + 1;
              document.getElementById("totalpnp").value = xx;
              document.getElementById("totalpnp").innerHTML = document.getElementById("totalpnp").value;
              document.getElementById("<?php echo $pilihseat; ?>").value = <?php echo $pilihseat; ?>;
              document.getElementById("id_seat").value = document.getElementById("totalpnp").value; 
              cekseat();
            }else{
              document.getElementById("no<?php echo $pilihseat; ?>").style.backgroundColor = "rgb(225, 232, 237)";
              xx = xx - 1;
              document.getElementById("totalpnp").value = xx;
              document.getElementById("totalpnp").innerHTML = document.getElementById("totalpnp").value;
              document.getElementById("id_seat").value -= 1;
              document.getElementById("<?php echo $pilihseat; ?>").value = "0";
              cekseat();
              
            }
            
          }
      
      </script>
      
      <?php
      }
 
      $x=0;
      $index_id = 1;
      for ($rt=0; $rt < $urutjam; $rt++) { 


      ?>
        <script>

            function pilih<?php echo $x."()"; ?> {
      <?php
            if ($rt == 0) {
            // echo $isiseat;
              ?>
                  document.getElementById("id_seat").innerHTML = "0";
                  document.getElementById("totalpnp").value = "0";
                  
              <?php

              for ($cc = 1; $cc <= $isiseat; $cc++) { 
              ?>
                  document.getElementById("no<?php echo $cc; ?>").innerHTML = "No<?php echo $cc; ?>";
                  document.getElementById("no<?php echo $cc; ?>").disabled = false;
                  document.getElementById("no<?php echo $cc; ?>").style.backgroundColor = "rgb(225, 232, 237)";
                  document.getElementById("no<?php echo $cc; ?>").style.color = "#221f1f";
              <?php
              }
                  if (!isset($jam0)){
                    $jam0[0] = 128907;
                  }
                  ?>
                  document.getElementById("id_kursi").value = document.getElementById("hdid1").value;
                  <?php
              $xx = $jam0;
              $zf = count($xx);
              for ($c =0; $c < $zf; $c++) { 
                ?>
                  document.getElementById("no<?php echo $xx[$c]; ?>").innerHTML = 'X';
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.color = "rgb(255, 255, 255)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.backgroundColor = "rgb(139, 0, 0)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").disabled = true;

                <?php
              }

            }elseif ($rt == 1) {
              ?>
                  document.getElementById("id_seat").innerHTML = "0";
                  document.getElementById("totalpnp").value = "0";
              <?php

              for ($cc = 1; $cc <= $isiseat; $cc++) { 
              ?>
                  document.getElementById("no<?php echo $cc; ?>").innerHTML = "No<?php echo $cc; ?>";
                  document.getElementById("no<?php echo $cc; ?>").disabled = false;
                  document.getElementById("no<?php echo $cc; ?>").style.backgroundColor = "rgb(225, 232, 237)";
                  document.getElementById("no<?php echo $cc; ?>").style.color = "#221f1f";
              <?php
              }
                  if (!isset($jam1)){
                    $jam1[0] = 128907;
                  }
                  ?>
                  document.getElementById("id_kursi").value = document.getElementById("hdid2").value;
                  <?php
              $xx = $jam1;
              $zf = count($xx);
              for ($c =0; $c < $zf; $c++) { 
                ?>
                  document.getElementById("no<?php echo $xx[$c]; ?>").innerHTML = 'X';
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.color = "rgb(255, 255, 255)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.backgroundColor = "rgb(139, 0, 0)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").disabled = true;

                  
                <?php
              }
            }elseif ($rt == 2) {
              ?>
                  document.getElementById("id_seat").innerHTML = "0";
                  document.getElementById("totalpnp").value = "0";
              <?php

              for ($cc = 1; $cc <= $isiseat; $cc++) { 
              ?>
                  document.getElementById("no<?php echo $cc; ?>").innerHTML = "No<?php echo $cc; ?>";
                  document.getElementById("no<?php echo $cc; ?>").disabled = false;
                  document.getElementById("no<?php echo $cc; ?>").style.backgroundColor = "rgb(225, 232, 237)";
                  document.getElementById("no<?php echo $cc; ?>").style.color = "#221f1f";
              <?php
              }
                  if (!isset($jam2)){
                    $jam2[0] = 128907;
                  }
                  ?>
                  document.getElementById("id_kursi").value = document.getElementById("hdid3").value;
                  <?php
              $xx = $jam2;
              $zf = count($xx);
              for ($c =0; $c < $zf; $c++) { 
                ?>
                  document.getElementById("no<?php echo $xx[$c]; ?>").innerHTML = 'X';
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.color = "rgb(255, 255, 255)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.backgroundColor = "rgb(139, 0, 0)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").disabled = true;
                <?php
              }
            } elseif ($rt == 3) {
              ?>
                  document.getElementById("id_seat").innerHTML = "0";
                  document.getElementById("totalpnp").value = "0";
              <?php

              for ($cc = 1; $cc <= $isiseat; $cc++) { 
              ?>
                  document.getElementById("no<?php echo $cc; ?>").innerHTML = "No<?php echo $cc; ?>";
                  document.getElementById("no<?php echo $cc; ?>").disabled = false;
                  document.getElementById("no<?php echo $cc; ?>").style.backgroundColor = "rgb(225, 232, 237)";
                  document.getElementById("no<?php echo $cc; ?>").style.color = "#221f1f";
              <?php
              }
                  if (!isset($jam3)){
                    $jam3[0] = 128907;
                  }
                  ?>
                  document.getElementById("id_kursi").value = document.getElementById("hdid4").value;
                  <?php
              $xx = $jam3;
              $zf = count($xx);
              for ($c =0; $c < $zf; $c++) { 
                ?>
                  document.getElementById("no<?php echo $xx[$c]; ?>").innerHTML = 'X';
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.color = "rgb(255, 255, 255)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.backgroundColor = "rgb(139, 0, 0)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").disabled = true;
                <?php
              }

            } elseif ($rt == 4) {
              ?>
                  document.getElementById("id_seat").innerHTML = "0";
                  document.getElementById("totalpnp").value = "0";
              <?php

              for ($cc = 1; $cc <= $isiseat; $cc++) { 
              ?>
                  document.getElementById("no<?php echo $cc; ?>").innerHTML = "No<?php echo $cc; ?>";
                  document.getElementById("no<?php echo $cc; ?>").disabled = false;
                  document.getElementById("no<?php echo $cc; ?>").style.backgroundColor = "rgb(225, 232, 237)";
                  document.getElementById("no<?php echo $cc; ?>").style.color = "#221f1f";
              <?php
              }
                  if (!isset($jam4)){
                    $jam4[0] = 128907;
                  }
                  ?>
                  document.getElementById("id_kursi").value = document.getElementById("hdid5").value;
                  <?php
              $xx = $jam4;
              $zf = count($xx);
              for ($c =0; $c < $zf; $c++) { 
                ?>
                  document.getElementById("no<?php echo $xx[$c]; ?>").innerHTML = 'X';
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.color = "rgb(255, 255, 255)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.backgroundColor = "rgb(139, 0, 0)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").disabled = true;
                <?php
              }
            } elseif ($rt == 5) {
              ?>
                  document.getElementById("id_seat").innerHTML = "0";
                  document.getElementById("totalpnp").value = "0";
              <?php

              for ($cc = 1; $cc <= $isiseat; $cc++) { 
              ?>
                  document.getElementById("no<?php echo $cc; ?>").innerHTML = "No<?php echo $cc; ?>";
                  document.getElementById("no<?php echo $cc; ?>").disabled = false;
                  document.getElementById("no<?php echo $cc; ?>").style.backgroundColor = "rgb(225, 232, 237)";
                  document.getElementById("no<?php echo $cc; ?>").style.color = "#221f1f";
              <?php
              }
                  if (!isset($jam5)){
                    $jam5[0] = 128907;
                  }
                  ?>
                  document.getElementById("id_kursi").value = document.getElementById("hdid6").value;
                  <?php
              $xx = $jam5;
              $zf = count($xx);
              for ($c =0; $c < $zf; $c++) { 
                ?>
                  document.getElementById("no<?php echo $xx[$c]; ?>").innerHTML = 'X';
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.color = "rgb(255, 255, 255)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.backgroundColor = "rgb(139, 0, 0)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").disabled = true;
                <?php
              }
            } elseif ($rt == 6) {
              ?>
                  document.getElementById("id_seat").innerHTML = "0";
                  document.getElementById("totalpnp").value = "0";
              <?php

              for ($cc = 1; $cc <= $isiseat; $cc++) { 
              ?>
                  document.getElementById("no<?php echo $cc; ?>").innerHTML = "No<?php echo $cc; ?>";
                  document.getElementById("no<?php echo $cc; ?>").disabled = false;
                  document.getElementById("no<?php echo $cc; ?>").style.backgroundColor = "rgb(225, 232, 237)";
                  document.getElementById("no<?php echo $cc; ?>").style.color = "#221f1f";
              <?php
              }
                  if (!isset($jam6)){
                    $jam6[0] = 128907;
                  }
                  ?>
                  document.getElementById("id_kursi").value = document.getElementById("hdid7").value;
                  <?php
              $xx = $jam6;
              $zf = count($xx);
              for ($c =0; $c < $zf; $c++) { 
                ?>
                  document.getElementById("no<?php echo $xx[$c]; ?>").innerHTML = 'X';
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.color = "rgb(255, 255, 255)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.backgroundColor = "rgb(139, 0, 0)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").disabled = true;
                <?php
              }
            } elseif ($rt == 7) {
              ?>
                  document.getElementById("id_seat").innerHTML = "0";
                  document.getElementById("totalpnp").value = "0";
              <?php

              for ($cc = 1; $cc <= $isiseat; $cc++) { 
              ?>
                  document.getElementById("no<?php echo $cc; ?>").innerHTML = "No<?php echo $cc; ?>";
                  document.getElementById("no<?php echo $cc; ?>").disabled = false;
                  document.getElementById("no<?php echo $cc; ?>").style.backgroundColor = "rgb(225, 232, 237)";
                  document.getElementById("no<?php echo $cc; ?>").style.color = "#221f1f";
              <?php
              }
                  if (!isset($jam7)){
                    $jam7[0] = 128907;
                  }
                  ?>
                  document.getElementById("id_kursi").value = document.getElementById("hdid8").value;
                  <?php
              $xx = $jam7;
              $zf = count($xx);
              for ($c =0; $c < $zf; $c++) { 
                ?>
                  document.getElementById("no<?php echo $xx[$c]; ?>").innerHTML = 'X';
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.color = "rgb(255, 255, 255)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.backgroundColor = "rgb(139, 0, 0)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").disabled = true;
                <?php
              }
            } elseif ($rt == 8) {
              ?>
                  document.getElementById("id_seat").innerHTML = "0";
                  document.getElementById("totalpnp").value = "0";
              <?php

              for ($cc = 1; $cc <= $isiseat; $cc++) { 
              ?>
                  document.getElementById("no<?php echo $cc; ?>").innerHTML = "No<?php echo $cc; ?>";
                  document.getElementById("no<?php echo $cc; ?>").disabled = false;
                  document.getElementById("no<?php echo $cc; ?>").style.backgroundColor = "rgb(225, 232, 237)";
                  document.getElementById("no<?php echo $cc; ?>").style.color = "#221f1f";
              <?php
              }
                  if (!isset($jam8)){
                    $jam8[0] = 128907;
                  }
                  ?>
                  document.getElementById("id_kursi").value = document.getElementById("hdid9").value;
                  <?php
              $xx = $jam8;
              $zf = count($xx);
              for ($c =0; $c < $zf; $c++) { 
                ?>
                  document.getElementById("no<?php echo $xx[$c]; ?>").innerHTML = 'X';
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.color = "rgb(255, 255, 255)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.backgroundColor = "rgb(139, 0, 0)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").disabled = true;
                <?php
              }
            } elseif ($rt == 9) {
              ?>
                  document.getElementById("id_seat").innerHTML = "0";
                  document.getElementById("totalpnp").value = "0";
              <?php

              for ($cc = 1; $cc <= $isiseat; $cc++) { 
              ?>
                  document.getElementById("no<?php echo $cc; ?>").innerHTML = "No<?php echo $cc; ?>";
                  document.getElementById("no<?php echo $cc; ?>").disabled = false;
                  document.getElementById("no<?php echo $cc; ?>").style.backgroundColor = "rgb(225, 232, 237)";
                  document.getElementById("no<?php echo $cc; ?>").style.color = "#221f1f";
              <?php
              }
                  if (!isset($jam9)){
                    $jam9[0] = 128907;
                  }
                  ?>
                  document.getElementById("id_kursi").value = document.getElementById("hdid10").value;
                  <?php
              $xx = $jam9;
              $zf = count($xx);
              for ($c =0; $c < $zf; $c++) { 
                ?>
                  document.getElementById("no<?php echo $xx[$c]; ?>").innerHTML = 'X';
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.color = "rgb(255, 255, 255)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").style.backgroundColor = "rgb(139, 0, 0)";
                  document.getElementById("no<?php echo $xx[$c]; ?>").disabled = true;
                <?php
              }
            } 
      ?>
          }
        </script>
      <?php
          $index_id++;
          $x++;
    }     
?>


<script>
        function kembaliasal() {
             document.getElementById("id_seat").innerHTML = "0";
             document.getElementById("totalpnp").value = "0";
          <?php

          for ($cc = 1; $cc <= $isiseat; $cc++) { 
          ?>
                  document.getElementById("no<?php echo $cc; ?>").innerHTML = "No<?php echo $cc; ?>";
                  document.getElementById("no<?php echo $cc; ?>").disabled = false;
                  document.getElementById("no<?php echo $cc; ?>").style.backgroundColor = "rgb(225, 232, 237)";
                  document.getElementById("no<?php echo $cc; ?>").style.color = "#221f1f";
                  
          <?php
              }
          ?>
        }            
</script>




<script>
function cekseat() {
  if (document.getElementById("totalpnp").value == 0) {
    document.getElementById("pesan").disabled = true;
  }else{
    document.getElementById("pesan").disabled = false;
  }
}
function btn_close() {
  document.getElementById("pesan").disabled = true;
}



</script>

</body>





</html>