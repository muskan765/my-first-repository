<?php include_once("include/confg.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>feedback</title>
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
	margin-top: 130px;
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
	
	// Lastname validation
	var ln=document.getElementById("lastname").value;
	if(ln=="")
	{
		document.getElementById("lbl2").innerHTML="*";
		document.getElementById("lastname").style.background="#FFC";
		document.getElementById("lastname").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl2").innerHTML="";
		document.getElementById("lastname").style.background="white";
	}

	// Email validation
	var em=document.getElementById("email").value;
	if(em=="")
	{
		document.getElementById("lbl3").innerHTML="*";
		document.getElementById("email").style.background="#FFC";
		document.getElementById("email").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl3").innerHTML="";
		document.getElementById("email").style.background="white";
	}
	
	//validate Username Email format
	var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
	var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
    	
	if (!emailFilter.test(em))
	{
	document.getElementById("lbl3").innerHTML="*";
    document.getElementById("email").style.background="#FFC";
	document.getElementById("email").focus();
	return false;
	} 
	else if (em.match(illegalChars)) 
	{
	document.getElementById("lbl3").innerHTML="*";
    document.getElementById("email").style.background="#FFC";
	document.getElementById("email").focus();
	return false;
	}	 
	else 
	{
	document.getElementById("lbl3").innerHTML="";
	document.getElementById("email").style.background="white";
	}
	
	// Feedback validation
	var fd=document.getElementById("feedback").value;
	if(fd=="")
	{
		document.getElementById("lbl4").innerHTML="*";
		document.getElementById("feedback").style.background="#FFC";
		document.getElementById("feedback").focus();
		return false;
	}
	else
	{
		document.getElementById("lbl4").innerHTML="";
		document.getElementById("feedback").style.background="white";
	}
			
	return true;
}
</script>


</head>

<body>
<table width="900px" align="center" style="border-style:solid; border-color:#999999; border-width:2px" cellspacing="0" cellpadding="0">
<tr><td colspan="2" align="center"><?php include("Top.php"); ?></td></tr>
<tr>
<td width="180px" valign="top"><?php include("left.php"); ?></td>
<td width="720px" valign="top">
<form name="feedbackfrm" action="" method="post" onsubmit="return validation();">
<table width="500px" align="center" cellpadding="0" cellspacing="5" id="innertable" style="border-style:solid; border-color:#396; border-width:2px">
<tr bgcolor="#339966"><td colspan="2" align="center"><big><b>Feedback</b></big></td></tr>
<tr><td>Firstname</td><td><input type="text" id="firstname" name="firstname" />
<label id="lbl1" style="color:#F00; font-weight:bold"></label>
</td></tr>
<tr><td>Lastname</td><td><input type="text" id="lastname" name="lastname" />
<label id="lbl2" style="color:#F00; font-weight:bold"></label>
</td></tr>
<tr><td>Email</td><td><input type="text" id="email" name="email" />
<label id="lbl3" style="color:#F00; font-weight:bold"></label>
</td></tr>
<tr><td>Feedback</td><td>
<textarea id="feedback" name="feedback"></textarea>
<label id="lbl4" style="color:#F00; font-weight:bold"></label>
</td></tr>

<tr><td></td><td><input type="submit" id="btnsubmit" name="btnsubmit" value="Submit" /></td></tr>
</table>
</form>
<!-- Feedback HTML End -->
</td>
</tr>
<tr><td colspan="2" align="center"><?php include("Bottom.php"); ?></td></tr>
</table>
<?php
if(isset($_POST['btnsubmit']))
{
$db=new DB_CLASS();
$fn=$_POST['firstname'];
$ln=$_POST['lastname'];
$em=$_POST['email'];
$fd=$_POST['feedback'];
$fdate=date('Y-m-d');

$sql="Insert into feedbacktb(Firstname,Lastname,Email,Feedback,FeedbackDate) values('$fn','$ln','$em','$fd','$fdate')";
$result=mysql_query($sql);
if($result){
echo "<script>alert('Feedback submitted successfully');</script>";
}

}
?>
</body>
</html>