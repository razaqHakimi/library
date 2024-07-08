<?php
   include("user_authentication.php");
  $bnameErr = $blangErr  ="";

  if(isset($_POST['save'])){

    if($_POST['bname']==""){
      $bnameErr = "Book Name is Required!";
    }else{
      $bname = $_POST['bname'];
    }
    
    if($_POST['blang']==""){ 
      $blangErr = "Book Language is Required!";
    }else{
      $blang = $_POST['blang'];
    }
    $NOpage = $_POST['NOpage'];
    $fAuthor = $_POST['fAuthor'];    
    $sAuthor = $_POST['sAuthor'];    
    $bdesc = $_POST['bdesc'];    
    
   $bcategory = $_POST['cname'];    

    if($bnameErr=="" && $blangErr==""){
    
    $seConnect = mysqli_connect("localhost","root","","library");

    $query = "INSERT INTO `book`( `name`, `number_of_pages`, `first_author`, `second_author`, `language`, `description`, `book_category_id`) VALUES ('$bname','$NOpage','$fAuthor','$sAuthor','$blang','$bdesc','$bcategory')";
    $result = mysqli_query($seConnect, $query);

    if($result){
    header("location:add_book.php?saved=1");
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
  <h1>Add New Book</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item">Add New Book</li>
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
              <label for="cname" class="col-sm-2 col-form-label">Category</label>
              <div class="col-sm-10">
                <select type="text" class="form-control" name="cname" id="cname" value="category">

                    <?php
                        $seConnect = mysqli_connect("localhost","root","","library");

                        $sql = "SELECT * FROM `book_category`";
                    
                        $query = mysqli_query($seConnect, $sql);
    
                        while($row = mysqli_fetch_assoc($query)){

                        $category_book_name = $row['name'];
                        $category_book_id = $row['id'];

                        echo "
                        <option value='$category_book_id'>$category_book_name</option>
                            ";
                        }
                    ?>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="bname" class="col-sm-2 col-form-label">Book Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="bname" id="inputText" value="">
                <label class="col-sm-4 col-form-label text-danger" ><?php echo $bnameErr; ?></label>
              </div>
            </div>

            <div class="row mb-3">
              <label for="NOpage" class="col-sm-2 col-form-label">Number of Pages</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="NOpage" id="inputText" value="">
                <label  class="col-sm-4 col-form-label text-danger" ></label>
              </div>
            </div>

            <div class="row mb-3">
              <label for="fAuthor" class="col-sm-2 col-form-label">First Author</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="fAuthor" id="inputText" value="">
                <label  class="col-sm-4 col-form-label text-danger" ></label>
              </div>
            </div>

            <div class="row mb-3">
              <label for="sAuthor" class="col-sm-2 col-form-label">Second Author</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="sAuthor" id="inputText" value="">
                <label  class="col-sm-4 col-form-label text-danger" ></label>
              </div>
            </div>

            <div class="row mb-3">
              <label for="blang" class="col-sm-2 col-form-label">Language</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="blang" id="inputText" value="">
                <label  class="col-sm-4 col-form-label text-danger" ><?php echo $blangErr; ?></label>
              </div>
            </div>

            <div class="row mb-3">
              <label for="bdesc" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="bdesc" id="inputPassword"></textarea>
                <label  class="col-sm-4 col-form-label"></label>

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


  <?php
  include("footer.php");
  ?>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short">
  </i></a>

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