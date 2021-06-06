<?php
session_start();
if($_SESSION['nama']=='')
{
    header("location:index.php");
}
?>

<?php
    $nama = $_SESSION['nama'];
    error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kuis - EduCovid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/fitur.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/kuis.css">
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
                                    <li class="nav-item">
                                        <a class="nav-link" href="charts.php">Data & Statistic</a>
                                    </li>
                                    <li class="nav-item active">
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
                        <li class="nav-item">
                            <a class="nav-link" href="charts.php?<?php echo $_SESSION['nama']?>">Statistic</a>
                        </li>
                        <li class="nav-item active">
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
                        <h1 class="title-text-big-header-2-2 d-lg-inline d-none">Education Quiz <br> Covid-19</h1>
                        <h1 class="title-text-small-header-2-2 d-lg-none d-inline">Education Quiz <br> Covid-19</h1>
                        <p class="title-2">Seberapa jauh sih kamu paham tentang Covid-19? Yakin nih sudah paham betul bahayanya? Yuk coba asah pengetahuanmu seputar <br> Covid-19 disini!</p>
                        <div class="div-button-header-2-2 d-inline d-lg-flex align-items-center mx-lg-0 mx-auto justify-content-center start">
                            <button name="mulai" class="btn d-inline-flex btn-try-header-2-2"> Mulai Kuis </button>
                        <form action="" method="post"> 
                            <button name="papan" class="btn d-inline-flex btn-try-header-2-2"> Papan Skor </button>
                        </form>
                        </div>
                    </div>
                    <!-- Right Column -->
                    <div class="right-column-header-2-2 text-center d-flex justify-content-center pe-0">
                        <img id="img-fluid" style="display: block;max-width: 100%;height: auto;" src="img/Corona 2.png" alt="">
                    </div>

                </div>
            </div>
        </div>

    </section>

    <!-- Body -->
   <section>

   <form action="" method="POST">
        <input type="hidden" name="skor" value="<?php echo $_GET['nilai'] ; ?>">
	<input type="hidden" name="nama" value="<?php echo $_SESSION['nama'] ; ?>">
	  
    </form>

<?php
	include 'koneksi.php';
     $nilai = $_GET['nilai'];
     $name = $_POST['nama'];
     if(isset($_POST['skor'])){
          $sql = "INSERT INTO skor (nama, nilai) VALUES ('$nama', '$nilai')";

         if(mysqli_query($link, $sql)){
             // echo "Data Berhasil Ditambahkan";
         }else{
		 
		echo 'test'.  $link->error;
             $sql2 = "update skor set nilai = $nilai where nama = '$name' ";
             if ($link->query($sql2) === TRUE) {
              //  echo "Record updated successfully";
              } else {
                echo "Error updating record: " . $link->error;
              }
         }

         mysqli_close($link);
     }else{
        //  echo "Gagal Menyimpan";
     }
?>
      <!-- Info Box -->
      <?php
      include 'koneksi.php';
        echo '<div class="info_box">';
                echo '<div class="info-title"><span>Peraturan Quiz</span></div>';
                echo '<div class="info-list">';
                    echo '<div class="info">1. Kamu hanya memiliki waktu <span>15 detik</span> untuk setiap pertanyaan.</div>';
                    echo '<div class="info">2. Sekali kamu memilih jawaban, jawabanmu tidak bisa diubah lagi.</div>';
                    echo '<div class="info">3. Kamu tidak bisa memilih jawaban apa pun setelah waktu habis.</div>';
                    echo '<div class="info">4. Kamu tidak bisa keluar dari kuis saat kamu sedang bermain.</div>';
                    echo '<div class="info">5. Kamu akan mendapatkan poin sesuai dengan jumlah jawabanmu yang benar.</div>';
                echo '</div>';
                echo '<div class="buttons">';
                    echo '<button class="quit">Exit Quiz</button>';
                    echo '<button class="restart">Continue</button>';
                echo '</div>';
        echo '</div>';
    if(isset($_POST['papan'])){
        echo '<div class="card-header bg-success text-white">';
	        echo '5 Peringkat Kuis Terbaik';
	    echo '</div>';
          $sql = "SELECT * FROM skor order by nilai desc limit 5" ;
                 
          if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo "<table class='table table-bordered table-striped'>";
                    echo "<tr>";
                        echo "<th>Peringkat</th>";
                        echo "<th>Nama</th>";
                        echo "<th>Skor</th>";
                    echo "</tr>";
                    $no = 0;
                while($row = mysqli_fetch_array($result)){
                    $no+=1;
                    echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['nilai'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                // Free result set
                mysqli_free_result($result);
            } else{
                echo "No records matching your query were found.";
            }
        }
    }
    ?>


         <!-- Quiz Box -->
         <div class="quiz_box">
             <header>
                 <div class="title">Education Quiz Covid-19</div>
                 <div class="timer">
                     <div class="time_left_txt">Time Left</div>
                     <div class="timer_sec">15</div>
                 </div>
                 <div class="time_line"></div>
             </header>
             <section>
                 <div class="que_text">
                 </div>
                 <div class="option_list">
                 </div>
             </section>

             <!-- footer of Quiz Box -->
             <footer>
                 <div class="total_que">
                 </div>
                 <button class="next_btn">Next</button>
             </footer>
         </div>

         <!-- Result Box -->
         <div class="result_box">
             <div class="icon">
                 <i class="fas fa-crown"></i>
             </div>
             <div class="complete_text">You've completed the Quiz!</div>
             <div class="score_text">
             </div>
             <div class="buttons">
                 <button class="restart">Replay Quiz</button>
                 <button class="quit">Quit Quiz</button>
                 <button class="rank" id="rank">Simpan</button>
             </div>
         </div> 
</section>

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
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
 <script src="js/questions.js"></script>
 <script src="js/quiz.js"></script>
</body>

</html>
