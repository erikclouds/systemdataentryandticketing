<?php 

session_start();
if(isset($_POST['submit'])){
  $conn = mysqli_connect("localhost", "root", "", "db_malangindah") or die('Tidak terhubung ke MySQL : ' . mysqli_error());
  $username = $_POST['username'];
  $password = $_POST['password'];
  $login = mysqli_query($conn, "SELECT * from data_user where username = '$username' and password = '$password'");
  $cek = mysqli_num_rows($login);
  $username = strtoupper($username);
          while ($data = mysqli_fetch_array($login)) {
            $jabatan_user[] = $data['jenis_user'];
            $agen[] = $data['nama_agen'];
            $id = $data['id_username'];
          }
  echo $cek;
    if($cek > 0){
      $_SESSION['id_username'] = $id;
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      $_SESSION['agen'] = $agen[0];
      $_SESSION['jabatan_user'] = $jabatan_user[0];
      $_SESSION['status'] = "login";
      
      if (!isset($_SESSION['username']) || $_POST['password'] ==""){
        header("location:login.php");
      exit;
      }else{
        header("location:index.php");
      }
    }else{
      header("location:login.php");
    }
  }

?>

<!DOCTYPE html>
<html lang="en" oncontextmenu="return false;">
<script type="text/javascript">
  
 document.onkeydown = function(e) {
  if(event.keyCode == 123) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
     return false;
  }
}

</script>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabssubmit">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  <title>Malang Indah Login</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body color="green">
  <div class="container">
    <form class="login-form" method="post" action="">
     <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="Username" id="username" name="username" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="Password" id="password" name="password">
        </div>
        <button class="tombollogin" type="submit" name="submit" onclick="validasi()">Login</button>
      </div>
    </form>
  </div>
</body>

<style type="text/css">
  .tombollogin{
    border: whitesmoke solid 1px;
    border-radius: 5px 5px 5px 5px;
    height: 35px;
    width: 80px;
    padding: 5px 5px 5px 5px;
    color: #A4A4A4;
    background: #F7F6F6;
    cursor:pointer;
    }
 .tombollogin:hover{
    border: whitesmoke solid 1px;
    border-radius: 5px 5px 5px 5px;
    height: 35px;
    width: 80px;
    padding: 5px 5px 5px 5px;
    color: #8D8D8D;
    background: #ECECEC;
    cursor:pointer;
    }
  }

</style>

<script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if (username != "" && password !="") {
			return true;
		}else{
			alert('Username dan Password harus di isi !');	
			return false;

		}
	}

</script>


</html>
