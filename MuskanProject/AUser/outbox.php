<?php 
include_once("include/confg.php"); 
$db=new DB_CLASS();
?>
<?php
if(isset($_COOKIE['uname'])){
$un=$_COOKIE['uname'];
echo "Welcome  ".$un;
}
else{
echo "<script>window.location='Login.php'</script>";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User : Outbox</title>
<style type="text/css">
    .style2
    {
        font-size: small;
    }
    .style3
    {
        font-size: small;
        font-weight: bold;
    }
#innertable {
	margin-top: 10px;
}
a
{
text-decoration:none;
}
</style>
</head>

<body>
<table width="900px" align="center" style="border-style:solid; border-color:#66CC99; border-width:1px" cellpadding="0" cellspacing="0">
<tr><td colspan="2" align="center"><?php include("Top.php"); ?></td></tr>
<tr>
<td width="180px" valign="top"><?php include("Left.php"); ?></td>
<td width="720px" valign="top">
<!-- Outbox mail Start -->
<form name="outboxfrm" action="" method="post">
<table width="100%" align="center" cellpadding="4" cellspacing="0" id="innertable" style="border-style:solid; border-color:#66CC99; border-width:2px">
<tr bgcolor="#66CC99"><td colspan="5" align="center"><h1>Send Mail</h1></td></tr>
<tr bgcolor="#66CC99">
<Td><big><b>To</b></big></Td>
<Td><big><b>Subject</big></b></Td>
<Td><big><b>Message</b></big></Td>
<Td><big><b>Mail Date</b></big></Td>
<Td>&nbsp;</Td>
</tr>
<?php
$un=$_COOKIE['uname'];
$sql="Select * from mailtb where mailfrom='$un' and delfrom='n'";
$result=mysql_query($sql);
$totalRow=mysql_num_rows($result);

if($totalRow>0)
{
while(($row=mysql_fetch_array($result))!=NULL)
{
$mid=$row['mid'];
$to=$row['mailto'];
$sub=$row['mailsubject'];
$msg=substr($row['mailmessage'],0,10);
$msg=$msg.".......";
$md=$row['maildate'];
$cs=$row['checkstatus'];
echo "<tr>";
echo "<td>$to</td>";
echo "<td>$sub</td>";
echo "<td><a href='OutboxView.php?id=$mid'>$msg</a></td>";
echo "<td>$md</td>";
echo "<td align='left' valign='top'>";
if($cs=='n')
echo "<img src='Image/unreadcheck.png' border='0' height='20px' />";
else if($cs=='y')
echo "<img src='Image/readcheck.png' border='0' height='30px' />";

echo "</td>";
echo "</tr>";
}
}
else
{
	echo "<tr><td colspan='4' align='center'><img src='Image/notfound.png' /></td></tr>";
	echo "<tr><td colspan='4' align='center'><b><big>Mails not found</big></b></td></tr>";
}
?>


</table>
</form>
<!-- Outbox mail HTML End -->
</td>
</tr>
<tr><td colspan="2" align="center"><?php include("Bottom.php"); ?></td></tr>
</table>

</body>
</html>
