<?php
//session initialize to store admin is login or not
session_start();
error_reporting(1);
?>

<html>
<head>
<title>Adminstrative AreaOnline Quiz </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!--    custom css filel for design-->
<link href="../quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
//header fiel to show login button if required
include("header.php");
//when we submit the data from index.php of admin user for login then this data comes here and we are extracting those data
extract($_POST);
//WWe checking if submit button is really pressed by user or not
if(isset($submit))
{
//    Include the database connection
	include("database.php");
	$loginid=$_POST['loginid'];
	$pass=$_POST['pass'];
//    Cheeck if admin details arepresent in admin table or not, if not then we are showing Invalid User, otherwise are are setting SESSION
	$rs=mysqli_query($cn,"select * from mst_admin where loginid='$loginid' and pass='$pass' ") or die("Could not Connect My Sql1");
	if(mysqli_num_rows($rs)<1)
	{
		echo "<BR><BR><BR><BR><div class=head1> Invalid User Name or Password<div>";
		exit;

	}
//    Session is set if user details are correct
	$_SESSION['alogin']="true";

}
if(!isset($_SESSION['alogin']))
{
	echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=index.php>Login</a><div>";
		exit;
}
?>

<p class="head1">Welcome to Admistrative Area </p>
<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<div style="margin-left:20%;padding-top:5%">
<!--    Below are links to various module like subject master, add test, ad question-->
<p class="style7"><a href="subadd.php">Subject Master</a></p>
<p class="style7"><a href="testadd.php">Add Test</a></p>
<p class="style7"><a href="questionadd.php">Add Question </a></p>
<p class="style7"><a href="students.php">Student Master</a></p>
<p align="center" class="head1">&nbsp;</p>
</div>
</div>
</body>
</html>
