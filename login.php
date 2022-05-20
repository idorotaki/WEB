<?php 

include 'config.php';

error_reporting(0);
session_start();

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = ($_POST['password']);

	$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $username;
		header("Location: admin-view-information.php");
	} else {
		echo "<script>alert('Woops! Incorrect Username or Password.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

    <title> Admin Log In </title>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<script>
    function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
    x.type = "text";
    } else {
    x.type = "password";
    }
}
</script>

    <body>

        <form class="box" action="" method="POST">
            <div class="close"><a href="home.php"><span class="material-icons">cancel</span></a></div>
            <h1> <span class="material-icons">admin_panel_settings</span> Admin LogIn</h1>
                <input type="text"  name ="username" placeholder="Username" value="" required="1">
                <input type="password" id="myInput" name="password" placeholder="Password" value="" required="1">
            <div class="checkbox">
                <input type="checkbox" onclick="myFunction()">Show Password    
            </div> 
                <input type="submit" name="login" value="Login">
        </form>
        
        
    </body>
</html>