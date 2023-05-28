<?php 
include "inc/koneksi.php";

$id_kategori=@$_GET['id_kategori'];
$query=mysqli_query($koneksi,"SELECT * FROM tb_kategori WHERE id_kategori='$id_kategori'") or die (mysql_error());
$data=mysqli_fetch_array($query);

 ?>
<fieldset>
	<legend>Ubah Data</legend>
	<form method="post" action="">
		<table>
			<tr>
				<td>Nama_kategori</td>
				<td>:</td>
				<td><input type="" name="nama_kategori" value="<?php echo $data['nama_kategori'];?>"></td>
			</tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="edit" value="Ubah"><input type="reset" name=""><a href="?page=kategori"><input type="button" name="" value="Batal"></td>
			</tr>
		</table>
	</form>
</fieldset>
<?php 
	$nama_kategori=@$_POST['nama_kategori'];

	$edit=@$_POST['edit'];

	if($edit){
		if($nama_kategori == ""){
			?><script>alert("Data tidak boleh ada yang kosong");</script><?php
		}else{
			mysqli_query($koneksi,"UPDATE tb_kategori SET id_kategori='$id_kategori',nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'") or die (mysql_error());
			?><script>alert("Data berhasil diubah.");window.location.href="?page=kategori";</script><?php
		}
	}


	 ?>