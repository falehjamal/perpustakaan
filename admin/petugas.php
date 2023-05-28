<?php
session_start();
include 'inc/koneksi.php';

if(@$_SESSION['admin']){
	header("location:index.php");
}else if(@$_SESSION['petugas']){
	
 ?>
<head>	
<style type="text/css">
	h1{
		margin: 0 auto;
		padding: 200px 500px;

	}
</style>
</head>

<h1>ini adalah halaman petugas</h1>
<a href="inc/logout.php">logout</a>
<?php 
}else{
	header("location:login.php");
}
 ?>
