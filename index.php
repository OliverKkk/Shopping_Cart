  <?php
	  include('dbconn.php');
  function listCategories(){
$query=mysql_query("select cat_title from store_categories order by cat_title");
//echo "<option value=''>- select -</option>";
while($result=mysql_fetch_array($query)){
echo "<option value='$result[cat_title]'>$result[cat_title]</option>";
}
  }
	  ?>
	  
<html>
<head>
<title>GIKOMBA MARKET PLACE :: WELCOME</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="design.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="57%" align="center" class="mainbody">
  <tr valign="top" class="mainbody"> 
    <td height="88" colspan="2"><div align="center"><img src="images/banner2.jpg" width="539" height="198"></div></td>
    <td width="28%" height="88" class="menuheaders"><div align="center"> GIKOMBA 
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
        www.gikombamarketplace.com</p> </div></td>
  </tr>
  <tr valign="top"> 
    <td colspan="3"><table width="100%">
        <tr valign="top"> 
          <td width="16%" height="22" class="menuheaders"><p>Home</p></td>
          <td width="16%" class="menuheaders"><a href="whats_new.php"> What's new?</a></td>
          <td width="16%" class="menuheaders"><a href="crazy_offers.php">Crazy Offers</a></td>
          <td width="16%" class="menuheaders"><a href="account.php">My Account</a></td>
          <td width="16%" class="menuheaders"><a href="community.php">Forum</a></td>
          <td width="20%" class="menuheaders"><a href="help.php">Help</a></td>
        </tr>
      </table></td>
  </tr>
  <tr valign="top"> 
    <td colspan="3"><table width="100%" class="tabledesign">
        <tr> 
          <td height="69" valign="top"><p align="right"> 
              <marquee behavior="scroll" dir="rtl">
              <font color="#0000CC" size="2" face="Verdana, Arial, Helvetica, sans-serif">Shop 
              within your click</font> 
              </marquee>
            </p>
<form action='search.php' method=post>
              <div align="right">
                <input type=hidden name=seenform value=y>
                SEARCH BY CATEGORY: 
                <select name="category">
      option>
                  <?php include('dbconn.php');
				echo listCategories();
?></option>
                  
                </select>
                <input name="submit" type=submit id="submit" value=search>
              </div>
            </form>
          </td>
        </tr>
      </table></td>
	
  </tr>
  <tr> 
    <td width="23%" height="154" valign="top"><table width="100%" align="center" class="tabledesign">
        <tr> 
          <td valign="top"><a href="help.php">How to buy</a></td>
        </tr>
        <tr> 
          <td height="14" valign="top"><a href="signup.php">join us</a></td>
        </tr>
      </table></td>
    <td valign="top"><p><strong>WELCOME TO GIKOMBA MARKET PLACE</strong><br>
        Gikomba website allows you to buy products based on your choice. All products 
        are found in the categories section. Feel free to always shop with us.<br>
        With the vision 2030, the government is tirelessly enhancing technology 
        through offering online resources that will better our lives. To add on 
        that, our way of lives have changed and we are able to carry out transactions 
        online without the nessecity of going to the designated place.<br>
        Gikomba market place is here to offer you that solution.<br>
        Thank you.</p>
      </td>
    <td valign="top"><div align="left"><img src="images/images%20zote%20gikosh/gikosh/images.jpg" width="200" height="150" border="1"></div></td>
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
