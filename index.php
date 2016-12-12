<?php
	session_start();
    mysql_connect( "localhost", "root", "" );
    mysql_select_db( "pet_city" ) or die ( "<script>alert('Database tidak di temukan');</script>" );
	
	//----------------------------------------FORMAT UANG--------------------------------------------
	
    class format {
        function uang( $uang ) {            
            $angka = $uang;
            $hasil = "";
            $panjang = strlen( $angka );
            while( $panjang > 3 ) {
                $hasil = "." . substr( $angka, -3 ) . $hasil;
                $sisa = strlen( $angka ) - 3;
                $angka = substr( $angka, 0, $sisa );
                $panjang = strlen( $angka );
            }
            $hasil = "Rp. " . $angka . $hasil . ",00"; 
            return $hasil;
        }
    }
    $format = new format();
    if( !isset( $_SESSION['login'] ) ) {
        $_SESSION['login'] = false;
    }
    if( !isset( $_GET['pg'] ) ) {
        $page = "home";
    }
    else {
        $page = $_GET['pg'];
    }
	
	//------------------------------------------END---------------------------------------------------------
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Selamat Datang di Pet City</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand topnav" href="index.php?pg=home"><h1>Pet City<h1></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <?php 
							
								// --------------------------MENU AWAL-------------------------
								
                                if( !$_SESSION['login'] ) { 
                                    echo "<br>";   
									echo "<li><a href='index.php?pg=kenari'>Kenari</a></li>";
									echo "<li><a href='index.php?pg=login'>Login</a></li>";  
									echo "<li><a href='index.php?pg=daftar'>Daftar</a></li>";	 	                  
								}
								else if( $_SESSION['level'] == "admin") { 


                                    echo "<br />";  
                                    echo "<div class='col-lg-6'>";
                                    echo "<div class='dropdown'>";
                                    echo "<button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
                                        Barang
                                        <span class='caret'></span>
                                      </button>";
                                      echo "<ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>";
                                        echo "<li><a href='index.php?pg=tambahBarang'>Tambah Barang</a></li>";
                                        echo "<li><a href='index.php?pg=kenari'>View</a></li>";
                                        echo "<li><a href='index.php?pg=tabelBarang'>Tabel</a></li>";
                                        echo "<li role='separator' class='divider'></li>";
                                        echo "<li><a href='#'>Pesanan</a></li>";
                                      echo "</ul>"; 
                                    echo "</div>";
                                    echo "</div>";

                                    //----------------------------------------------------
                                    
                                      echo "<button class='btn btn-default dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
                                        Member
                                        <span class='caret'></span>
                                      </button>";
                                      echo "<ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>";
                                        echo "<li><a href='#'>Edit Member</a></li>";
                                        echo "<li><a href='#'>Pemesanan Member</a></li>";
                                        echo "<li role='separator' class='divider'></li>";
                                        echo "<li><a href='#'>Hapus Member</a></li>";
                                        echo "<li><a href='index.php?pg=tabelMember'>View All</a></li>";
                                        echo "<li><a href='index.php?pg=logout'><span class = 'glyphicon glyphicon-log-out'>&nbsp;Logout</span></a></li>";
                                      echo "</ul>";

                                    echo "</div>";
                                    echo "</div>";
                                }

								 
                			?>

                            
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                <?php
					if ( $page == "home"){
						include "pages/home.php";
                    }
                    else if ( $page == "login"){
                        include "pages/login.php";
                    }
                    else if ( $page == "daftar"){
                        include "pages/daftar.php";
                    }
                    else if ( $page == "kenari"){
                        include "pages/kenari.php";
                    }
                    else if ( $page == "tambahBarang"){
                        include "pages/pagesAdmin/tambahBarang.php";
                    }
                    else if ( $page == "pesananBarang"){
                        include "pages/pagesAdmin/pesanan.php";
                    }
                    else if ( $page == "perbaruiBarang"){
                        include "pages/pagesAdmin/perbaruiBarang.php";
                    }
                    else if ( $page == "tabelBarang"){
                        include "pages/pagesAdmin/tabelBarang.php";
                    }
                    else if ( $page == "hapusBarang"){
                        include "pages/pagesAdmin/hapusBarang.php";
                    }
                    else if ( $page == "editMember"){
                        include "pages/pagesAdmin/editMember.php";
                    }
                    else if ( $page == "pemesananMember"){
                        include "pages/pagesUser/pemesananMember.php";
                    }
                    else if ( $page == "hapusMember"){
                        include "pages/pagesUser/hapusMember.php";
                    }
                    else if ( $page == "tabelMember"){
                        include "pages/pagesAdmin/tabelMember.php";
                    }
                    else if ( $page == "detail"){
                        include "pages/detail.php";
                    }
				?>


				
				
                    
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->
<!--
	<a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Death to the Stock Photo:<br>Special Thanks</h2>
                    <p class="lead">A special thanks to <a target="_blank" href="http://join.deathtothestockphoto.com/">Death to the Stock Photo</a> for providing the photographs that you see in this template. Visit their website to become a member.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/ipad.png" alt="">
                </div>
            </div>

        </div>-->
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

<!--    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">3D Device Mockups<br>by PSDCovers</h2>
                    <p class="lead">Turn your 2D designs into high quality, 3D product shots in seconds using free Photoshop actions by <a target="_blank" href="http://www.psdcovers.com/">PSDCovers</a>! Visit their website to download some of their awesome, free photoshop actions!</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="img/dog.png" alt="">
                </div>
            </div>

        </div>-->
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

   <!-- <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Google Web Fonts and<br>Font Awesome Icons</h2>
                    <p class="lead">This template features the 'Lato' font, part of the <a target="_blank" href="http://www.google.com/fonts">Google Web Font library</a>, as well as <a target="_blank" href="http://fontawesome.io">icons from Font Awesome</a>.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/phones.png" alt="">
                </div>
            </div>

        </div>-->
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

        <div class="container"><!--

            <div class="row">
                <div class="col-lg-6">
                    <h2>Klik for View :</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="#" class="btn btn-default btn-lg"></i> <span class="network-name">Kenari</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"></i> <span class="network-name">K'Food</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"></i> <span class="network-name">K' Property</span></a>
                            </li>
                        </ul>
                </div>
            </div>

        </div>-->
        <!-- /.container -->

    </div>
    <!-- /.banner -->
    <?php
                                if ( $_SESSION['login']){
                                    if ( $page == "logout") {
                                        session_destroy();
                                            echo "<script>alert('Logout Sukses '); document.location = 'index.php?pg=home'; </script>";
                                    }
                                }

                            ?>


    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>

