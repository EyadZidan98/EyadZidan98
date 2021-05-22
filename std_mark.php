<?php
include('std_se.php');
if(!isset($_SESSION['login_user'])){
header("location: std_lofg.php"); // Redirecting To Home Page
}
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
        <a href="student.php" class="logo">
            <i class="iconfont icon_logo"></i>
            &nbsp;School
        </a>
        <div class="nav-menu">
            <div class="nav-item">
               <a href="student.php"><span>Main</span></a>
			</div>
		</div>
		
		<div class="nav-menu">
            <div class="nav-item">
               <a href="std_abs.php"><span>Abcense</span></a>
			</div>
		</div>
		
		<div class="nav-menu">
            <div class="nav-item">
               <a href="std_nt.php"><span>Notes</span></a>
			</div>
		</div>
		
		<b id="logout"  style="position: absolute; top: 15px; right: 45px; ">
	<a style="text-decoration:none; color:white;"href="std_lout.php">Log Out</a></b>
		
</header>

<div class="clear-space" style="height:60%;">
    <section class="content-banner" style="background-image: url('/images/blog-banner.png')">
	  
    </section>
</div>

<!--

	<div style="position: absolute; top: 5%; left: 10%;background-color:white;border-radius: 20% 20%; width:80%; height:15%;">

		<div class="container">

			<a href="student.php"><button class="btn btn3" style="padding:1% 5%;"  >  Main   </button></a> 
			<a href="std_abs.php"><button class="btn btn3" style="padding:1% 5%;" >Abcense   </button></a>
			<a href="std_nt.php"><button class="btn btn3" style="padding:1% 5%;" >  Notes  </button></a>
    
		</div>
	</div>

-->

<form action ="" method="post">
		 
	<div style="position: absolute; top: 30%; left: 20%;background-color:white;border-radius: 10% 10%; width:60%; height:60%;">
	
		<h3 style="position: absolute; top: 0%; left: 5%; font-size:200%;" >Student Marks</h3>
 
	<table  style="position:absolute; top:15%; left:30%; font-size:150%;"  cellspacing="17"  >
          
		<thead>       
		   <tr>
              <th> mark 1</th>
			  <th> </th>
              <th> mark 2</th>
			  <th> </th>
			  <th> mark 3</th>
			  <th> </th>
			  <th> TOTAL</th>
            </tr> 
		</thead>
		  
	</table>
		  
	</div>

</form>

<?php 
	
		if (!$l) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$q1 = "SELECT class_id FROM `student_information` WHERE
			student_id = '$_SESSION[login_user]'";
			
		$re1 = mysqli_query($l, $q1);	

		while($r1 = mysqli_fetch_array($re1)) {
			
			 $cl_id = $r1['class_id'];
			
		}
		
		$q2 = "SELECT course_id FROM `courses` WHERE
			class_id = '$cl_id' ";
			
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

		$query = "SELECT mark1,mark2,mark3,SUM((mark1 + mark2 + mark3)) as SUM, course_name
			FROM  `marks` Where student_id = '$_SESSION[login_user]' and course_id = '$c_id[$p]' ";

	    echo '<div class="table-wrapper-scroll-y3 my-custom-scrollbar3" style="position: absolute; top: calc(270px + '.$a.'px); left: 30%;">';
        echo '<table style="position:absolute;  left:30%; font-size:120%;" cellspacing="20" cellpadding="20">';

		$result = mysqli_query($l, $query);
		while($row = mysqli_fetch_array($result)) {
       
		echo "<tr>";
		echo "<td>";  echo "<h3>"; echo $row['course_name']; echo "</h3>";  echo "</td>"; 
		echo "<td>"; echo $row['mark1'];  echo "</td>";
		echo "<td>";echo "</td>";
		echo "<td>"; echo $row['mark2'];  echo "</td>";
		echo "<td>";echo "</td>";
		echo "<td>"; echo $row['mark3'];  echo "</td>";
	
		echo "<td>"; echo $row['SUM'];  echo "</td>";
		
		echo "</tr>";
		
			}
				
		echo '</table>';
		echo '</div>';
		
		$p++;
		$a = $a + 40;
		
		}
		/*
		$query1 = "SELECT course_name 
			FROM  `courses` Where 	class_id = (SELECT class_id FROM `student_information` WHERE
			student_id = '$_SESSION[login_user]') ";
		
		$result1 = mysqli_query($l, $query1);	
			
	    echo '<div class="table-wrapper-scroll-y3 my-custom-scrollbar3" style="position: absolute; top: 39%; left: 30%;">';
        echo '<table style="position:absolute;  left:30%; font-size:120%;" cellspacing="20" cellpadding="20">';
	
		while($row1 = mysqli_fetch_array($result1)) {
        
		echo "<tr>";
		echo "<td>"; echo"<h3>"; echo $row1['course_name']; echo"</h3>"; echo "</td>";
		echo "</tr>";
			
			}
	
		echo '</table>';
		echo '</div>';
	*/
		mysqli_close($l);
				
?>

</body>
</html>