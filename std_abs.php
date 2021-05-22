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

	<title>Absence</title>

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
               <a href="std_nt.php"><span>Notes</span></a>
			</div>
		</div>
		
		<div class="nav-menu">
            <div class="nav-item">
               <a href="std_mark.php"><span>Display Marks</span></a>
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
			<a href="std_nt.php"><button class="btn btn3" style="padding:1% 5%;" >  Notes  </button></a>
			<a href="std_mark.php"><button class="btn btn3" style="padding:1% 5%;" >Display Marks</button></a>
     
		</div>
	</div>

-->

<form action ="" method="post">
		 
	<div style="position: absolute; top: 30%; left: 27%;background-color:white;border-radius: 10% 10%; width:40%; height:60%;">
		
		<h3 style="position: absolute; top: 0%; left: 5%; font-size:200%;" >Absence</h3>
 
	<table  style="position:absolute; top:15%; left:30%; font-size:150%;"  cellspacing="17"  >
          <thead>
            <tr >
              <th> Absence</th>
            </tr>
          </thead>
	  </table>
	
	</div>

</form>

<?php 
		
		if (!$l) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT absence
			FROM  `absence` where student_id = '$_SESSION[login_user]' ";

		$result = mysqli_query($l, $query);

        echo '<nav class="table-wrapper-scroll-y3 my-custom-scrollbar3" style="relative: absolute; top: 40%; left:30%;">';
        echo '<table style="position:relative; background:#F7DC6F; width:20%;  border: 1px solid #EC7063; left:35%; margin-top:-4%;  font-size:120%;" cellspacing="25">';

		while($row = mysqli_fetch_array($result)) {
        
		echo "<tr>";
		
		echo "<td>"; echo $row['absence'];  echo "</td>";
		
		echo "</tr>";
			
			}	
			
		echo '</table>';
        echo '</nav>';
	
		mysqli_close($l);
				
?>

</body>
</html>