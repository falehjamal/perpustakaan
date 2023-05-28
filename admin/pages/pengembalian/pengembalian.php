<head>
	<style type="text/css">
		@media (min-width: 100px) and (max-width: 600px){
			fieldset{
				width: 100%;		
			}
		}
		button{
			border-radius: 4px;
			border: none;
			margin:1;
			width: 50px;
			color: #fff;
			height: 30px;
			background-color: darkcyan;

		}
		button:hover{
			cursor: pointer;
			background-color: #005f5f;
		}
		table tr th{
			background-color: #888;
			color: white;
			border: 100px;
		}
		table{
			width: 100%;
		}
		tr,td,th{
			padding: 5px;
		}
		input{
			margin-left: 10px;
			border-radius: 6px;
			padding: 10px;
			border: 3px solid #ccc;
			margin-top: 10px;
			transition: all 1s ease-in-out;
		}
		input[type=submit]{
			background: #aaa;
			color: #fff;
			border: none;
		}

	</style>
</head>
<fieldset>
	<legend>Daftar Buku</legend>
	<a href="?page=pengembalian&action=tambah_pengembalian"><button style="width:90px;">(+) Tambah</button></a>

	<form action="" method="post">
		<input required type="text"  placeholder="cari ID peminjam..." name="inputan">
		<input type="submit" name="cari" value="cari">
	</form>

	<br><br>
	<table style="border-collapse:collapse;text-align:center;" border="1">
		<tr>
			<th>No.</th>
			<th>ID peminjam</th>
			<th>Tanggal kembali</th>
			<th>Denda</th>
			<th>Pilihan</th>
		</tr>
		<?php 
		include "inc/koneksi.php";

		$inputan=@$_POST["inputan"];
        $cari=@$_POST["cari"];

        if($cari){
        	if($inputan==""){
        		$query=mysqli_query($koneksi,"SELECT * FROM tb_pengembalian")or die (mysqlii_error());
        	}else if($inputan !="") {
        		$query=mysqli_query($koneksi,"SELECT * FROM tb_pengembalian WHERE id_peminjam LIKE '%$inputan%'")or die (mysqli_error());
        	}
        }
        else{
        	$query=mysqli_query($koneksi,"SELECT * FROM tb_pengembalian")or die (mysqli_error());
        }


		$no=1;
		while($data=mysqli_fetch_array($query)){

		 ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['id_peminjam']; ?></td>
				<td><?php echo $data['tgl_kembali']; ?></td>
				<td><?php echo $data['denda']; ?></td>
				<td>
					<a href="?page=pengembalian&action=edit_pengembalian&id=<?php echo $data['id'];?>"><button>Ubah</button></a>
					<a onclick="return confirm('Yakin ingin menghapus?')" href="?page=pengembalian&action=delete_pengembalian&id=<?php echo $data['id'];?>">
					<button style="background-color:darkred;">Hapus</button></a>
				</td>
			</tr>
		<?php
		}	
		?>
	</table>
</fieldset>
