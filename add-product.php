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
  $db= mysqli_connect("localhost", "root", "", "ecommercs");
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    $name_cat=$_POST["name-pro"];
    $filename = $_FILES["img-pro"]["name"];
    $tempname = $_FILES["img-pro"]["tmp_name"];    
        $folder = "img/".$filename;
    $cat=$_POST["cat-pro"];
    $price=$_POST["price-pro"];
    $desc=$_POST["desc-pro"];    
          
   
  
        // Get all the submitted data from the form
        $sql = "INSERT INTO `products` (`name`,`image`,`price` ,`desc`,`catigory`) VALUES ('$name_cat','$filename','$price','$desc','$cat')";
  
        // Execute query
        if(!mysqli_query($db, $sql))
        echo("Error description: " . mysqli_error($db));
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
                                        <h1 class="h4 text-gray-900 mb-4">Add Product </h1>
                                    </div>
                                    <form class="user" action="#" method="POST"  enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="name-pro"
                                                placeholder="Enter Name product...">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control form-control-user"
                                                id="" placeholder="" name="img-pro">
                                        </div>
                                        <div class="form-group">
                                        <textarea type="" class="form-control form-control-user"
                                                id="" placeholder="descripe products" name="desc-pro"> </textarea>
                                        </div>

                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user"
                                                id="" placeholder="30" name="price-pro">
                                        </div>

                                        
                                        <div class="">
                                           <select name="cat-pro" class="form-select" aria-label="Default select example">
                                            <?php 
                                            
                                            $sql = "SELECT  id , name  FROM catigory";
                                            $result = $db->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                              // output data of each row
                                              while($row = $result->fetch_assoc()) {
                                              
                                            ?>
                                             <option selected value=<?php echo $row["id"]; ?> > <?php echo $row["name"]; ?>  </option> 
                                            <?php 
                                              }}
                                            ?>
                                           </select>
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