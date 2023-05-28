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
			margin-bottom: -100px;
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
	<a href="?page=peminjam&action=tambah_peminjam"><button style="width:90px;">(+) Tambah</button></a>

	<form action="" method="post">
		<input required type="text"  placeholder="cari ID buku..." name="inputan">
		<input type="submit" name="cari" value="cari">
	</form>

	<br><br>
	<table style="border-collapse:collapse;text-align:center;" border="1">
		<tr>
			<th>No.</th>
			<th>ID buku</th>
			<th>ID angggota</th>
			<th>Tanggal pinjam</th>
			<th>Tgl jatuh tempo</th>
			<th>Pilihan</th>
		</tr>
		<?php 
		include "inc/koneksi.php";

		$inputan=@$_POST["inputan"];
        $cari=@$_POST["cari"];

        if($cari){
        	if($inputan==""){
        		$query=mysqli_query($koneksi,"SELECT * FROM tb_peminjam")or die (mysqli_error());
        	}else if($inputan !="") {
        		$query=mysqli_query($koneksi,"SELECT * FROM tb_peminjam WHERE id_buku LIKE '%$inputan%'")or die (mysqli_error());
        	}
        }
        else{
        	$query=mysqli_query($koneksi,"SELECT * FROM tb_peminjam")or die (mysqli_error());
        }


		$no=1;
		while($data=mysqli_fetch_array($query)){

		 ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['id_buku']; ?></td>
				<td><?php echo $data['id_anggota']; ?></td>
				<td><?php echo $data['tgl_pinjam']; ?></td>
				<td><?php echo $data['tgl_jatuh_tempo']; ?></td>
				<td>
					<a href="?page=peminjam&action=edit_peminjam&id=<?php echo $data['id'];?>"><button>Ubah</button></a>
					<a onclick="return confirm('Yakin ingin menghapus?')" href="?page=peminjam&action=delete_peminjam&id=<?php echo $data['id'];?>">
					<button style="background-color:darkred;">Hapus</button></a>
				</td>
			</tr>
		<?php
		}	
		?>
	</table>
</fieldset>
