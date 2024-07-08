<?php
   include("user_authentication.php");

  $cnameErr = $cdescErr ="";
  $cname = $cdesc = "";

   $seConnect = mysqli_connect("localhost","root","","library");
   $bookCID = $_GET['bookCatId'];
   die;
 
   $query = "SELECT * FROM `book_category` WHERE id ='$bookCID'";
   $result = mysqli_query($seConnect, $query);
   $data = mysqli_fetch_assoc($result);
   $categoryName = $data['name'];
   $categoryDesc = $data['description'];
   
   die;

  if(isset($_POST['save'])){

    if($_POST['cname']==""){
      $cnameErr = "Category Name is Required!";
    }else{
      echo $cname = $_POST['cname'];
    }
    
    if($_POST['cdesc']==""){ 
      $cdescErr = "";
    }else{
      echo $cdesc = $_POST['cdesc'];
    }
    
    if($cnameErr=="" && $cdescErr==""){
    $query = "insert into book_category(name,description) values('$cname','$cdesc')";
    $result = mysqli_query($seConnect, $query);

    if($result){
    header("location:add_book_category.php?save=1");
    die;
    }
  }

  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Layouts - NiceAdmin Bootstrap Template</title>
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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
      <h1>Edite Book Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
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
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cname" id="inputText" value="<?php echo $categoryName;?>">
                    <label for="inputEmail3" class="col-sm-4 col-form-label text-danger" ><?php echo $cnameErr; ?></label>
                  </div>
                </div>
               
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="cdesc" id="inputPassword"><?php echo $categoryDesc;?></textarea>
                    <label for="inputEmail3" class="col-sm-4 col-form-label"><?php echo $cdescErr; ?></label>

                  </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" name="save" class="btn btn-primary">Edite</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- End Horizontal Form -->

            </div>
          </div>

          </div>
      </div>
    </section>

  </main><!-- End #main -->


  <?php
  include("footer.php");
  ?>

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