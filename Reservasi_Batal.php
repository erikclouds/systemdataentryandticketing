<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])){
header("location:login.php");
exit;
}
if ($_SESSION['jabatan_user'] == 'ADMIN') {
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
<?php
          if ($_SESSION['jabatan_user'] == "SUPERADMIN"){
            echo ' 
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
                <th><i class="icon_profile"></i> Tanggal berangkat :</th>
                <th>
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
                <th></th>
                <th><button type="submit" Class="tombolcari" name="cari">Cari</button>
                </th>
              </tr>
          </table>
          <br>
  <header class="panel-heading">
    Data Penumpang Batal
  </header>
  <br>
          <table class="table table-striped table-advance table-hover" >
          <tbody>
              <tr>
                <th>No</th>
                <th>Tanggal Berangkat</th>
                <th>Seat</th>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Jam Keberangkatan</th>
                <th>Alamat Jemput</th>
                <th>Alamat Tujuan</th>
                <th>Agen Pendaftar</th>
                <th>Keterangan</th>
              </tr>
          </tbody>
<?php 

if(isset($_POST['Kotaasal']) and isset($_POST['Kotatujuan']) and isset($_POST['tanggal'])){
  $conn = mysqli_connect('localhost', 'root', '', 'db_malangindah');
  $Kotaasal = $_POST['Kotaasal'];
  $Kotatujuan = $_POST['Kotatujuan'];
  $tanggal = $_POST['tanggal'];
  $query = mysqli_query($conn, "SELECT * from data_penumpang where kotaasal like '%".$Kotaasal."%' and kotatujuan like '%".$Kotatujuan."%' and tanggal_berangkat like '%".$tanggal."%' and status_reservasi = 'BATAL' ORDER BY nama ASC" );				
  $no=0;
  while ($data = mysqli_fetch_array($query)) {
    $no++;
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $data['tanggal_berangkat']; ?></td>
      <td><?php echo "Seat ".$data['seat']; ?></td>
      <td><?php echo $data['nama']; ?></td>
      <td><?php echo $data['nomor_telepon']; ?></td>
      <td><?php echo $data['jam'];; ?></td>
      <td><?php echo $data['alamat_jemput']; ?></td>
      <td><?php echo $data['alamat_tujuan']; ?></td>
      <td><?php echo $data['agen_pendaftar']; ?></td>
      <td><?php echo $data['perubahan']; ?></td>
    </tr>
    <?php }
$_POST['cari'] = $tanggal;
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
