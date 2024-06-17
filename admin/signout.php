<?php
//For signout we need to destroy the session
session_start();
session_destroy();
header("Location: index.php");
?>
