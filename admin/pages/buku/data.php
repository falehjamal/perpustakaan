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
	<a href="?page=data&action=tambah"><button style="width:90px;">(+) Tambah</button></a>

	<form action="" method="post">
		<input type="text"  placeholder="cari judul..." name="inputan" required>
		<input type="submit" name="cari" value="cari">
	</form>

	<br><br>
	<table style="border-collapse:collapse;text-align:center;" border="1">
		<tr>
			<th>No.</th>
			<th>Judul</th>
			<th>Kategori</th>
			<th>Deskripsi</th>
			<th>Jumlah Cover</th>
			<th>Pilihan</th>
		</tr>
		<?php 
		include "inc/koneksi.php";

		$inputan=@$_POST["inputan"];
        $cari=@$_POST["cari"];

        if($cari){
        	if($inputan==""){
        		$query=mysqli_query($koneksi,"SELECT * FROM tb_buku")or die (mysqli_error());
        	}else if($inputan !="") {
        		$query=mysqli_query($koneksi,"SELECT * FROM tb_buku WHERE judul LIKE '%$inputan%'")or die (mysqli_error());
        	}
        }
        else{
        	$query=mysqli_query($koneksi,"SELECT * FROM tb_buku")or die (mysqli_error());
        }


		$no=1;
		while($data=mysqli_fetch_array($query)){

		 ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['judul']; ?></td>
				<td><?php echo $data['kategori']; ?></td>
				<td><?php echo strtolower(substr($data['deskripsi'], 0,20))."..."; ?></td>
				<td><?php echo $data['jumlah_cover']; ?></td>
				<td>
					<a href="?page=data&action=edit&id_buku=<?php echo $data['id_buku'];?>"><button>Ubah</button></a>
					<a onclick="return confirm('Yakin ingin menghapus?')" href="?page=data&action=delete&id_buku=<?php echo $data['id_buku'];?>">
					<button style="background-color:darkred;">Hapus</button></a>
				</td>
			</tr>
		<?php
		}	
		?>
	</table>
</fieldset>
