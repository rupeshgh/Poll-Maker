<?php 
session_start();
include "db2.php";
$email = $_SESSION['mail'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- S<title>Create a New Password</title> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="changepass.php" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                    
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" minlength="5"placeholder="Create new password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" minlength="5" placeholder="Confirm your password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>



<?php

if(isset($_POST['change-password'])){


if($_POST['password']==$_POST['cpassword']){

$password=password_hash($_POST['password'],PASSWORD_DEFAULT);

$q="update registration set password='$password' where email='$email'";

$a=$conn->query($q);

header('location:../html/home.html');

}
else{
header('location:changepass.php');


}



}


 ?>