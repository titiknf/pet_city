
<br/>
<br/>
<br/>
<?php
$tampil=mysql_query("select * from barang");
?>


<br>
<br><center>
  <table class="table">
    <tr class="block">
    <td>kode</td>
    <td>Nama barang</td>
    <td>kategori</td>
    <td>deskripsi</td>
    <td>harga</td>
    <td>jumlah</td>
    <td>diskon</td>
    <td>judul gambar</td>
    <td>gambar</td>
    <td>action</td>
  </tr>
  <?php
  while ($hasil=mysql_fetch_array($tampil)){?>
  <tr>
    <td><?php print"$hasil[kd_brg]"?></td>
    <td><?php print"$hasil[nama_brg]"?></td>
    <td><?php print"$hasil[kategori]"?></td>
    <td><?php print"$hasil[deskripsi]"?></td>
    <td><?php print"$hasil[harga]"?></td>
    <td><?php print"$hasil[jumlah]"?></td>
    <td><?php print"$hasil[diskon]"?></td>
    <td><?php print"$hasil[judul_gambar]" ?></td>
    <td><?php print"$hasil[gambar]" ?></td>

    <td><a href="index.php?pg=editBarang&kd_brg=<?php echo $hasil['kd_brg']; ?>"class="btn btn-primary btn-xs btn-success" >Edit</a></button>
        <a href="index.php?pg=hapusBarang&kd_brg=<?php echo $hasil['kd_brg']; ?>" class="btn btn-primary btn-xs btn-danger">Hapus</a></button>

  </tr>
  <?php } ?>

</table></center>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>