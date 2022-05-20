<?php 

include "config.php";

 //query para ma select lahat ng data sa database
 $sql = "SELECT * FROM assign_vaccine";
    
 //para kunin ang laman ng database
 $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
    
    <title>Vaccination Status</title>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-vaccination-status.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="logo">
            <a href=""><h1>ADMIN DASHBOARD</h1></a>
        </div>

        <div class="nav">
        <label for="toggle">&#9776;</label>
        <input type="checkbox" id="toggle"/>
            <div class="menu">
                    <a href="admin-view-information.php"><span> View Information </span></a>
                    <a href="admin-vaccination-status.php"> Vaccination Status </a>
                    <a href="home.php"> Log Out </a>
            </div>
        </div>

<section>
    
        <div>
            <h1><span class="material-icons">table_view</span>VACCINE INFORMATION</h1>
        </div>
    
    <div class="patient">
            
        <form action="" method="POST">
    
            <table>
                <thead>
                    <tr>
                        <th>Vaccine ID.</th>
                        <th>Patient No.</th>
                        <th>Full Name</th>
                        <th>Vaccine Brand</th>
                        <th>Schedule</th>
                        <th>Status</th>
                        <th>Dosage Seq.</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody>	
                    <?php

                        if ($result->num_rows > 0) {
                            //code para ma display ng lahat ng data sa userinterface
                            while ($row = $result->fetch_assoc()) {
                    ?>
                                <tr>
                                <td><?php echo $row['ID']; ?></td>
                                <td><?php echo $row['patient_no']; ?></td>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['vaccine_brand']; ?></td>
                                <td><?php echo $row['schedule']; ?></td>
                                <td style="color: Green; font-weight: bold;"><?php echo $row['status']; ?></td>
                                <td><?php echo $row['dosage_seq']; ?></td>
                                <td>
                                    <a href="patient-status.php?id=<?php echo $row['ID'];?>"><span class="material-icons">assignment_turned_in</span></a>
                                    <a href="delete-assign-vaccine.php?id=<?php echo $row['ID'];?>"><span class="material-icons" id="delete">delete</span></a>
                                </td>
                                </tr>
                    <?php		}
                        }
                    ?>      	
                    </tbody>
            </table>
        </form>
    </div>

</section>

</body>
</html>