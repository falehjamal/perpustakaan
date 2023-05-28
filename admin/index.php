<?php
@session_start();
include"inc/koneksi.php";

if(@$_SESSION['admin'] || @$_SESSION['petugas']){

 ?>

<!DOCTYPE html>
<html>
<head> 
	<title>Aplikasi perpustakaan</title>
	<link rel="stylesheet" type="text/css" href="css/styleadmin.css">
</head>
<script src="js/jquery.min.js"></script>
<body>
<div id="hidden">
	<div id="progress-bar"></div><div id="loading"><div class="loading"></div></div>
</div>
<div class="canvas">
<header><h1>Perpustakaan SMK Umar Fatah</h1></header>
  <nav>
	<ul>
	<?php @$page=@$_GET['page']; ?>
		<li><a <?php if($page==""){ ?>class="active" <?php } ?> href="?">Home</a></li>
		<li><a <?php if($page=="kategori"){ ?>class="active" <?php } ?> href="?page=kategori">Kategori</a></li>
		<li><a <?php if($page=="data"){ ?>class="active" <?php } ?> href="?page=data">Data Buku</a></li>
		<li><a <?php if($page=="anggota"){ ?>class="active" <?php } ?> href="?page=anggota">Anggota</a></li>
		<li><a <?php if($page=="pengembalian"){ ?>class="active" <?php } ?> href="?page=pengembalian">Pengembalian</a></li>
		<li><a <?php if($page=="peminjam"){ ?>class="active" <?php } ?> href="?page=peminjam">Peminjam</a></li>
		<li style="float:right;"><a onclick="return confirm('Yakin Ingin keluar?')" href="inc/logout.php">Logout</a></li>
		<li style="float:right;">
			<?php
	if (@$_SESSION['admin']) 
{
	$sex = @$_SESSION['admin'];
}
elseif (@$_SESSION['petugas']) 
{
	$sex = @$_SESSION['petugas'];
}
$saru = mysqli_query($koneksi,"SELECT * FROM tb_login WHERE id_user = $sex");
$boss = mysqli_fetch_array($saru);		 ?>
			<a href="index.php?page=profil"><?php echo $boss['nama_lengkap'];

			 ?></a>
			
		</li>
	</ul>
  </nav>
<div class="isi">


		<?php
		$page=@$_GET['page'];
		$action=@$_GET['action'];
    
		if($page=="kategori"){
			if($action==""){
				include"pages/kategori/kategori.php";
			}else if($action=="tambah_kategori"){
				include"pages/kategori/tambah_kategori.php";
			}else if($action=="edit_kategori"){
				include"pages/kategori/edit_kategori.php";
			}else if($action=="delete_kategori"){
				include "pages/kategori/delete_kategori.php";
			}
		}else if($page=="data"){
			if ($action=="") {
				include "pages/buku/data.php";
			}else if($action=="tambah") {
				include "pages/buku/tambah.php";
			}else if($action=="edit") {
				include "pages/buku/edit.php";
			}else if($action=="delete") {
				include "pages/buku/delete.php";
			}
		}else if($page=="anggota"){
			if ($action=="") {
				include "pages/anggota/anggota.php";
			}else if($action=="tambah_anggota") {
				include "pages/anggota/tambah_anggota.php";
			}else if($action=="edit_anggota") {
				include "pages/anggota/edit_anggota.php";
			}else if($action=="delete_anggota") {
				include "pages/anggota/delete_anggota.php";
			}
		}else if($page=="pengembalian"){
			if ($action=="") {
				include "pages/pengembalian/pengembalian.php";
			}else if($action=="tambah_pengembalian") {
				include "pages/pengembalian/tambah_pengembalian.php";
			}else if($action=="edit_pengembalian") {
				include "pages/pengembalian/edit_pengembalian.php";
			}else if($action=="delete_pengembalian") {
				include "pages/pengembalian/delete_pengembalian.php";
			}
		}else if($page=="peminjam"){
			if ($action=="") {
				include "pages/peminjam/peminjam.php";
			}else if($action=="tambah_peminjam") {
				include "pages/peminjam/tambah_peminjam.php";
			}else if($action=="edit_peminjam") {
				include "pages/peminjam/edit_peminjam.php";
			}else if($action=="delete_peminjam") {
				include "pages/peminjam/delete_peminjam.php";
			}
		}else if($page=="profil"){
			if ($action=="") {
				include "pages/profil/anggota.php";
			}else if($action=="tambah_anggota") {
				include "pages/profil/tambah_anggota.php";
			}else if($action=="edit_anggota") {
				include "pages/profil/edit_anggota.php";
			}else if($action=="delete_anggota") {
				include "pages/profil/delete_anggota.php";
			}
			
		}else if($page==""){
			include"welcome.php";

		}elseif ($page=="nganu") {
			include 'pages/nganu.php';
		}
		else{
			include"404.php";
		}


		 ?>
	</div>
	<footer>&copycopyright- Ahmad faleh jamaluddin</footer>
</div>

<script>

// ----------------------------------------------------------------loading---------------------------------------------------------//
$(document).ready(function() {
$("#hidden").css('display', 'block');
$("#progress-bar").animate({width:"100%"}, 400); });
$(window).bind('load', function() {
$("#progress-bar").stop().animate({width:"100%"}, 1000, function() {
$("#hidden").fadeOut(1000); }); });
 //----------------------------------------------------------------loading---------------------------------------------------------//
	
</script>

</body>
</html>
<?php
}
else{
	header("location:login.php");
}
?>
