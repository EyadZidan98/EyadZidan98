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

	<title>Notes</title>

	<meta charset="utf-8">

	<link rel="stylesheet" href="styless12.css">
	<link rel="stylesheet" href="head1.css">
	<link rel="stylesheet" href="h2.css">

<!--

	<style>
 
.my-custom-scrollbar2 
{
	position: relative;
	height: 500px;
	width:450px;
	top:100px;
	overflow: auto;
	overflow-x:hidden;
}

.table-wrapper-scroll-y2 
{
	display: block;
}
 
.btn1
{
	border: 2px solid lightgray;
	border-radius:15px ;
	background: none;
	padding: 7px 35px;
	font-size: 18px;
	font-family: "montserrat";
	cursor: pointer;
	margin: 10px;
	transition: 0.8s;
	position: relative;
	overflow: hidden;
}

.btn1
{ 
	color: #3498db;
}

.btn1:hover
{
	color: black;
}

.btn1::before
{
	content: "";
	position: absolute;
	left: 0;
	width: 100%;
	height: 0%;
	background:#EC7063;
	z-index: -1;
	transition: 1.0s;
}

.btn1::before
{
	top: 0;
	border-radius: 0 0 0  50%;
}

.btn1::before
{	
	height: 180%;
}

.btn1:hover::before
{
	height: 0%;
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

	<nav style="position: absolute; top: 30px; left: 450px;background-color:white;border-radius: 100px 100px; width:1500px; height:100px;">
		<div class="container">
 
			<a href="teacher.php"><button class="btn btn3" style="padding:15px 60px;"  >  Main  </button></a>
			<a href="mmm111.php"><button class="btn btn3" style="padding:15px 60px;"  >  Add mark </button> </a>
			<a href="displaystudents.php"><button class="btn btn3" style="padding:15px 30px;" >Display students</button></a>
			<a href="displayst.php"><button class="btn btn3" style="padding:15px 30px;" >Display Marks</button></a>

		</div>
	</nav>

-->

<form action ="" method="post">

	<div style="position: absolute; top: 15%; left: 10%;background-color:white;border-radius: 10% 10%; width:80%; height:82%;">

		<h3 style="position: absolute; top: 0%; left: 5%; font-size:200%;" > Notes </h1>

	<table style="position:absolute; top:15%; left:10%; font-size:150%;"  cellspacing="17"  >
        <thead>
            <tr>
				<th style="font-size:120%;"> ID</th>
				<th>  </th>
				<th style="font-size:120%;"> Full Name</th>          
            </tr>
        </thead>
	</table>
		           
  <table style="position:absolute; top:15%; left:50%; font-size:150%;"  cellspacing="17" >
	  <tr>
		<td style="font-size:100%;">            Student Id:               </td>
		<td> <input id="stdi" type ="text" style="border:2px solid gray; padding:5% 14%; font-size:50%; border-radius:15px;" name="student_id_notes" placeholder = "Student Id" required> </td>
	  </tr>
	    
		<tr>
		<td>
			<br>
		</td>
	  </tr>
		
	  <tr>
		<td style="font-size:100%;">            Full name:               </td>
		<td> <input id="stdfn" type ="text" style="border:2px solid gray; padding:5% 14%; font-size:50%; border-radius:15px;" name="student_name_notes" placeholder = "Full names" required> </td>
	  </tr>
	  
	  <tr>
		<td>
			<br>
		</td>
	  </tr>
	  
	  <tr>
		<td style="font-size:100%;">     Notes:           </td>
		<td> <textarea style="border:2px solid gray; padding:5% 14%; font-size:50%; border-radius:15px;" rows="8" cols="40" name = "notes" placeholder = "Enter your notes here..." required ></textarea> </td>
	  </tr>

	</table>
                        
		<div class="container1">
		    <input style="position: absolute; top: 85%; left: 15%; font-size:70%; padding: 1.5% 5%;" class="btn btn3" type="submit" name="submit_notes" value="Submit Notes" >
		</div>
		
		<div class="container1">
		    <input style="position: absolute; top: 85%; left: 45%; font-size:70%; padding: 1.5% 5%;" class="btn btn3" type="submit" name="submit_notes_all" value="Submit all " >
		 </div>
	
	</div>
	
	

<?php 
		
		if (!$l) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$q = "SELECT student_id ,first_name
			FROM  `student_information` where class_id = (SELECT class_id FROM `classes` WHERE 
			tuter_id = '$_SESSION[login_user]' ) ";

		$result = mysqli_query($l, $q);
	
		echo '<div  class="table-wrapper-scroll-y2 my-custom-scrollbar2" style="position: absolute; top: 15%; left: 10%;">';
		echo '<table style="position:absolute; top:35%; left:-21%; font-size:150%;"  cellspacing="17" class="z" cellspacing="15"  >';
		
		$rowNum = 1;
		
		while($row = mysqli_fetch_array($result)) {
        
?>
				
			<tr>
                
				<td style="font-size:16pt;">
					<div class="container1">
						<?php echo $row['student_id']; ?>
					</div>
				</td>
			
				<td>
					<div class="container1">    
						<button style="font-size:16pt;" class="btn1 btn3" type="submit" name="fn" onclick = "showTeacherID('<?php echo $row['student_id']; ?>' , '<?php echo $row['first_name'];?>')" > <?php echo $row['first_name'] ?> </button>
					</div>
				</td>
			 
			 </tr>
			
			<input type "text" value = 	"<?php echo $row['student_id']; ?>" name = "<?php echo $rowNum.',stdID' ?>"	style = "display:none;" >
			<input type "text" value = 	"<?php echo $row['first_name']; ?>" name = "<?php echo $rowNum.',fullName' ?>"	style = "display:none;" >
			
<?php
			
	$rowNum++;
			
		}
		
		echo '</table>';
		echo '</div>';
		
?>
		
		<script>
			
			function showTeacherID(ID , Name)
			{
				document.getElementById("stdi").value = ID;
				document.getElementById("stdfn").value = Name;		
			}
		
		</script>
		
<?php
		
		if (isset($_POST["submit_notes"])) 
		{
		mysqli_query ($l, "INSERT INTO `proj`.`notes` (`nots`,`full_name`,`student_id`) 
			VALUES ('$_POST[notes]','$_POST[student_name_notes]','$_POST[student_id_notes]' )");
		}
		
		if (isset($_POST["submit_notes_all"])) 
		{
			
		$rowC = $_POST['rowCount'];
		$rowN = 1;
			
			for ($i = 0; $i < $rowC; $i++ , $rowN++) {
				
			$strID = $rowN.',stdID';
			$si = $_POST[$strID];
			
			$strName = $rowN.',fullName';
			$fn = $_POST[$strName];
				
			$nt = $_POST['notes'];	
				
		mysqli_query ($l, "INSERT INTO `proj`.`notes` (`nots`,`full_name`,`student_id`) 
			VALUES ('$nt','$fn','$si' )");
		}
	}	
		
		mysqli_close($l);
				
?>

	<input type "text" value = 	"<?php echo --$rowNum; ?>" name = "rowCount"	style = "display:none;" >

</form>
	
</body>
</html>