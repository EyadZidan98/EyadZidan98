<?php
include('sess.php');
if(!isset($_SESSION['login_user'])){
header("location: tch_lofg.php"); // Redirecting To Home Page
}
/*	
	if (isset($_POST["submit_all"])) 
		{
		$rowCount = $_POST['rowCount'];
		$indexInput = 1;
		$rowNum = 1;
			for ($i = 0; $i < $rowCount; $i++ , $rowNum++) {
			
			$strID = $rowNum.',stdID';
			$si = $_POST[$strID];
			
			$strName = $rowNum.',fullName';
			$fn = $_POST[$strName];

			$courseId = $rowNum.',courseId';
			$ci = $_POST[$courseId];
			
			$strINput1 = ''.$indexInput++;
			$strINput2 = ''.$indexInput++;
			$strINput3 = ''.$indexInput++;
			$m1 = $_POST[$strINput1 ];
			$m2 = $_POST[$strINput2];
			$m3 = $_POST[$strINput3];
		
		
			mysqli_query ($conn, "INSERT INTO `proj`.`marks` (`student_id`, `full_name`, `mark1`, `mark2`, `mark3`) 
			VALUES ('$si', '$fn', '$m1', '$m2', '$m3')");	

			}
			
		}
		
		if (isset($_POST['edit'])){
		
		$rowCount = $_POST['rowCount'];
		$indexInput = 1;
		$rowNum = 1;
		
		for ($i = 0; $i < $rowCount; $i++ , $rowNum++) {
		
			$strID = $rowNum.',stdID';
			$si = $_POST[$strID];
		
			$strINput1 = ''.$indexInput++;
			$strINput2 = ''.$indexInput++;
			$strINput3 = ''.$indexInput++;
			$m1 = $_POST[$strINput1 ];
			$m2 = $_POST[$strINput2];
			$m3 = $_POST[$strINput3];
		
		mysqli_query($l, "UPDATE `marks` SET `mark1` = '$m1',`mark2` = '$m2',`mark3` = '$m3' 
		WHERE student_id = '$si' ");
		
		}
	}
			
*/
?>

<!DOCTYPE html>

<?php 

	$l = mysqli_connect("localhost", "root", "12345678");	
	mysqli_select_db($l, "proj");

?>

<html>

<head>

	<title>disply marks</title>

	<meta charset="utf-8">
 
	<link rel="stylesheet" href="styless12.css">
	<link rel="stylesheet" href="head1.css">
	<link rel="stylesheet" href="h2.css">

	<style>
 
		#A{border:2px solid gray; padding:15px 40px; font-size:16px; border-radius:15px;}
 
	</style>

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
               <a href="displaystudents.php"><span>Display students</span></a>
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

	<div style="position: absolute; top: 5%; left: 10%;background-color:white;border-radius: 20% 20%; width:80%; height:15%;">
		<div class="container">

			<a href="teacher.php"><button class="btn btn3" style="padding:1% 5%;"  >  Main  </button></a>
			<a href="mmm111.php"><button class="btn btn3" style="padding:1% 5%;"  >  Add mark </button> </a>
			<a href="notestea.php"><button class="btn btn3" style="padding:1% 5%;" >  Notes  </button></a>
			<a href="displaystudents.php"><button class="btn btn3" style="padding:1% 5%;" >Display Students</button></a>
  
		</div>
	</div>
 
 -->
 
<form action ="" method="post">
		 
	<div style="position: absolute; top: 30%; left: 10%;background-color:white;border-radius: 10% 10%; width:80%; height:60%;">
	
		<h3 style="position: absolute; top: 0%; left: 5%; font-size:200%;" >Student Marks</h3>
 
	<table style="position:absolute; top:15%; left:30%; font-size:150%;"  cellspacing="17"  >
          
		 <thead>
           
		   <tr>
              <th> ID</th>
              <th> </th>
              <th> Full Name</th>
              <th> </th>
              <th> mark 1</th>
			  <th> </th>
              <th> mark 2</th>
			  <th> </th>
			  <th> mark 3</th>
           </tr>
          
		 </thead>
		  
		  </table>
		  
	</div>

</form>

<?php 
	
		if (!$l) {
			die("Connection failed: " . mysqli_connect_error());
		}


		$q1 = "SELECT class_id FROM `courses` WHERE
			tuter_id = '$_SESSION[login_user]'";
			
		$re1 = mysqli_query($l, $q1);	

		while($r1 = mysqli_fetch_array($re1)) {
			
			 $cl_id = $r1['class_id'];
			
		}
		
		$q2 = "SELECT course_id FROM `courses` WHERE
			tuter_id = '$_SESSION[login_user]' ";
			
		$re2 = mysqli_query($l, $q2);
		
		$c_id=array();
		
		$c = 0;
		
		while($r2 = mysqli_fetch_array($re2)) {
			
			 $c_id[] = $r2['course_id'];
			
			$c++;
			
		}
		
		$p=0;	
		$a=0;
		
		while($p < $c){

		$query = "SELECT student_id,mark1,mark2,mark3 ,full_name
			FROM `marks` Where course_id = '$c_id[$p]' ";

		$result = mysqli_query($l, $query);	
			
	
	    echo '<div class="table-wrapper-scroll-y3 my-custom-scrollbar3" style="position: absolute; top: 45%; left: 35%;  ">';
        echo '<table style="position:absolute;  left:30% ;font-size:120%;" cellspacing="20">';
	
	 while($row = mysqli_fetch_array($result)) {
        
		echo "<tr>";
		echo "<td>"; echo $row['student_id'];  echo "</td>";
		echo "<td>";echo "</td>";
		echo "<td>"; echo $row['full_name'];  echo "</td>";
		echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";
		echo "<td>"; echo $row['mark1'];  echo "</td>";
		echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";
		echo "<td>"; echo $row['mark2'];  echo "</td>";
		echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";
		echo "<td>"; echo $row['mark3'];  echo "</td>";
		
		echo "</tr>";
			
			$p++;
			
			}
	
		echo '</table>';
		echo '</div>';
		
		}
		
		mysqli_close($l);
				
?>



</body>
</html>