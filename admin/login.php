<?php
session_start();
include 'inc/koneksi.php';

if(@$_SESSION['admin']){
	header("location:index.php");
}else if(@$_SESSION['petugas']){
	header("location:index.php");
}
else{

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>halaman login</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
</head>
<body>
<div class="header"></div>
<nav><div class="judul">Perpustakaan SMK Umar Fatah Rembang</div></nav>

<form method="post">
	<div><h1><span>Silahkan</span> Login</h1></div><hr>
	<div class="icon"> <img src="../icon/apik.png" style="width: 100%;height: 80%;"> </div>
		<div class="form">
	<input class="text" type="text" name="user" placeholder="Username" required>
	<input class="text" type="password" name="password" placeholder="Password" required>
	<input type="submit" name="login" value="Login" class="btn">
		


<?php
$user=addslashes(@$_POST['user']);
$pass=addslashes(@$_POST['password']);
$login=@$_POST['login'];

if($login){
	if($user == "" || $pass == ""){
		?><script>alert("Username And Password tidak boleh kosong");</script><?php
	}
	else{
		$query=mysqli_query($koneksi,"SELECT * FROM tb_login WHERE username='$user' and password=md5('$pass')");
		$data=mysqli_fetch_array($query);
		$cek=mysqli_num_rows($query);
	 	if($cek == 1){
			if($data['level']=="admin"){
				@$_SESSION['admin']=$data['id_user'];
				header("location:index.php");
			}	
			else if($data['level']=="petugas"){
				@$_SESSION['petugas']=$data['id_user'];
				header("location:index.php");
			}
		}else{
			?> <div class="false">Mohon periksa username atau password anda !!!</div> <?php
		}

	}
}

 ?>
 </div>
</form>
</body>
</html>
<?php
}
?>
