<?php 

include 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE from assign_vaccine WHERE ID IN($id)";
    $result = $conn->query($sql);

    if($result){
        header("Location: admin-view-information.php");
    }else{
        die(mysqli_error($conn));
    }
}
?>