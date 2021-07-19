
<?php

include "db.php";
session_start();

 ?>


<!DOCTYPE html>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/search.css">


</head>

<body>
  <div class="wrapper">
    <header id="top">
      <nav id="nav">
        <div class="nav-header">
          <div class="logo">
            <a href="#"> <img src="../css/logo.png" height="60px" alt=""></a>

          </div>
          <!-- <img src="logo.png" class="logo" alt="logo"> -->
          <div class="links-container">
            <ul class="links">
              
            </ul>
          </div>
        </div>

      </nav>
    </header>
    <div class="main-container">


           <marquee scrollamount="20"> <h1>Winner of <?php echo($_SESSION['curr_poll']);?> is <?php echo($_SESSION['win'] );?>
              with <?php echo($_SESSION['count']);?> votes.
               


            </h1>
          </marquee>

<br>
<br>
          <h1>
             </div>
             
             <table class="table">
               
               
              <tr>
     <td>Candidate</td>
      <td>Image</td>
      <td>Votes</td>
    
</tr>


<?php 

$sql="select * from poll";
$result=$conn->query($sql);

if($result->num_rows>0){
  
 while($row= $result->fetch_assoc()){
  if($row['Poll_Name']==$_SESSION['curr_poll']){?>
  
<tr >
  <td ><?php echo $row["c1"] ?> </td>


<td><img src="uploads/voters<?php echo $row['c1_image'];  ?> " width="200px" height="200px"> </td>



<td><?php echo $row['c1_value']; ?></td> <td>


</td>
</tr>


<tr >
  <td ><?php echo $row["c2"] ?> </td>


<td><img src="uploads/voters<?php echo $row['c2_image'];  ?> " width="200px" height="200px"> </td>



<td><?php echo $row['c2_value']; ?></td> <td>


</td>
</tr>

<?php 

if(!($row['c3']=='')){ ?>
<tr>

  <td><?php echo $row['c3'];  ?></td>
  <td><img src="uploads/voters<?php echo $row['c3_image'];  ?> " width="200px" height="200px"> </td>
 
<td><?php echo $row['c3_value']; ?></td> <td>

</tr>


<?php }?>



<?php 

if(!($row['c4']=='')){ ?>
<tr>

  <td><?php echo $row['c4'];  ?></td>
  <td><img src="uploads/voters<?php echo $row['c4_image'];  ?> " width="200px" height="200px"> </td>
  <td><?php echo $row['c4_value']; ?></td> <td>
</tr>


<?php }?>




<?php 

if(!($row['c5']=='')){ ?>
<tr>

  <td><?php echo $row['c5'];  ?></td>
  <td><img src="uploads/voters<?php echo $row['c5_image'];  ?> " width="200px" height="200px"> </td>
  <td><?php echo $row['c5_value']; ?></td> <td>
</tr>


<?php }?>



<?php
}
break;
}

}

?>



            </table>
          </div>
         
        </h1>



        </div>
  </div>
  <footer>
    <div class="footer">
      <div class="footer-content">
        <div class="footer-section about">
          <h1 class="about">About</h1>
          <p class="home-para">
            PollMaker is a web based application that provides a platform for users to create various types of polls.
            it helps in capturing powerful feedback instantly
          </p>
          <div class="social">
            <h1>Contact Us</h1>
            <div class="social-links">
              <a href=""> <i class="fab fa-instagram"></i></a>
              <a href=""><i class="fab fa-facebook"></i></a>
              <a href=""><i class="fab fa-twitter-square"></i></a>
            </div>
          </div>

        </div>
        <div class="footer-section services">
          <h1> Our Services</h1>
          <div class="list">
            <ul>
              <li><a href="createpoll.html">Create Poll</a></li>
              <li><a href="">Vote</a></li>
              <li><a href="">Share the Link</a></li>
              <li><a href="">Evaluate Results</a></li>
            </ul>
          </div>
          <div class=" team">
            <h1>Our Team</h1>
            <div class="list">
              <ul>
                <li>Rshijuta Pokherel</li>
                <li>Rupesh Ghorashainee</li>
                <li>Sailesh Thapa</li>
                <li>Shreya Shrestha</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-section feedback">
          <h1 class="feed">FeedBack</h1>
          <form action="home.html" method="post">
            <input type="email" class="text-input contact-input" placeholder="Your email address" id="email"
              name="email">
            <textarea name="message" class="text-input contact-input" placeholder="Your message" id="message" cols="30"
              rows="10"></textarea>
            <button class="btn btn-big" id="btn-big">
              <i class="far fa-envelope"> Send </i>
            </button>

          </form>

        </div>

      </div>
      <div class="footer-bottom">
        &copy; KECminorproject
      </div>
    </div>
  </footer>

</body>

</html>