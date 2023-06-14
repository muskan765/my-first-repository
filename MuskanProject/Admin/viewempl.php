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
<title>ADMIN:View employee</title>
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
</head>

<body>
<table width="900px" align="center" style="border-style:solid; border-color:#396; border-width:1px" cellpadding="0" cellspacing="0">
<tr><td colspan="2" align="center"><?php include("Top.php"); ?></td></tr>
<tr>
<td width="180px" valign="top"><?php include("Left.php"); ?></td>
<td width="720px" valign="top">
<!-- List of Employee HTML Start -->
<form name="changepasswordfrm" action="" method="post">
<table width="100%" align="center" cellpadding="0" cellspacing="5" id="innertable" style="border-style:solid; border-color:#339966; border-width:2px">
<tr bgcolor="#339933"><td colspan="4" align="center"><h1>List of Employees</h1></td></tr>
<tr bgcolor="#339933">
<Td>Firstname</Td>
<Td>Lastname</Td>
<Td>Username</Td>
<Td>RegDate</Td>
</tr>
<div style="overflow:auto; height:100%; width:100%">
<?php
$db=new DB_CLASS();
$un=$_COOKIE['uname'];
$sql="Select * from Regtb where not username='$un'";
$result=mysql_query($sql);
while(($row=mysql_fetch_array($result))!=NULL)
{
$fn=$row['Firstname'];
$ln=$row['Lastname'];
$un=$row['Username'];
$rd=$row['RegDate'];
echo "<tr>";
echo "<td>$fn</td>";
echo "<td>$ln</td>";
echo "<td>$un</td>";
echo "<td>$rd</td>";
echo "</tr>";
}

?>
</div>

</table>
</form>
<!-- List of Employee HTML End -->
</td>
</tr>
<tr><td colspan="2" align="center"><?php include("Bottom.php"); ?></td></tr>
</table>
</body>
</html>