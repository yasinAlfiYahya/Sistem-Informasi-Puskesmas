<?php
    session_start();
    // include 'koneksi.php';
	if($_SESSION['nama']=='')
	{
		header("location:index.php");
	}

	//Koneksi Database
	$server = "remotemysql.com";
	$user = "Oi2Ts4enDd";
	$pass = "vNmEEsEzjW";
	$database = "Oi2Ts4enDd";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE penyebaran_covid set
											 	tanggal = '$_POST[atanngal]',
												provinsi = '$_POST[aprovinsi]',
												jumlah_positif = '$_POST[positif]',
												jumlah_sembuh = '$_POST[sembuh]',
												jumlah_meninggal = '$_POST[meninggal]'
											 WHERE id = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='manage.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='manage.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO penyebaran_covid (tanggal, provinsi, jumlah_positif, jumlah_sembuh, jumlah_meninggal)
										  VALUES ('$_POST[atanngal]', 
										  		 '$_POST[aprovinsi]', 
										  		 '$_POST[positif]', 
										  		 '$_POST[sembuh]',
												 '$_POST[meninggal]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='manage.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='manage.php';
				     </script>";
			}
		}


		
	}


	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM penyebaran_covid WHERE id = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vtanngal = $data['tanggal'];
				$vprovinsi = $data['provinsi'];
				$vpositif = $data['jumlah_positif'];
				$vsembuh = $data['jumlah_sembuh'];
				$vmeninggal = $data['jumlah_meninggal'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			include 'koneksi.php';
			$sql = "DELETE FROM penyebaran_covid WHERE id = '$_GET[id]'";

				if ($link->query($sql) === TRUE) {
				  //echo "Record deleted successfully";
				} else {
				  echo "Error deleting record: " . $link->error;
				}

				$link->close();
				}
	}
	$nomer = 1;
	$tabledata = "";
    $sqlsearch = "";
    if (isset($_POST["btnSearch"])) {
        $keywords = $koneksi->real_escape_string($_POST["txtSearch"]);
        $searchTerms = explode(' ', $keywords);
        $searchTermBits = array();
        foreach ($searchTerms as $key => &$term) {
            $term = trim($term);
            $searchTermBits[] = " `tanggal` LIKE '%$term%' OR `provinsi` LIKE '%$term%' OR `jumlah_positif` LIKE '%$term%' OR `jumlah_sembuh` LIKE '%$term%' OR `jumlah_meninggal` LIKE '%$term%'";
        }
        $sqlsearch = " WHERE " . implode(' AND ', $searchTermBits);
    }

    if ($stmt = $koneksi->prepare("SELECT * FROM `penyebaran_covid` $sqlsearch")) {
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tabledata .= '<tr>
                                <td>'.$row["tanggal"].'</td>
                                <td>'.$row["provinsi"].'</td>
                                <td>'.$row["jumlah_positif"].'</td>
								<td>'.$row["jumlah_sembuh"].'</td>
								<td>'.$row["jumlah_meninggal"].'</td>
                                <td>
                                    <a href="manage.php?hal=edit&id='.$row["id"].'" class="btnAction btnUpdate"</a>
                                    <a href="manage.php?del='.$row["id"].'" class="btnAction btnDelete" title="Apakah yakin ingin menghapus data ini?"></a>
                                </td>
                            </tr>';
            }
        } else {
            $tabledata= '<tr><td colspan="4" style="text-align: center; padding:30px 0;">Nothing to display</td></tr>';
        }

        $stmt->close();
    } else {
        die('prepare() failed: ' . htmlspecialchars($koneksi->error));
    }

    // Close database connection
    // $koneksi->close();

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Manage Data - EduCovid</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <section style="height:100%; width: 100%; box-sizing: border-box; background-color:rgba(219, 223, 255, 0.705)">

        <div class="header-2-2" style="font-family: 'Poppins', sans-serif;">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Logo -->
                <a href="#">
                    <img style="margin-right:0.75rem" src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-5.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#targetModal-header-2-2">
          <span class="navbar-toggler-icon"></span>
        </button>

                <div class="modal-header-2-2 modal fade" id="targetModal-header-2-2" tabindex="-1" role="dialog" aria-labelledby="targetModalLabel-header-2-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-content-header-2-2">
                            <div class="modal-header" style="padding:	2rem; padding-bottom: 0;">
                                <!-- <a class="modal-title" id="targetModalLabel-header-2-2">
                                    <img style="margin-top:0.5rem" src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-5.png" alt="">
                                </a> -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:	2rem; padding-top: 0; padding-bottom: 0;">
                                <!-- Phone Display -->
                                <ul class="navbar-nav responsive-header-2-2 me-auto mt-2 mt-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="home.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pencegahan.php">Covid-19 Prevention</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="charts.php">Data & Statistic</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="kuis.php">Quiz</a>
                                    </li>
                                    <?php
                                        if ($_SESSION["tipe_akun"] == 'Covid Ranger'){
                                            echo '<li class="nav-item">
                                                <a class="nav-link" href="pendataan.php?<?php echo $_SESSION[nama]?>">Pendataan</a>
                                                </li>';
                                        }
                                    ?>
                                    <?php
                                        if ($_SESSION["tipe_akun"] == 'Admin'){
                                            echo '<li class="nav-item active">
                                                <a class="nav-link" href="admin.php?<?php echo $_SESSION[nama]?>">Manage Data</a>
                                                </li>';
                                        }
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="kontak.php">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="modal-footer" style="padding:	2rem; padding-top: 0.75rem">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo-header-2-2">
                    <!-- Web Display -->
                    <h4 class="app-name">Edu-Covid</h4>
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item home">
                            <a class="nav-link" href="home.php?<?php echo $_SESSION['nama']?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pencegahan.php?<?php echo $_SESSION['nama']?>">Prevention</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="charts.php?<?php echo $_SESSION['nama']?>">Statistic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kuis.php?<?php echo $_SESSION['nama']?>">Quiz</a>
                        </li>
                        <?php
                            if ($_SESSION["tipe_akun"] == 'Covid Ranger'){
                                echo '<li class="nav-item">
                                     <a class="nav-link" href="pendataan.php?<?php echo $_SESSION[nama]?>">Pendataan</a>
                                     </li>';
                            }
                        ?>
                        <?php
                            if ($_SESSION["tipe_akun"] == 'Admin'){
                                echo '<li class="nav-item active">
                                     <a class="nav-link" href="manage.php?<?php echo $_SESSION[nama]?>">Manage</a>
                                     </li>';
                            }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="kontak.php?<?php echo $_SESSION['nama']?>">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div>
                <div class="mx-auto d-flex flex-lg-row flex-column hero-header-2-2">
                    <!-- Left Column -->
                    <div class="left-column-header-2-2 d-flex flex-lg-grow-1 flex-column align-items-lg-start text-lg-start align-items-center text-center">
                        <!-- <p class="text-caption-header-2-2">FREE 30 DAY TRIAL</p> -->
                        
                        <h1 class="title-text-big-header-2-2 d-lg-inline d-none">Manage Perubahan Data Terkait Perkembangan Covid-19</h1>
                        <h1 class="title-text-small-header-2-2 d-lg-none d-inline">Manage Perubahan Data Terkait Perkembangan Covid-19</h1>
                    </div>
                    <!-- Right Column -->
                    <div class="right-column-header-2-2 text-center d-flex justify-content-center pe-0">
                        <img id="img-fluid" style="display: block;max-width: 100%;height: auto;" src="img/Corona 2.png" alt="">
                    </div>

                </div>
            </div>
        </div>

    </section>

