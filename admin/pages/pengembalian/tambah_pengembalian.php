
  <?php 
  $query =mysqli_query($koneksi,"SELECT * FROM tb_peminjam");
   ?>
  <fieldset>
	<legend>Tambah Data</legend>
	<form action="" method="post">
		<table>
			<tr>
				<td>Peminjam</td>
				<td>:</td>
				<td>
					<select name="id_peminjam">
					<?php while ($data=mysqli_fetch_array($query)) {	
					?>
						<option value="<?php echo $data['id']; ?>">
							<?php echo $data['id']; ?>
						</option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tanggal kembali</td>
				<td>:</td>
				<td><input type="date" name="tgl_kembali" required></td>
			</tr>
			<tr>
				<td>Denda</td>
				<td>:</td>
				<td><input type="number" name="denda" required></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah"><input type="reset" name="" value="hapus"><a href="?page=pengembalian"><input type="button" name="" value="Batal"></a></td>
			</tr>
		</table>
	</form>

<?php 
include"inc/koneksi.php";
	
	$id=@$_POST['id'];
	$id_peminjam=@$_POST['id_peminjam'];
	$tgl_kembali=@$_POST['tgl_kembali'];
	$denda=@$_POST['denda'];

	$tambah=@$_POST['tambah'];

	if($tambah){
		if($id_peminjam=="" || $tgl_kembali=="" || $denda==""){
			?><script>alert("Data tidak boleh ada yang kosong");</script><?php
		}else{
			mysqli_query($koneksi,"INSERT INTO tb_pengembalian VALUES('$id','$id_peminjam','$tgl_kembali','$denda')") or die (mysqli_error());
			?><script>alert("Data berhasil ditambahkan.");window.location.href="?page=pengembalian";</script><?php
		}
	}

 ?>


</fieldset>