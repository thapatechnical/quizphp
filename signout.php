<?php
//when student click on signout then we are resetting the session
session_start();
session_destroy();
header("Location: index.php");
?>
