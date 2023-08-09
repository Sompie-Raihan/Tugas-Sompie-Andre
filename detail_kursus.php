<!DOCTYPE html>
<html lang="en">

<div class="d-none">
<?php
session_start();
include "./inc/koneksi.php";
include "./inc/function.php";

$USER = $_SESSION['username'];
$NAMA = $_SESSION['nama'];
$PIC = $_SESSION['gambar'];

// if($_SESSION['username'] == ""){
//   header('location:./inc/login.php');
// }
$ID = $_GET['id_kursus'];
$ID_USER = $_SESSION['id'];


$DATA = mysqli_query($KONEKSI,"SELECT * FROM tbl_kursus WHERE id_kursus = '$ID'");
$KURSUS = mysqli_fetch_array($DATA);

$TEST = mysqli_query($KONEKSI,"SELECT * FROM tbl_nilai_kursus WHERE id_user = '$ID_USER' AND id_kursus = '$ID'");
$HASIL = mysqli_num_rows($TEST);

if($HASIL == 1) {
  $STS = true;
  $CON = "lihat kursus";    
} else {
  $STS = false;
  $CON = "beli kursus";
}

?>
</div>


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kursus</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Lumia
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h1><img href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></img> <a>kursus</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
        <li><a class="nav-link scrollto" href="../index.php">Home</a></li>
          <li class="<?php if($USER == ""){echo "nav-link pe-2" ;} else {echo "dropdown pe-2";}?>"><a href="<?php if($USER == ""){echo "./inc/login.php" ;} else {echo "#";}?>"><span><?php if($NAMA == ""){echo "Sign-In";} else {echo $NAMA;}?></span></a>
            <ul class="<?php if($USER == ""){echo "d-none";}?>">
              <li><a href="./profil/profile.php">Profile</a></li>
              <li><a href="./inc/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        <img src="<?php if(@$_SESSION['gambar'] == ""){echo "../assets/img/profile/profile-user.png";} else {echo "../assets/img/uploaded_img/$PIC";}?>" alt="Profile" class="rounded-circle" style="height: 39px; width: 39px;">
      </nav><!-- .navbar -->

      <!-- <div class="header-social-links d-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div> -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <!-- <div class="d-flex justify-content-between align-items-center">
          <h2>Kursus</h2>
          <ol>
            <li><a href="../index.php">Home</a></li>
            <li>Kursus</li>
          </ol>
        </div> -->

      </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/portfolio-1.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/portfolio-2.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/portfolio-3.jpg" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3><?php echo $KURSUS['nama_kursus']?></h3>
              <ul>
                <li><strong>Jumlah Chapter :</strong><?php echo $KURSUS['jumlah_chp']?></li>
                <li><strong>Harga :</strong> <strong>Rp.</strong><?php echo $KURSUS['harga_kursus']?></li>
              </ul>
             
              <div class="d-grid gap-2">
             <a href="<?php if($STS == false) {echo "#"; } else { echo "./pages/Page-kursus/index.php?id_kursus=$ID";}?>" class="btn btn-outline-danger" type="button" href="./inc/pembayaran.php"><?php echo $CON?></a>
            </div>

            </div>
            <div class="portfolio-description">
              <h2>This is an example of kursus <?php echo $HASIL; ?></h2>
              <p>
                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="row gy-4">
          <h2>Purnama</h2>
          <P>lorem ipsum</P>

        <?php $DATA = mysqli_query($KONEKSI,"SELECT * FROM tbl_kursus ORDER BY id_kursus ASC ");
               $NO = 1;
               $LIMIT = $KURSUS['jumlah_chp'];
                while($NO <= $LIMIT ) {
                ?>
                <nav class="navbar navbar-light bg-light">
                <div class="container">
                  <a class="navbar-brand"  href="">
                    <img src="./assets/img/play.png" alt="" width="30" height="24">
                    <?php echo "Chapter ", $NO?>
                </a>
                </div>
                </nav>
    
              <?php
              $NO++;
              if($NO > $LIMIT){
              break;} 
              };?>

          
        
        </div>
         </div>
    </section>

    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="row gy-4">
          <h2>Purnama</h2>
          <div class="card">
        <div class="card-body">
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem at quam, excepturi provident, rerum labore quod vero alias dolorum cumque pariatur quasi, earum eius voluptas aliquam deserunt atque dolores quibusdam
       </div>
       </div>
       </div>
       </div>
    </section>

  </main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>Lumia</h3>
        <p>
          A108 Adam Street <br>
          New York, NY 535022<br>
          United States <br><br>
          <strong>Phone:</strong> +1 5589 55488 55<br>
          <strong>Email:</strong> info@example.com<br>
        </p>
      </div>

      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
        </ul>
      </div>

    
    </div>
  </div>
</div>

<div class="container d-md-flex py-4">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      &copy; Copyright <strong><span>Kepeleset.co</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/lumia-bootstrap-business-template/ -->
    </div>
  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
  </div>
</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>