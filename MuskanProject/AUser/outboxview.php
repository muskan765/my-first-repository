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
<title>User : Outbox View</title>
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
<table width="900px" align="center" style="border-style:solid; border-color:#CCCCCC; border-width:1px" cellpadding="0" cellspacing="0">
<tr><td colspan="2" align="center"><?php include("Top.php"); ?></td></tr>
<tr>
<td width="180px" valign="top"><?php include("Left.php"); ?></td>
<td width="720px" valign="top">
<!-- Outbox mail Start -->
<form name="outboxviewfrm" action="" method="post">
<table width="100%" align="center" cellpadding="0" cellspacing="5" id="innertable" style="border-style:solid; border-color:#6C9; border-width:2px">
<tr bgcolor="#66CC99"><td colspan="3" align="center"><h1>Mail Detail</h1></td></tr>

<?php
if(isset($_REQUEST['id']))
{
$mid=$_REQUEST['id'];
$sql="Select * from mailtb where mid='$mid' and delfrom='n'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$to=$row['mailto'];
$sub=$row['mailsubject'];
$msg=$row['mailmessage'];
$md=$row['maildate'];
echo "<tr>";
echo "<td><b>To</b></td>";
echo "<td>:</td>";
echo "<td><big>$to</big></td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>Subject</b></td>";
echo "<td>:</td>";
echo "<td><big>$sub</big></td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>Date</b></td>";
echo "<td>:</td>";
echo "<td><big>$md</big></td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>Message</b></td>";
echo "<td>:</td>";
echo "<td><big>$msg</big></td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan='3'>&nbsp;</td>";
echo "</tr>";

echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td><input type='submit' id='forwardbtn' name='forwardbtn' value='Forward' />&nbsp; <input type='submit' id='deletebtn' name='deletebtn' value='Delete' />&nbsp;<input type='submit' id='cancelbtn' name='cancelbtn' value='Cancel' /></td>";
echo "</tr>";

}
else
{
echo "<script>window.location='Outbox.php'</script>";
}

?>

</table>
</form>
<!-- Outbox mail HTML End -->
</td>
</tr>
<tr><td colspan="2" align="center"><?php include("Bottom.php"); ?></td></tr>
</table>
<?php
if(isset($_POST['deletebtn']))
{
$mid=$_REQUEST['id'];
$sql="Update mailtb set delfrom='y' where mid='$mid'";
$result=mysql_query($sql);
if($result){
echo "<script>alert('Mail Deleted Successfully');</script>";
echo "<script>window.location='Outbox.php'</script>";
}

}
else if(isset($_POST['forwardbtn']))
{
$mid=$_REQUEST['id'];
echo "<script>window.location='Forward.php?id=$mid'</script>";
}
else if(isset($_POST['cancelbtn']))
{
echo "<script>window.location='Outbox.php'</script>";
}

?>
</body>
</html>
