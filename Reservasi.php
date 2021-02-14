<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])){
header("location:login.php");
exit;
}
$conn = mysqli_connect("localhost", "root", "", "db_malangindah") or die('Tidak terhubung ke MySQL : ' . mysqli_error());
?>




<?php
  $id_kursi = $_POST['id_kursi'];
  $arm = $_POST['arm'];
  $ktasal = $_POST['ktasal'];
  $kttujuan = $_POST['kttujuan'];
  $query = mysqli_query($conn, "SELECT id_kuota, kotaasal, kotatujuan, armada, jam, tanggal, harga_tiket, kuota
  from kuota WHERE id_kuota = $id_kursi " );	
  while($dt = mysqli_fetch_array($query)) {
  $tanggal = $dt['tanggal'];
  }

$var = "submit";
if(isset($_POST[$var])) {
  $id_kur = $_POST['id_kur'];

  $conn = mysqli_connect("localhost", "root", "", "db_malangindah") or die('Tidak terhubung ke MySQL : ' . mysqli_error());
  $query = mysqli_query($conn, "SELECT id_kuota, kotaasal, kotatujuan, armada, jam, tanggal, harga_tiket, kuota
  from kuota WHERE id_kuota = $id_kur " );	
  while($dt=mysqli_fetch_array($query)) {
  $id_kuota = $dt['id_kuota'];
  $kuota = $dt['kuota'];
  $kotaasal = $dt['kotaasal'];
  $kotatujuan = $dt['kotatujuan'];
  $arm = $dt['armada'];
  $jam = $dt['jam'];
  $tanggal = $dt['tanggal'];
  $harga_tiket = $dt['harga_tiket'];
  $_POST['Harga_tiket'] = $harga_tiket;
  $_POST['jam'] = $jam;
  $_POST['armada'] = $arm;
  }
  $totalseat = mysqli_real_escape_string($conn, $_POST['totalseat']);
  $jam = mysqli_real_escape_string($conn, $_POST['jam']);
  $jam = strval($jam);
  $Tanggal_Berangkat = $_POST['Tanggal_Berangkat'];
  $Kotaasal = mysqli_real_escape_string($conn, $_POST['Kotaasal']);
  $Kotatujuan = mysqli_real_escape_string($conn, $_POST['Kotatujuan']);
  $Nomor_Telepon = mysqli_real_escape_string($conn, $_POST['Nomor_Telepon']);
  $Nama = mysqli_real_escape_string($conn, $_POST['Nama']);
  $Alamat_Jemput = mysqli_real_escape_string($conn, $_POST['Alamat_Jemput']);
  $Alamat_Tujuan = mysqli_real_escape_string($conn, $_POST['Alamat_Tujuan']);
  $Status = mysqli_real_escape_string($conn, $_POST['sts']);
  $lb = mysqli_real_escape_string($conn, $_POST['Jumlahpembayaran']);
  $lb = str_replace("Rp.","",$lb);
  $lb = str_replace(".","",$lb);
  $lb = intval($lb);
  $harga_tiket = $_POST['Harga_tiket'];
  $harga_tiket = intval($harga_tiket);
  $Agen_Pendaftar = mysqli_real_escape_string($conn, $_SESSION['agen']);
  $Akun_Pendaftar = mysqli_real_escape_string($conn, $_SESSION['username']);
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
  $Tanggal_Reservasi = "Di Reservasi Oleh ".$_SESSION['username']." ".$harisekarang.", ".$tglsekarang." " .$jamsekarang." : ".$waktusekarang;
  $no_urut = 0;

  if ($arm == "Hi-Ace") {
    $isikursi = 10;
  }elseif ($arm == "Elf") {
    $isikursi = 14;
  }elseif ($arm == "Mini Bus") {
    $isikursi = 35;
  }elseif ($arm == "Bus") {
    $isikursi = 59;
  }
  
  $n=0;
  for ($i=1; $i <= $isikursi ; $i++) { 
    $valueseat = $_POST['seat'.$i];
    if ($valueseat == $i) {
      $seat[] = $_POST['seat'.$i];
      $n++;
    }
  }

  if ($Status == "Lunas Agen"){
    $dp = $_POST['Harga_tiket'];
  }elseif ($Status == "Bayar Atas"){
    $dp = 0;
  }elseif ($Status == "Down Payment"){
    $dp = mysqli_real_escape_string($conn, $_POST['dp']); 
    $dp = str_replace("Rp.","",$dp);
    $dp = str_replace(".","",$dp);
    $dp = intval($dp);
  }
  $t = $_POST['Harga_tiket'];
  $t = $t - $dp + $lb;
  $t = intval($t);

  
  $q = mysqli_query($conn, "SELECT id_reservasi FROM data_penumpang ORDER BY id_reservasi ASC" );	
  $n = 1;
  for ($x = 0; $x < $totalseat; $x++) { 
  while($d=mysqli_fetch_array($q)) {
  $id_reservasi = $d['id_reservasi'];
  } 
    $id[] = $id_reservasi + 1;
    $id_reservasi = $id_reservasi + 1;
    $insert = "INSERT INTO data_penumpang(id_reservasi, id_kuota, seat, nama, nomor_telepon, kotaasal, kotatujuan, alamat_jemput, alamat_tujuan, tanggal_berangkat, jam, dp, luar_batas, harga_tiket, total_tiket, tanggal_reservasi, agen_pendaftar, status, status_reservasi, akun_pendaftar, Perubahan)
     VALUES ($id[$x], $id_kur,'$seat[$x]','$Nama', '$Nomor_Telepon','$Kotaasal','$Kotatujuan','$Alamat_Jemput','$Alamat_Tujuan','$Tanggal_Berangkat','$jam','$dp','$lb','$harga_tiket','$t','$Tanggal_Reservasi','$Agen_Pendaftar','$Status', 'ACTIVE','$Akun_Pendaftar','')";
     mysqli_query($conn, $insert); 
   
  }
  header('Location: Data_Reservasi.php');

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

<form action="Reservasi.php" method="post" name="form1">
<section id="main-content">
<section class="panel">  
  <header class="panel-heading">
    Data Penumpang
  </header>
  <br>
          <table class="table table-striped table-advance table-hover" >
              <tr>


<?php
if ($arm == "Hi-Ace") {
  if ($ktasal == "Denpasar" || $kttujuan == "Denpasar" ) {
    $isikursi = 9;
  }else{
    $isikursi = 10;
  }
}elseif ($arm == "Elf") {
  $isikursi = 14;
}elseif ($arm == "Mini Bus") {
  $isikursi = 35;
}elseif ($arm == "Bus") {
  $isikursi = 59;
}

$n=0;
for ($i=1; $i <= $isikursi ; $i++) { 
  $valueseat = $_POST['seat'.$i];
  if ($valueseat == $i) {
    echo '<input type="hidden" name="seat'.$i.'" value="'.$_POST['seat'.$i].'">';
    $n++;
  }
}
echo '<input type="hidden" name="totalseat" value="'.$n.'">';
echo '<input type="hidden" name="kuota" value="">';
echo '<input type="hidden" name="id_kur" value="'.$id_kursi.'">';


?>

              
                <th><i class="icon_profile"></i> Tanggal berangkat :</th>
                <th >
                <input type="text" id="tgl" class="kolomtext" placeholder="Tanggal" name="Tanggal_Berangkat" value="<?php echo $tanggal;?>" disabled>
              </tr>
              <tr>
                <th><i class="icon_profile"></i> Kota Asal :</th>
                <th>
                <select class="pilihan" id="Kotaasal" name="Kotaasal" disabled>
                  <option value="<?php echo $_POST['ktasal'];?>"><?php echo $_POST['ktasal'];?></option>
                </select>
                </th>
              </tr>
              <tr>
                <th><i class="icon_profile"></i> Kota Tujuan :</th>
                <th>
                <select class="pilihan" id="Kotatujuan" name="Kotatujuan" disabled>
                  <option value="<?php echo $_POST['kttujuan'];?>"><?php echo $_POST['kttujuan'];?></option>
                </select>
                </th>
              </tr>
              <tr>
                <th><i class="icon_documents_alt"></i> Nomor Telepon :</th>
                <th><input type="text" name="Nomor_Telepon" placeholder="08xxx" class="kolomtext" required>
                <!-- <button type="button" class="tombolcari" data-toggle="modal" data-target="#exampleModal" data-isi="Tempat Duduk">Cari</button> -->
                </th>
              </tr>
              <tr>
                <th><i class="icon_profile"></i> Nama :</th>
                <th><input type="text" name="Nama" placeholder="Nama Lengkap" class="kolomtext" name="Nama" required></th>
              </tr>
              <tr>
                <th><i class="icon_profile"></i> Alamat Jemput :</th>
                <th><textarea name="Alamat_Jemput" id="Kotaawal" placeholder="Alamat Lengkap" class="kolomtextarea" required></textarea></th>
              </tr>
              <tr>
                <th><i class="icon_profile"></i> Alamat Tujuan :</th>
                <th><textarea name="Alamat_Tujuan" id="Kotatujuan" placeholder="Alamat Lengkap" class="kolomtextarea" required></textarea></th>
              </tr>
              <tr>
              <th><i class="icon_profile"></i> Status :</th>
              <th>
                <select class="pilihan" id="metodepembayaran" name="sts" onChange="sip();" >
                  <option value="Lunas Agen">Lunas Agen</option>
                  <option value="Bayar Atas">Bayar Atas</option>
                  <option value="Down Payment" >Down Payment</option>
                </select>
              </th>
              </tr>
              <tr>
              <th><i class="icon_profile"></i> DP :</th>
              <th>
              <input type="hidden" name="Harga_tiket" value="<?php echo $harga_tiket; ?>">
              <input type="text" class="kolomtext" placeholder="Rp." name="dp" id="inputmetodepembayaran" disabled="disabled" value="">
              </th>
              </tr>
              <tr>
              <th><i class="icon_profile"></i> Luar Batas :</th>
              <th>
                <input type="text" name="Jumlahpembayaran" class="kolomtext" placeholder="Rp." id="LB">
                <input type="hidden" name="armada" value="<?php echo $armada; ?>">
              </th>
              </tr>
              <tr>
                <th></th>
                <th>
                  <button type="submit" name="submit" class="tombolsimpan" onclick="f()">Simpan</button>
                  <button type="reset" class="tombolhapus">Hapus</button>
                </th>
              </tr>
          </table>
</section>
</section>
  </form>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel">Data Penumpang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          &times;
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <table class="table table-striped table-advance table-hover" >
              <tbody>
              <tr>
                <th><i class="fa fa-cog"></i></th>
                <th>No</th>
                <th><i class="icon_profile"></i> Nama</th>
                <th>Alamat Jemput</th>
                <th>Alamat Tujuan</th>
              </tr>
          </tbody>
                <tr>
                <td><input type="checkbox" name="bahasa1" value="php" /></td>
                <td>1</td>
                <td>Erik Widiyanto</td>
                <td>Malang</td>
                <td>Yogyakarta</td>
                </tr>
            </table>

          </div>
        </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" >Pesan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel">Data Penumpang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          &times;
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <table class="table table-striped table-advance table-hover" >
              <tbody>
              <tr>
                <th><i class="fa fa-cog"></i></th>
                <th>No</th>
                <th><i class="icon_profile"></i> Nama</th>
                <th>AA </th>
                <th>Tujuan</th>
              </tr>
          </tbody>
                <tr>
                <td><input type="checkbox" name="bahasa1" value="php" /></td>
                <td>1</td>
                <td>Erik Widiyanto</td>
                <td>Malang</td>
                <td>Yogyakarta</td>
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

<script type="text/javascript">
    $(function sip() {
        $("#metodepembayaran").change(function () {
            if ($(this).val() == 'Down Payment') {
                $("#inputmetodepembayaran").removeAttr("disabled");
                $("#inputmetodepembayaran").focus();
                $("#inputmetodepembayaran").val("");
            } else {
                $("#inputmetodepembayaran").attr("disabled", "disabled");
                $("#inputmetodepembayaran").val("Rp.");
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
		
		var rupiah = document.getElementById('LB');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var duit = document.getElementById('inputmetodepembayaran');
		duit.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			duit.value = formatRupiah(this.value, 'Rp. ' );
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

    function formatDuit(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			duit     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				duit += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? duit + ',' + split[1] : duit;
			return prefix == undefined ? duit : (duit ? 'Rp. ' + duit : '');
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
