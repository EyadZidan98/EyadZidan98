<?php

$l = mysqli_connect("localhost", "root", "12345678");	
mysqli_select_db($l, "proj");

	if (!$l) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($l, "delete from student_information where student_id ='".$_GET['del_id']."'");
header("Location: delete_st.php");

?>