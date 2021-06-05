<?php

session_start();

include "koneksi.php";
if($_SESSION['nama']=='')
{
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Charts - EduCovid</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
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
                                    <li class="nav-item active">
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
                                            echo '<li class="nav-item">
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
                        <li class="nav-item active">
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
                                echo '<li class="nav-item">
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
                        
                        <h1 class="title-text-big-header-2-2 d-lg-inline d-none">Data dan Statistik Perkembangan <br> Covid-19 di Indonesia</h1>
                        <h1 class="title-text-small-header-2-2 d-lg-none d-inline">Data dan Statistik Perkembangan <br> Covid-19 di Indonesia</h1>
                    </div>
                    <!-- Right Column -->
                    <div class="right-column-header-2-2 text-center d-flex justify-content-center pe-0">
                        <img id="img-fluid" style="display: block;max-width: 100%;height: auto;" src="img/Corona 2.png" alt="">
                    </div>

                </div>
            </div>
        </div>

    </section>

    <h2 class="title-data">Data 5 Hari Terakhir Penyebaran Covid-19 </h2>
    <div class="mx-auto d-flex flex-lg-row flex-column hero-header-2-2">
                    <!-- Left Column -->
                    <div class="left-column-header-5-5 d-flex flex-lg-grow-1 flex-column align-items-lg-start text-lg-start align-items-center text-center">
                        <!-- <p class="text-caption-header-2-2">FREE 30 DAY TRIAL</p> -->
                        <div>
                        <h3 id="namaProv">
                            <?php 
                                if(isset($_GET['provinsi'])){
                                    echo "<i class='fas fa-bell'></i>".$_GET['provinsi'];
                                }
                            ?>
                        </h3>
                        </div>
                        
                        
                    </div>
                    <!-- Right Column -->
                <div class="right-column-header-2-2 text-center d-flex justify-content-center pe-0 " method="post">
                    <div style="margin-bottom: 0rem; margin-top: 0rem;">
                            <label for="" class="d-block input-label-content-3-5">Provinsi Penyebaran Covid-19: </label>
                            <div class="d-flex w-300 div-input-content-3-5">
                                <select class="input-field-content-3-5" id="provinsi" name="provinsi" autocomplete="on" required> 
                                <?php
                                    $provinsi = "SELECT name FROM provinces";
                                    $result = mysqli_query($link, $provinsi) or die (mysqli_connect_error()."[".$provinsi."]");
                                ?>

                                <?php 
                                    // echo "<option>". ' Pilih Provinsi ' ."</option>";
                                        echo  "<option disabled selected>" . 'Pilih Provinsi' . "</option>";
                                        while ($row = mysqli_fetch_assoc($result)){
                                            echo "<option value='".$row['name']."'>".$row['name']."</option>";
                                        }
                                        
                                               
                                ?>  
                                </select>
                            </div>
                    </div>  
                      
                </div>

                <?php error_reporting(0) ?>
                <?php $_GET['provinsi'] = $_POST['provinsi']; ?>

    </div>
    


    <div class="kasus grid-padding-content-0-3">
        <div class="div-positif" id="layoutSidenav_content">
            <div class="row">
                <div class="col-sm-10 py-6">
                    <p>
                        <ul>
                            <li>Kasus Positif</li>
                        </ul>
                    </p>
                    <div class="card mb-4">
                        <!-- <p>Data Selama Bulan Maret</p> -->
                        <div class="card-body h-100"><canvas id="chart"></canvas></div>
                        <div class="card-footer small text-muted">Updated 1 Juni at 11:00 AM <br> Source: Kemenkes RI</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="div-meninggal" id="layoutSidenav_content">
            <div class="row">
                <div class="col-sm-10 py-6">
                    <p>
                        <ul>
                            <li>Kasus Meninggal Dunia</li>
                        </ul>
                    </p>
                    <div class="card mb-4">
                        <!-- <p>Data Selama Bulan Maret</p> -->
                        <div class="card-body h-100"><canvas id="meninggal"></canvas></div>
                        <div class="card-footer small text-muted">Updated 1 Juni at 11:00 AM <br> Source: Kemenkes RI</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="div-sembuh" id="layoutSidenav_content">
            <div class="row">
                <div class="col-sm-10 py-6">
                    <p>
                        <ul>
                            <li>Kasus Sembuh </li>
                        </ul>
                    </p>
                    <div class="card mb-4">
                        <!-- <p>Data Selama Bulan Maret</p> -->
                        <div class="card-body h-100"><canvas id="sembuh"></canvas></div>
                        <div class="card-footer small text-muted">Updated 1 Juni at 11:00 AM <br> Source: Kemenkes RI</div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Footer -->
    <section style="height: 100%; width: 100%; box-sizing: border-box; background-color: rgb(255, 255, 255);">
        <div class="info-footer-footer-2-2">
            <div class="">
                <hr class="hr-footer-2-2">
            </div>
            <div class="mx-auto d-flex flex-column flex-lg-row align-items-center footer-info-space-footer-2-2">
                <div class="d-flex title-font font-medium align-items-center" style="cursor: pointer;">

                    <a href="https://www.facebook.com/yasin.a.yahya" class="social-media-c-footer-2-2 social-media-center-1-footer-2-2" target="_blank"> <img src="img/facebook.png" alt="facebook"> </a>

                    <a href="https://twitter.com/yasinalfiyahya" class="social-media-c-footer-2-2 social-media-center-1-footer-2-2" , target="_blank"><img src="img/twitter.png" alt="twitter"></a>

                    <a href="https://github.com/yasinAlfiYahya" class="social-media-c-footer-2-2 social-media-center-1-footer-2-2" target="_blank"><img src="img/github.png" alt="github"></a>

                    <a href="https://www.instagram.com/yasin_alfiyahya/" class="social-media-c-footer-2-2 social-media-center-1-footer-2-2" target="_blank"><img src="img/instagram.png" alt="instagram"></a>

                </div>

                <nav class="mx-auto d-flex flex-wrap align-items-center justify-content-center footer-responsive-space-footer-2-2">
                    <a class="footer-link-footer-2-2" style="text-decoration: none;">Terms of Service</a>
                    <span style="margin-right:1.25rem">|</span>
                    <a class="footer-link-footer-2-2" style="text-decoration: none;">Privacy Policy</a>
                    <span style="margin-right:1.25rem">|</span>
                    <a class="footer-link-footer-2-2" style="text-decoration: none;">Licenses</a>
                </nav>

                <nav class="d-flex flex-lg-row flex-column align-items-center justify-content-center">
                    <p style="margin: 0">Copyright © 2021 Yasin Alfi Yahya</p>
                </nav>

            </div>
        </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="js/charts.js"></script>
    <script>
        window.chartPositif()
        window.chartMeninggal()
        window.chartSembuh()
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

<script>
let provinsi = document.getElementById("provinsi");
provinsi.addEventListener("change", function(e){
	console.log(e.target);
    window.location.href = `charts.php?provinsi=${e.target.value}`;
    let provinsi_container = document.getElementById("namaProv");
    provinsi_container.innerHTML = e.target.value;
})
</script>

</html>