<?php 
include "inc/koneksi.php";

$id_buku=@$_GET['id_buku'];
$query=mysqli_query($koneksi,"SELECT * FROM tb_buku WHERE id_buku='$id_buku'") or die (mysqli_error());
$data=mysqli_fetch_array($query);

 ?>
<fieldset>
	<legend>Ubah Data</legend>
	<form method="post" action="">
		<table>
			<tr>
				<td>ID_Buku</td>
				<td>:</td>
				<td><input type="number" name="id_buku" value="<?php echo $data['id_buku'];?>" disabled></td>
			</tr>
			<tr>
				<td>Judul</td>
				<td>:</td>
				<td><input type="text" name="judul" value="<?php echo $data['judul'];?>"></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>:</td>
				<td><input type="text" name="kategori" value="<?php echo $data['kategori'];?>"></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>:</td>
				<td><input type="textarea" name="deskripsi" value="<?php echo $data['deskripsi'];?>"></td>
			</tr>
			<tr>
				<td>Jumlah Cover</td>
				<td>:</td>
				<td><input type="number" name="jumlah_cover" value="<?php echo $data['jumlah_cover'];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="edit" value="Ubah"><input type="reset" name=""><a href="?page=data"><input type="button" name="" value="Batal"></td>
			</tr>
		</table>
	</form>
</fieldset>
<?php 
	$judul=@$_POST['judul'];
	$kategori=@$_POST['kategori'];
	$deskripsi=@$_POST['deskripsi'];
	$jumlah_cover=@$_POST['jumlah_cover'];

	$edit=@$_POST['edit'];

	if($edit){
		if($id_buku=="" && $judul=="" && $kategori=="" && $deskripsi=="" && $jumlah_cover==""){
			?><script>alert("Data tidak boleh ada yang kosong");</script><?php
		}else{
			mysqli_query($koneksi,"UPDATE tb_buku SET id_buku='$id_buku',judul='$judul',kategori='$kategori',deskripsi='$deskripsi',jumlah_cover='$jumlah_cover' WHERE id_buku='$id_buku'") or die (mysqli_error());
			?><script>alert("Data berhasil diubah.");window.location.href="?page=data";</script><?php
		}
	}


	 ?>