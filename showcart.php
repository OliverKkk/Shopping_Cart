<?php session_start(); ?>	
<html>
<head>
<title>GIKOMBA MARKET PLACE :: SHOPPING CART - SHOW CART</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="design.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="57%" align="center" class="mainbody">
  <tr valign="top" class="mainbody"> 
    <td height="88" colspan="2"><div align="center"><img src="images/banner2.jpg" width="539" height="198" border="1"></div></td>
    <td width="28%" height="88" class="menuheaders"><div align="center">GIKOMBA 
        E-MARKETPLACE<br>
        <br>
        SHOP WITHIN YOUR CLICK <br>
        <br>
        CALL TOLL SERVICE:<br>
        <br>
        +254 723 542 544<br>
        <br>
        EMAIL: <br>
        <br>
        info@gikombamarketing.com<br>
        <br>
        WEBSITE:<br>
        <br>
        www.gikombamarketplace.co.ke</div></td>
  </tr>
  <tr valign="top"> 
    <td colspan="3"><table width="100%">
        <tr valign="top"> 
          <td width="16%" height="22" class="menuheaders"><p><a href="index.php">Home</a></p></td>
          <td width="16%" class="menuheaders"><a href="whats_new.php">What's new?</a></td>
          <td width="16%" class="menuheaders"><a href="crazy_offers.php">Crazy 
            Offers</a></td>
          <td width="16%" class="menuheaders"><a href="account.php">My Account</a></td>
          <td width="16%" class="menuheaders"><a href="community.php">Forum</a></td>
          <td width="20%" class="menuheaders"><a href="help.php">Help</a></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="23%" height="159" valign="top"><table width="100%" align="center" class="tabledesign">
        <tr> 
          <td valign="top"><a href="help.php">How to buy</a></td>
        </tr>
        <tr> 
          <td height="14" valign="top"><a href="signup.php">join us</a></td>
        </tr>
      </table></td>
    <td valign="top"> 
      <?php
session_start();
echo"<font face='Verdana' size='2' color=red >Welcome <font color=blue>$_SESSION[name]</font>|| <span class=style49
 id=clock>Thursday, January 15, 2009</span>
              <script type=text/javascript src=clock.js></script><A HREF=logout.php><br>Log out<br></A></center></font></span>
              
	</font>";
   //connect to database

  $msg = "<h2>Your Shopping Cart</h2>";
    include('dbconn.php');
  $get_cart = "select st.id, si.title, si.price, st.sel_item_qty,
  st.sel_item_size, st.sel_item_color from store_shoppertrack as st
  left join store_items as si on si.id = st.sel_item_id where
  session_id = '$PHPSESSID'";
  
  $get_cart_res = mysql_query($get_cart) or die(mysql_error());
//Set up running totals and an empty array for the output

  $counter = 0;
  $amount=0;
  $table = array();
  //$totalOrders = 0;
  //$totalAmount = 0;

  // Get the query rows, and put them in the table
  while ($row = mysql_fetch_array($get_cart_res))
  {
    // Counts the total number of rows output
    $counter++;
   // Add current query row to the array of customer information
          //"Total Amount"=>$row["SUM(price)"]);
    // Update running totals
    $totalOrders += $row["MAX(id)"];
  }
  // Today's date is used in the table heading
  //$date = date("d M Y");
  // Show totals
  echo "Total orders: {$counter}<br>";
  $get_cart_res = mysql_query($get_cart) or die(mysql_error());
 if (mysql_num_rows($get_cart_res) < 1) {
     //print message
     $msg .= "<P>You have no items in your cart.
     Please <a href=\"buy.php\">continue to shop</a>!</p>";
  
  } else {
      //get info and build cart display
      $msg .= "
      <table align=center class=tabledesign>
     <tr valign=top>
     <th><font color='red' size='2' face='Verdana, Arial, Helvetica, sans-serif'>Title</font></th>
     <th><font color='red' size='2' face='Verdana, Arial, Helvetica, sans-serif'>Size</font></th>
     <th><font color='red' size='2' face='Verdana, Arial, Helvetica, sans-serif'>Color</font></th>
     <th><font color='red' size='2' face='Verdana, Arial, Helvetica, sans-serif'>Price</font></th>
    <th><font color='red' size='2' face='Verdana, Arial, Helvetica, sans-serif'>Quantity</font></th>
     <th><font color='red' size='2' face='Verdana, Arial, Helvetica, sans-serif'>Total Price</font></th>
     <th><font color='red' size='2' face='Verdana, Arial, Helvetica, sans-serif'>Action</font></th>
     </tr>";
  
     while ($cart = mysql_fetch_array($get_cart_res)) {
         $id = $cart['id'];
         $item_title = stripslashes($cart['title']);
         $item_price = $cart['price'];
         $item_qty = $cart['sel_item_qty'];
         $item_color = $cart['sel_item_color'];
         $item_size = $cart['sel_item_size'];
  
         $total_price = sprintf("%.02f", $item_price * $item_qty);
 
         $msg .= "<tr valign=top>
         <td align=center><font color='black' size='1' face='Verdana, Arial, Helvetica, sans-serif'>$item_title </font><br></td>
         <td align=center><font color='black' size='1' face='Verdana, Arial, Helvetica, sans-serif'>$item_size </font><br></td>
         <td align=center><font color='black' size='1' face='Verdana, Arial, Helvetica, sans-serif'>$item_color</font> <br></td>
         <td align=center><font color='black' size='1' face='Verdana, Arial, Helvetica, sans-serif'>Ksh: $item_price</font> <br></td>
         <td align=center><font color='black' size='1' face='Verdana, Arial, Helvetica, sans-serif'>$item_qty</font> <br></td>
         <td align=center><font color='black' size='1' face='Verdana, Arial, Helvetica, sans-serif'>Ksh: $total_price</font></td>
         <td align=center><font color='black' size='1' face='Verdana, Arial, Helvetica, sans-serif'><a href=\"removefromcart.php?id=$id\">remove</a></font></td>
         </tr>
		 ";
     }

     $msg .= "<tr><td align=center><font color='black' size='1' face='Verdana, Arial, Helvetica, sans-serif'><a href='buy.php'>Add another item?</a></font></td></tr></table>";
  }

	
?>
      <?php 
 print "$msg";
 
 include('dbconn.php');
	  
	  $query="SELECT SUM(price) FROM store_items";
	  $result=mysql_query($query);
	    while ($row = mysql_fetch_array($result))
  {
    // Counts the total number of rows output
    $amount++;
   // Add current query row to the array of customer information
          //"Total Amount"=>$row["SUM(price)"]);
    // Update running totals
    $totalAmount= $row["SUM(price)"];
 print "<font color=black>Total Amount Ksh:".$totalAmount."</font>";
  }
	  
 ?>
 
     </td><br>
<br>

	
    <td valign="top">&nbsp;</td>
  </tr>
  <tr valign="top"> 
    <td height="16" colspan="3"><div align="center"> 
        <p class="text">Copyright 2011 gikombamarketplace.co.ke Kenya, All Rights 
          Reserved | Terms | Privacy | Contact Us | Live Help Offline</p>
      </div></td>
  </tr>
</table>
</body>
</html>
