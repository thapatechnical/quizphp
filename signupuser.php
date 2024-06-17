<!--Validate student details and register user if all details are valid-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>User Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
//Header included
include("header.php");
//All passed parameter from sign up form will be extracted here
extract($_POST);
//Below is database connection
include("database.php");
//Validate if user is already in system or not
$rs=mysqli_query($cn,"select * from mst_user where login='$lid'");
if (mysqli_num_rows($rs)>0)
{
//    If user is already in system then we are showing warning
	echo "<br><br><br><div class=head1>Login Id Already Exists</div>";
	exit;
}
//If user is not in system  then we are adding those student details to database
$query="insert into mst_user(login,pass,username,address,city,email) values('$lid','$pass','$name','$address','$city','$email')";
$rs=mysqli_query($cn,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Your Login ID  $lid Created Sucessfully</div>";
echo "<br><div class=head1>Please Login using your Login ID to take Quiz</div>";
echo "<br><div class=head1><a href=index.php>Login</a></div>";


?>
</body>
</html>

