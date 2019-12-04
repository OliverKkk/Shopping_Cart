<?php
	  //connect to database
   include('dbconn.php');
   
  $display_block = "<h1>Browse Categories</h1>
  <P>Select a category to see its items.</p>";
  
  //show categories first
  $get_cats = "select id, cat_title, cat_desc from
      store_categories order by cat_title";
  $get_cats_res = mysql_query($get_cats) or die(mysql_error());
  
  if (mysql_num_rows($get_cats_res) < 1) {
     $display_block = "<P><em>Sorry, no categories to browse.</em></p>";
  } else {
  
     while ($cats = mysql_fetch_array($get_cats_res)) {
         $cat_id = $cats[id];
         $cat_title = strtoupper(stripslashes($cats[cat_title]));
         $cat_desc = stripslashes($cats[cat_desc]);
  
          $display_block .= "<p><strong><a
          href=\"$_SERVER[PHP_SELF]?cat_id=$cat_id\">$cat_title</a></strong>
          <br>$cat_desc</p>";
 
         if ($_GET[cat_id] == $cat_id) {
             //get items
             $get_items = "select id, title, price
             from store_items where cat_id = $cat_id
              order by title";
             $get_items_res = mysql_query($get_items) or die(mysql_error());
  
             if (mysql_num_rows($get_items_res) < 1) {
                  $display_block = "<P><em>Sorry, no items in
                   this category.</em></p>";
              } else {
  
                  $display_block .= "<ul>";
  
                  while ($items = mysql_fetch_array($get_items_res)) {
                      $item_id = $items[id];
                      $item_title = stripslashes($items[title]);
                      $item_price = $items[price];
  
                      $display_block .= "<li><a
                       href=\"showitem.php?item_id=$item_id\">$item_title</a>
                       </strong> (\$$item_price)";
                  }
  
                  $display_block .= "</ul>";
             }
          }
      }
  }
?>
<html>
<head>
<title>GIKOMBA MARKET PLACE :: HELP</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="design.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="56%" align="center" class="mainbody">
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
        info@gikombamarketplace.com<br>
        <br>
        WEBSITE:<br>
        <br>
        www.gikombamarketplace.com</div></td>
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
          <td width="20%" class="menuheaders">Help</td>
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
    <td valign="top"><div align="center">
        <p align="left"><?php 
			
			// If the form has been submitted with a supplied keyword
if (isset($_POST['category'])) {
// Connect to server and select database
include('dbconn.php');
// Set the posted variables to convenient names
$keyword =$_POST['keyword'];
$category = $_POST['category'];
			
			$query = "SELECT id, cat_title, cat_desc FROM store_categories WHERE cat_title='$category'";
// Query the category table
$result = mysql_query($query);
$num_rows=mysql_num_rows($result);
// If records found, output firstname, lastname, and email field of each
if ($num_rows > 0) {
while ($row = mysql_fetch_object($result))
//echo "<tr><td>ID </td><td>CATEGORY TITLE </td><td><DESCRIPTION</td></tr>";
echo "<table align=center class=tabledesign> <tr ><td>$row->id </td><td>$row->cat_title </td><td>$row->cat_desc <br /></td></tr></table>";
} else {
echo "No results found.";
}
			
	}		
			?><br>
        </p>
      </div></td>
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
