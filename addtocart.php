<?php
   session_start();
  
 //connect to database
 include ('dbconn.php');

  if ($_POST[sel_item_id] != "") {
   //validate item and get title and price
    $get_iteminfo = "select title from store_items
         where id = $_POST[sel_item_id]";
    $get_iteminfo_res = mysql_query($get_iteminfo)
         or die(mysql_error());
 
     if (mysql_num_rows($get_iteminfo_res) < 1) {
        //invalid id, send away
        header("Location: buy.php");
        exit;
    } else {
        //get info
        $item_title = mysql_result($get_iteminfo_res,0,'item_title');
  
        //add info to cart table
         $addtocart = "insert into store_shoppertrack values
         ('', '$PHPSESSID', '$_POST[sel_item_id]', '$_POST[sel_item_qty]',
          '$_POST[sel_item_size]', '$_POST[sel_item_color]', now())";
  
         mysql_query($addtocart);
  
         //redirect to showcart page
         header("Location: showcart.php");
         exit;
  
     }
  } else {
     //send them somewhere else
 header("Location: buy.php");
     exit;
  }
 ?>
