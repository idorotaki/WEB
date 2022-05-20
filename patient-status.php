<?php

include 'config.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM assign_vaccine WHERE ID IN($id)";
    $result = $conn->query($sql);
    $row=mysqli_fetch_assoc($result);
    $vaccine = $row['vaccine_brand'];
    $fullname = $row['fullname'];
    $schedule = $row['schedule'];
    $dosage = $row['dosage_seq'];

    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $vaccine = $_POST['vaccinename'];
        $schedule = $_POST['schedule'];
        $status = $_POST['status'];
        $dosage = $row['dosage_seq'];

        $sql = "UPDATE assign_vaccine
                SET status = '$status'
                WHERE ID = $id;";

        // execute the query
        $result = $conn->query($sql);

        if ($result == TRUE) {
            echo "<script>alert('Patient Status Updated Successfully!')</script>";
        }else{
            echo "Error:". $sql . "<br>". $conn->error;
        }
        $conn->close();
            }
?>

<!DOCTYPE html>
<html lang="en">

    <title>Vaccination Status</title>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="patient-status.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<form class="box" action="" method="POST">
    <div class="close"><a href="admin-vaccination-status.php"><span class="material-icons">cancel</span></a></div>
            <h1>Vaccination Status</h1>
            <input type="text" name="fullname" value="<?php echo $row['fullname'];?>" required="1">
            <input type="text" name="vaccinename" value="<?php echo $row['vaccine_brand'];?>" required="1">
            <input type="text" name="schedule" value="<?php echo $row['schedule'];?>" required="1" style="width: 130px">
            <select name="status" id="">
                <option value="">Select Status</option>
                <option value="Process">Process</option>
                <option value="Vaccinated">Vaccinated Status</option>
            </select>
              <input type="text" name="dosage" value="<?php echo $row['dosage_seq'];?>" required="1">
            <input type="submit" name="submit" value="Submit" >
        </form>
</body>
</html>