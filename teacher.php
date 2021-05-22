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

	<title>main</title>

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

	<div style="position: absolute; top: 5%; left: 10%;background-color:white;border-radius: 20% 20%; width:80%; height:15%;">
		<div class="container">
 
			<a href="mmm111.php"><button class="btn btn3" style="padding:1% 5%;"  >  Add mark </button> </a> 
			<a href="notestea.php"><button class="btn btn3" style="padding:1% 5%;" >  Notes  </button></a>
			<a href="displaystudents.php"><button class="btn btn3" style="padding:1% 5%;" >Display students</button></a>
			<a href="displayst.php"><button class="btn btn3" style="padding:1% 5%;" >Display Marks</button></a>
  
		</div>
	</div>

-->

<form action ="mmm111.php" method="post">

<?php

		if (!$l) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT phone_number ,first_name
			FROM  `tuter` WHERE tuter_id = '$_SESSION[login_user]'";

		$result = mysqli_query($l, $query);

		echo '<div style="position: absolute; top: 30%; left: 10%;background-color:white;border-radius: 10% 10%; width:80%; height:60%;">';

		echo '<h3 style="position: absolute; top: 10%; left: 5%; font-size:200%;" > Teacher</h1>';	
	
		echo '<table class="u" cellspacing="17" cellpadding="10px" style="position:absolute; top:20%; left:30%; font-size:150%;">';

		echo '<th >';  echo 'Name:';   echo '</th>';  echo '<br>';
		echo '<th >';   echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Phone number:';   echo '</th>'; echo '<br>';
	

		echo '</table>';
	
		echo '<table style="position:absolute; top:22%; left:38%; font-size:150%;"  cellspacing="17">';
	
		while($row = mysqli_fetch_array($result)) {
       
		echo '<tr>';
		
		echo '<td >'; echo $row['first_name'];  echo '</td>'; echo '<br>';
		echo '<td>';echo '</td>';echo '<td>';echo '</td>';echo '<td>';echo '</td>';echo '<td>';echo '</td>';echo '<td>';echo '</td>';echo '<td>';
		echo '</td>';echo '<td>';echo '</td>';echo '<td>';echo '</td>';echo '<td>';echo '</td>';echo '<td>';echo '</td>';echo '<td>';echo '</td>';
		echo '<td >'; echo $row['phone_number'];  echo '</td>'; echo '<br>';
		echo '</tr>';
		
		}
			
		echo '</table>';
					
			$q="SELECT course_name,course_id
				FROM courses WHERE tuter_id = '$_SESSION[login_user]'";

	
		echo '<table class="u" cellspacing="17" style="position:absolute; top:40%; left:30%; font-size:150%;"  cellspacing="17">';
		
			echo '<th >';  echo 'Course name:';   echo '</th>'; echo '<br>';
			echo '<td>';echo '</td>';echo '<td>';echo '</td>';echo '<td>';echo '</td>';echo '<td>';echo '</td>';
			echo '<td>';echo '</td>';echo '<td>';echo '</td>';echo '<td>';echo '</td>';
			echo '<th >';  echo 'Course Id:';   echo '</th>'; echo '<br>';
						
		echo '</table>';
		
		echo '<table style="position:absolute; top:40%; left:44%; font-size:150%;">';
		
			$result = mysqli_query($l, $q);
			
			$rowNum = 1;
			
			while($row = mysqli_fetch_array($result)) {
		
?>

		<tr>
				
			<td> 
				<div class="container1">
					<input  class="btn1 btn3" style="font-size:100%;" type="submit" name="sbm_cn" value=" <?php echo $row['course_name']; ?>" > 
				</div>   
			</td>   
	<br>
				
				<td>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      </td>
				<td>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      </td>
				<td>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      </td>
				
			<td style="font-size:16pt;" >  <?php echo $row['course_id']; ?>  </td>     <br>
			
		</tr>
				
	<input type "text" value = 	"<?php echo $row['course_id']; ?>" name = "<?php echo $rowNum.',coid' ?>"	style = "display:none;" >
					

<?php		
			
	}
			
		echo '</table>';
			
		echo '</div>';	
		
		mysqli_close($l);
				
?>

</form>

</body>
</html>