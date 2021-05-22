<?php
include('sess.php');
if(!isset($_SESSION['login_user'])){
header("location: tch_lofg.php"); // Redirecting To Home Page
}
?>

<!DOCTYPE html>

<?php 

	$l = mysqli_connect("localhost", "root", "12345678");	
	mysqli_select_db($l, "proj");

?>

<html>

<head>

	<title>disply students</title>

	<meta charset="utf-8">
 
	<link rel="stylesheet" href="styless12.css">
	<link rel="stylesheet" href="head1.css">
	<link rel="stylesheet" href="h2.css">
<!--
	<style>
 
 
 
.my-custom-scrollbar3 
{
	position: relative;
	height: 300px;
	width:900px;
	top:135px;
	overflow: auto;
	overflow-x:hidden;
}

	#A{border:2px solid gray; padding:15px 40px; font-size:16px; border-radius:15px;}
 
	</style>

-->

</head>

<body style="background-color: #777271; background-size: 100%;">

<header class="header-of-page">
    <div class="header-content black-bg">
        <a href="teacher.php" class="logo">
            <i class="iconfont icon_logo"></i>
            &nbsp;School
        </a>
        <div class="nav-menu">
            <div class="nav-item">
               <a href="teacher.php"><span>Main</span></a>
			</div>
		</div>
		
		<div class="nav-menu">
            <div class="nav-item">
               <a href="mmm111.php"><span>Add mark</span></a>
			</div>
		</div>
		
		<div class="nav-menu">
            <div class="nav-item">
               <a href="notestea.php"><span>Notes</span></a>
			</div>
		</div>
		
		<div class="nav-menu">
            <div class="nav-item">
               <a href="displayst.php"><span>Display Marks</span></a>
			</div>
		</div>
		
		<b id="logout"  style="position: absolute; top: 15px; right: 45px; ">
	<a style="text-decoration:none; color:white;"href="looutt.php">Log Out</a></b>
		
</header>

<div class="clear-space" style="height:60%;">
    <section class="content-banner" style="background-image: url('/images/blog-banner.png')">
	  
    </section>
</div>
<!--

	<nav style="position: absolute; top: 30px; left: 450px;background-color:white;border-radius: 100px 100px; width:1500px; height:100px;">
		<div class="container">
 
			<a href="teacher.php"><button class="btn btn3" style="padding:15px 60px;"  >  Main  </button></a>
			<a href="mmm111.php"><button class="btn btn3" style="padding:15px 60px;"  >  Add mark </button> </a>
			<a href="notestea.php"><button class="btn btn3" style="padding:15px 60px;" >  Notes  </button></a>
			<a href="displayst.php"><button class="btn btn3" style="padding:15px 30px;" >Display Marks</button></a>
  
		</div>
	</nav>
 
 -->
 
<form action ="" method="post">
		 
	<div style="position: absolute; top: 30%; left: 10%;background-color:white;border-radius: 10% 10%; width:80%; height:60%;">
	
		<h3 style="position: absolute; top: 0%; left: 5%; font-size:18pt;" >Student information</h3>

	<table  style="position:absolute; top:15%; left:12%; font-size:12pt;"  cellspacing="19"  >
       
	   <thead>
            <tr>
              <th> Student Id</th>
              <th> </th>
			  
              <th>  Name</th>
			  <th> </th>
			  <th> </th>
			  <th> </th>
              <th> Gender</th>
			  <th> </th>
			  <th> </th>
              <th> Phone Number</th>
			  <th> </th>
			  <th> </th>
			  <th> </th>
			  <th> </th>
			  <th> Location</th>
			  <th> </th>
		
			  <th> </th>
			  <th> </th>
			  <th> Class Id</th>             
            </tr>
         </thead>
		 
	 </table>
	
	</div>
	      
	

</form>

<?php 
		
		if (!$l) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT student_id,gender,phone_number,loction,class_id ,first_name
			FROM  `student_information` where class_id = (SELECT class_id FROM `courses` WHERE 
			tuter_id = '$_SESSION[login_user]')";

		$result = mysqli_query($l, $query);

          echo '<nav  class="table-wrapper-scroll-y3 my-custom-scrollbar3" style="position: relative; margin-top:-13%; left:20%;">';
        echo '<table style="position:relative; background:#F7DC6F; width:55%;  border: 1px solid #EC7063; left:0%; margin-top:10%; font-size:14pt;" cellspacing="22"  >';

		while($row = mysqli_fetch_array($result)) {
        
		echo "<tr>";
		
		echo "<td>"; echo $row['student_id'];  echo "</td>";
		echo"<td>";echo"</td>";
		echo "<td>"; echo $row['first_name'];  echo "</td>";
		echo "<td>"; echo $row['gender'];  echo "</td>";
		echo "<td>"; echo $row['phone_number'];  echo "</td>";
		echo "<td>"; echo $row['loction'];  echo "</td>";
		echo "<td>"; echo $row['class_id'];  echo "</td>";
		
		echo "</tr>";
			
			}	
			
		echo '</table>';
        echo '</nav>';
	
		mysqli_close($l);
				
?>



</body>
</html>