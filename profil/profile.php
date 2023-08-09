<?php
session_start();
include '../inc/koneksi.php';


$ID = $_SESSION['id'];

if($ID == ""){
   // header('location: ../inc/login.php');
};

$USER = $_SESSION['username'];
$NAMA = $_SESSION['nama'];
$PIC = $_SESSION['gambar'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kursus</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
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

    </div>
  </header><!-- End Header -->
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($KONEKSI, "SELECT * FROM tbl_user_kursus WHERE id_user = '$ID'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['gambar'] == ''){
            echo '<img src="../assets/img/profile/profile-user.png">';
         }else{
            echo '<img src="../assets/img/uploaded_img/'.$fetch['gambar'].'">';
         }
      ?>
      <h3><?php echo $fetch['nama_user']; ?></h3>
      <a href="update_profile.php" class="btn">update profile</a>
      <a href="../index.php" class="btn">Home</a>
      <!-- <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <p>new <a href="login.php">login</a> or <a href="register.php">register</a></p> -->
   </div>

</div>

</body>
</html>