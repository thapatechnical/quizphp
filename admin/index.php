<?php
//We are initializing session so that we can store the session for admin once they login
session_start()
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Administrative Login - Online Exam</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!--    We have written the css file separately for design -->
<link href="../quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<!--Header file included, to show login button if not login-->
<?php
include("header.php");
?>

<p class="head1">Adminstrative Login </p>
<!--We are redirecting to login.php page once user submit the login details-->
<form name="form1" method="post" action="login.php">
<table width="490" border="0">
  <tr>
    <td width="106"><span class="style2"></span></td>
    <td width="132"><span class="style2"><span class="head1"><img src="login.jpg" width="131" height="155"></span></span></td>
    <td width="238"><table width="219" border="0" align="center">
  <tr>
    <td width="163" class="style2">Login ID </td>
<!--      Input for login id-->
    <td width="149"><input name="loginid" type="text" id="loginid"></td>
  </tr>
  <tr>
    <td class="style2">Password</td>
<!--      Input for password-->
    <td><input name="pass" type="password" id="pass"></td>
  </tr>
  <tr>
    <td class="style2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style2">&nbsp;</td>
    <td><input name="submit" type="submit" id="submit" value="Login"></td>
      <td colspan="2" bgcolor="#CC3300"><div align="center">New Admin ? <a href="signup.php">Signup Free</a></div></td>
  </tr>
</table></td>
  </tr>
</table>

</form>

</body>
</html>
