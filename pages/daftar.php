
<?php
   				 if( isset( $_POST['daftar'] ) ) { 
					if( $_POST['txtNama'] == "" 
						OR $_POST['txtPassword'] == "" 
						OR $_POST['txtGender'] == "" 
						OR $_POST['txtEmail'] == "" 
						OR $_POST['txtAlamat'] == "" 
						OR $_POST['txtKodePos'] == "" 
						OR $_POST['txtKota'] == ""
						OR $_POST['txtTelepon'] == ""  

						){
						echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
								<span class='sr-only'>Error:</span>Data ada yang kosong</div>";
				}
				
					else {   
							$nama = $_POST['txtNama'];
							$password = $_POST['txtPassword'];
							$gender = $_POST['txtGender'];
							$email = $_POST['txtEmail'];
							$alamat = $_POST['txtAlamat'];
							$kodepos = $_POST['txtKodePos'];
							$kota = $_POST['txtKota'];
							$telp = $_POST['txtTelepon'];
							$level = "user";  
							
							$query = "insert into member(id,nama,password,gender,email,alamat,kodepos,kota,telp,level) values ('','$nama','$password','$gender','$email','$alamat','$kodepos','$kota','$telp','$level')";
							$simpan_query=mysql_query($query);
							
								if( $simpan_query ) {
									echo "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
 										 	<span class='sr-only'>Success:</span>Berhasil Mendaftar</div>";
								}
									else {
										echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  												<span class='sr-only'>Error:</span>Nama sudah dipakai</div>";            
									}
				}
    		}
			
			//----------------------------------------------------------END--------------------------------------------------------------------
			
		?>
			<br>
			<br>
			<br>
			<div class="col-lg-12 text-center">
                    <h2>Sign-Up</h2>
                    <hr class="star-light">
                </div>
				<center>
				<div class="panel-body" style="width:100%;">
					<form method="post" action="?pg=daftar" class="form-horizontal container-fluid">
						
            			<div class="form-group">
               			 	<input type="text" name="txtNama" class="form-control"  placeholder="Nama" maxlength="26" />
            			</div>

            			<div class="form-group">
               			 	<input type="text" name="txtPassword" class="form-control"  placeholder="Password" maxlength="26" />
            			</div>
						
						<div class="form-group">
							<input type="gender" name="txtGender" class="form-control"  placeholder="gender : P/ L" maxlength="26" />
						</div>
						
						<div class="form-group">
							<input type="email" name="txtEmail" class="form-control" placeholder="email" maxlength="50"/>
						</div>
						
						<div class="form-group">
							<input type="text" name="txtAlamat" class="form-control" placeholder="alamat" maxlength="50"/>
						</div>

						<div class="form-group">
							<input type="text" name="txtKodePos" class="form-control" placeholder="kode pos" maxlength="50"/>
						</div>
						<div class="form-group">
							<input type="text" name="txtKota" class="form-control" placeholder="kota" maxlength="50"/>
						</div>
						<div class="form-group">
							<input type="text" name="txtTelepon" class="form-control" placeholder="telepon" maxlength="50"/>
						</div>
						<div class="form-group">
							<input type="submit" name="daftar" class="btn btn-primary  form-control" value="Daftar" />
						</div>
						
        			</form>
        			<p>&nbsp;</p>
			
			</div>
			</center>