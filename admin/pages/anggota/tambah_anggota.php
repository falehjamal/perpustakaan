
<fieldset>
	<legend>Tambah Data</legend>
	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama_anggota" required></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type="text" name="alamat_anggota" required></td>
			</tr>
			<tr>
				<td>Jenis kelamin</td>
				<td>:</td>
				<td><select name="jk_anggota" required>
					<option>--pilih--</option>
					<option value="pria">pria</option>
					<option value="wanita">wanita</option>
				</select></td>
			</tr>
			<tr>
				<td>Telpon</td>
				<td>:</td>
				<td><input type="number" name="telp_anggota" required></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah"><input type="reset" name="" value="hapus"><a href="?page=anggota"><input type="button" name="" value="Batal"></a></td>
			</tr>
		</table>
	</form>

<?php 
include"inc/koneksi.php";

	$nama_anggota=@$_POST['nama_anggota'];
	$alamat_anggota=@$_POST['alamat_anggota'];
	$jk_anggota=@$_POST['jk_anggota'];
	$telp_anggota=@$_POST['telp_anggota'];
	$tambah=@$_POST['tambah'];

	$sumber = @$_FILES['gambar']['tmp_name'];
	$target = "img/";
	$nama_gambar = @$_FILES['gambar']['name'];

	if($tambah){
		if($nama_anggota=="" || $alamat_anggota=="" || $jk_anggota=="" || $telp_anggota==""){
			?><script>alert("Data tidak boleh ada yang kosong");</script><?php
		}else{

				mysqli_query($koneksi,"INSERT INTO `tb_anggota` (`id_anggota`, `nama_anggota`, `alamat_anggota`, `jk_anggota`, `telp_anggota`) VALUES (NULL, '$nama_anggota', '$alamat_anggota', '$jk_anggota', '$telp_anggota')");
				?><script>alert("Data berhasil ditambahkan.");window.location.href="?page=anggota";</script><?php
			
		}
	}

 ?>


</fieldset>