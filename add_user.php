<?php
  include("user_authentication.php");

  if(isset($_POST['save'])){

    $fName = $_POST['fname'];
    $lName = $_POST['lname'];
    $uName = $_POST['uname'];
    $password = $_POST['pass'];    
    $stat = $_POST['stat'];    
    $img = $_POST['img'];    

        $seConnect = mysqli_connect("localhost","root","","library");

        $insert = "INSERT INTO `users`( `first_name`, `last_name`, `user_name`, `password`, `status`, `profile_img` ) VALUES ('$fName','$lName','$uName','$password','$stat','$img')";
        $inserQuery = mysqli_query($seConnect, $insert);

        if($inserQuery){
            header("location:add_user.php?save=1");
        die;
        }
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Add Book</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <!-- Google Fonts -->
        <!-- <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->
        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">
    </head>

<body>

<?php
//Header
include("header.php");

//Aside
include("aside.php");
?>


        <main id="main" class="main">

            <div class="pagetitle">
            <h1>Add New User</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php.php">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                </ol>
            </nav>
            </div><!-- End Page Title -->
            <section class="section">
            <div class="row">
                <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <hr>


                    <!-- Horizontal Form -->
                <form method="post" action="#">
                        <?php
                        if(isset($_GET['save'])){
                        echo "<h2 class='text-success'>Successfully Inserted!</h2>";
                        }
                        ?>

                    <div class="row mb-3">
                        <label for="img" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="img" id="inputText" value="">
                            <label  class="col-sm-4 col-form-label text-danger" ></label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fname" id="inputText" required>
                            <label  class="col-sm-4 col-form-label text-danger" ></label>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="lname" id="inputText" required>
                            <label  class="col-sm-4 col-form-label text-danger" ></label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="uname" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="uname" id="inputText" required>
                            <label  class="col-sm-4 col-form-label text-danger" ></label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="pass" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pass" id="inputText" required>
                            <label  class="col-sm-4 col-form-label text-danger" ></label>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="stat" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select type="text" class="form-control" name="stat" id="stat" value="status" required>
                                <option value="active">Active</option>
                                <option value="Deactive">Deactive</option>
                            </select>
                            <label  class="col-sm-4 col-form-label text-danger" ></label>
                        </div>
                    </div>



                    <div class="text-center">
                        <button type="submit" name="save" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                     </div>
                        
                </form><!-- End Horizontal Form -->

                    </div>
                </div>

                </div>
            </div>
            </section>

        </main><!-- End #main -->
        <!-- ======= Footer ======= -->
        <?php
            include("footer.php");
        ?>
        <!-- End Footer -->
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <!-- Vendor JS Files -->
        <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/chart.js/chart.min.js"></script>
        <script src="assets/vendor/echarts/echarts.min.js"></script>
        <script src="assets/vendor/quill/quill.min.js"></script>
        <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
    </body>
</html>