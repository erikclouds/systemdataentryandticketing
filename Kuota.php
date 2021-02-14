<?php
session_start();
if (!isset($_SESSION['username'])){
header("location:login.php");
exit;
}
if ($_SESSION['jabatan_user'] == 'ADMIN') {
  header("location:index.php");
}
?>





<?php

$conn = mysqli_connect("localhost", "root", "", "db_malangindah") or die('Tidak terhubung ke MySQL : ' . mysqli_error());

if(isset($_POST['Simpan'])) {
  $Tanggal_Berangkat = mysqli_real_escape_string($conn, $_POST['Tanggal']);
  $Kotaasal = mysqli_real_escape_string($conn, $_POST['Kotaasal']);
  $Kotatujuan = mysqli_real_escape_string($conn, $_POST['Kotatujuan']);
  $Armada = mysqli_real_escape_string($conn, $_POST['Armada']);
  $Jenis = mysqli_real_escape_string($conn, $_POST['Jenis']);

  $Jumlahpnp = mysqli_real_escape_string($conn, $_POST['Jumlahpnp']);
  $tiket = mysqli_real_escape_string($conn, $_POST['hargatiket']); 
  $tiket = str_replace("Rp.","",$tiket);
  $tiket = str_replace(".","",$tiket);
  $tiket = intval($tiket);


  $Jam = mysqli_real_escape_string($conn, $_POST['Jam']);
  $Menit = mysqli_real_escape_string($conn, $_POST['Menit']);
  $Menit = strval($Menit);
  if ($Menit <= 9){
    $Menit = "0".$Menit;
  }
  if ($Jam <= 9){
    $Jam = "0".$Jam;
  }
  $Jam = strval($Jam);

  $J = strlen($Jam);
  $M = strlen($Menit);
  $Y = $M - 2;
  $X = $J - 2;
  $Jam = substr($Jam, $X, $J);
  $Menit = substr($Menit, $Y, $M);
  $waktu = $Jam.":".$Menit; 
    $insert = "INSERT INTO kuota(kuota, armada, jenis, kotaasal, kotatujuan, jam, tanggal, harga_tiket)
               VALUES( '$Jumlahpnp', '$Armada', '$Jenis', '$Kotaasal', '$Kotatujuan', '$waktu', '$Tanggal_Berangkat', '$tiket')";
    // Insert user data into table
    mysqli_query($conn, $insert);
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
  <link type="text/css" href="css/bootstrap-timepicker.min.css" />

</head>
<body onload="start()" oncontextmenu="return false;">
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

<form action="" method="post">
<section id="main-content">
<section class="panel">  
  <br>
          <table class="table table-striped table-advance table-hover" >
              <tr>
                <th><i class="fa fa-book"></i> Tanggal berangkat :</th>
                <th >
                <input type="text" id="tanggal" class="kolomtext" placeholder="Tanggal" name="Tanggal" value="<?php echo date('Y-m-d');?>" required>
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
                <select class="pilihan" name="Armada">
                  <option value="Hi-Ace">Hi-Ace</option>
                  <option value="Elf">Elf</option>
                  <option value="Mini Bus">Mini Bus</option>
                  <option value="Bus">Bus</option>
                </select>
                </th>
              </tr>
              <tr>
                <th><i class="fa fa-car"></i>&nbsp;Jenis Reservasi :</th>
                <th>
                <select class="pilihan" name="Jenis">
                  <option value="REGULER">REGULER</option>
                </select>
                </th>
              </tr>
              <tr>
              <th><i class="icon_profile"></i> Jumlah Penumpang :</th>
                <th >
                <input type="number" name="Jumlahpnp" id="Jumlahpnp" min="0" max="65" required>
              </tr>
              <tr>
              <tr>
              <th></i> Harga Tiket :</th>
                <th >
                <input type="text" name="hargatiket" id="tiket" required>
              </tr>
              <tr>
              <th>Jam Keberangkatan :</th>
                  <th>
                  <input type="number" name="Jam" id="Jam" min="0" max="23" required>
                  &nbsp;:&nbsp;
                  <input type="number" name="Menit" id="Menit" min="0" max="60" required>
                  </th>
              </tr>
              <tr>
                <th></th>
                <th>
                <button type="submit" Class="tombolcari" name="Simpan" onclick="f()">Simpan</button></th>
              </tr>
          </table> 
</section>
</section>
</form>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel">Tempat Duduk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <table >
              <tr>
                <td><div class="tombolsimpan" onclick="pilihseat()" id="no1">No 1</div></td>
                <td>&nbsp;</td>
                <td><div class="tombolcari" >Sopir</div></td>
              </tr>
              <tr>
                <td><div class="tombolsimpan" onclick="pilihseat2()" id="no2"> No 2</div></td>
                <td><div class="tombolsimpan" onclick="pilihseat3()" id="no3">No 3</div></td>
                <td><div class="tombolsimpan" onclick="pilihseat4()" id="no4">No 4</div></td>
              </tr>
              <tr>
                <td><div class="tombolsimpan" onclick="pilihseat5()" id="no5">No 5</div></td>
                <td><div class="tombolsimpan" onclick="pilihseat6()" id="no6">No 6</div></td>
                <td><div class="tombolsimpan" onclick="pilihseat7()" id="no7">No 7</div></td>
              </tr>
              <tr>
                <td><div class="tombolsimpan" onclick="pilihseat8()" id="no8">No 8</div></td>
                <td><div class="tombolsimpan" onclick="pilihseat9()" id="no9">No 9</div></td>
                <td><div class="tombolsimpan" onclick="pilihseat10()" id="no10">No 10</div></td>
              </tr>
            </table>

          </div>
        </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Pesan</button>
      </div>
    </div>
  </div>
</div>
  <script src="js/jquery.js"></script>
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

    <script src="js/fungsi.js"></script>
    <script type="text/javascript" src="js/bootstrap-timepicker.min.js"></script>



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
    $('#tanggal').datepicker({
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


<script type="text/javascript">
		
		var rupiah = document.getElementById('tiket');
		rupiah.addEventListener('keyup', function(e){
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>
       <script>
          function f(){
            document.getElementById('tgl').disabled = false;
            document.getElementById('Kotaasal').disabled = false;
            document.getElementById('Kotatujuan').disabled = false;
            alert('Berhasil');
           }
       </script>
</body>

</html>
