<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])){
header("location:login.php");
exit;
}if ($_SESSION['jabatan_user'] == 'ADMIN') {
  header("location:index.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
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
</head>

<body oncontextmenu="return false;">
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
      </div>
    </aside>
  </section>
<br>
<br>
<br>

<form action="" method="post">
<section id="main-content">
<section class="panel">  

  <br>
          <table class="table table-striped table-advance table-hover" >
              <tr>
                <th><i class="fa fa-book"></i> Tanggal Awal :</th>
                <th>
                <input type="text" id="tgl" class="kolomtext" placeholder="Tanggal" name="tanggal_awal" value="<?php echo date('Y-m-d');?>" required>
              </tr>
              <tr>
                <th><i class="fa fa-book"></i> Tanggal Akhir :</th>
                <th>
                <input type="text" id="tgl1" class="kolomtext" placeholder="Tanggal" name="tanggal_akhir" value="<?php echo date('Y-m-d');?>" required>
              </tr>
                <tr>
                <th><i class="icon_profile"></i> Nama Agen :</th>
                <th>
                <select class="pilihan" name="nama_agen">
                  <option value="Malang Indah">Malang Indah</option>
                  <option value="Iqbal Travel">Iqbal Travel</option>
                  <option value="Syakira Travel">Syakira Travel</option>
                  <option value="Holyday Travel">Holyday Travel</option>
                </select>
                </th>
              </tr>
              <tr>
                <th></th>
                <th><button type="submit" Class="tombolcari" name="cari">Cari</button>
                </th>
              </tr>
          </table>
          <br>
  <header class="panel-heading">
    Data Penumpang
  </header>
  <br>
          <table class="table table-striped table-advance table-hover" >
          <tbody>
              <tr>
                <th>No</th>
                <th>Nomor Telepon Penumpang</th>
                <th>Periode Tanggal</th>                
                <th>Jumlah Pembatalan</th>
                <th>Prosentase Reservasi Tiap Agen</th>
              </tr>
          </tbody>
<?php 

if(isset($_POST['cari'])){
  $conn = mysqli_connect('localhost', 'root', '', 'db_malangindah');
  $nama_agen = $_POST['nama_agen'];
  $tanggal_awal = $_POST['tanggal_awal'];
  $tanggal_akhir = $_POST['tanggal_akhir'];
  $jml_agn = mysqli_query($conn, "SELECT * FROM data_penumpang WHERE tanggal_berangkat BETWEEN '".$tanggal_awal."' and '".$tanggal_akhir."' and status_reservasi = 'BATAL' and agen_pendaftar = '".$nama_agen."'" );      
  $jml_semua_agen = 0;
  while ($d = mysqli_fetch_array($jml_agn)) {
    $nomor_telepon[] = $d['nomor_telepon'];
    $nama_pnp[] = $d['nama'];
    $jml_semua_agen++;
  }
// echo $nomor_telepon[1]." = ".$nama_pnp_pertama;
  $nama_pnp_pertama = $nomor_telepon[0];
for ($i=0; $i < $jml_semua_agen; $i++) { 
  if ($nama_agen_pertama != $nomor_telepon[$i]) {
        $var_pnp[] = $nomor_telepon[$i];
        $nama_agen_pertama = $nomor_telepon[$i];
  }else{
    
  }
}

  $no=0;
  $n=0;
  $n1=0;
  $n2=0;
  $nm_pnp = array_unique($var_pnp);
  $nn = count($nm_pnp);
for ($i=0; $i < $nn; $i++) { 

  $agen_batal = mysqli_query($conn, "SELECT * FROM data_penumpang WHERE tanggal_berangkat BETWEEN '".$tanggal_awal."' and '".$tanggal_akhir."' and status_reservasi = 'BATAL' and agen_pendaftar = '".$nama_agen."' and nomor_telepon = '".$var_pnp[$i]."' " );
    while ($dx = mysqli_fetch_array($agen_batal)) {
    $n++;
  }

  $no++;
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $var_pnp[$i]; ?></td>
      <td><?php echo $tanggal_awal." - ".$tanggal_akhir; ?></td>
      <td>
        <?php
          if ($n == 0){
          $n = "Belum Ada";
            }
          echo $n;
        ?>
          
      </td>
      <td>
        <?php
          if ($n <= 3 && $n >= 0){
            $nilai_prosentase = "Baik";
            }elseif($n > 3){
              $nilai_prosentase = "Buruk";
            }
          echo $nilai_prosentase;
        ?>
      </td>
    </tr>
    <?php 
    $n = 0;
  }

}
?>
  </table>
</section>
</section>
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
    $('#tgl1').datepicker({
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
    })
</script>
 
</body>

</html>
