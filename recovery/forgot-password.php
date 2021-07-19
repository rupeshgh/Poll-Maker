
<?php 
include "db2.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Forgot Password</title> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="forgot-password.php" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    
                    <div class="form-group">
                        <input class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php 


if(isset($_POST['check-email'])){

$t=1;
    $mail=$_POST['email'];


    $q="select * from registration";

    $r=$conn->query($q);


    while($res=$r->fetch_assoc()){


        if($res['email']==$mail){

            $_SESSION['mail']=$mail;
            $t=0;
            header('location:sendmail.php');


        }


    }

if($t=1){

    echo('Email doesnt exist');
}
    


    
}


?>