<?php 

include 'config.php';

error_reporting(0);
session_start();

if(isset($_POST['submit'])){
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $gender = ($_POST['gender']);
    $age = ($_POST['age']);

    $sql = "INSERT INTO vaccine_registration (firstname, lastname, contact, email, address, birthday, gender, age)
            VALUES ('$firstname','$lastname','$contact', '$email', '$address', '$birthday', '$gender', '$age')";

    // execute the query
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "<script>alert('Congratulations! Registration Successfully.')</script>";
    }else{
        echo "Error:". $sql . "<br>". $conn->error;
    }
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">

    <title>Register Form</title>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="register.css">
</head>
<body>


        <form class="box" action="" method="POST">

            <div class="close"><a href="home.php"><span class="material-icons">cancel</span></a></div>
            <h1>REGISTRATION FORM </h1>
            <input type="text" name="firstName" placeholder="First Name"  class="firstname" value=""required="0">
            <input type="text" name="lastName" placeholder="Last Name"  class="lastname" value="" required="0">
            <input type="text" name="address" placeholder="Complete Address"  class="address" value="" required="0">
            <input type="text" name="contact" placeholder="Contact Number"  class="contact"  value="" required="0">
            <input type="email" name="email" placeholder="Email" value="" class="email"  value="" required="0"> 
            <input type="date" name="birthday" placeholder="Birthday"  class="username"  value="" required="0" maxlength="12">
            <input type="text" name="gender" placeholder="Gender"  class="password"  required="0" maxlength="12">
            <input type="text" name="age" placeholder="Age"  class="confirm" required="0" maxlength="12">
            <input type="submit" name="submit" value="Register">
        </form>
        
    </body>
</body>
</html>