<?php 
include "db1.php";
session_start();



if($_POST["action"] == "insert_data")
{
 $data = array(
  'from_user_id'  => $_SESSION["u_id"],
  'chat_message'  => $_POST['chat_message'],
  'status'   => '1'
 );
$k=1;
$stmt=$conn->prepare('INSERT INTO chat_message 
( from_user_id, chat_message, status)  values (?,?,?)');
		$stmt->bind_param("sss",$_SESSION['u_id'],$_POST['chat_message'], $k);
		$stmt->execute();
 
  echo fetch_group_chat_history($conn);
 

}

if($_POST["action"] == "fetch_data")
{
 echo fetch_group_chat_history($conn);
}



?>