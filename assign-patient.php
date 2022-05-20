<?php

include 'config.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM vaccine_registration WHERE ID IN($id)";
    $result = $conn->query($sql);
    $row=mysqli_fetch_assoc($result);
    $id = $row['ID'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];

    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $vaccine = $_POST['vaccinename'];
        $schedule = $_POST['schedule'];
        $dosage = $_POST['dosage_seq'];

        $sql = "INSERT INTO assign_vaccine (patient_no, fullname, vaccine_brand, schedule, status, dosage_seq)
        VALUES ('$id','$fullname','$vaccine', '$schedule', 'Process','$dosage')";

        // execute the query
        $result = $conn->query($sql);

        if ($result == TRUE) {
            echo "<script>alert('Patient Schedule Assign Successfully!')</script>";
        }else{
            echo "Error:". $sql . "<br>". $conn->error;
        }
        $conn->close();
            }
?>

<!DOCTYPE html>
<html lang="en">

    <title>Assign Vaccination</title>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assign-patient.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<form class="box" action="" method="POST">
    <div class="close"><a href="admin-view-information.php"><span class="material-icons">cancel</span></a></div>
            <h1>Assign Vaccination</h1>
            <input type="text" name="fullname" value="<?php echo $row['firstname'];?> <?php echo $row['lastname'];?>" required="1">
            <select name="vaccinename" id="" required="1">
                <option value="">Select Vaccine Type</option>
                <option value="Sinovac">Sinovac</option>
                <option value="Pfizer">Pfizer</option>
                <option value="Astrazenica">Astrazenica</option>
                <option value="Jonhson">Jonhson</option>
                <option value="Sputnic">Sputnic</option>
            </select>
    
            <input type="date" name="schedule" placeholder=""required="1">
                <select name="dosage_seq" id="" required="1">
                <option value="">Select Dosage Seq.</option>
                <option value="1st Dose">1st Dose</option>
                <option value="2nd Dose">2nd Dose</option>
                
            </select>
            <input type="submit" name="submit" value="Assign" >
        </form>
</body>
</html>