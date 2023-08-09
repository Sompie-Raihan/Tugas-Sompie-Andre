<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/login_assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/login_assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center mb-3">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                                    </div>
                                    <form method="post" class="row g-3 needs-validation" novalidate>
                    <?php
                      if(@$_POST["reg"]) {
                        include "../inc/tambah.php";
                      }
                    ?>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Name:</label>
                      <input minlength="8" type="text" name="nama_user" class="form-control" id="nama_user" placeholder="Minimal 8 character" required>
                      <div class="invalid-feedback">Please enter your Name !</div>
                    </div>
                    
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username:</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input minlength="8" type="text" name="username" class="form-control" id="username" placeholder="Minimal 8 character" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password:</label>
                      <input minlength="8" type="password" name="password" class="form-control" id="password" placeholder="Minimal 8 character"required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
 
                    
                    <div class="col-12 mt-5">
                      <input class="btn btn-primary w-100" type="submit" name="reg" value="sign-in"></input>
                    </div>
                  </form>
                  <div class="col-12 justify-content-center d-flex text-center">
                  <p class="w-100 " >Already have an account <a href="./login.php"><strong>login</strong></a> or <a href="../index.php"><strong>Cancel</strong></a></p>
                  </div>
                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/login_assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/login_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/login_assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/login_assets/js/sb-admin-2.min.js"></script>

</body>

</html>