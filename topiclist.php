<html>
<head>
<title>GIKOMBA MARKET PLACE :: SHOW TOPIC</title>
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
    <td width="23%" height="174" valign="top">&nbsp;</td>
    <td colspan="2" valign="top"> 
      <?php
   //connect to server and select database; we'll need it soon
   include('dbconn.php');
   
   //check to see if we're showing the form or adding the post
   if ($_POST[op] != "showpost") {
      // showing the form; check for required item in query string
     if (!$_GET[post_id]) {
         header("Location: topiclist.php");
         exit;
     }
  
       //still have to verify topic and post
     $verify = "select ft.topic_id, ft.topic_title from
      forum_posts as fp left join forum_topics as ft on
      fp.topic_id = ft.topic_id where fp.post_id = $_GET[post_id]";
 
     $verify_res = mysql_query($verify) or die(mysql_error());
      if (mysql_num_rows($verify_res) < 1) {
         //this post or topic does not exist
header("Location: community.php");
        exit;
    } else {
        //get the topic id and title
       $topic_id = mysql_result($verify_res,0,'topic_id');
        $topic_title = stripslashes(mysql_result($verify_res,
         0,'topic_title'));
        print "<html>
      <head>
        <title>GET ASSIGNMENT HELP ::Post Your Reply in: $topic_title</title>
         </head>
        <link href=styles.css rel=stylesheet type=text/css>

<BODY BGCOLOR=#FFFFFF LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>
<form method=post action=\"$_SERVER[PHP_SELF]\">
<table class=tabledesign align=center>
   <font color='blue' size='2' face='Verdana, Arial, Helvetica, sans-serif'> POST YOUR REPLY IN: </font><strong><font color='black' size='2' face='Verdana, Arial, Helvetica, sans-serif'>$topic_title</font></strong>
  <tr>
    <td><p><strong>Your E-Mail Address:</strong><br></td>
    <td><input type=\"text\" name=\"post_owner\" size=40 maxlength=150></td>
  </tr>
  <tr>
    <td> <P><strong>Post Text:</strong><br></td>
    <td><textarea name=\"post_text\" rows=8 cols=40 wrap=virtual></textarea></td>
  </tr>
  <tr>
    <td><input type=\"hidden\" name=\"op\" value=\"addpost\"></td>
    <td><input type=\"hidden\" name=\"topic_id\" value=\"$topic_id\">
</td>
  </tr>
  <tr>
    <td><P><input type=\"submit\" name=\"submit\" value=\"Add Post\"></p></td>
  </tr>
</table>
         </form>
         </body>
        </html>";
   }
} else if ($_POST[op] == "addpost") {
     //check for required items from form
    if ((!$_POST[topic_id]) || (!$_POST[post_text]) ||
      (!$_POST[post_owner])) {
         header("Location: community.php");
         exit;
     }
 
     //add the post
     $add_post = "insert into forum_posts values ('', '$_POST[topic_id]',
     '$_POST[post_text]', now(), '$_POST[post_owner]')";
    mysql_query($add_post) or die(mysql_error());
 
     //redirect user to topic
    header("Location: showtopic.php?topic_id=$topic_id");
    exit;
  }
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
