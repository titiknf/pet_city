
<?php

	if(isset($_POST['login'])){
		$name 			= $_POST['name'];
		$password   	= $_POST['password'];
		$query      	= mysql_query("SELECT id, level FROM member where nama = '$name' AND password='$password'");
		$numb       	= mysql_num_rows($query);

		if ($numb == 1){
			$data 				= mysql_fetch_array($query);
			$_SESSION['login']	= true;
			$_SESSION['usid']	= $data['id'];
			$_SESSION['level']	= $data['level'];

				if( $_SESSION['level'] == "user"){
					echo"<script>alert('Login sukses'); document.location = 'index.php?pg=index';</script>";
				}
				else if ( $_SESSION['level'] == "admin"){
					echo"<script>alert('Login sukses'); document.location = 'index.php?pg=index';</script>";
				}
		}

		else {
			echo "</div class='alert alert-danger' role='alert'>
					<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
					<span class='sr-only'>Error:</span>Username/password</div>";
		}
	}

?>

				<div class="col-lg-17 text-center">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>	
                    <h2>Log- In</h2>
				</div>
					<center>
						<div class="panel-body" style="width:100%;">
							<form method="post" action="?pg=login" class="form-horizontal container-fluidpelanggan">
							  	<div class="form-group has-primary has-feedback">
								  <label class="control-label sr-only" for="inputSuccess5">Hidden label</label>
								  <input type="text" class="form-control" id="inputSuccess5" aria-describedby="inputSuccess5Status" name="name" placeholder="Username">
								  <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
								  <span id="inputSuccess5Status" class="sr-only">(success)</span>
							   	</div>

							   	<div class="form-group has-primary has-feedback">
								  <label class="control-label sr-only" for="inputSuccess5">Hidden label</label>
								  <input type="password" class="form-control" id="inputSuccess5" aria-describedby="inputSuccess5Status" name="password" placeholder="Sandi">
								  <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
								  <span id="inputSuccess5Status" class="sr-only">(success)</span>
							   	</div>
								<div class="form-group">
									<input type="submit" name="login" class="btn btn-primary form-control" value="Login" />
								</div>
								<div class="form-group">
									<a href="index.php?pg=home" input type="submit" name="login" class="btn btn-danger form-control" value="Cancel" />Cancel</a>
								</div>
							</form>
							<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
						
						</div>
				</center>