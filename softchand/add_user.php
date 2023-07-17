<?php 
include('partials/connection.php');
$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$pro = $_POST['pro'];
$procust = $_POST['procust'];
$cat = $_POST['cat'];
$sql = "INSERT INTO `developers` (`username`,`email`,`mobile`,`pro`,`procust`,`cat`) values ('$username', '$email', '$mobile', '$pro', '$procust', '$cat' )";


$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>