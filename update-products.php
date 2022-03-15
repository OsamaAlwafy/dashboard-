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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercs";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$msg='';
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update-data'])) {
  echo"asd";  
  $id=$_POST["id-pro"];
  $name=$_POST["name-pro"];
  $filename = $_FILES["img-pro"]["name"];
  $tempname = $_FILES["img-pro"]["tmp_name"];    
      $folder = "img/".$filename;
  $cat=$_POST["cat-pro"];
  $price=$_POST["price-pro"];
  $desc=$_POST["desc-pro"];  
    if (move_uploaded_file($tempname, $folder))  {
      $msg = "Image uploaded successfully";
  }else{
      $msg = "Failed to upload image";
}

$sql = "UPDATE `products` SET `name`='$name'  , `price`='$price' , `desc` ='$desc' , `catigory`='$cat' ,`image`='$filename' WHERE `id`='$id'";

if ($conn->query($sql) === TRUE) {
echo "Record updated successfully";
header("location:index.php");
exit();
} else {
echo "Error updating record: " . $conn->error;
}
    

}
$id=$_POST["id"];
$sql= "SELECT * FROM products where id =".$id;
$result = $conn->query($sql);


include "page-section/menu.php";
include "page-section/nav.php";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {


?>


<div class="card" style="width: 20rem;">
 <form action="#" method="POST" enctype="multipart/form-data">
  <img src= <?php echo "img/".$row["image"]; ?> class="card-img-top" alt="..."/>
  <input type="text" name="id-pro" value=<?php echo $row["id"]; ?> class="d-none" /> 
  <lable for=<?php echo "id".$row["id"]; ?>>cc</lable>
  <input type="file" id=<?php echo "id".$row["id"];  ?> name="img-pro"  style="opcity:0;" /> 
  <div class="card-body">
    <h5 class="card-title"><input type="text" value=<?php echo $row["name"] ?> name="name-pro"/> </h5>
    <h5 class="card-title"><input type="text" value=<?php echo $row["desc"] ?> name="desc-pro"/> </h5>
    <h5 class="card-title"><input type="text" value=<?php echo $row["price"] ?> name="price-pro"/> </h5>
    
    <?php }}  ?> 
    <div class="">
              <select name="cat-pro" class="form-select" aria-label="Default select example">
                <?php 
                                            
                            $sql = "SELECT  id , name  FROM catigory";
                           $result = $conn->query($sql);
                                            
                            if ($result->num_rows > 0) {
                                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                              
                                     ?>
                            <option  value=<?php echo $row["id"]; ?> > <?php echo $row["name"]; ?>  </option> 
                                   
                                    <?php  }}  ?>
                                           </select>
                                        </div>
    
    <input name="update-data" type="submit" value="update"  class="btn btn-primary"/>
  </div>
  </form>
</div>

