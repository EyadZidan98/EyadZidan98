<?php
session_start();
if(session_destroy()) // Destroying All Sessions {
header("Location: adm_lofg.php"); // Redirecting To Home Page

?>
