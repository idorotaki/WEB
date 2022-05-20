    <?php 

    include "config.php";

     //query para ma select lahat ng data sa database
     $sql = "SELECT * FROM assign_vaccine";
        
     //para kunin ang laman ng database
     $result = $conn->query($sql);

    ?>

    <!DOCTYPE html>
    <html lang="en">
        
        <title>Vaccine Schedule</title>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="admin-vaccination-status.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
     

            <div class="nav">
            <label for="toggle">&#9776;</label>
            <input type="checkbox" id="toggle"/>
                <div class="menu">
                       <div class="menu">
                    <a href="home.php"><span> Home </span></a>     
                    <a href="register.php"> Registration </a>
                    <a href="vaccineschedule.php">Vaccine Schedule</a> 
                    <a href="login.php"> Log In </a>
              </div>
            </div>
     <span style="float: right;">
            <form method="get">
                <input type="search" name="search" placeholder="Search anything..." />
                <button type="submit" name="btnSearch">Search</button>
            </form>
        </span>
        
    <section>
        
        
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
                                    
                                    </tr>
                        <?php       }
                            }
                        ?>          
                        </tbody>
                </table>
            </form>
        </div>

    </section>

    </body>
    </html>