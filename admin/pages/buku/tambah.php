<?php 
include"inc/koneksi.php";
$query=mysqli_query($koneksi,"SELECT * FROM tb_kategori");
 ?>
  <fieldset>
	<legend>Tambah Data</legend>
	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Judul</td>
				<td>:</td>
				<td><input type="" name="judul" required></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>:</td>
				<td>
					<select name="kategori">
					<?php while($data=mysqli_fetch_array($query)){  ?>
						<option value="<?php echo $data['id_kategori']; ?>"><?php echo $data['nama_kategori']; ?></option>
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>:</td>
				<td><input type="textarea" name="deskripsi" required></td>
			</tr>
			<tr>
				<td>Jumlah Cover</td>
				<td>:</td>
				<td><input type="number" name="jumlah_cover" required></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah"><input type="reset" name="" value="hapus"><a href="?page=data"><input type="button" name="" value="Batal"></a></td>
			</tr>
		</table>
	</form>

<?php 

	$id_buku=@$_POST['id_buku'];
	$judul=@$_POST['judul'];
	$kategori=@$_POST['kategori'];
	$deskripsi=@$_POST['deskripsi'];
	$jumlah_cover=@$_POST['jumlah_cover'];

	$sumber = @$_FILES['gambar']['tmp_name'];
	$target = 'img/';
	$nama_gambar = @$_FILES['gambar']['name'];

	$tambah=@$_POST['tambah'];

	if($tambah){
		if($judul=="" || $kategori=="" || $deskripsi=="" || $jumlah_cover=="" || $nama_gambar=""){
			?><script>alert("Data tidak boleh ada yang kosong");</script><?php
		}else{
			mysqli_query($koneksi,"INSERT INTO tb_buku VALUES('$id_buku','$judul','$kategori','$deskripsi','$jumlah_cover')") or die (mysqli_error());
			?><script>alert("Data berhasil ditambahkan.");window.location.href="?page=data";</script><?php
		}
	}

 ?>


</fieldset>