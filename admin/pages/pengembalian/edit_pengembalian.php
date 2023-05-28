<?php 
include "inc/koneksi.php";

$id=@$_GET['id'];
$query=mysqli_query($koneksi,"SELECT * FROM tb_pengembalian WHERE id='$id'") or die (mysqli_error());
$data=mysqli_fetch_array($query);

 ?>
<fieldset>
	<legend>Ubah Data</legend>
	<form method="post" action="">
		<table>
			<tr>
				<td>ID_peminjam</td>
				<td>:</td>
				<td><input type="number" name="id_peminjam" value="<?php echo $data['id_peminjam'];?>" disabled></td>
			</tr>
			<tr>
				<td>Tanggal kembali</td>
				<td>:</td>
				<td><input type="date" name="tgl_kembali" value="<?php echo $data['tgl_kembali'];?>"></td>
			</tr>
			<tr>
				<td>Denda</td>
				<td>:</td>
				<td><input type="number" name="denda" value="<?php echo $data['denda'];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="edit" value="Ubah"><input type="reset" name=""><a href="?page=pengembalian"><input type="button" name="" value="Batal"></td>
			</tr>
		</table>
	</form>
</fieldset>
<?php 
	$id_peminjam=@$_POST['id_peminjam'];
	$tgl_kembali=@$_POST['tgl_kembali'];
	$denda=@$_POST['denda'];

	$edit=@$_POST['edit'];

	if($edit){
		if($id_peminjam=="" && $tgl_kembali=="" && $denda==""){
			?><script>alert("Data tidak boleh ada yang kosong");</script><?php
		}else{
			mysqli_query($koneksi,"UPDATE tb_pengembalian SET id_peminjam='$id_peminjam',tgl_kembali='$tgl_kembali',denda='$denda' WHERE id='$id'") or die (mysqli_error());
			?><script>alert("Data berhasil diubah.");window.location.href="?page=pengembalian";</script><?php
		}
	}


	 ?>