<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Co. internal mail server: Login</title>
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
	// Username validation
	var un=document.getElementById("username").value;
	if(un=="")
	{
		document.getElementById("lbl1").innerHTML="*";
		document.getElementById("username").style.background="#FFC";
		document.getElementById("username").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl1").innerHTML="";
		document.getElementById("username").style.background="white";
	}
	
	// Username validation
	var pwd=document.getElementById("password").value;
	if(pwd=="")
	{
		document.getElementById("lbl2").innerHTML="*";
		document.getElementById("password").style.background="#FFC";
		document.getElementById("password").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl2").innerHTML="";
		document.getElementById("password").style.background="white";
	}
	
	return true;
}
</script>

</head>

<body>
<table width="900px" align="center" style="border-style:solid; border-color:#CCCCCC; border-width:2px" cellpadding="0" cellspacing="0">
<tr><td colspan="2" align="center"><?php include("Top.php"); ?></td></tr>
<tr>
<td width="180px" valign="top"><?php include("Left.php"); ?></td>
<td width="720px" valign="top">
<!-- Login HTML Start -->
<form name="loginfrm" action="logincode.php" method="post" onsubmit="return validation();">
<table width="350px" align="center" cellpadding="0" cellspacing="5" id="innertable" style="border-style:solid; border-color:#696; border-width:2px">
<tr bgcolor="#339966"><td colspan="2" align="center">User Login</td></tr>
<tr><td>Username</td><td><input type="text" id="username" name="username" />
<label id="lbl1" style="color:#F00; font-weight:bold"></label>
</td></tr>
<tr><td>Password</td><td><input type="password" id="password" name="password" />
<label id="lbl2" style="color:#F00; font-weight:bold"></label>
</td></tr>
<tr><td></td><td><input type="checkbox" id="chk1" name="chk1" />Remember me</td></tr>
<tr>
<td></td>
<td><input type="submit" id="btnsubmit" name="btnsubmit" value="Login" />
</td></tr>
<tr><td></td><td><label id="abc" style="color:#FF0000"></label></td></tr>
</table>
<!-- Login HTML End -->
</td>
</tr>
<tr><td colspan="2" align="center"><?php include("Bottom.php"); ?></td></tr>
</table>
</form>
<?php
if(isset($_REQUEST['id']))
{
$id=$_REQUEST['id'];
if($id==1)
echo "<script>document.getElementById('abc').innerHTML='Invalid username'</script>";
else if($id==2)
echo "<script>document.getElementById('abc').innerHTML='Invalid password'</script>";
}
?>

</body>
</html>