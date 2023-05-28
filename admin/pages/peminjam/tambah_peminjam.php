	<?php 
include"inc/koneksi.php";
$query = mysqli_query($koneksi,"SELECT * FROM tb_buku"); 
$querya = mysqli_query($koneksi,"SELECT * FROM tb_anggota");

 ?>
  <fieldset>
	<legend>Tambah Data</legend>
	<form action="" method="post">
		<table>
			<tr>
				<td>Nama buku</td>
				<td>:</td>
				<td><select name="buku">
				<?php while ($data=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
					# code...
?>
					<option value="<?php echo $data['id_buku']; ?>"><?php echo $data['judul']; ?></option>
<?php									} ?>
				</select></td>
			</tr>
			<tr>
				<td>ID anggota</td>
				<td>:</td>
				<td>
					<select name="id_anggota">
						<?php 
							while ($dataa = mysqli_fetch_array($querya)) {
								?>
									<option value="<?php echo $dataa['id_anggota']; ?>"><?php echo $dataa['nama_anggota']; ?></option>
								<?php
							}
						 ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tanggal pinjam</td>
				<td>:</td>
				<td><input type="date" name="tgl_pinjam" required></td>
			</tr>
			<tr>
				<td>TGL jatuh tempo</td>
				<td>:</td>
				<td><input type="date" name="tgl_jatuh_tempo" required></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah"><input type="reset" name="" value="hapus"><a href="?page=peminjam"><input type="button" name="" value="Batal"></a></td>
			</tr>
		</table>
	</form>

<?php 
	$id=@$_POST['id'];
	$id_buku=@$_POST['buku'];
	$id_anggota=@$_POST['id_anggota'];
	$tgl_pinjam=@$_POST['tgl_pinjam'];
	$tgl_jatuh_tempo=@$_POST['tgl_jatuh_tempo'];
	$tambah=@$_POST['tambah'];

	if($tambah){
		if($id_buku=="" || $id_anggota=="" || $tgl_pinjam=="" || $tgl_jatuh_tempo==""){
			?><script>alert("Data tidak boleh ada yang kosong");</script><?php
		}else{
			mysqli_query($koneksi,"INSERT INTO tb_peminjam VALUES('$id','$id_buku','$id_anggota','$tgl_pinjam','$tgl_jatuh_tempo')") or die (mysqli_error());
			?><script>alert("Data berhasil ditambahkan.");window.location.href="?page=peminjam";</script><?php
		}
	}

 ?>


</fieldset>