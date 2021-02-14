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

<form action="#" method="post">
<section id="main-content">
<section class="panel">  
  <header class="panel-heading">
    Data Pengguna Sistem
  </header>
  <br>
          <table class="table table-striped table-advance table-hover" >
          <tbody>
              <tr>
                <th>No</th>
                <th>Nama Agen</th>
                <th>Username</th>                
                <th>Password</th>
                <th>Pengaturan</th>
              </tr>
          </tbody>
<?php 

  $no = 0;
  $conn = mysqli_connect('localhost', 'root', '', 'db_malangindah');
  $data_akun = mysqli_query($conn, "SELECT * FROM data_user");      
  while ($d = mysqli_fetch_array($data_akun)) {
    $no++;
  ?>
      <tr>
      <input type="hidden" id="edit<?php echo $no; ?>" value="<?php echo $d['id_username']; ?>">
      <td><?php echo $no; ?></td>
      <td><?php echo $d['nama_agen'];; ?></td>
      <td><input type="hidden" id="usr_<?php echo $no; ?>" value="<?php echo $d['username']; ?>"><?php echo $d['username']; ?></td>
      <td><input type="hidden" id="psw_<?php echo $no; ?>" value="<?php echo $d['password']; ?>"><?php echo $d['password']; ?></td>
      <td>
        <button type="submit" onclick="<?php echo "edit_".$no."()"; ?>" data-toggle="modal" data-target="#exampleModal" data-isi="Seat"  class="tombolcari" id="" name="edit">Edit</button>
      </td>
    </tr>
    <?php
      }


  if(isset($_POST['Simpan'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['tmp'];
    if($_SESSION['id_username'] == $id){
       $_SESSION['username'] = $username;
    }
    $query="UPDATE data_user SET username = '$username', password = '$password' WHERE id_username='$id'";
    mysqli_query($conn, $query);
  }
?>

<div  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel">Pengaturan Akun</h5>
      </div>
      <div class="modal-body">
          <div class="form-group">
          <i class="fa fa-book"></i> 
          <span>Username : </span>
          <input type="text" class="txt" name="username" id="username" value="">
          <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
          <i class="fa fa-book"></i> 
          <span>Password : </span>
          <input type="password" class="txt" name="password" id="password" value="">
          <input type="hidden" class="txt" name="tmp" id="tmp" value="">
          </div>  
        <div class="modal-footer">
          <button type="submit" class="tombolsimpan" name="Simpan">Simpan</button>
      </div>     
    </div>
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
 



 <script type="text/javascript">
  <?php
    $dt_akun = mysqli_query($conn, "SELECT * FROM data_user");      
    while ($d = mysqli_fetch_array($dt_akun)) {
    $no++;
    }
    for ($i=1; $i <= $no; $i++) { 
      
    
  ?>
   function edit_<?php echo $i; ?>(){
    document.getElementById("tmp").value = document.getElementById("edit<?php echo $i; ?>").value;
    document.getElementById("username").value = document.getElementById("usr_<?php echo $i; ?>").value;
    document.getElementById("password").value = document.getElementById("psw_<?php echo $i; ?>").value;

   }

   <?php
  }
   ?>
 </script>
</body>

</html>
