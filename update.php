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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update'])) {
    $id=$_POST["id"];

    $sql = "update FROM catigory WHERE id=".$id;

}

$sql= "SELECT * FROM catigory where id =".$id;
$result = $conn->query($sql);
       
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {


?>


<div class="card" style="width: 20rem;">
  <img src= <?php echo "img/".$row["image"]; ?> class="card-img-top" alt="...">
  <lable for=<?php echo "id".$row["id"]; ?>>cc</lable>
  <input type="file" id=<?php echo "id".$row["id"]; ?>  style="opcity:0;" /> 
  <div class="card-body">
    <h5 class="card-title"><input type="text" value=<?php echo $row["name"] ?> </h5>
    
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<?php }}  ?> 