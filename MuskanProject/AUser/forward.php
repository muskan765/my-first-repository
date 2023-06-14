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
<title>User : Forward</title>
<script language="javascript">
function maillist(anchor){
var user = anchor.getAttribute('value');
var str=composefrm.to.value;
var strarray = str.split(",")
var status=false;

//to check existing user in mail list
for (var i = 0; i<strarray.length; i++){
	if(strarray[i]==user)
	status=true;
}

if(status==false){
composefrm.to.value+=user+",";  
}

}
</script>
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
	margin-top: 50px;
}
a{
text-decoration:none;
}
</style>
<script>
function validation()
{
	// To validation
	var to=document.getElementById("to").value;
	if(to=="")
	{
		document.getElementById("lbl1").innerHTML="*";
		document.getElementById("to").style.background="#FFC";
		document.getElementById("to").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl1").innerHTML="";
		document.getElementById("to").style.background="white";
	}
	
		// Subject validation
	var subject=document.getElementById("subject").value;
	if(subject=="")
	{
		document.getElementById("lbl2").innerHTML="*";
		document.getElementById("subject").style.background="#FFC";
		document.getElementById("subject").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl2").innerHTML="";
		document.getElementById("subject").style.background="white";
	}
	
	// Message validation
	var msg=document.getElementById("message").value;
	if(msg=="")
	{
		document.getElementById("lbl3").innerHTML="*";
		document.getElementById("message").style.background="#FFC";
		document.getElementById("message").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl3").innerHTML="";
		document.getElementById("message").style.background="white";
	}
		
	return true;
}
</script>
</head>

<body>
<table width="900px" align="center" style="border-style:solid; border-color:#6C9; border-width:1px" cellpadding="0" cellspacing="0">
<tr><td colspan="2" align="center"><?php include("Top.php"); ?></td></tr>
<tr>
<td width="180px" valign="top"><?php include("Left.php"); ?></td>
<td width="720px" valign="top">
<!-- Change Password HTML Start -->
<form name="composefrm" action="" method="post"  onsubmit="return validation();">
<table width="600px" align="center" cellpadding="0" cellspacing="5" id="innertable" style="border-style:solid; border-color:#66CC66; border-width:2px">
<tr bgcolor="#66CC66"><td colspan="3" align="center">Forward Mail</td></tr>
<tr>
<td valign="top">To</td>
<td valign="top"><input type="text" name="to" id="to" style="width:300px" /></td>
<td rowspan="3" valign="top">
<div style="width:150px; height:200px; overflow:auto; border:solid; padding-left:5px">
<?php
$un=$_COOKIE['uname'];
$sql="Select * from Regtb where not username in('admin','$un')";
$result=mysql_query($sql);
while(($row=mysql_fetch_array($result))!=NULL)
{
$fn=$row['Firstname'];
$un=$row['Username'];
echo "<a href='#' name='user' value=$un onclick='maillist(this);'>$fn</a><br>";
}
?>
</div>
</td>
</tr>
<?php
if(isset($_REQUEST['id']))
{
$mid=$_REQUEST['id'];
$sql="Select * from mailtb where mid='$mid'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$sub=$row['mailsubject'];
$msg=$row['mailmessage'];
}
?>
<tr><td valign="top">Subject</td>
<td valign="top">
<input type="text" name="subject" id="subject" style="width:300px" value=<?php echo $sub ?> />
</td>
</tr>
<tr>
<Td>Message</Td>
<td>
<textarea id="message" name="message" style="width:300px; height:100px">
<?php echo $msg ?>
</textarea>
</td>
</tr>
<tr>
<td></td>
<td><input type="submit" id="btnsubmit" name="btnsubmit" value="Submit" />
</td></tr>
<tr><td></td><td><label id="abc" style="color:#FF0000"></label></td></tr>
</table>
</form>
<!-- Change Password HTML End -->
</td>
</tr>
<tr><td colspan="2" align="center"><?php include("Bottom.php"); ?></td></tr>
</table>
<?php
if(isset($_POST['btnsubmit']))
{
$from=$_COOKIE['uname'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$md=date('Y-m-d h:i:s');
$df='n';
$dt='n';

$to=$_POST['to'];
$to=substr($to,0,strlen($to)-1);
$toarr=explode(',',$to);
foreach($toarr as $strto)
{
$sql="Insert into MailTB(mailfrom,mailto,mailsubject,mailmessage,maildate,delfrom,delto,checkstatus) values('$from','$strto','$subject','$message','$md','$df','$dt','n')";
$result=mysql_query($sql);
}
echo "<script>alert('Mail Send Successfully');</script>";
echo "<script>window.location='outbox.php';</script>";
}

?>

</body>
</html>
