<?php
include('adm_se.php');
if(!isset($_SESSION['login_user'])){
header("location: adm_lofg.php"); // Redirecting To Home Page
}
?>

<!DOCTYBE html>

<html>

<head>

<?php 

	$l = mysqli_connect("localhost", "root", "12345678");	
	mysqli_select_db($l, "proj");	

?>

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
        <a href="" class="logo">
            <i class="iconfont icon_logo"></i>
            &nbsp;School
        </a>
		
		<div class="nav-menu">
            <div class="nav-item">
               <a href="add_teacher.php"><span>Add teacher</span></a>
			</div>
		</div>
		
		<div class="nav-menu">
            <div class="nav-item">
               <a href="add_st.php"><span>Add Student</span></a>
			</div>
		</div>
		
		<div class="nav-menu">
            <div class="nav-item">
               <a href="delete_teat.php"><span>Delete teacher</span></a>
			</div>
		</div>
		
		<div class="nav-menu">
            <div class="nav-item">
               <a href="delete_st.php"><span>Delete Student</span></a>
			</div>
		</div>
		
		<div class="nav-menu">
            <div class="nav-item">
               <a href="add_course.php"><span>Add course</span></a>
			</div>
		</div>
		
		<div class="nav-menu">
            <div class="nav-item">
               <a href="abcense.php"><span>Abcense</span></a>
			</div>
		</div>
		
		<div class="nav-menu">
            <div class="nav-item">
               <a href="adm_disst.php"><span>Display students</span></a>
			</div>
		</div>
		
		<b id="logout"  style="position: absolute; top: 15px; right: 45px; ">
	<a style="text-decoration:none; color:white;"href="adm_lout.php">Log Out</a></b>
		
</header>
	
	<div class="clear-space" style="height:60%;">
    <section class="content-banner" style="background-image: url('/images/blog-banner.png')">
	  
    </section>
</div>
	
	<!--
	
	<nav style="position: absolute; top: 30px; left: 450px;background-color:white;border-radius: 100px 100px; width:1500px; height:100px;">
		<div class="container">
 
			<a href="ent_adm.php"><button class="btn btn3" style="padding:12px 37px; ">Main</button></a>
			<a href="add_teacher.php"><button class="btn btn3" style="padding:12px 40px;">Add teacher</button></a>
			<a href="add_st.php"><button class="btn btn3" style="padding:12px 23px;">Add Student</button></a>
			<a href="delete_teat.php"><button class="btn btn3" style="padding:12px 20px;">Delete teacher</button></a>
			<a href="delete_st.php"><button class="btn btn3" style="padding:12px 20px;">Delete Student</button></a>
			<a href="add_course.php"><button class="btn btn3" style="padding:12px 23px;">Add course</button></a>
			<a href="abcense.php"><button class="btn btn3" style="padding:12px 25px;">Abcense</button></a>
			<a href="adm_disst.php"><button class="btn btn3" style="padding:12px 25px;">Display students</button></a></tr>

		</div>
	</nav>
          
		  -->
		  
<form action ="" method="post">

	<div style="position: absolute; top: 15%; left: 10%;background-color:white;border-radius: 10% 10%; width:80%; height:82%;">

		<h3 style="position: absolute; top: 0%; left: 5%; font-size:200%;" > Notes </h1>

	<table style="position:absolute; top:13%; left:15%; font-size:120%;"  cellspacing="17"  >
        <thead>
            <tr>
				<td style="font-size:120%;"> ID</td>
				<td style="font-size:120%;"> Student name</td>          
            </tr>
        </thead>
	</table>
		                 
	<table style="position:absolute; top:15%; left:50%; font-size:110%;"  cellspacing="17">
	
	  <tr>
		<td style="font-size:110%;">            Student Id:               </td>
		<td> <input style="border:2px solid gray; padding:5% 14%; font-size:50%; border-radius:15px;" id="stdi" type ="text" name="student_id_notes" placeholder = "Student Id" required> </td>
	  </tr>
	  
	  <tr>
		<td>
			<br>
		</td>
	  </tr>
	   
	  <tr>
		<td style="font-size:110%;">            Full name:               </td>
		<td> <input style="border:2px solid gray; padding:5% 14%; font-size:50%; border-radius:15px;" id="stdfn" type ="text" name="student_name_notes" placeholder = "Full name" required> </td>
	  </tr>
	  
	  <tr>
		<td>
			<br>
		</td>
	  </tr>
	   
	  <tr>
		<td style="font-size:110%;">     Notes:           </td>
		<td> <textarea style="border:2px solid gray; padding:5% 14%; font-size:50%; border-radius:15px;" rows="10" cols="50" name = "notes" placeholder = "Enter your notes here..." required ></textarea> </td>
	  </tr>

	</table>
		
	<div class="container">
		<input style="position: absolute; top: 85%; left: 15%; font-size:70%; padding: 1.5% 5%;" class="btn btn3" type="submit" name="submit" value="Submit notes">
		<input style="position: absolute; top: 85%; left: 50%; font-size:70%; padding: 1.5% 5%;" class="btn btn3" type="submit" name="submitall" value="Submit all">
	</div>
	
	</div>
	
		
		
<?php 

		if (!$l) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT student_id,first_name
			FROM  `student_information` ";

		$result = mysqli_query($l, $query);
	
		echo '<div  class="table-wrapper-scroll-y2 my-custom-scrollbar2" style="position: absolute; top: 20%; left: 3%;">';
		echo '<table style="position:absolute; top:27%; left:10%; font-size:120%;"  cellspacing="17" class="z" cellspacing="15"  >';
		
		$rowNum = 1;
		
		while($row = mysqli_fetch_array($result)) {
        
?>

			<tr>
                
				<td style="font-size:20pt;"> 
					<div class="container1">
						<?php echo $row['student_id']; ?>
					</div>
				</td>
			
			<input value = "<?php echo $row['first_name']; ?>" style = "display:none;">
			
				<td> 
					<div class="container1">     
						<button style="font-size:20pt;" class="btn1 btn3" type="submit" name="fn" onclick = "showNotes('<?php echo $row['student_id']; ?>' , '<?php echo $row['first_name'];?>')" > <?php echo $row['first_name']; ?> </button>
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
			
			function showNotes(ID , Name)
			{
				document.getElementById("stdi").value = ID;
				document.getElementById("stdfn").value = Name;				
			}
		
		</script>
		
<?php
		
		if (isset($_POST["submit"])) 
		{
		mysqli_query ($l, "INSERT INTO `proj`.`notes` (`nots`,`full_name`,`student_id`) 
			VALUES ('$_POST[notes]','$_POST[student_name_notes]','$_POST[student_id_notes]' )");
		}
		
		
		if (isset($_POST["submitall"])) 
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