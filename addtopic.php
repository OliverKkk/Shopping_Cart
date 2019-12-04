<?php
  //check for required fields from the form
  if(isset($_POST['submit'])){
   if ((!$_POST[topic_owner]) || (!$_POST[topic_title])
      || (!$_POST[post_text])) {
						$msg="<center>Please fill all the details !!!</center>";
						print "<font color='red' size='1' face='Verdana, Arial, Helvetica, sans-serif'>$msg <br></font>";
						  exit();
   }
  include("dbconn.php");
 
 $check=mysql_query("select * from forum_topics where topic_title ='".$_POST['topic_title']."'");
					if(!$check){ echo "check".mysql_error(); exit;}
					$num_rows=mysql_num_rows($check);
					$checkarray=mysql_fetch_array($check);
					if($num_rows != 0 ){
					echo "<center><font size=1 face='Verdana, Arial, Helvetica, sans-serif'>The topic title  <font color=red><b>".$checkarray['topic_title']."</b></font>&nbsp;already exists. Please try again.</font></center>"; exit;}

 
  //create and issue the first query
 $add_topic = "insert into forum_topics values ('', '$_POST[topic_title]',now(), '$_POST[topic_owner]')";
 mysql_query($add_topic) or die(mysql_error());
  
  //get the id of the last query 
  $topic_id = mysql_insert_id();
  
 //create and issue the second query
  $add_post = "insert into forum_posts values ('', '$topic_id','$_POST[post_text]', now(), '$_POST[topic_owner]')";
  $result=mysql_query($add_post) ;
  if($result){
  //create nice message for user
header('location:community.php');
 }
 else
$msg = "<P>The <strong>$topic_title</strong> cannot be created.Try again!!!</p>";
 print "$msg";
}
  ?>
<html>
<head>
<title>GIKOMBA MARKET PLACE ::ADD TOPIC</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="design.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="57%" align="center" class="mainbody">
  <tr valign="top" class="mainbody"> 
    <td height="88" colspan="2"><div align="center"><img src="images/banner2.jpg" width="539" height="198" border="1"></div></td>
    <td width="28%" height="88" class="menuheaders"><div align="center">
        <p>GIKOMBA E-MARKETPLACE<br>
          <br>
          SHOP WITHIN YOUR CLICK <br>
          <br>
          CALL TOLL SERVICE:<br>
          +254 723 542 544<br>
          <br>
          EMAIL: info@gikombamarkeplace.com<br>
          <br>
          WEBSITE:<br>
          www.gikombamarketplace.co.ke</p>
      </div></td>
  </tr>
  <tr valign="top"> 
    <td colspan="3"><table width="100%">
        <tr valign="top"> 
          <td width="16%" height="22" class="menuheaders"><p><a href="index.php">Home</a></p></td>
          <td width="16%" class="menuheaders"><a href="whats_new.php">What's new?</a></td>
          <td width="16%" class="menuheaders"><a href="crazy_offers.php">Crazy 
            Offers</a></td>
          <td width="16%" class="menuheaders"><a href="account.php">My Account</a></td>
          <td width="16%" class="menuheaders">Forum</td>
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
    <td valign="top">Add a Topic</span>
<form method='post' action="<?php echo $_SERVER['PHP_SELF'] ?>">
 <p class="title"><strong>Your E-Mail Address:</strong><br>
 <input type="text" name="topic_owner" size=40 maxlength=150>
 <p class="title"><strong>Topic Title:</strong><br>
 <input type="text" name="topic_title" size=40 maxlength=150>
                          <P><span class="title"><strong>Post Text:</strong></span><br>
 <textarea name="post_text" rows=8 cols=40 wrap=virtual></textarea>
 <P><input type="submit" name="submit" value="Add Topic"></p>
 </form></td>
	</p>
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
