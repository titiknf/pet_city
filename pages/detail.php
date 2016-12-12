<?php
	mysql_connect( "localhost", "root", "" );
   	mysql_select_db( "pet_city" ) or die ( "<script>alert('Database tidak di temukan');</script>" );
			
	$getkd_brg=$_GET["kd_brg"];
			$sqlTampil="SELECT * FROM barang where kd_brg='$getkd_brg'";
			$qryTampil=mysql_query ($sqlTampil);
			$data=mysql_fetch_array ($qryTampil);
?>
<br>
<br>
<div class="container-fluid">
				<div class="panel panel-success">
					<div class="panel-heading">
							<tr><h4>Detail Produk</h4>
							<td><a href="" class="btn btn-primary btn-lg btn-block btn-success disabled" role="button">Buy</a></td>
							<td><a href="index.php?pg=kenari" class="btn btn-primary btn-lg btn-block btn-success">Kembali</a></td>

							
					</div>
				<div class="panel-body">
				<font color = "black">
 					<table width="686" height="318"  align="center" class="table table-condensed">
							<tr>
								<td  rowspan="6" width="285"><img src="<?php echo $data['gambar']; ?>" alt="" width="100%" class="img-responsive" /></td>
								<td width="72">Kode Barang	</td>
								<td width="59" >:</td>
								<td width="235" ><?php echo $data['kd_brg']; ?></td>
							</tr>
								<tr>
									<td>Kategori	</td><td>:</td><td><?php echo $data['kategori']; ?></td>
								</tr>
								<tr>
									<td>Deskripsi	</td><td>:</td><td><?php echo $data['deskripsi']; ?></td>
								</tr>
								<tr>
									<td>jumlah	</td><td>:</td><td><?php echo $data['jumlah']; ?></td>
								</tr>
								<tr>
									<td>Harga	</td><td>:</td><td><?php echo $format -> uang( $data['harga'] ); ?></td></tr>	
								</tr>
								<tr>
									<td>Diskon	</td><td>:</td><td><?php echo $data['diskon']; ?></td>
								</tr>
							</table>

							
			</font>
		</div>