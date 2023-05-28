<?php
//ini adalah fungsinya 
include "inc/koneksi.php";
if (@$_POST['edit'])
{
  

  $sumber = @$_FILES['gambar'] ['tmp_name'];
  $nama_gambar = @$_FILES['gambar'] ['name'];
  $target ='img/';

if ($nama_gambar == "")
 {
?><h2>mana </h2><?php
 }

else{
      if($nama_gambar == ""){
        mysqli_query($koneksi,"UPDATE tb_login WHERE id_user = '$sex' ") or die(mysqli_error());
          ?>
          <script type="text/javascript">
          alert("Data Berhasil Diganti");
          </script>
          <?php
        } else {
          $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
          if($pindah) {
            mysqli_query($koneksi,"UPDATE tb_login SET gambar='$nama_gambar' WHERE id_user = '$sex'") or die(mysqli_error());
            ?>
            <script type="text/javascript">
            alert("Data Berhasil Diganti ");
            </script>
            <?php
          } else {
            ?>
            <script type="text/javascript">
            alert("Gambar Gagal Diupload");
            </script>
            <?php 
          }
        }
      }

 }

?>
<style type="text/css">
@keyframes move{
  from {top:-700px;}
  to {top:0px;}
}
.content{
  background: black;
  border:none;
}
table{
  border:none;
  box-shadow: none;
  background:none;
}
.a{
  font-size: 20px;
  font-style: italic ;
  margin-top:19px;
  margin-left:0px;
  color: black;
  border:unset;
  box-shadow: 5px -5px 5px 0px red;
  padding:12px;
  width:350px;
  height: 11px; 
}
.asu{

  background-color: transparent;
  margin:0 auto;
  position: relative;
  animation: move 7s;
  margin-right: 200px;
  margin-left:200px;
  animation-duration: 5s;
  margin-top: 1%;
  width: 140px;
  height: 140px;
}

.su{
  width: auto;
  height: 35px;
  border-radius: 7px;
  border: none;
  color: white;
  background: red;
  font-family: FZChaoCuHei-M10;
  font-size: 20px;
  font-weight: bold;
  font-style: italic;
}
</style>
  <title></title>
<?php
        if (@$_SESSION['admin']) 
{
  $sex = @$_SESSION['admin'];
}
elseif (@$_SESSION['petugas']) 
{
  $sex = @$_SESSION['petugas'];
}
$saru = mysqli_query($koneksi,"SELECT * FROM tb_login WHERE id_user = '$sex'");
$boss = mysqli_fetch_array($saru);     
?>
<center>
<table>
  <tr>
<tbody>
<tr>

  <td style="width: 200px" class="asu" align="center">
  <img src="img/<?php echo $boss['gambar'];?>" style="border:none;width:240px; height: 240px; border-radius:120px; background: url(img/images.jpg);" /><br>
   <form method="post" enctype="multipart/form-data">
   <center>
  <input type="file" name="gambar" value="ganti profile">
  <hr></center>
  <input class="su" type="submit" name="edit" value="ganti profile"></td>
<?php 
include "inc/koneksi.php";

$id_user=@$_GET['id_user'];
$query = mysqli_query($koneksi,"SELECT * FROM tb_login WHERE id_user='$id_user'") or die (mysqli_error());
$data=mysqli_fetch_array($query);
 ?>
  <td></td ><td></td><td>
<l style="font-family: FZChaoCuHei-M10; font-size: 16px; font-style: italic; margin-right: 30px;" >id:</l>
  <br><br><hr>
  <l style="font-family: FZChaoCuHei-M10; font-size: 16px; font-style: italic; margin-right: 30px;" >nama lengkap :</l>
  <br><br><hr>
<l style="font-family: FZChaoCuHei-M10; font-size: 16px; font-style: italic; margin-right: 30px;" >username :</l>
<br><br><hr>
<l style="font-family: FZChaoCuHei-M10; font-size: 16px; font-style: italic; margin-right: 30px;" >password :</l>
<br><br><hr>
<l style="font-family: FZChaoCuHei-M10; font-size: 16px; font-style: italic; margin-right: 30px;" >level :</l><br><br<hr>
  </td>
  <td>
    <input class="a" name="id_user" type="number" value="<?php echo $boss['id_user']; ?>" disabled="">  
    <br>

    <input class="a" name="nama_lengkap" type="text" value="<?php echo $boss['nama_lengkap']; ?>">  
    <br>
  
    <input class="a" name="username" type="text" value="<?php echo $boss['username']; ?>" disabled="">
    <br>
  
    <input class="a" name="password" type="password" value="<?php echo $boss['password']; ?>">
    <br>
    
    <input class="a" name="level" type="text" value="<?php echo $boss['level']; ?>" disabled="">
    <br><br>
    <input type="submit" name="edit" value="Ubah"></td>
  </td>
  </tr>
  
</center>
</tbody>
</tr>
</table>
</form>
</fieldset>

<?php 
  $id_user=@$_POST['id_user'];
  $nama_lengkap=@$_POST['nama_lengkap'];
  $username=@$_POST['username'];
  $password=@$_POST['password'];

  $edit=@$_POST['edit'];

  if($edit){
    if($nama_lengkap=="" && $password==""){
      ?><script>alert("Data tidak boleh ada yang kosong");</script><?php
    }else{
      mysqli_query($koneksi,"UPDATE tb_login SET id_user='$id_user',nama_lengkap='$nama_lengkap',username='$username',password='$password' WHERE id_user='$id_user'") or die (mysqli_error());
      ?><script>alert("Data berhasil diubah.");window.location.href="?page=profil";</script><?php
    }
  }


   ?>