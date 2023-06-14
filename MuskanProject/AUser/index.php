<?php 
include_once("include/confg.php"); 
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
<title>Admin : Change Password</title>
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
	margin-top: 150px;
}
</style>
<script>
function validation()
{
	// Old Password validation
	var opwd=document.getElementById("oldpassword").value;
	if(opwd=="")
	{
		document.getElementById("lbl1").innerHTML="*";
		document.getElementById("oldpassword").style.background="#FFC";
		document.getElementById("oldpassword").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl1").innerHTML="";
		document.getElementById("oldpassword").style.background="white";
	}
	
	// New Password validation
	var npwd=document.getElementById("newpassword").value;
	if(npwd=="")
	{
		document.getElementById("lbl2").innerHTML="*";
		document.getElementById("newpassword").style.background="#FFC";
		document.getElementById("newpassword").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl2").innerHTML="";
		document.getElementById("newpassword").style.background="white";
	}
	
	// Confirm Password validation
	var cpwd=document.getElementById("cpassword").value;
	if(cpwd=="")
	{
		document.getElementById("lbl3").innerHTML="*";
		document.getElementById("cpassword").style.background="#FFC";
		document.getElementById("cpassword").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl3").innerHTML="";
		document.getElementById("cpassword").style.background="white";
	}
	
	if(cpwd!=npwd)
	{
		document.getElementById("lbl3").innerHTML="invalid confirm password";
		document.getElementById("cpassword").style.background="#FFC";
		document.getElementById("cpassword").focus();
		return false;	
	}
	else
	{
		document.getElementById("lbl3").innerHTML="";
		document.getElementById("cpassword").style.background="white";
	}
	
		
	return true;
}
</script>
</head>

<body>
<table width="900px" align="center" style="border-style:solid; border-color:#396; border-width:1px" cellpadding="0" cellspacing="0">
<tr><td colspan="2" align="center"><?php include("Top.php"); ?></td></tr>
<tr>
<td width="180px" valign="top"><?php include("Left.php"); ?></td>
<td width="720px" valign="top">
<!-- Change Password HTML Start -->
<form name="changepasswordfrm" action="" method="post" onsubmit="return validation();">
<table width="350px" align="center" cellpadding="0" cellspacing="5" id="innertable" style="border-style:solid; border-color:#396; border-width:2px">
<tr bgcolor="#339966"><td colspan="2" align="center"><big><b>Change Password</b></big></td></tr>
<tr><td>Old Password</td>
<td><input type="password" id="oldpassword" name="oldpassword" />
<label id="lbl1" style="color:#F00; font-weight:bold"></label>
</td>
</tr>
<tr><td>New Password</td><td><input type="password" id="newpassword" name="newpassword" /><label id="lbl2" style="color:#F00; font-weight:bold"></label></td></tr>
<tr><td>Confirm Password</td>
<td><input type="password" id="cpassword" name="cpassword" />
<label id="lbl3" style="color:#F00; font-weight:bold"></label>
</td></tr>
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
$db=new DB_CLASS();

$un=$_COOKIE['uname'];
$op=md5($_POST['oldpassword']);
$np=md5($_POST['newpassword']);

$sql="Select * from regtb where username='$un' and Password='$op'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

if($count>0)
{
$sql1="Update Regtb set password='$np' where username='$un'";
$result1=mysql_query($sql1);
if($result1){
echo "<script>document.getElementById('abc').innerHTML='Password Changed Successfully';</script>";
}
}
else
{
echo "<script>document.getElementById('abc').innerHTML='Invalid Old Password';</script>";
}

}
?>
</body>
</html>