<style>
.product_box {
    float: left;
    width: 223px;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #FF9840;
    text-align: center;
    position: :padding;
    background-color: #34D1b2;
    color: #A64D00;
    font-family: "Lato","Arial",Arial,Arial,sans-serif;
}

.button {
	color: #A64D00;
}

.product_box .detail {
    float: right;
}

.cleaner { clear: both; width: 100%; height: 0px; font-size: 0px;  }



</style><br><br><br><br>


<?php

define( "TOP_LEVEL_DIR", "." );

if ( isset( $_POST['posted'] ) ) {

  // Get the folder to search for
  $nama_brg = isset( $_POST['nama_brg'] ) ? $_POST['nama_brg'] : "";

  // Search for the folder
  echo "<p>Searching for '$nama_brg' in 'nama_brg" . TOP_LEVEL_DIR . "' ...</p>";
  $matches = array();
  searchFolder( TOP_LEVEL_DIR, $nama_brg, $matches );

  // Display any matches
  if ( $matches ) {
    echo "<h2>The following folders matched your search:</h2>\n<ul>\n";
    foreach ( $matches as $match ) echo ( "<li>$match</li>" );
    echo "</ul>\n";
  } else {
    echo "<p>No matches found.</p>";
  }
}

/**
* Recursively searches a directory for a subdirectory
*
* @param string The path to the directory to search
* @param string The subdirectory name to search for
* @param stringref The current list of matches
*/

function searchFolder( $current_folder, $folder_to_find, &$matches )
{
  if ( !( $handle = opendir( $current_folder ) ) ) die( "Cannot open $current_folder." );

  while ( $entry = readdir( $handle ) ) {
    if ( is_dir( "$current_folder/$entry" ) ) {
      if ( $entry != "." && $entry != ".." ) {

        // This entry is a valid folder
        // If it matches our folder name, add it to the list of matches
        if ( $entry == $folder_to_find ) $matches[] = "$current_folder/$entry";

        // Search this folder
        searchFolder( "$current_folder/$entry", $folder_to_find, $matches );
      }
    }
  }
  closedir( $handle );
}

// Display the search form
?>
    <form method="post" action="">
      <div>
        <input type="hidden" name="posted" value="true" />
        <label>Please enter the folder to search for:</label>
        <input type="text" name="nama_brg" />
        <input type="submit" name="search" value="Search" />
      </div>
    </form>
  </body>
</html>


            <div class="col-lg-19 text-center">
                    <h2>Kenari</h2>
                </div>
            
            
                <?php
                    if( isset( $_GET['hal'] ) ) {
                        $jum = ( $_GET['hal'] - 1 ) * 5;
                        $limit = "LIMIT $jum, 5";
                        $otp = $_GET['hal'];
                    }
                    else {
                        $limit = "LIMIT 0, 5";
                        $otp = 1;
                    }
                    $select = "SELECT * FROM barang $limit";
                    $select_query = mysql_query($select);
                    while($row=mysql_fetch_array($select_query))
                        {
                        $kd_brg = $row['kd_brg'];
                        $nama_brg = $row['nama_brg'];
                        $kategori = $row['deskripsi'];
                        $harga = $row['harga'];
                        $jumlah = $row['jumlah'];
                        $diskon = $row['diskon'];
                        $judul_gambar= $row['judul_gambar'];
                        $gambar= $row['gambar'];
                        
                    {
                ?>
                                
                    
                    <div class="product_box">
                    	
                    	<h2><?php echo "$nama_brg"; ?> </h2>
                        <a href="subpage.html"><img src="<?php echo"$gambar";?>" alt="<?php echo "$nama_brg";?>" width="200" height="165" class="img-circle"/></a>
                        <p class="price">Price: <span>Rp <?php echo"$harga";?></span></p>

                        <a href="index.php?pg=detail&kd_brg=<?php echo $kd_brg; ?>" class="btn btn-primary btn-lg btn-block btn-success">Detail</a>
                        <div class="cleaner"></div>
                    
                	</div>

                <?php
                    }
                    }
                ?>
                
            </div>
        </div>
        
    </section>
    <?php
            $query = mysql_query( "SELECT * FROM barang" );
            $numb = mysql_num_rows( $query );
            $spg = ( ( $numb -( $numb % 5 ) ) / 5 ) + 1;
            echo "<ul class='pagination'>"; 
            for( $i = 1; $i <= $spg; $i++ ) {
                if( $i == $otp ) {
                    echo "<li class='active'><a href='?pg=kenari&hal=$i'>$i</a></li>";
                }
                else {
                    echo "<li><a href='?pg=kenari&hal=$i'>$i</a></li>";
                }
            }
            echo "</ul>";
        ?>
