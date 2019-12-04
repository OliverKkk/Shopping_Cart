<?php
  session_start();
 //connect to database
include('dbconn.php');
  
  if ($_GET[id] != "") {
     $delete_category = "delete from store_categories where
      id = $_GET[id] and session_id = '$PHPSESSID'";
     mysql_query($delete_category) or die(mysql_error());
  
      //redirect to showcart page
     header("Location: control_panel.php");
     exit;
  
  } else {
    print "Error!";
     exit;
  }
?>
