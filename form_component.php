<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<form action="" method = "POST" name="form_cek" id="form_cek">

<label for="nama">Nama:</label><input type="text" name="nama" id="nama" />

</form>

<a href="" onclick="document.form_cek.action = 'general.php';
document.form_cek.method='post';
document.form_cek.submit();
return false;">Cari</a>

<a href="" onclick="document.form_cek.action = 'form_component.php'; document.form_cek.submit(); return false;">Edit</a>
<a href="" onclick="fx()">FF</a>

</body>
<script type="text/javascript">
function fx(){
// document.form_cek.action = 'general.php';
document.getElementById("form_cek").action = "general.php";
document.getElementById("form_cek").method="post";
// document.form_cek.method='post';
// document.form_cek.submit();
// return false;
}

</script>

</html>
