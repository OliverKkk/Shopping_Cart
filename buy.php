<html>
<head>
<title>GIKOMBA MARKET PLACE :: SHOP AND BUY ITEMS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="design.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="72%" align="center" class="mainbody">
  <tr valign="top" class="mainbody"> 
    <td height="88" colspan="2"><div align="center"><img src="images/banner2.jpg" width="539" height="198" border="1"></div></td>
    <td width="28%" height="88" class="menuheaders"><div align="center">GIKOMBA 
        E-MARKETPLACE<br>
        <br>
        SHOP WITHIN YOUR CLICK <br>
        <br>
        CALL TOLL SERVICE:<br>
        +254 723 542 544<br>
        <br>
        EMAIL: <br>
        info@gikombamarketplace.com<br>
        <br>
        WEBSITE:<br>
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
    <td valign="top"><?php
session_start();
echo"<font face='Verdana' size='2' color=red >Welcome <font color=blue>$_SESSION[name]</font>|| <span class=style49
 id=clock>Thursday, January 15, 2009</span>
              <script type=text/javascript src=clock.js></script><A HREF=logout.php><br>Log out</A></center></font></span>
              
	</font>";
	  //connect to database
   include('dbconn.php');
  $msg = "<font face='Verdana' size='2'><P>Select a category to see its items.</p></font>";
  //show categories first
  $get_cats = "select id, cat_title, cat_desc from
      store_categories order by cat_title";
  $get_cats_res = mysql_query($get_cats) or die(mysql_error());
  
  if (mysql_num_rows($get_cats_res) < 1) {
     $msg = "<P><em>Sorry, no categories to browse.</em></p>";
  } else {
  
     while ($cats = mysql_fetch_array($get_cats_res)) {
         $cat_id = $cats[id];
         $cat_title = strtoupper(stripslashes($cats[cat_title]));
         $cat_desc = stripslashes($cats[cat_desc]);
  
          $msg .= "<p><a
          href=\"$_SERVER[PHP_SELF]?cat_id=$cat_id\">$cat_title</a>
          <br>$cat_desc</p>";
 
         if ($_GET[cat_id] == $cat_id) {
             //get items
             $get_items = "select id, title, price from store_items where cat_id = $cat_id
              order by title";
             $get_items_res = mysql_query($get_items) or die(mysql_error());
  
             if (mysql_num_rows($get_items_res) < 1) {
                  $msg = "<P><em>Sorry, no items in
                   this category.</em></p>";
              } else {
  
                  $display_block .= "<ul>";
  
                  while ($items = mysql_fetch_array($get_items_res)) {
                      $item_id = $items[id];
                      $item_title = stripslashes($items[title]);
                      $item_price = $items[price];
  
                      $msg .= "<li><a
                       href=\"showitem.php?item_id=$item_id\">$item_title</a>
                       </strong> (Ksh: $item_price)";
                  }
  
                  $msg .= "</ul>";
             }
          }
      }
  }
?>
 <?php print $msg; ?></td>
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
