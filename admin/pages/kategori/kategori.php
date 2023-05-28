<?php 
include"inc/koneksi.php";

 ?>
<head>
	<style type="text/css">
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
		tr,th,th{
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
	<legend>Kategori Buku</legend>
	<a href="?page=kategori&action=tambah_kategori"><button style="width:90px;">(+) Tambah</button></a><br><br>
	<table border="1" style="border-collapse:collapse;text-align:center;">
	<form method="post">
		<input type="text" name="inputan" placeholder="cari kategori..." required>
		<input type="submit" name="cari" value="Cari">
	</form>
		<tr>
			<th>No</th>
			<th>Kategori</th>
			<th>Pilihan</th>
		</tr>
		<?php
		$no=1;

		$inputan=@$_POST["inputan"];
        $cari=@$_POST["cari"];

        if($cari){
        	if($inputan==""){
        		$query=mysqli_query($koneksi,"SELECT * FROM tb_kategori")or die (mysqli_error());
        	}else if($inputan !="") {
        		$query=mysqli_query($koneksi,"SELECT * FROM tb_kategori WHERE nama_kategori LIKE '%$inputan%'")or die (mysql_error());
        	}
        }
        else{
        	$query=mysqli_query($koneksi,"SELECT * FROM tb_kategori")or die (mysqli_error());
        }


		while($data=mysqli_fetch_array($query)){

		 ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nama_kategori']; ?></td>
			<td><a href="?page=kategori&action=edit_kategori&id_kategori=<?php echo $data['id_kategori'];?>"><button>Ubah</button></a>
					<a onclick="return confirm('Yakin ingin menghapus?')" href="?page=kategori&action=delete_kategori&id_kategori=<?php echo $data['id_kategori'];?>">
					<button style="background-color:darkred;">Hapus</button></a></td>
		</tr>
		<?php
	}
		?>
	</table>
</fieldset>