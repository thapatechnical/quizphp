<?php
//Session started
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz - Test List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
//Header included
include("header.php");
//Database connection included
include("database.php");
//we are getting subject whos id passed from URL
extract($_GET);
//Get selected subject record from database
$rs1=mysqli_query($cn,"select * from mst_subject where sub_id=$subid");
$row1=mysqli_fetch_array($rs1);
echo "<h1 align=center><font color=blue> $row1[1]</font></h1>";
//Query to get all test from that selwected subject
$rs=mysqli_query($cn,"select * from mst_test where sub_id=$subid");
if(mysqli_num_rows($rs)<1)
{
//    If there are not test then we are showing below warnign
	echo "<br><br><h2 class=head1> No Quiz for this Subject </h2>";
	exit;
}
echo "<h2 class=head1> Select Test Name to View Question </h2>";
echo "<table align=center>";
//If test list found of that subject then we are show those test, and when click on that test we are redirecting to page where we are showing that test question with answer
while($row=mysqli_fetch_row($rs))
{
	echo "<tr><td align=center ><a href=quiz.php?testid=$row[0]&subid=$subid><font size=4>$row[2]</font></a>";
}
echo "</table>";
?>
</body>
</html>
