<?php
  //check for required info from the query string
   if (!$_GET[topic_id]) {
     header("Location: topiclist.php");
    exit;
  }
  //connect to server and select database
include('dbconn.php');
  //verify the topic exists
  $verify_topic = "select topic_title from forum_topics where
      topic_id = $_GET[topic_id]";
  $verify_topic_res = mysql_query($verify_topic)
      or die(mysql_error());
 
  if (mysql_num_rows($verify_topic_res) < 1) {
     //this topic does not exist
    $display_block = "<P><em>You have selected an invalid topic.
     Please <a href=\"topiclist.php\">try again</a>.</em></p>";
 } else {
     //get the topic title
    $topic_title = stripslashes(mysql_result($verify_topic_res,0,
          'topic_title'));
 
    //gather the posts
    $get_posts = "select post_id, post_text, date_format(post_create_time,
          '%b %e %Y at %r') as fmt_post_create_time, post_owner from
         forum_posts where topic_id = $_GET[topic_id]
         order by post_create_time asc";
 
    $get_posts_res = mysql_query($get_posts) or die(mysql_error());
 
    //create the display string
    $display_block = "
     <P>Showing posts for the <strong>$topic_title</strong> topic:</p>
 
     <table width=100% class=tabledesign>
     <tr>
     <th>AUTHOR</th>
     <th>POST</th>
    </tr>";
  
     while ($posts_info = mysql_fetch_array($get_posts_res)) {
         $post_id = $posts_info['post_id'];
        $post_text = nl2br(stripslashes($posts_info['post_text']));
         $post_create_time = $posts_info['fmt_post_create_time'];
         $post_owner = stripslashes($posts_info['post_owner']);
  
         //add to display
         $display_block .= "
         <tr>
         <td width=35% valign=top>$post_owner<br>[$post_create_time]</td>
         <td width=65% valign=top>$post_text<br><br>
          <a href=\"replytopost.php?post_id=$post_id\"><strong>REPLY TO
         THIS POST</strong></a></td>
         </tr>";
     }
  
     //close up the table
     $display_block .= "</table>";
  }
 ?>

<html>
<head>
<title>GIKOMBA MARKET PLACE :: SHOW TOPIC</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="design.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="57%" align="center" class="mainbody">
  <tr valign="top" class="mainbody"> 
    <td width="23%" height="88"><div align="center"><img src="images/banner2.jpg" width="539" height="198" border="1"></div></td>
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
    <td colspan="2"><table width="100%">
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
    <td height="174" colspan="2" valign="top"><?php print $display_block; ?></p></td>
    <td valign="top">&nbsp;</td>
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
