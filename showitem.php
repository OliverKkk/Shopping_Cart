<?php session_start(); ?>	
<html>
<head>
<title>GIKOMBA MARKET PLACE :: SHOW ITEMS</title>
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
    <td width="23%" height="174" valign="top"><table width="100%" align="center" class="tabledesign">
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
              <script type=text/javascript src=clock.js></script><A HREF=logout.php><br>Log out</A></center></font></span>
              
	</font>";

 //connect to database
require('dbconn.php');
  $msg = "<h3><font size=3 face='Verdana, Arial, Helvetica, sans-serif'>My Store - Item Detail</font></h3>";
  
  $get_item = "select c.cat_title, si.title, si.price,
si.description, si.image from store_items as si left join
store_categories as c on c.id = si.cat_id where si.id = $_GET[item_id]";

  //validate item
 $get_item_res = mysql_query($get_item) or die (mysql_error());

 if (mysql_num_rows($get_item_res) < 1) {
   //invalid item
    $msg .= "<P><em>Invalid item selection.</em></p>";
 } else {
   //valid item, get info
     $item_title = stripslashes(mysql_result($get_item_res,0,'title'));
    $item_price = mysql_result($get_item_res,0,'price');
    $item_desc = stripslashes(mysql_result($get_item_res,0,'description'));
   $item_image = mysql_result($get_item_res,0,'image');
 
    //make breadcrumb trail
   $msg .= "<P><strong><font size=2 color='black' face='Verdana, Arial, Helvetica, sans-serif'>Product name:</font></strong></em>
   <font size=2 color='blue' face='Verdana, Arial, Helvetica, sans-serif'>$item_title</font></p>
 
    <table cellpadding=3 cellspacing=3>
    <tr>
    <td valign=middle align=center><img src=\"$item_image\" border=1></td>
    <td valign=middle><P><strong><font size=2 color='black' face='Verdana, Arial, Helvetica, sans-serif'>Description:</font></strong><br><font size=2 color='blue' face='Verdana, Arial, Helvetica, sans-serif'>$item_desc</font></p>
    <P><strong><font size=2 color='black' face='Verdana, Arial, Helvetica, sans-serif'>Price:</font></strong><font size=2 color='blue' face='Verdana, Arial, Helvetica, sans-serif'> Ksh: $item_price</font></p>
	<form method=post action=\"addtocart.php\">";
	
	//get colors
    $get_colors = "select item_color from store_item_color";
    $get_colors_res = mysql_query($get_colors) or die(mysql_error());
 
    if (mysql_num_rows($get_colors_res) > 0) {

        $msg .= "<P><strong><font size=2 color='black' face='Verdana, Arial, Helvetica, sans-serif'>Available Colors:</font></strong>
       <select name=\"sel_item_color\">";

        while ($colors = mysql_fetch_array($get_colors_res)) {
             $item_color = $colors['item_color'];
           $msg .=
             "<option value=\"$item_color\">$item_color</option>";
         }

       $msg .= "</select>";
   }

//get sizes
    $get_sizes = "select item_size from store_item_size";
    $get_sizes_res = mysql_query($get_sizes) or die(mysql_error());
 
     if (mysql_num_rows($get_sizes_res) > 0) {
 
         $msg .= "<P><strong><font size=2 color='black' face='Verdana, Arial, Helvetica, sans-serif'>Available Sizes:</font></strong>
         <select name=\"sel_item_size\">";
 
         while ($sizes = mysql_fetch_array($get_sizes_res)) {
             $item_size = $sizes['item_size'];
               $msg .= "
                  <option value=\"$item_size\">$item_size</option>";
         }
 
         $msg .= "</select>";
     }
 
$msg .= "
     <P><strong><font size=2 color='black' face='Verdana, Arial, Helvetica, sans-serif'>Select Quantity:</font></strong>
    <select name=\"sel_item_qty\">";

    for($i=1; $i<11; $i++) {
       $msg .= "<option value=\"$i\">$i</option>";
    }
$msg .= "
    </select>
     <input type=\"hidden\" name=\"sel_item_id\" value=\"$_GET[item_id]\">
     <P><input type=\"submit\" name=\"submit\" value=\"Add to Cart\"></p>
     </form>
      </td>
     </tr>
     </table>";
 }
	
?>
      <?php 
 print "$msg";
 ?>
    </td>
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
