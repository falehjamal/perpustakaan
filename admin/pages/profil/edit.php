<!script style>
<style type="text/css">
h3{
  font-family: FZChaoCuHei-M10;
}
@keyframes go{
  from {left:-200px;}
  to {left:0px;}
}
.cox{
  font-family: FZChaoCuHei-M10;
  animation: go 3s;
  animation-duration: 3s;
  position: relative;
}
  .a{
  font-size: 20px;
  font-style: italic ;
  margin-top:13px;
  margin-left:0px;
  border:unset;
  color: black;
  padding:12px;
  width:350px;
  height: 11px; 
}
.a1{
  font-size: 20px;
  font-style: italic ;
  margin-top:13px;
  margin-left:0px;
  border:unset;
  padding:12px;
  width:350px;
  height: 11px; 
}
  .a:hover{
  border: unset;
  box-shadow: 5px -5px 5px 0px lime;
  color: black;
}
  .mblo{
  padding-right: 2px;
  padding: 5px;
  border: transparent;
  background: white;
  font-family: FZChaoCuHei-M10;
  margin-left: 4px;
  margin-right: 4px;
  margin-bottom: 9px;
  padding-left: 2px;
  font-size: 17px;
  font-style: italic ;
}
  .mblo:hover{
  background: black;
  color: white;
}
  .su{
  padding-right: 2px;
  padding: 5px;
  color: white;
  border: transparent;
  background: green;
  font-family: FZChaoCuHei-M10;
  margin-left: 4px;
  margin-right: 4px;
  margin-bottom: 9px;
  padding-left: 2px;
  font-size: 17px;
  font-style: italic ;
}
  .su:hover{
  background: lime;
  color: white;
}
.g{
  margin-top: 10px;
  width: 20px;
  margin-left:30px;
  height: 20px;
}
</style>


<h3>rubah data anggota</h3>
<form method="post" enctype="multipart/form-data">

    <?php
    //menampilkan data yang sebelumnya ingin dirubah
$id = addslashes(@$_GET['id']);
$query = mysqli_query($koneksi,"SELECT * FROM tb_anggota WHERE anggota_id = '$id'") or die (mysqli_error());
$data = mysqli_fetch_array($query);
    ?> 
          

<table>
  <tr>
<tbody>
  <tr>
  <td style="font-size: 24px;" align="center" > silahkan edit data anggota</td>
  <td>
    <input class="a" type="text" required="" name="anggota_nama" value="<?php echo $data['anggota_nama']; ?>">
  <br>
    <input class="a" type="text" required="" name="anggota_alamat" value="<?php echo $data['anggota_alamat']; ?>">
  <br>
    <input class="a" list="o" type="select" required="" name="anggota_jk" placeholder="pilih dulu" />
    <datalist id="o">
      <option value="LK"></option>
      <option value="PR"></option>
    </datalist>
  <br>
    <input class="a" type="number" required="" name="anggota_telp" value="<?php echo $data['anggota_telp']; ?>">
  <br>
  <input type="file" name="foto" value="<?php echo $data['foto']; ?>"><l style="font-style: italic; font-size: 20px;"> :image file</l>
  </td>
  </tr>
  <tr>
  <td>
    <input class="su" type="submit" name="edit" value="perbaharui data">
<a href="index.php?page=anggota">
    <input class="mblo" type="button" name="name" value="batal">
  </a>
  </td>
  </tr>
</tbody>
  </tr>
</table>
</form>

   

    <?php
//ini adalah fungsinya 
if (@$_POST['edit'])
 {
  //variabel inputan dari input type
  $aku=addslashes(@$_POST['anggota_nama']);
  $aku1=addslashes(@$_POST['anggota_alamat']);
  $aku2=addslashes(@$_POST['anggota_jk']);
  $aku3=addslashes(@$_POST['anggota_telp']);

  $sumber = @$_FILES['foto'] ['tmp_name'];
  $nama_gambar = @$_FILES['foto'] ['name'];
  $target ='img/';
if ($aku == ""||$aku1 == ""||$aku2 == ""||$aku3 == "")
 {

    ?>
  <h4>datanya mana???</h4>
    <?php
 }

else{
      if($nama_gambar == ""){
        mysqli_query($koneksi," UPDATE tb_anggota SET anggota_nama='$aku',anggota_alamat='$aku1', anggota_jk='$aku2', anggota_telp='$aku3' WHERE anggota_id='$id'") or die(mysqli_error());
          ?>
          <script type="text/javascript">
          alert("Data Berhasil Diganti");
          window.location.href="?page=anggota";
          </script>
          <?php
        } else {
          $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
          if($pindah) {
            mysqli_query($koneksi,"UPDATE tb_anggota SET anggota_nama='$aku',anggota_alamat='$aku1', anggota_jk='$aku2', anggota_telp='$aku3', foto='$nama_gambar' WHERE anggota_id='$id'") or die(mysqli_error());
            ?>
            <script type="text/javascript">
            alert("Data Berhasil Diganti ");
            window.location.href="?page=anggota";
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
    ?>
  <!untuk kembali kehalaman tadi>
  <h2 class="cox">data mengenai anggota ini berhasil diperbaharui</h2>
  <meta http-equiv="refresh" content="4; url=index.php?page=anggota">

    <?php
 }

    ?>
</form>
</body>
</html>