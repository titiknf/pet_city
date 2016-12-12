<?php

$tampil=mysql_query("select * from barang");
$kd_brg = $_GET['kd_brg'];
$nama_barang = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$diskon = $_POST['diskon'];
$gambar = $_POST['gambar'];

mysql_query("UPDATE barang SET nama_barang='$nama_barang' where kode_brg='$_POST[kd_brg]'") or die ("Failed.");
header("location:index.php?pg=tabelBarang.php");
?>

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