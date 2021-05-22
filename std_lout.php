<?php
session_start();
if(session_destroy()) // Destroying All Sessions {
header("Location: std_lofg.php"); // Redirecting To Home Page

?>
