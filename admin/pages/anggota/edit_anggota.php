<?php 
include "inc/koneksi.php";

$id_anggota=@$_GET['id_anggota'];
$query = mysqli_query($koneksi,"SELECT * FROM tb_anggota WHERE id_anggota='$id_anggota'") or die (mysqli_error());
$data=mysqli_fetch_array($query);

 ?>
<fieldset>
	<legend>Ubah Data</legend>
	<form method="post" action="">
		<table>
			<tr>
				<td>ID_Anggota</td>
				<td>:</td>
				<td><input type="number" name="id_anggota" value="<?php echo $data['id_anggota'];?>" disabled></td>
			</tr>
			<tr>
				<td>Judul</td>
				<td>:</td>
				<td><input type="" name="nama_anggota" value="<?php echo $data['nama_anggota'];?>"></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>:</td>
				<td><input type="" name="alamat_anggota" value="<?php echo $data['alamat_anggota'];?>"></td>
			</tr>
			<tr>
				<td>Jenis kelamin</td>
				<td>:</td>
				<td><input type="" name="jk_anggota" value="<?php echo $data['jk_anggota'];?>"></td>
			</tr>
			<tr>
				<td>Jumlah Cover</td>
				<td>:</td>
				<td><input type="number" name="telp_anggota" value="<?php echo $data['telp_anggota'];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="edit" value="Ubah"><input type="reset" name=""><a href="?page=anggota"><input type="button" name="" value="Batal"></td>
			</tr>
		</table>
	</form>
</fieldset>
<?php 
	$nama_anggota=@$_POST['nama_anggota'];
	$alamat_anggota=@$_POST['alamat_anggota'];
	$jk_anggota=@$_POST['jk_anggota'];
	$telp_anggota=@$_POST['telp_anggota'];

	$edit=@$_POST['edit'];

	if($edit){
		if($id_anggota=="" && $nama_anggota=="" && $alamat_anggota=="" && $jk_anggota=="" && $telp_anggota==""){
			?><script>alert("Data tidak boleh ada yang kosong");</script><?php
		}else{
			mysqli_query($koneksi,"UPDATE tb_anggota SET id_anggota='$id_anggota',nama_anggota='$nama_anggota',alamat_anggota='$alamat_anggota',jk_anggota='$jk_anggota',telp_anggota='$telp_anggota' WHERE id_anggota='$id_anggota'") or die (mysqli_error());
			?><script>alert("Data berhasil diubah.");window.location.href="?page=anggota";</script><?php
		}
	}


	 ?>