<?php
$namafolder="img/"; //tempat menyimpan file
$con=mysql_connect("localhost","root","") or die("Gagal");
mysql_select_db("pet_city")  or die("Gagal");
if (!empty($_FILES["gambar"]["tmp_name"]))
{
	$nama_brg=$_POST['nama_brg'];
	$kategori=$_POST['kategori'];
	$deskripsi=$_POST['deskripsi'];
	$harga=$_POST['harga'];
	$jumlah=$_POST['jumlah'];
	$diskon=$_POST['diskon'];
	$jenis_gambar=$_FILES['gambar']['type'];
	$judul_gambar=$_POST['judul_gambar'];
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
	{			
		$gambar = $namafolder . basename( md5( rand() . time() ) . "." . pathinfo( basename( $_FILES['gambar']['name'] ), PATHINFO_EXTENSION ) );		
		if (move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar)) {
			$sql="insert into barang(kd_brg,nama_brg,kategori,deskripsi,harga,jumlah,diskon,judul_gambar,gambar) values ('','$nama_brg','$kategori','$deskripsi','$harga','$jumlah','$diskon','$judul_gambar','$gambar')";
			$res=mysql_query($sql) or die (mysql_error());
			echo "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
  <span class='sr-only'>Success:</span>Berhasil Menambahkan Barang</div>";
			echo "<p align='center'>Judul Gambar : $judul_gambar</p>";		   
			echo "<p align='center'><img src=\"$gambar\" width=\"200\"/></p>";		   
		} else {
		   echo "<p align='center'><div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
			<span class='sr-only'>Error:</span>Gambar gagal dikirim</div></p>";
		}
   } else {
		echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
			<span class='sr-only'>Error:</span>Jenis gambar yang anda kirim salah. Harus .jpg .gif .png</div>";
   }
} else {
	echo "<p align='center'>Anda belum memilih gambar</p>";
}
?>
        <br/>
        <br>
        <br>
        <div class="container-fluid" style = "width:50%">
		<form method="post" action="#" enctype="multipart/form-data" name="FUpload" id="FUpload" class="form-horizontal container-fluid">
            <div class="form-group">
                <input type="text" name="nama_brg" class="form-control" placeholder="nama_brg" maxlength="16"/>
            </div>
            <div class="form-group">
                <input type="text" name="kategori" class="form-control" placeholder="Kategori" maxlength="20"/>
            </div>
            <div class="form-group">
                <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" maxlength="20"/>
            </div>
            <div class="form-group">
                <input type="text" name="harga" class="form-control" placeholder="harga" maxlength="255"/>
            </div>
            <div class="form-group">
                <input type="text" name="jumlah" class="form-control" placeholder="jumlah" maxlength="255"/>
            </div>
            <div class="form-group">
                <input type="text" name="diskon" class="form-control" placeholder="Diskon" maxlength="255"/>
            </div>
			<div class="form-group">
                <input type="text" name="judul_gambar" class="form-control" placeholder="Judul Gambar" maxlength="255"/>
            </div>
			<div class="form-group">
                <input type="file" name="gambar" class="form-control" placeholder="Judul Gambar" maxlength="255" style="padding-bottom:1%;"/>
            </div>
            
            <div class="form-group">
                <input type="submit" name="btnSimpan" id="btnSimpan" class="btn btn-warning form-control" value="Save" />
            </div>
        </form>
       </div>