<?php
include_once("include/confg.php");
?>

<?php
if(isset($_POST['btnsubmit']))
{
$db=new DB_CLASS();

$un=$_POST['username'];
$pwd=md5($_POST['password']);

$sql="Select * from regtb where username='$un'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

if($count>0)
{
$row=mysql_fetch_array($result);
if($row['Password']==$pwd)
{
if($row['Role']=="admin")
{
setcookie('uname',$un,NULL,"/");
echo "<script>window.location='Admin/addempl.php'</script>";
}
else if($row['Role']=="user")
{
if(isset($_POST['chk1']))
setcookie('uname',$un,time() +(3600*24*7),"/");
else
setcookie('uname',$un,NULL,"/");

echo "<script>window.location='Auser/Inbox.php'</script>";
}
}
else
{
echo "<script>window.location='Login.php?id=2'</script>";
}
}
else
{
echo "<script>window.location='Login.php?id=1'</script>";	
}	
}
?>