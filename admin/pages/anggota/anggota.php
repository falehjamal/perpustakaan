<head>
	<style type="text/css">
		button{
			border-radius: 5px;
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
			margin-bottom: 10px;
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
	<legend>Daftar Anggota</legend>
	<a href="?page=anggota&action=tambah_anggota"><button style="width:90px;">(+) Tambah</button></a><br><br>
	<table style="border-collapse:collapse;text-align:center;" border="1">
	<form method="post">
		<input type="text" name="inputan" placeholder="cari nama..." required>
		<input type="submit" name="cari" value="search">
	</form>
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>jenis kelamin</th>
			<th>Telp</th>
			<th>Pilihan</th>
		</tr>
		<?php 
		include "inc/koneksi.php";
		$no=1;


		$inputan=@$_POST["inputan"];
        $cari=@$_POST["cari"];

        if($cari){
        	if($inputan==""){
        		$query=mysqli_query($koneksi,"SELECT * FROM tb_anggota")or die (mysqli_error());
        	}else if($inputan !="") {
        		$query=mysqli_query($koneksi,"SELECT * FROM tb_anggota WHERE nama_anggota LIKE '%$inputan%'")or die (mysqli_error());
        	}
        }
        else{
        	$query=mysqli_query($koneksi,"SELECT * FROM tb_anggota")or die (mysqli_error());
        }

		while($data=mysqli_fetch_array($query)){

		 ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['nama_anggota']; ?></td>
				<td><?php echo $data['alamat_anggota']; ?></td>
				<td><?php echo $data['jk_anggota']; ?></td>
				<td><?php echo $data['telp_anggota']; ?></td>
				<td>
					<a href="?page=anggota&action=edit_anggota&id_anggota=<?php echo $data['id_anggota'];?>"><button>Ubah</button></a>
					<a onclick="return confirm('Yakin ingin menghapus?')" href="?page=anggota&action=delete_anggota&id_anggota=<?php echo $data['id_anggota'];?>">
					<button style="background-color:darkred;">Hapus</button></a>
				</td>
			</tr>
		<?php
		}	
		?>
	</table>
</fieldset>
