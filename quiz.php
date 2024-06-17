<?php
//This program is used to show question to student one by one
//Session started
session_start();
error_reporting(1);
//Database connection imported
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
/*$rs=mysql_query("select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
if($_SESSION[qn]>mysql_num_rows($rs))
{
unset($_SESSION[qn]);
exit;
}*/
//Check if subject id and test id is set from url or not
if (isset($subid) && isset($testid)) {
	$_SESSION['sid'] = $subid;
	$_SESSION['tid'] = $testid;
	header("location:quiz.php");
}
if (!isset($_SESSION['sid']) || !isset($_SESSION['tid'])) {
	//    If subject id and test id not set then we will redirect to user to main home page
	header("location: index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>Online Quiz</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	//Include header page
	include("header.php");


	$query = "select * from mst_question";

	//Following query is used to get all question of selected test
	$rs = mysqli_query($cn, "select * from mst_question where test_id=$tid") or die(mysqli_error());
	//Following session is shcecked if qn variable is set or not, if not then we are setting it o 0 means no question is answered by student, also we are setting trueans to 0 by default
	if (!isset($_SESSION['qn'])) {
		$_SESSION['qn'] = 0;
		mysqli_query($cn, "delete from mst_useranswer where sess_id='" . session_id() . "'") or die(mysqli_error());
		$_SESSION['trueans'] = 0;
	} else {
		//    When student submit the question then we are store those details to database table, also we are increasing qn variable counter and trueans counter if answer is correct in below if condition
		if ($submit == 'Next Question' && isset($ans)) {
			mysqli_data_seek($rs, $_SESSION['qn']);
			$row = mysqli_fetch_row($rs);
			mysqli_query($cn, "insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('" . session_id() . "', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
			if ($ans == $row[7]) {
				$_SESSION['trueans'] = $_SESSION['trueans'] + 1;
			}
			$_SESSION['qn'] = $_SESSION['qn'] + 1;
		} else if ($submit == 'Get Result' && isset($ans)) {
			//            When there is last question then we are showing Get result button and when click on that button below code will be executed
			//            We are storing the last question answer into database
			mysqli_data_seek($rs, $_SESSION['qn']);
			$row = mysqli_fetch_row($rs);
			mysqli_query($cn, "insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('" . session_id() . "', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
			if ($ans == $row[7]) {
				$_SESSION['trueans'] = $_SESSION['trueans'] + 1;
			}
			//                Below code is used to show the result of student instantely
			echo "<h1 class=head1> Result</h1>";
			$_SESSION['qn'] = $_SESSION['qn'] + 1;
			echo "<Table align=center><tr class=tot><td>Total Question<td> $_SESSION[qn]";
			echo "<tr class=tans><td>True Answer<td>" . $_SESSION['trueans'];
			$w = $_SESSION['qn'] - $_SESSION['trueans'];
			echo "<tr class=fans><td>Wrong Answer<td> " . $w;
			echo "</table>";
			$current_date = date("Y-m-d");
			//                We are also storeing final result into database table of student
			mysqli_query($cn, "insert into mst_result(login,test_id,test_date,score) values('$login',$tid,'$current_date',$_SESSION[trueans])") or die(mysqli_error());
			//                If student wants to review question then can click on below link
			echo "<h1 align=center><a href=review.php> Review Question</a> </h1>";
			//                Once quizz over then we are unsetting the session so that student can give another test
			unset($_SESSION['qn']);
			unset($_SESSION['sid']);
			unset($_SESSION['tid']);
			unset($_SESSION['trueans']);
			exit;
		}
	}
	//below code is to get question of selected question
	$rs = mysqli_query($cn, "select * from mst_question where test_id=$tid") or die(mysqli_error());
	if ($_SESSION['qn'] > mysqli_num_rows($rs) - 1) {
		//    If there are any error then we are showing that to student
		unset($_SESSION['qn']);
		echo "<h1 class=head1>Some Error  Occured</h1>";
		session_destroy();
		echo "Please <a href=index.php> Start Again</a>";

		exit;
	}
	//Using below code we are getting particular question from database
	mysqli_data_seek($rs, $_SESSION['qn']);
	$row = mysqli_fetch_row($rs);
	//Following is the form to display and student answer
	echo "<form name=myfm method=post action=quiz.php>";
	echo "<table width=100% class=table-style> <tr> <td width=30>&nbsp;<td> <table border=0>";
	$n = $_SESSION['qn'] + 1;
	echo "<tR><td><span class=style2>Que " .  $n . ": $row[2]</style>";
	echo "<tr><td class=style8><input type=radio name=ans value=1>$row[3]";
	echo "<tr><td class=style8> <input type=radio name=ans value=2>$row[4]";
	echo "<tr><td class=style8><input type=radio name=ans value=3>$row[5]";
	echo "<tr><td class=style8><input type=radio name=ans value=4>$row[6]";

	//When there is last question then we are showign Get Result button otherewise showing Next Question button
	if ($_SESSION['qn'] < mysqli_num_rows($rs) - 1)
		echo "<tr><td><input type=submit name=submit value='Next Question'></form>";
	else
		echo "<tr><td><input type=submit name=submit value='Get Result'></form>";
	echo "</table></table>";
	?>
</body>

</html>