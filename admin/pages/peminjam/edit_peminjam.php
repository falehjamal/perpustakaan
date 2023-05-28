<?php 
include "inc/koneksi.php";

$id=@$_GET['id'];
$query=mysqli_query($koneksi,"SELECT * FROM tb_peminjam WHERE id='$id'") or die (mysqli_error());
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
				<td>ID anggota</td>
				<td>:</td>
				<td><input type="text" name="id_anggota" value="<?php echo $data['id_anggota'];?>"></td>
			</tr>
			<tr>
				<td>Tanggal pinjam</td>
				<td>:</td>
				<td><input type="date" name="tgl_pinjam" value="<?php echo $data['tgl_pinjam'];?>"></td>
			</tr>
			<tr>
				<td>Tanggal jatuh tempo</td>
				<td>:</td>
				<td><input type="date" name="tgl_jatuh_tempo" value="<?php echo $data['tgl_jatuh_tempo'];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="edit" value="Ubah"><input type="reset" name=""><a href="?page=peminjam"><input type="button" name="" value="Batal"></td>
			</tr>
		</table>
	</form>
</fieldset>
<?php 
	$id_buku=@$_POST['id_buku'];
	$id_anggota=@$_POST['id_anggota'];
	$tgl_pinjam=@$_POST['tgl_pinjam'];
	$tgl_jatuh_tempo=@$_POST['tgl_jatuh_tempo'];

	$edit=@$_POST['edit'];

	if($edit){
		if($id_buku=="" && $id_anggota=="" && $tgl_pinjam=="" && $tgl_jatuh_tempo==""){
			?><script>alert("Data tidak boleh ada yang kosong");</script><?php
		}else{
			mysqli_query($koneksi,"UPDATE tb_peminjam SET id_buku='$id_buku',id_anggota='$id_anggota',tgl_pinjam='$tgl_pinjam',tgl_jatuh_tempo='$tgl_jatuh_tempo' WHERE id='$id'") or die (mysqli_error());
			?><script>alert("Data berhasil diubah.");window.location.href="?page=peminjam";</script><?php
		}
	}


	 ?>