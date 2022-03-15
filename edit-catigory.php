<?php 

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

if (isset($_POST['delete'])) {
    echo "delet";
    $id=$_POST["id"];
    $sql = "DELETE FROM catigory WHERE id=".$id;

if ($conn->query($sql) === TRUE) {

    echo "successful deleting record: ";
} else {
  echo "Error deleting record: " . $conn->error;
}


}

?>

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
    <!-- Dropdown Card Example -->
    <div class="row">

    <?php 
       
       $sql = "SELECT * FROM catigory";
       $result = $conn->query($sql);
       
       if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
    ?>
    <div class=" col-md-5  me-4  card shadow mb-4" style="margin-left: 21px;">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"> <?php echo $row["name"]; ?></h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">

                                            <form action="#" method="POST">
                                            <input type="hidden" name="id" value=<?php echo $row["id"]; ?> />  
                                           <input type="submit"  name="delete" class="dropdown-item" value="delete"/>
                                           </form>
                                           
                                           <form action="update-cat.php" method="post">
                                           <input type="hidden" name="id" value=<?php echo $row["id"]; ?> />
                                           <input type="submit" name="update" class="dropdown-item" value="Update" >
                                            
                                           </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                   <img src=<?php echo "img/".$row["image"]; ?>>
                                      
                                </div>
                            </div>
    <?php }}?>
 </div> <!--end row -->
                            <script src="vender/jquery/jquery.min.js"></script>
    <script src="vender/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vender/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="vender/js/sb-admin-2.min.js"></script>       
</body>
</html>