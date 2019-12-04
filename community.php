<?php
   //connect to server and select database
   include('dbconn.php');
  //gather the topics
   $get_topics = "select topic_id, topic_title,
topic_create_time,topic_owner from forum_topics order by topic_create_time desc";
 $get_topics_res = mysql_query($get_topics) or die(mysql_error());
 if (mysql_num_rows($get_topics_res) < 1) {
    //there are no topics, so say so
    $display_block = "<P><em>No topics exist.</em></p>";
  } else {
    //create the display string
    $display_block = "
    <table width=100% class=menuheaders>
    <tr>
     <th>TOPIC TITLE</th>
    <th># of POSTS</th>
    </tr>";
 
    while ($topic_info = mysql_fetch_array($get_topics_res)) {
        $topic_id = $topic_info['topic_id'];
         $topic_title = stripslashes($topic_info['topic_title']);
        $topic_create_time = time($topic_info['topic_create_time']);		
        $topic_owner = stripslashes($topic_info['topic_owner']);

        //get number of posts
        $get_num_posts = "select count(post_id) from forum_posts
             where topic_id = $topic_id";
       $get_num_posts_res = mysql_query($get_num_posts)
            or die(mysql_error());
        $num_posts = mysql_result($get_num_posts_res,0,'count(post_id)');
 
        //add to display
        $display_block .= "
        <tr>
       <td><a href=\"showtopic.php?topic_id=$topic_id\">
        <strong>$topic_title</strong></a><br>
        Created on ".date("D d M Y, \a\\t\ g.i a",$topic_create_time)." by $topic_owner</td>
      <td align=center>$num_posts</td>
        </tr>";
    }
 
    //close up the table
    $display_block .= "</table>";

 }
 ?>
<html>
<head>
<title>GIKOMBA MARKET PLACE :: FORUM</title>
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
    <td valign="top"><?php print $display_block; ?> <P>Would you like to <a href="addtopic.php">add a topic?</a></td>
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
