<?php 


session_start();
include "db1.php";

?>



<html>  
    <head>  
        <title>Chat Application using PHP Ajax Jquery</title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
   <br />
   
   <h3 align="center">Welcome to chat</a></h3><br />
   <br />
   
   <div class="table-responsive">
    <h4 align="center">Online User</h4>
    <div class="col-md-2 col-sm-3">
      <input type="hidden" id="is_active_group_chat_window" value="no"/>
      <button type="button" name="group_chat"
      id="group_chat" class="btn btn-waring btn-xs">Group Chat </button>


    </div>
    <p align="right">Hi - <?php echo $_SESSION['username']; ?> - <a href="logout.php">Logout</a></p>

    <div id="user_detail"></div>
    <div id="user_model_details"></div>
   </div>
  </div>
    </body>  

</html>

<div id ="group_chat_dialog" title="Group Chat Window">
  
<div id="group_chat_history" style="height:400px;border:1px solid #ccc; overflow-y:scroll;margin-bottom:24px;padding:16px"></div>

<div class="form-group">
  <textarea name="group_chat_message" id="group_chat_message" class="form-control"></textarea>
</div>

<div class="form-group" align="right">
  <button type="button" name="send_group_chat" class="btn btn-info" id="send_group_chat">Send</button>
</div>


</div>

    <script >
    	
    	$(document).ready(function(){
        fetch_user();

        setInterval(function(){
          update_last_activity();
          fetch_user();
          update_chat_history_data();
          fetch_group_chat_history();



        },5000);


    		function fetch_user(){
    			$.ajax({

    				url:"fetch_user.php",
    				method:"POST",
    				success:function(data){
    					$('#user_detail').html(data);
                                  }
    			         })
    		  }



function update_last_activity(){

$.ajax({
        url:"update_last_activity.php",
        success:function(){




        }




})


}



 function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';


modal_content +=fetch_user_chat_history(to_user_id);


  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:400
  });
  $('#user_dialog_'+to_user_id).dialog('open');
 });



$(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  $.ajax({
   url:"insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message},
   success:function(data)
   {
    $('#chat_message_'+to_user_id).val('');
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 });


 function fetch_user_chat_history(to_user_id)
 {
  $.ajax({
   url:"fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).html(data);
   }
  });
 }


function update_chat_history_data(){

$('.chat_history').each(function(){

var to_user_id=$(this).data('touserid');
fetch_user_chat_history(to_user_id);

});


}




$('#group_chat_dialog').dialog({


  autoOpen:false,
  width:400

});

$('#group_chat').click(function(){


  $('#group_chat_dialog').dialog('open');
$('#is_active_group_chat_window').val('yes');
  fetch_group_chat_history();

});


$('#send_group_chat').click(function(){

var chat_message=$('#group_chat_message').val();
var action='insert_data';

if(chat_message !=''){


  $.ajax({
url:"group_chat.php",
method:'POST',
data:{chat_message:chat_message,action:action},
success:function(data){

  $('#group_chat_message').val('');
  $('#group_chat_history').html(data);
}


  })
}

});


function fetch_group_chat_history()
{
 var group_chat_dialog_active = $('#is_active_group_chat_window').val();
 var action = "fetch_data";
 if(group_chat_dialog_active == 'yes')
 {
  $.ajax({
   url:"group_chat.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#group_chat_history').html(data);
   }
  })
 }
}





});





    </script>