<div class="container">

	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	    Form Editing and Manage Data Covid-19
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Tanggal</label>
	    		<input type="date"  name="atanggal" value="<?=@$vtanngal?>" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Provinsi</label>
	    		<input type="text" name="aprovinsi" value="<?=@$vprovinsi?>" class="form-control" placeholder="Masukkan provinsi Kamu disini" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Positif</label>
	    		<input type="number" name="positif" value="<?=@$vpositif?>" class="form-control" placeholder="Masukkan jumlah orang yang posiif" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Sembuh</label>
	    		<input type="number" name="sembuh" value="<?=@$vsembuh?>" class="form-control" placeholder="Masukkan jumlah orang yang sembuh" required>
	    	</div>
			<div class="form-group">
	    		<label>Meninggal</label>
	    		<input type="number" name="meninggal" value="<?=@$vmeninggal?>" class="form-control" placeholder="Masukkan jumlah orang yang meninggal" required>
	    	</div>

	    	<button type="submit" class="btn btn-success" name="bsimpan">Edit</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

	    </form>
	  </div>

	</div>
	<!-- Akhir Card Form -->

	<!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
	    Daftar Penyebaran Covid-19
	  </div>
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="txtSearch" value="<?php if(isset($keywords)){ echo $keywords; }?>" title="Input keywords here" required>
                <button type="submit" name="btnSearch" class="btnSearch" title="Search keywords">Search</button>
                <a href="manage.php" class="btnReset" title="Reset search">Reset</a>
            </form>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>No.</th>
	    		<th>Tanggal</th>
	    		<th>Provinsi</th>
	    		<th>Jumlah Positif</th>
	    		<th>Jumlah Sembuh</th>
				<th>Jumlah Meninggal</th>
	    		<th>Aksi</th>
	    	</tr>
			<?php 
			$nomer = 1;
			$tabledata = "";
			$sqlsearch = "";
			if (isset($_POST["btnSearch"])) {
				$keywords = $koneksi->real_escape_string($_POST["txtSearch"]);
				$searchTerms = explode(' ', $keywords);
				$searchTermBits = array();
				foreach ($searchTerms as $key => &$term) {
					$term = trim($term);
					$searchTermBits[] = " `tanggal` LIKE '%$term%' OR `provinsi` LIKE '%$term%' OR `jumlah_positif` LIKE '%$term%' OR `jumlah_sembuh` LIKE '%$term%' OR `jumlah_meninggal` LIKE '%$term%'";
				}
				$sqlsearch = " WHERE " . implode(' AND ', $searchTermBits);
			}
		
			if ($stmt = $koneksi->prepare("SELECT * FROM `penyebaran_covid` $sqlsearch order by id desc")) {
				$stmt->execute();
				$result = $stmt->get_result();
				if($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						?>
						<tr>
						<td><?=$nomer++;?></td>
	    		<td><?=$row['tanggal']?></td>
	    		<td><?=$row['provinsi']?></td>
	    		<td><?=$row['jumlah_positif']?></td>
	    		<td><?=$row['jumlah_sembuh']?></td>
				<td><?=$row['jumlah_meninggal']?></td>
	    		<td>
	    			<a href="manage.php?hal=edit&id=<?=$row['id']?>" class="btn btn-warning"> Edit </a>
	    			<a href="manage.php?hal=hapus&id=<?=$row['id']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
						<?php
					}
				} else {
					
				}
		
				$stmt->close();
			} else {
				die('prepare() failed: ' . htmlspecialchars($koneksi->error));
			}
			?>
	    </table>
	  </div>
	</div>
	<!-- Akhir Card Tabel -->

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>