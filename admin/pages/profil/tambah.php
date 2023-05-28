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
  margin-top:8px;
  margin-left:0px;
  border:unset;
  color: black;
  padding:12px ;
  width:350px;
  height: 11px; 
}
  .a:hover{
  border: unset;
  box-shadow: 5px -5px 5px 0px dodgerblue;
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
  background: blue;
  font-family: FZChaoCuHei-M10;
  margin-left: 4px;
  margin-right: 4px;
  margin-bottom: 9px;
  padding-left: 2px;
  font-size: 17px;
  font-style: italic ;
}
  .su:hover{
  background: dodgerblue;
  color: white;
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
  .g{
  margin-top: 10px;
  width: 20px;
  margin-left:30px;
  height: 20px;
}
</style>

<h3>Tambah Data</h3>
<form method="post" enctype="multipart/form-data">
<table>
    <tr>
<tbody>
    <tr>
      <td style="font-size: 24px;" align="center">isikan data Anggota:</td>
      <td>
      <input class="a" type="text" name="anggota_nama" placeholder="nama" required="">
    <br>
      <input class="a" type="text" name="anggota_alamat" placeholder="alamat" required="">
    <br>
      <input class="g" type="radio" name="anggota_jk" value="PR"/>perempuan
      <input class="g" type="radio" name="anggota_jk" value="LK"/>laki-laki
    <br>
      <input class="a" type="number" name="anggota_telp" placeholder="nomor telephon" required="">
    <br>
    <input type="file" name="foto" required=""><l style="font-style: italic; font-size: 20px;"> :image file</l>
      </td>
    </tr>
    <tr>
      <td>
      <input class="su" type="submit" name="tambah" value="tambah data">
      <input class="mblo" type="reset" name="nama" value="hapus">
<a href="index.php?page=anggota">
      <input class="mblo" type="button" name="name1" value="batal">
</a>   
      </td>
    </tr>
</tbody>
    </tr>
</table>
</form>
               
    <?php
//ini adalah fungsinya 
if (@$_POST['tambah'])
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
  <script type="text/javascript">
            alert("ada yang belum kamu isi");
            </script>
    <?php
}

else{
      $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
      if($pindah) {
        mysqli_query($koneksi,"insert into tb_anggota values('','$aku','$aku1','$aku2','$aku3','$nama_gambar') ") or die(mysql_error());
        ?>
        <script type="text/javascript">
        alert("anggota baru telah berhasil ditambahkan");
        window.location.href="index.php?page=anggota";
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
?>
  

<?php
 }
?>
    </form>

    </body>
</html>