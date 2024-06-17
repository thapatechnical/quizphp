<style type="text/css">
/*    This is header file and will include this in all program*/
/*If user is login then we will hide login button*/

<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}
-->
</style>
<table border="0" width="100%" cellspacing="0" cellpadding="0" background="../image/topbkg.jpg">
  <tr>
    <td width="90%" valign="top">
<!--You can modify the text, color, size, number of loops and more on the flash header by editing the text file (fence.txt) included in the zip file.-->
</object></div></td>
    <td width="10%">
     <img border="0" src="../image/topright.jpg" width="203" height="68" align="right"></td>
  </tr>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#000000" background="../image/blackbar.jpg">
  <tr>
    <td width="100%"><img border="0" src="../image/blackbar.jpg" width="89" height="15"></td>
  </tr>
</table>
  <table width="100%">
  <tr>
    <td aling=right>
<!--        We are checking if admin user session is set or not, if not set then we are hiding the login button-->
	<?php
	if(isset($_SESSION['alogin']))
	{
	 echo "<div align=\"right\"><strong><a href=\"login.php\">Admin Home</a>|<a href=\"signout.php\">Signout</a></strong></div>";
	 }
	 else
	 {
	 	echo "&nbsp;";
	 }
	?>
	</td>
  </tr>
</table>
