<?php session_start()?>
<html>
<head>
<title>GIKOMBA MARKET PLACE ::ADMINISTRATOR MODULE</title>
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
  <tr> 
    <td height="149" colspan="2" valign="top"><div align="center">:: ADMINISTRATOR 
        MODULE :: </div>
      <div align="center">CONTROL PANEL</div>
      <table width="686" border="0" align="center" bgcolor="#1F0E04" class="tabledesign">
        <tr> 
          <td width="515" height="20" align="left"><span class="style49"><font color="#FFFFFF">Welcome 
            Administrator ||</font></span> <font color="#FFFFFF"><span class="style49" id="clock">Thursday, 
            January 15, 2009 11:25:40 A.M.</span></font> <span class="style49"> 
            <script type="text/javascript" src="clock.js"></script>
            </span></td>
          <td width="161" align="right"><a href="logout.php"><font color="#FFFFFF" size="-1">log 
            out</font></a></td>
        </tr>
      </table>
      <div align="center"><span class="style48"><span class="style47"><strong><br>
        Show User Account Details</strong><br>
        </span></span> </div>
      <table width="75%" align="center"  class="tabledesign">
        <tr> 
          <td height="20" valign="top"><div align="center"> <?php 
				include('dbconn.php');
			    $result = mysql_query("SELECT user_id, firstname, lastname, address, telephone, email, city, country FROM account order by user_id asc");
				if (!$result) {
      							print("<P>Error performing query: " .
           						mysql_error() . "</P>");
							 exit();
    							}	
	$number_cols = mysql_num_fields($result);
	//layout table header
echo "<table align='center'>\n";
echo "<tr>\n";
for ($i=0; $i<$number_cols; $i++)
{
print "<th><font style='verdana' color='black' size='2' face='Verdana, Arial, Helvetica, sans-serif'>". mysql_field_name($result, $i)."</font></th>\n";
}
print "</tr>\n";
//end table header

//layout table body
while ($row = mysql_fetch_row($result))
{
print "<tr>\n";
for ($i=0; $i<$number_cols; $i++)
{
print "<td>";
if (!isset($row[$i])) //test for null value
{print "NULL";}
else
{print "<font style='verdana' color='blue' size='1' face='Verdana, Arial, Helvetica, sans-serif'>$row[$i]</font>";}
print "</td>\n";
}
print "</tr>\n";
}
print "</table>";
				?><br />
            </div></td>
        </tr>
      </table>
      <div align="center"><strong><br>
        <span class="style48"><span class="style48"><span class="style47"><br>
        <br>
        Show Product Categories</span></span></span></strong><span class="style48"><span class="style48"><span class="style47"><br>
        </span></span> </span> </div>
      <table width="50%" align="center"  class="tabledesign">
        <tr> 
          <td height="20" valign="top"><div align="center"> 
              <?php 
	$query = "select cat_title, cat_desc from store_categories";
  $result = mysql_query($query) or die(mysql_error());
  
  if (mysql_num_rows($result) < 1) {
     //print message
     $msg .= "<P>You have no categories.
     Add new?</p>";
  
  } else {
  $msg .= "
      <table align=center>
     <tr valign=top>
     <th><font color='red' size='2' face='Verdana, Arial, Helvetica, sans-serif'>Category Title</font></th>
     <th><font color='red' size='2' face='Verdana, Arial, Helvetica, sans-serif'>Description</font></th>
	      <th><font color='red' size='2' face='Verdana, Arial, Helvetica, sans-serif'>Action</font></th>

	     </tr>";

	  while ($cat = mysql_fetch_array($result)) {
         $id = $cart['id'];
         $cat_title = stripslashes($cat['cat_title']);
         $cat_desc = $cat['cat_desc'];
	
	$msg .= "<tr valign=top>
         <td align=center><font color='black' size='1' face='Verdana, Arial, Helvetica, sans-serif'>$cat_title </font><br></td>
         <td align=center><font color='black' size='1' face='Verdana, Arial, Helvetica, sans-serif'>$cat_desc </font><br></td>
         <td align=center><font color='black' size='1' face='Verdana, Arial, Helvetica, sans-serif'><a href='removecategory.php?id=$id'>remove</a></font></td>
</tr>
		 ";
     }

     $msg .= "</table>";
  }		 
				/* include('dbconn.php');
			    $result = mysql_query("SELECT cat_title, cat_desc from store_categories");
				$array=mysql_fetch_assoc($result);
				if (!$result) {
      							print("<P>Error performing query: " .
           						mysql_error() . "</P>");
							 exit();
    							}	
	$number_cols = mysql_num_fields($result);
	//layout table header
echo "<table align='center'>\n";
echo "<tr>\n";
for ($i=0; $i<$number_cols; $i++)
{
print "<th><font style='verdana' color='black' size='1' face='Verdana, Arial, Helvetica, sans-serif'>". mysql_field_name($result, $i)."</font></th>";

}
print "</tr>\n";
//end table header

//layout table body
while ($row = mysql_fetch_row($result))
{
print "<tr>\n";
for ($i=0; $i<$number_cols; $i++)
{
print "<td>";
if (!isset($row[$i])) //test for null value
{print "NULL";}
else
{print "<font style='verdana' color='blue' size='1' face='Verdana, Arial, Helvetica, sans-serif'>$row[$i]</font>";}
print "</td>\n";
}
print "</tr>\n";
}
print "</table>"; */
				?><?php 
 print "$msg"; ?>
              <br />
            </div></td>
        </tr>
      </table>
      <br>
      <span class="style48"></span> 
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <table width="37%" align="center" class="text">
          <tr> 
            <td colspan="2" valign="top"><div align="center"><strong>Add NewProduct 
                Category</strong></div></td>
          </tr>
          <tr> 
            <td width="36%" valign="top">Category Title</td>
            <td width="64%" valign="top"><input name="title" type="text" size="28"></td>
          </tr>
          <tr> 
            <td valign="top">Description</td>
            <td valign="top"><textarea name="desc" id="desc"></textarea></td>
          </tr>
          <tr> 
            <td height="27" valign="top"><input name="submit" type="submit" id="submit" value="Submit"></td>
            <td valign="top"><input name="reset" type="reset" id="reset" value="Reset"></td>
          </tr>
        </table>
        <div align="center"><span class="style48"><span class="style47"> 
          
          </span></span> </div>
      </form>
	  <div align="center">
        <?php
		if (isset($_POST['submit'])){
				if (!$_POST['title'] || !$_POST['desc'])
					{
					print "<font size='1' color='red'>Please fill all the details in the form</font>";
					exit;
					}
					else
		//include database connection
		include('dbconn.php');
		
		$check=mysql_query("select * from store_categories where cat_title ='".$_POST['title']."'");
					if(!$check){ echo "check".mysql_error(); exit;}
					$num_rows=mysql_num_rows($check);
					$checkarray=mysql_fetch_array($check);
					if($num_rows != 0 ){
					echo "<font color=red face='Verdana, Arial, Helvetica, sans-serif'>The name  <b>".$checkarray['cat_title']."</b>&nbsp;already exists. Please try again.</font>"; exit;}
		
		$query="INSERT INTO store_categories(id,cat_title,cat_desc) VALUES('NULL','$_POST[title]','$_POST[desc]')";
		$result=mysql_query($query);
					
					if ($result){
					print "The category ".$_POST['title']." has been successfully added";}
					else
					print mysql_error();
					}
		?>
        <br>
      </div>
      <span class="style48"><span class="style47"> </span><span class="style48"><span class="style47"></span></span></span><span class="style48"><span class="style47"> 
      </span> </span> </td>
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
