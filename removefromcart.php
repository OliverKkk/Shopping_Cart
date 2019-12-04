<?php
  session_start();
 //connect to database
include('dbconn.php');
  
  if ($_GET[id] != "") {
     $delete_item = "delete from store_shoppertrack where
      id = $_GET[id] and session_id = '$PHPSESSID'";
     mysql_query($delete_item) or die(mysql_error());
  
      //redirect to showcart page
     header("Location: showcart.php");
     exit;
  
  } else {
     //send them somewhere else
     header("Location: buy.php");
     exit;
  }
?>
