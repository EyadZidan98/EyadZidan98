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

	<title>Abcense</title>

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
               <a href="notes.php"><span>Notes</span></a>
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
			<a href="notes.php"> <button class="btn btn3" style="padding:12px 37px;">Notes</button></a>
			<a href="adm_disst.php"><button class="btn btn3" style="padding:12px 25px;">Display students</button></a></tr>

		</div>
	</nav>
    
	-->
	
<form action ="" method="post">

	<div style="position: absolute; top: 30%; left: 10%;background-color:white;border-radius: 10% 10%; width:80%; height:60%;">

		<h3 style="position: absolute; top: 0%; left: 5%; font-size:200%;" > Abcense </h1>

	<table style="position:absolute; top:15%; left:10%; font-size:150%;"  cellspacing="17"  >
        <thead>
            <tr>
              <td style="font-size:15pt;"> ID</td>
              <td style="font-size:15pt;"> Student name</td>          
            </tr>
        </thead>
	</table>
		                  
	<table style="position:absolute; top:20%; left:50%; font-size:150%;"  cellspacing="17" >
	  <tr>
		<td style="font-size:120%;">            Student Id:               </td>
		<td> <input style="border:2px solid gray; padding:5% 14%; font-size:70%; border-radius:15px;" id="stdi" type ="text" name="student_id_absence" placeholder = "Student Id"> </td>
	  </tr>
	  
	  <tr>
		<td style="font-size:120%;">            Full name:               </td>
		<td> <input style="border:2px solid gray; padding:5% 14%; font-size:70%; border-radius:15px;" id="stdfn" type ="text" name="student_name_abcense" placeholder = "Full names"> </td>
	  </tr>
	  
	  <tr>
		<td style="font-size:120%;">         Date and time:                    </td>
		<td> <input style="border:2px solid gray; padding:5% 14%; font-size:70%; border-radius:15px;" id="A" type ="date" name="datetime" placeholder = "Date and time"> </td>
	  </tr>

	</table>
                        
		 <div class="container1">
		     <input style="position: absolute; top: 80%; left: 50%; font-size:70%; padding: 1.5% 5%;" class="btn btn3" type="submit" name="submit_absence" value="Submit" >
		</div>
				   
	</div>
	
	

</form>
	
<?php 

		if (!$l) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT student_id ,first_name
			FROM  `student_information` ";

		$result = mysqli_query($l, $query);
	
		echo '<div  class="table-wrapper-scroll-y2 my-custom-scrollbar2" style="position: absolute; top: 35%; left: 10%;">';
		echo '<table style="position:absolute; top:20%; left:25%; font-size:15%;"  cellspacing="17"  >';

		while($row = mysqli_fetch_array($result)) {
        
?>
		
			<tr>
                
				<td style="font-size:20pt;">
					<div class="container1">
						<?php echo  $row['student_id']; ?>
					</div>
				</td>
			
				<td> 
					<div class="container1">     
						<button style="font-size:18pt;" class="btn1 btn3" name="fn" onclick = "showTeacherID('<?php echo $row['student_id']; ?>' , '<?php echo $row['first_name'];?>')" > <?php echo $row['first_name'] ?> </button>
					</div>
				</td>
			 
			</tr>
			
<?php
			
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
		
		if (isset($_POST["submit_absence"])) 
		{
			mysqli_query ($l, "INSERT INTO `proj`.`absence` (`absence`, `student_id`, `full_name`) 
			VALUES ('$_POST[datetime]', '$_POST[student_id_absence]', '$_POST[student_name_abcense]' )");	
		}
		
		
		mysqli_close($l);
				
?>
	
</body>
</html>