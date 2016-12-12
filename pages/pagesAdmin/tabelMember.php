<br/>
<br />

<style>
.tabelMember{
  color: A64D00;
}



</style>
<?php
$tampil=mysql_query("select * from member");
?>
<br>
<br>
<br>
</center><center>
  <table class="table table">
    <tr>
    <td width="35">ID</td>
    <td width="88">Nama</td>
    <td width="124">PASSWORD</td>
    <td width="92">GENDER</td>
    <td width="130">EMAIL</td>
    <td width="108">ALAMAT</td>
    <td width="108">KODE POS</td>
    <td width="108">KOTA</td>
    <td width="108">Telepon</td>
    <td width="108">Action</td>
  </tr>
  <?php
  while ($hasil=mysql_fetch_array($tampil)){?>
  <tr>
    <td><?php print"$hasil[id]"?></td>
    <td><?php print"$hasil[nama]"?></td>
    <td><?php print"$hasil[password]"?></td>
    <td><?php print"$hasil[gender]"?></td>
    <td><?php print"$hasil[email]"?></td>
    <td><?php print"$hasil[alamat]"?></td>
    <td><?php print"$hasil[kodepos]"?></td>
    <td><?php print"$hasil[kota]"?></td>
    <td><?php print"$hasil[telp]" ?></td>

    <td><button type="button" class="btn btn-primary btn-xs btn-success" a href="index.php?pg=editBarang">Edit</a></button>
        <button type="button" class="btn btn-primary btn-xs btn-danger" a href="index.php?pg=hapusBarang">Hapus</button>
  </tr>
  <?php } ?>
</table></center>