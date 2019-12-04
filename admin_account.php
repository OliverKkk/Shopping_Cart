<html>
<head>
<title>GIKOMBA MARKET PLACE ::ADMINISTRATOR LOGIN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="design.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="57%" align="center" class="mainbody">
  <tr valign="top" class="mainbody"> 
    <td height="88"><div align="center"><img src="images/banner2.jpg" width="539" height="198" border="1"></div></td>
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
        www.gikombamarketplace.co.ke</div></td>
  </tr>
  <tr valign="top"> 
    <td colspan="2"><table width="100%">
        <tr valign="top"> 
          <td width="16%" height="22" class="menuheaders"><p><a href="index.php">Home</a></p></td>
          <td width="16%" class="menuheaders"><a href="whats_new.php">What's new?</a></td>
          <td width="16%" class="menuheaders"><a href="crazy_offers.php">Crazy 
            Offers</a></td>
          <td width="16%" class="menuheaders">My Account</td>
          <td width="16%" class="menuheaders"><a href="community.php">Forum</a></td>
          <td width="20%" class="menuheaders"><a href="help.php">Help</a></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="149" colspan="2" valign="top"><div align="center">:: ADMINISTRATOR 
        LOGIN :: </div>
      <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <table width="41%" align="center" class="tabledesign">
          <tr> 
            <td width="34%" valign="top">Username:</td>
            <td width="66%" valign="top"><input name="username" type="text" id="username" size="30"></td>
          </tr>
          <tr> 
            <td valign="top">Password:</td>
            <td valign="top"><input name="password" type="password" id="password" size="30"></td>
          </tr>
          <tr> 
            <td height="14" valign="top"><input name="submit" type="submit" id="submit" value="Submit"></td>
            <td valign="top"><input type="reset" name="reset" value="Reset"></td>
          </tr>
        </table>
      </form><?php
	session_start();
$_SESSION['name']=$_POST['username'];
$_SESSION['pass']=$_POST['password'];
	 
		  //check to ensure that username and password are entered correctly
		  
			if(isset($_POST['submit'])){
			//ensure that the user has entered data in all fields
						if(!$_POST['username'] || !$_POST['password']){
						$msg="<center>Please fill all the details to successfully log in</center>";
						print "<font color='red' size='1' face='Verdana, Arial, Helvetica, sans-serif'>$msg <br></font>";
						exit;
						}
						if ($_POST['username']=='essie' && $_POST['password']=='essie')
						{
						header("location:control_panel.php");
						}
						else
						{
						$msg="<center>Sorry.We could not log you in. Try again</center>";
						print "<font color='red' size='1' face='Verdana, Arial, Helvetica, sans-serif'>$msg <br></font>";
//						exit;
						}
								 
			}
		?>
</td>
  </tr>
  <tr valign="top"> 
    <td height="16" colspan="2"><div align="center"> 
        <p class="text">Copyright 2011 gikombamarketplace.co.ke Kenya, All Rights 
          Reserved | Terms | Privacy | Contact Us | Live Help Offline</p>
      </div></td>
  </tr>
</table>
</body>
</html>
