<?php
		$kd_brg = $_GET['kd_brg'];
		mysql_query("DELETE FROM barang WHERE kd_brg='$kd_brg'") or die ("gagal");
		header("location:index.php?pg=tabelBarang");
?>