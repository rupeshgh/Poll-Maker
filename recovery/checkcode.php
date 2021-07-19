<?php 
session_start();
$email = $_SESSION['mail'];
include "db2.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="checkcode.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                   
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>


<?php 







if(isset($_POST['check'])){


$code=$_POST['otp'];



$sql="select * from registration ";

$st=$conn->query($sql);
$email = $_SESSION['mail'];

while($row=$st->fetch_assoc()){




    if($email==$row['email']){

        $cod=$row['otp'];


        if(password_verify($code,$cod)){
            
         






            header('location:changepass.php');
        }

        else{

            header('location:sendmail.php');

        }


    }
}






}








?>