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
<title>Admin : Add Employee</title>
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
</style>
<script>
function validation()
{
	// Firstname validation
	var fn=document.getElementById("firstname").value;
	if(fn=="")
	{
		document.getElementById("lbl1").innerHTML="*";
		document.getElementById("firstname").style.background="#FFC";
		document.getElementById("firstname").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl1").innerHTML="";
		document.getElementById("firstname").style.background="white";
	}
	
	// Require alphabet with space	
	if (!fn.match(/^[a-zA-Z\s-, ]+$/)) 
	{
	document.getElementById('lbl1').innerHTML='required alphabets';	
	document.getElementById("firstname").style.background="#FFC";
	document.getElementById('firstname').focus();
	return false;
	}
	else
	{
	document.getElementById('firstname').style.background='White';
	document.getElementById('lbl1').innerHTML='';	
	}
	
	// Username validation
	var un=document.getElementById("username").value;
	if(un=="")
	{
		document.getElementById("lbl2").innerHTML="*";
		document.getElementById("username").style.background="#FFC";
		document.getElementById("username").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl2").innerHTML="";
		document.getElementById("username").style.background="white";
	}
	
	//validate Username Email format
	var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
	var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
    	
	if (!emailFilter.test(un))
	{
	document.getElementById("lbl2").innerHTML="Invalid Email Format";
    document.getElementById('username').style.background = '#CCC';
	document.getElementById('username').focus();
	return false;
	} 
	else if (un.match(illegalChars)) 
	{
	document.getElementById("lbl2").innerHTML="Email illegal characters";
    document.getElementById('username').style.background = '#CCC';
	document.getElementById('username').focus();
	return false;
	}	 
	else 
	{
	document.getElementById("lbl2").innerHTML="";
	document.getElementById('username').style.background = 'White';
	}
		
	// Password validation
	var pwd=document.getElementById("password").value;
	if(pwd=="")
	{
		document.getElementById("lbl3").innerHTML="*";
		document.getElementById("password").style.background="#FFC";
		document.getElementById("password").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl3").innerHTML="";
		document.getElementById("password").style.background="white";
	}
	
	// Password Length
	if((pwd.length<5) || (pwd.length>10))	
	{
	document.getElementById('lbl3').innerHTML="must be 5-10 char";	
	document.getElementById('password').style.background="#FFC";
	document.getElementById('password').focus();
	return false;
	}
	else 	
	{
	document.getElementById('lbl3').innerHTML="";	
	document.getElementById('password').style.background="White";
	}
	
	// CPassword validation
	var cpwd=document.getElementById("cpassword").value;
	if(cpwd=="")
	{
		document.getElementById("lbl4").innerHTML="*";
		document.getElementById("cpassword").style.background="#FFC";
		document.getElementById("cpassword").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl4").innerHTML="";
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
<table width="100%" align="center" cellpadding="0" cellspacing="5" id="innertable" style="border-style:solid; border-color:#339966; border-width:2px">
<tr bgcolor="#FFCC00"><td colspan="2" align="center"><big><b>Candidate Registration</b></big></td></tr>
<tr bgcolor="#339933"><Td colspan="2">User Detail</Td></tr>
<tr><td>Firstname <span style="color:#FF0000">(*)</span></td>
<td><input type="text" id="firstname" name="firstname" style="width:300px" />
<label id="lbl1" style="color:#F00; font-weight:bold"></label>
</td>
</tr>
<tr>
<td>Lastname</td>
<td><input type="text" id="lastname" name="lastname" style="width:300px" >
</td>
</tr>
<tr bgcolor="#339933"><Td colspan="2">Login Detail</Td></tr>
<tr><td>Username (Email ID) <span style="color:#FF0000">(*)</span></td><td><input type="text" id="username" name="username" style="width:300px" />
<label id="lbl2" style="color:#F00; font-weight:bold"></label>
</td></tr>
<tr><td>Password <span style="color:#339933">(*)</span></td><td><input type="password" id="password" name="password" style="width:200px" >
<label id="lbl3" style="color:#F00; font-weight:bold"></label>
</td></tr>
<tr><td>Confirm Password <span style="color:#339933">(*)</span></td><td><input type="password" id="cpassword" name="cpassword" style="width:200px" ><label id="lbl4" style="color:#F00; font-weight:bold"></label></td></tr>
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

$fn=strtoupper($_POST['firstname']);
$ln=strtoupper($_POST['lastname']);
$un=strtolower($_POST['username']);
$pwd=md5(strtolower($_POST['password']));
$role='user';
date_default_timezone_set("asia/kolkata");
$rdate=date('Y-m-d h:i:s a');

$sql1="select * from regtb where username='$un'";
$result1=mysql_query($sql1);
$no=mysql_num_rows($result1);
if($no>0)
{
echo "<script>document.getElementById('abc').innerHTML='Username already exist';</script>";	
return;
}
else
{
$sql="Insert into regtb(Firstname,Lastname,Username,Password,Role,RegDate) values('$fn','$ln','$un','$pwd','$role','$rdate')";
$result=mysql_query($sql);
if($result){
echo "<script>document.getElementById('abc').innerHTML='Registration Completed  Successfully';</script>";
}
}

}
?>
</body>
</html>
