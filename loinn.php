<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else{
// Define $username and $password
$username = $_POST['username'];
$password = $_POST['password'];
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "12345678", "proj");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT tuter_id, pass_tutor from tuter where tuter_id=? AND pass_tutor=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->bind_result($username, $password);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row {
	{$_SESSION['login_user'] = $username; // Initializing Session
	header("location: teacher.php"); // Redirecting To Profile Page
	} 
}
mysqli_close($conn); // Closing Connection
}
?>
