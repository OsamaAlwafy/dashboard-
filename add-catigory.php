<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="vender/fontawesome/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="vender/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<?php 
include "page-section/menu.php";
include "page-section/nav.php";

?>


<?php
  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    $name_cat=$_POST["name-cat"];
    $filename = $_FILES["img-cat"]["name"];
    $tempname = $_FILES["img-cat"]["tmp_name"];    
        $folder = "img/".$filename;
          
    $db = mysqli_connect("localhost", "root", "", "ecommercs");
  
        // Get all the submitted data from the form
        $sql = "INSERT INTO catigory (name,image) VALUES ('$name_cat','$filename')";
  
        // Execute query
        mysqli_query($db, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  
    }
      ?>



<div class="col-xl-12 col-md-12 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                       
                                              

                                    <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Add Catigory </h1>
                                    </div>
                                    <form class="user" action="#" method="POST"  enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="name-cat"
                                                placeholder="Enter Name Catigory...">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="" name="img-cat">
                                        </div>
                                        <div class="form-group">
                                           
                                        </div>
                                        <input type="submit" name="upload" value="add" class="btn btn-primary btn-user btn-block">
                                            
                                    
                                        
                                       
                                    </form>
                                   
                                    
                                    
                                </div>
                            </div>







                                        
                                    </div>
                                </div>
                            </div>
    </div>

<script src="vender/jquery/jquery.min.js"></script>
    <script src="vender/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vender/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="vender/js/sb-admin-2.min.js"></script>
</body>
</html>