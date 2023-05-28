<!script style>
<style type="text/css">
@keyframes cox{
  from {right:-700px;}
  to {right:0px;}
}
@keyframes box{
  from {left:-700px;}
  to {left:0px;}
}
  .ff{
  animation: box 2s;
  animation-duration: 2s;
  position: relative;
  padding-right:6px;
  padding-left:6px;
  padding: 10px;
  color: black;
  height: 20px;
  border-radius: 5px;
  font-family: FZChaoCuHei-M10;
  width: 160px;
  background: blue;
}
  .ff:hover{
  color:black;
  background:dodgerblue;
}
  .v{
  padding-left: 5px;
  padding-right: 5px;
  background:green;
  text-align:center;
  animation: cox 2s;
  animation-duration: 2s;
  position: relative;
  font-family: FZChaoCuHei-M10;
  background-color: green;
  margin-right: 10px;
  border: solid 1px green;
  border-radius: 3px;
}
  .v:hover{
  background-color: lime;
  border-color: lime;
}
  .v1{
  padding-left:5px;
  padding-right: 5px; 
  background: red;
  animation: cox 2s;
  animation-duration:2s;
  position: relative;
  font-family: FZChaoCuHei-M10;
  border: solid 1px red;
  border-radius: 3px;
}
  .v1:hover{
  background-color: orange;
  border-color: orange;
} 
</style>

<h3>Data Tentang keanggotaan</h3>
  <hr>
<div class="ff">
  <b>
<a href="index.php?page=profil&aksi2=tambah">(+)Tambah Data</a>
  <b>
</div>
  <br>
  <br>
<table border="2">
<thead>
  <tr style="height:2em;">
    <th style="width: 10px;">no.</th>
    <th style="width: 260px;">id user</th>
    <th style="width: 300px;">nama lengkap</th>
    <th style="width: 30px  ;">username</th>
    <th style="width: 120px;">password</th>
    <th style="width: 120px;">foto<br>profil</th>
    <th>aksi</th>
  </tr>
</thead>
<tbody>
  <?php
  //menampilkan semua data dalam tabel
  $no = 1 ;
  $query = mysqli_query($koneksi,"SELECT * FROM tb_login");
  while ($data = mysqli_fetch_array($query)){
    ?> 

     <tr style="height:2em;">
      <td align="center"><?php echo $no ?></td>
      <td><left style="margin-left: 10px; font-family: arial;">
            <?php echo $data['id_user']; ?></td>
      <td align="center">
            <?php echo $data['nama_lengkap']; ?></td>
      <td><left style="margin-left: 10px; font-family: arial;">
            <?php echo $data['username']; ?></td>
      <td align="center">
            <?php echo $data['password']; ?></td>
      <td align="center"><img src="img/<?php echo $data['foto'];?>" style="width:80px; height: 80px;border-radius:50px;" /></td>
      <td align="center" style="padding-top:5px; padding-bottom: 5px; ">
        <a class="v" href="index.php?page=profil&aksi2=edit&id=<?php echo $data[0]; ?>">Edit</a><hr>
        <a class="v1" href="javascript:id(<?php echo $data[0]; ?>)">Hapus</a>
      </td>
    </tr>
    <?php
    $no++;
  }
  ?>
  <script type="text/javascript">
  function id(id)
  {
      if(confirm('apakah anda ingin menghapus data?'))
      {
        window.location.href='index.php?page=profil&aksi2=hapus&id='+id;
      }
  }
  </script>

  </tbody>
</table>
