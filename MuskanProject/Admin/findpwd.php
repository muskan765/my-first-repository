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
<title>Admin:view employee</title>
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

function findpass(uname)
{
	if(uname=="")
	{
		document.getElementById("lbl1").innerHTML="*";
		document.getElementById("username").style.background="#FFC";
		document.getElementById("username").focus();
		return;
	}
	
	var res=confirm("Please Confirm to Reset Password of "+uname);
	if(res)
	{
		window.location='?un='+uname+'&confirm=yes';
	}
}
</script>
</head>

<body>
<table width="900px" align="center" style="border-style:solid; border-color:#396; border-width:1px" cellpadding="0" cellspacing="0">
<tr><td colspan="2" align="center"><?php include("Top.php"); ?></td></tr>
<tr>
<td width="180px" valign="top"><?php include("Left.php"); ?></td>
<td width="720px" valign="top">
<!-- List of Employee HTML Start -->
<form name="findpassfrm" action="" method="post">
<table width="100%" align="center" cellpadding="0" cellspacing="5" id="innertable" style="border-style:solid; border-color:#339966; border-width:2px">
<tr bgcolor="#339933"><td colspan="2" align="center" valign="middle">
<h1>Find Password</h1></td></tr>

<tr>
<Td>Username </Td>
<td><input type="text" id="username" name="username" placeholder="Username" />
<input type="button" id="btnsubmit" onclick="findpass(findpassfrm.username.value);"  value="Find Password" />
<label id="lbl1" style="color:#F00; font-weight:bold"></label>
</td>
</tr>
<?php
if(isset($_REQUEST['un']) && isset($_REQUEST['confirm']))
{
$unpass=$_REQUEST['un'];
$db=new DB_CLASS();
$sql="Select * from regtb where username='$unpass'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count>0)
{	
$np=generatePassword();
$encryptpass=md5($np);

$sql1="Update Regtb set password='$encryptpass' where username='$unpass'";
$result1=mysql_query($sql1);
if($result1){
echo "<tr>";	
echo "<td colspan='2' align='center'>";
echo "New Password is  <big><b>".$np."</b></big>";
echo "</td>";
echo "</tr>";
}

}
else
{
	echo "<script>alert('Invalid Username');</script>";
}

}

	function generatePassword ($length = 8)
  	{
    $password = "";
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
    $maxlength = strlen($possible);
    if ($length > $maxlength){
      $length = $maxlength;
    }
    $i = 0; 
    while ($i < $length) { 
      $char = substr($possible, mt_rand(0, $maxlength-1), 1);
      if (!strstr($password, $char)) { 
        $password .= $char;
        $i++;
      }
    }
    // done!
    return $password;
  }

?>

</table>
</form>
<!-- List of Employee HTML End -->
</td>
</tr>
<tr><td colspan="2" align="center"><?php include("Bottom.php"); ?></td></tr>
</table>
</body>
</html>