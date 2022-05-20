<?php 

include "config.php";

 //query para ma select lahat ng data sa database
 $sql = "SELECT * FROM vaccine_registration";
    
 //para kunin ang laman ng database
 $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

    <title>Admin | View Information</title>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-view-information.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <h1><span class="material-icons">table_view</span>VIEW INFORMATION</h1>
        </div>
    
    <div class="patient">
            
        <form action="" method="POST">
    
            <table>
                <thead>
                    <tr>
                        <th>Patient No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Birthday</th>
                        <th>Gender</th>
                        <th>Age</th>
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
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td><?php echo $row['contact']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['birthday']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td>
                                    <a href="assign-patient.php?id=<?php echo $row['ID'];?>"><span class="material-icons">assignment</span></a>
                                    <a href="delete-information.php?id=<?php echo $row['ID'];?>"><span class="material-icons" id="delete">delete</span></a>
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