<!--this program is used to review the test given by student-->
<?php
//Session started
session_start();
extract($_POST);
extract($_SESSION);
//Database connection imported
include("database.php");
//when click on final finish button then we are rediecting user to the index main page
if (isset($submit) && $submit == 'Finish') {
	mysqli_query($cn, "delete from mst_useranswer where sess_id='" . session_id() . "'") or die(mysqli_error());
	unset($_SESSION['qn']);
	header("Location: index.php");
	exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>Online Quiz - Review Quiz </title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	include("header.php");
	echo "<h1 class=head1> Review Test Question</h1>";

	//We are setting variable qn to 0 in initial page load
	if (!isset($_SESSION['qn'])) {
		$_SESSION['qn'] = 0;
	} else if ($submit == 'Next Question') {
		//    When click on next button we increasing the qn variable counter, so that we can show next question
		$_SESSION['qn'] = $_SESSION['qn'] + 1;
	}

	//Following is the query to get student result from database for current qn counter
	$rs = mysqli_query($cn, "select * from mst_useranswer where sess_id='" . session_id() . "'") or die(mysqli_error());
	mysqli_data_seek($rs, $_SESSION['qn']);
	$row = mysqli_fetch_row($rs);
	echo "<form name=myfm method=post action=review.php>";
	echo "<table width=100% class=table-style> <tr> <td width=30>&nbsp;<td> <table border=0>";
	$n = $_SESSION['qn'] + 1;
	echo "<tR><td><span class=style2>Que " .  $n . ": $row[2]</style>";
	echo "<tr><td class=" . ($row[7] == 1 ? 'tans' : 'style8') . ">$row[3]";
	echo "<tr><td class=" . ($row[7] == 2 ? 'tans' : 'style8') . ">$row[4]";
	echo "<tr><td class=" . ($row[7] == 3 ? 'tans' : 'style8') . ">$row[5]";
	echo "<tr><td class=" . ($row[7] == 4 ? 'tans' : 'style8') . ">$row[6]";
	if ($_SESSION['qn'] < mysqli_num_rows($rs) - 1)
		echo "<tr><td><input type=submit name=submit value='Next Question'></form>";
	else
		echo "<tr><td><input type=submit name=submit value='Finish'></form>";

	echo "</table></table>";
	?>