<?php 

session_start();
if(!isset($_SESSION['username'])){

header('location:../html/home.html');

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Table with polls</title>
  <link rel="stylesheet" href="../css/home.css">
        <link rel="stylesheet" href="../css/search.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
      </head>
<body>
<header id="top">
        <nav id="nav">
            <div class="nav-header">
              <div class="logo">
                <a href="#"> <img src="../css/logo.png" height="60px" alt=""></a>
               
              </div>
              <!-- <img src="logo.png" class="logo" alt="logo"> -->
              <div class="links-container">
                <ul class="links">
                    
                    <li><a href="candidate.php">SelectMenu</a></li>
                    <li ><a href="../chat/chat_login.php">Chats</a></li>
                     <li><a href="logout.php">Logout</a></li>
                </ul>
                </div>
            </div>
           
          </nav>
          </header>

	<form action='poll_entry_check.php' 

method='post' id="search-form">
<div>
	<label for="Poll_name">Poll Name</label>
	
          <input id="poll_name" name="poll_name" 

type="text" required  >

         <label for="Poll_name">Poll Password</label>
        <input id="poll_pass" name="poll_pass" 

type="password"		  required  >
          
          <button type='submit'  

name='search1' class=" submit-btn">search</button>
</div>
</form>

<table>
	<tr>
		<td>id</td>
		<td>Poll_Name</td>
		<td>Poll_type</td>
		<td>Choose</td>
		
</tr>
	<?php
	 

$conn=mysqli_connect("localhost","root","",'test');

$sql="select id,Poll_Name,Poll_Type from poll";
$result=$conn->query($sql);

if($result->num_rows>0){
	
 while($row= $result->fetch_assoc()){
 	$id=$row['id'];
	
echo "<tr ><td >".$row["id"]."</td><td>".$row

['Poll_Name']."</td><td>".$row['Poll_Type']."</td> 

<td>
<form type='submit' action='search.php' method='post'>
<input type='hidden' name='pod' value=".$id.">
<button type='submit' name='submit1' class=' submit-btn'>login</button>

</form>

</td>
</tr>";
}
echo "</table" ;

}
else{
	echo "empty";
}

// $conn->close();
?>
</table>


<?php
	if(isset($_POST['submit1'])){
		
	$p_id=	mysqli_real_escape_string($conn,

$_POST['pod']);
		




?>
		<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
					<!--  

searching poll !-->
					<!--  

searching poll !-->
					<!--  

selecting any poll from a list of existing pole  !-->
					<!--  

selecting any poll from a list of existing pole  !-->




<form action='poll_entry_check.php' method='post' id="search-form">
	<label for="Poll_pass" text-align="centre">Choosen Poll-

Password</label>
	
          <input id="poll_pass" name="poll_pass" 

type="password"		width="50"   required  >
         
         <input type='hidden' name='pod' value='<?php 

echo($p_id) ?>'>
          
          <button type='submit'  

name='voter_access' class=" submit-btn">Enter</button>


</form>




	 <?php } 


else{
	
	header('search.php'); 
}
	 ?>



</body>
</html>

