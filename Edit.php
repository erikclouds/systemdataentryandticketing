<?php
session_start();
if (!isset($_SESSION['username'])){
header("location:login.php");
exit;
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



<?php
$conn = mysqli_connect("localhost", "root", "", "db_malangindah") or die('Tidak terhubung ke MySQL : ' . mysqli_error());
$id = $_GET["id_reservasi"];
$query = mysqli_query($conn, "SELECT id_kuota, tanggal_berangkat, kotaasal, kotatujuan, nomor_telepon, seat, nama, alamat_jemput, alamat_tujuan, status, status_reservasi, agen_pendaftar, harga_tiket, luar_batas from data_penumpang WHERE id_reservasi = $id" );				


while($dt=mysqli_fetch_array($query)) {
  $id = $dt['id_kuota'];
  $Tanggal_Berangkat = $dt['tanggal_berangkat'];
  $seat = $dt['seat'];
  $Kotaasal = $dt['kotaasal'];
  $Kotatujuan = $dt['kotatujuan'];
  $Nomor_Telepon = $dt['nomor_telepon'];
  $Nama = $dt['nama'];
  $Alamat_Jemput = $dt['alamat_jemput'];
  $Alamat_Tujuan = $dt['alamat_tujuan'];
  $Status = $dt['status'];
  $Agen_Pendaftar = $dt['agen_pendaftar'];
  $harga_tiket = $dt['harga_tiket'];
  $luar_batas = $dt['luar_batas'];
}


if(isset($_POST['simpan'])) {
  $_POST['Kotaasal'] = $Kotaasal;
  $_POST['Kotatujuan'] = $Kotatujuan;
  $Nama = $_POST['Nama'];
  $Kotaasal = $_POST['Kotaasal'];
  $Kotatujuan = $_POST['Kotatujuan'];
  $Nomor_Telepon = $_POST['Nomor_Telepon'];
  $Alamat_Jemput = $_POST['Alamat_Jemput'];
  $Alamat_Tujuan = $_POST['Alamat_Tujuan'];
  $sts = $_POST['sts'];
  $update = $_POST['update'];
  $id = $_POST['id'];
  $jamsekarang = date("H");
  $tglsekarang = date("d-m-Y");
  $waktusekarang = date("i");
  $harisekarang = date("l");
  $jamsekarang += 6;
  
  $update = "Updated ".$_SESSION['username']." ".$harisekarang.", ".$tglsekarang." " .$jamsekarang." : ".$waktusekarang;
  $_POST['update'] = $update;

  if ($sts == "Down Payment") {
    $DP = $_POST['Uang_Muka'];
    $DP = mysqli_real_escape_string($conn, $_POST['Uang_Muka']); 
    $DP = str_replace("Rp.","",$DP);
    $DP = str_replace(".","",$DP);
    $DP = intval($DP);
  }elseif ($sts == "Lunas Agen"){
    $_POST['Uang_Muka'] = $harga_tiket;
    $DP = $_POST['Uang_Muka'];
  }elseif ($sts == "Bayar Atas"){
    $_POST['Uang_Muka'] = 0;
    $DP = $_POST['Uang_Muka'];
  }


  $LB = mysqli_real_escape_string($conn, $_POST['Luar_Batas']); 
  $LB = str_replace("Rp.","",$LB);
  $LB = str_replace(".","",$LB);
  $LB = intval($LB);
  $Tiket = $harga_tiket - $DP + $LB;


  $query="UPDATE data_penumpang SET nama = '$Nama', tanggal_berangkat = '$Tanggal_Berangkat', kotaasal='$Kotaasal', kotatujuan='$Kotatujuan', nomor_telepon='$Nomor_Telepon',
                 alamat_jemput = '$Alamat_Jemput', alamat_tujuan='$Alamat_Tujuan', status='$sts', luar_batas ='$LB' , dp ='$DP', total_tiket ='$Tiket', Perubahan ='$update'
                 where id_reservasi='$id'";
  mysqli_query($conn, $query);

}

?>






<form action="" method="post">
<section id="main-content">
<section class="panel">  
  <header class="panel-heading">
    Data Penumpang
  </header>
  <br>
          <table class="table table-striped table-advance table-hover" >
              <tr>
                <th><i class="icon_profile"></i> Tanggal berangkat :</th>
                <th >
                <input type="hidden" name="id" value="<?php echo $_GET['id_reservasi']; ?>">
                <input type="hidden" name="id_kuota" id="id_kuota" value="<?php echo $arm; ?>">
                <input type="text" id="tgl" class="kolomtext" placeholder="Tanggal" name="Tanggal_Berangkat" value="<?php echo $Tanggal_Berangkat; ?>" required disabled>
              </tr>
              <tr>
                <th><i class="icon_profile"></i> Kota Asal :</th>
                <th>
                <select class="pilihan" id="kota1" name="Kotaasal" required disabled>
                  <option value="<?php echo $Kotaasal; ?>"><?php echo $Kotaasal; ?></option>
                  <option value="Malang">Malang</option>
                  <option value="Yogyakarta">Yogyakarta</option>
                  <option value="Denpasar">Denpasar</option>
                  <option value="Tulungagung">Tulungagung</option>
                  <option value="Blitar">Blitar</option>
                </select>
                </th>
              </tr>
              <tr>
                <th><i class="icon_profile"></i> Kota Tujuan :</th>
                <th>
                <select class="pilihan" id="kota2" name="Kotatujuan" required disabled>
                  <option value="<?php echo $Kotatujuan; ?>"><?php echo $Kotatujuan; ?></option>
                  <option value="Malang">Malang</option>
                  <option value="Yogyakarta">Yogyakarta</option>
                  <option value="Denpasar">Denpasar</option>
                  <option value="Tulungagung">Tulungagung</option>
                  <option value="Blitar">Blitar</option>
                </select>
                </th>
              </tr>
              <tr>
                <th><i class="icon_documents_alt"></i> Nomor Telepon :</th>
                <th><input type="text" name="Nomor_Telepon" placeholder="08xxx" class="kolomtext" value="<?php echo $Nomor_Telepon; ?>" required>
                </th>
              </tr>
              <tr>
                <th><i class="icon_profile"></i> Nama :</th>
                <th><input type="text" name="Nama" placeholder="Nama Lengkap" class="kolomtext" value="<?php echo $Nama; ?>" required></th>
              </tr>
              <tr>
                <th><i class="icon_profile"></i> Alamat Jemput :</th>
                <th><textarea name="Alamat_Jemput" id="Kotaawal" placeholder="Alamat Lengkap" class="kolomtextarea" required><?php echo $Alamat_Jemput; ?></textarea></th>
              </tr>
              <tr>
                <th><i class="icon_profile"></i> Alamat Tujuan :</th>
                <th><textarea name="Alamat_Tujuan" id="Kotatujuan" placeholder="Alamat Lengkap" class="kolomtextarea" required><?php echo $Alamat_Tujuan; ?></textarea></th>
              </tr>
              <tr>
                <th><i class="icon_profile"></i> Status :</th>
                <th><select class="pilihan" id="metodepembayaran" name="sts" onChange="sip();" required>
                  <option value="<?php echo $Status; ?>"><?php echo $Status; ?></option>                  
                  <option value="Lunas Agen">Lunas Agen</option>
                  <option value="Bayar Atas">Bayar Atas</option>
                  <option value="Down Payment" >Down Payment</option>
                </select>
                
              <input type="text" name="Uang_Muka"  class="kolomtext" placeholder="Rp." id="DP" disabled="disabled" required>
              </th>
              </tr>
              <tr>
              <th><i class="icon_profile"></i> Luar Batas :</th>
              <th>
                <input type="text" class="kolomtext" placeholder="Rp." name="Luar_Batas" id="LB" value="<?php echo $luar_batas; ?>" required>
              </th>
              </tr>
              <tr>
                <th><input type="hidden" name="update" value="<?php echo $update; ?>"></th>
                <th>
                  <button type="submit" name="simpan" class="tombolsimpan" onclick="f()">Simpan</button>
                  <button type="reset" class="tombolhapus" name="hapus" id="hapus">Hapus</button>
                </th>
              </tr>
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

<script type="text/javascript">
    $(function sip() {
        $("#metodepembayaran").change(function () {
            if ($(this).val() == 'Down Payment') {
                $("#DP").removeAttr("disabled");
                $("#DP").focus();
                $("#DP").val("");
            } else {
                $("#DP").attr("disabled", "disabled");
                $("#DP").val("Rp.");
            }
        });
    });
</script>

<script type="text/javascript">
    $(function x() {
      $("#kota1").change(function () {
            if ($(this).val() == 'Malang') {
                $("#Kotaawal").val("Malang - ");
            } elseif($(this).val() == 'Yogyakarta') {
              $("#Kotaawal").val("Malang - ");
            } elseif($(this).val() == 'Denpasar') {
              $("#Kotaawal").val("Denpasar - ");
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
			duit.value = formatRupiah(this.value, 'Rp. ');
		});
    var wewek = document.getElementById('DP');
		wewek.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			wewek.value = formatRupiah(this.value, 'Rp. ');
		});
    
		/* Fungsi formatRupiah */
    function formatWewek(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			wewek     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				wewek += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? wewek + ',' + split[1] : wewek;
			return prefix == undefined ? wewek : (wewek ? 'Rp. ' + wewek : '');
		}
    
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
            document.getElementById('kota1').disabled = false;
            document.getElementById('kota2').disabled = false;
            alert('Berhasil');
            <?php 
              header("location:Data_Reservasi.php");
             ?>
           }
       </script>
</body>

</html>
