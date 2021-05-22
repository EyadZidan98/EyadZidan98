<?php
include('adm_se.php');
if(!isset($_SESSION['login_user'])){
header("location: adm_lofg.php"); // Redirecting To Home Page
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
 
 .my-custom-scrollbar2 {
position: relative;
height: 500px;
width:450px;
top:100px;
overflow: auto;
overflow-x:hidden;
}
.table-wrapper-scroll-y2 {
display: block;
}
 
 .btn1{
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
.btn1{ 


  color: #3498db;
 
}
.btn1:hover{
  color: black;
}
.btn1::before{
  content: "";
  position: absolute;
  left: 0;
  width: 100%;
  height: 0%;
  background:#EC7063;
  z-index: -1;
  transition: 1.0s;
}
.btn1::before{
  top: 0;
  border-radius: 0 0 0  50%;
}

.btn1::before{
	
  height: 180%;
}
.btn1:hover::before{
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
               <a href="abcense.php"><span>Abcense</span></a>
			</div>
		</div>
	
	<b id="logout"  style="position: absolute; top: 15px; right: 45px; 
	"><a style="text-decoration:none; color:white;"href="adm_lout.php">Log Out</a></b>
	
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
  <a href="abcense.php"><button class="btn btn3" style="padding:12px 25px;">Abcense</button></a>

 
</div>
</nav>

-->

		<form action ="" method="post">
		 
  <div style="position: absolute; top: 30%; left: 10%;background-color:white;border-radius: 10% 10%; width:80%; height:60%;">
	
	<h3 style="position: absolute; top: 0%; left: 5%; font-size:18pt;" >Student information</h3>

 <table  style="position:absolute; top:15%; left:13%; font-size:12pt;"  cellspacing="17"  >
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
	


<i style = "display:none"><?php echo $login_session; ?></i>
          


	</form>

<?php 
		
		if (!$l) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT student_id,gender,phone_number,loction,class_id ,first_name
			FROM `student_information` ";

		$result = mysqli_query($l, $query);

           echo '<nav  class="table-wrapper-scroll-y3 my-custom-scrollbar3" style="position: relative; margin-top:-13%; left:22%;">';
        echo '<table style="position:relative; background:#F7DC6F; width:55%;  border: 1px solid #EC7063; left:-2%; margin-top:10%; font-size:14pt;" cellspacing="22"  >';

		while($row = mysqli_fetch_array($result)) {
        
		echo "<tr>";
		
		echo "<td>"; echo $row['student_id'];  echo "</td>";
		echo "<td>";echo "</td>";
		echo "<td>"; echo $row['first_name'];  echo "</td>";
		echo "<td>";echo "</td>";
		echo "<td>"; echo $row['gender'];  echo "</td>";
		echo "<td>";echo "</td>";
		echo "<td>"; echo $row['phone_number'];  echo "</td>";
		echo "<td>";echo "</td>";
		echo "<td>"; echo $row['loction'];  echo "</td>";
		echo "<td>";echo "</td>";
		echo "<td>"; echo $row['class_id'];  echo "</td>";
		
		echo "</tr>";
			
			}	
			
			echo '</table>';
            echo '</div>';
	
		mysqli_close($l);
				
?>

</body>
</html>