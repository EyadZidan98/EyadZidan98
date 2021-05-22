<?php
include('adm_se.php');
if(!isset($_SESSION['login_user'])){
header("location: adm_lofg.php"); // Redirecting To Home Page
}
?>

<!DOC8TYBE html>

<html>

<head>

	<?php 

		$l = mysqli_connect("localhost", "root", "12345678");	
		mysqli_select_db($l, "proj");

	?>

		<title>Add Student</title>

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
               <a href="abcense.php"><span>Abcense</span></a>
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
			<a href="add_teacher.php"><button class="btn btn3" style="padding:12px 23px;">Add teacher</button></a>
			<a href="delete_teat.php"><button class="btn btn3" style="padding:12px 20px;">Delete teacher</button></a>
			<a href="delete_st.php"><button class="btn btn3" style="padding:12px 20px;">Delete Student</button></a>
			<a href="add_course.php"><button class="btn btn3" style="padding:12px 23px;">Add course</button></a>
			<a href="notes.php"> <button class="btn btn3" style="padding:12px 37px;">Notes</button></a>
			<a href="abcense.php"><button class="btn btn3" style="padding:12px 25px;">Abcense</button></a>
			<a href="adm_disst.php"><button class="btn btn3" style="padding:12px 25px;">Display students</button></a></tr>

		</div>
	
	</nav>

-->
<form action ="add_st.php" method="post">

	<div style="position: absolute; top: 30%; left: 1%;background-color:white;border-radius: 10% 10%; width:99%; height:85%;">

			<h3 style="position: absolute; top: 0%; left: 1%; font-size:200%;" > Add new student </h1>

		<table style="position:absolute; top:20%; left:10%; font-size:150%;"  cellspacing="17">
	
			<tr>
					<td style="font-size:100%;">     First name:           </td>
					<td> <input style="border:2px solid gray; padding:5% 14%; font-size:60%; border-radius:15px;" id="A" type ="text" name="n1" placeholder = "First name" required> </td>
					
					
					
					<td style="font-size:100%;">     Gender:           </td>
					<td> 
						<select id="A" name = "gender" placeholder = "Gender" style="  width:150px;" size="1" required>
							<option value="Male" name = "male">male</option>
							<option value="Female" name = "female">female</option>
					</td>	  
	
				<tr>
					<td style="font-size:100%;">     Second name:          </td>
					<td> <input style="border:2px solid gray; padding:5% 14%; font-size:60%; border-radius:15px;" id="A" type ="text" name="n2" placeholder = "second name" required> </td>
					<td style="font-size:110%;">      Phone number:                     </td>
					<td> <input style="border:2px solid gray; padding:5% 14%; font-size:60%; border-radius:15px;" id="A" type ="number" name="phone_number" placeholder = "07..........." required> </td>
				</tr>		
		
			</tr>
	           	   
			<tr>
	 
				<td style="font-size:100%;">     Third name:           </td>
				<td> <input style="border:2px solid gray; padding:5% 14%; font-size:60%; border-radius:15px;" id="A" type ="text" name="n3" placeholder = "Third name" required> </td>
		
				<td style="font-size:100%;">     Location:           </td>
				<td> <input style="border:2px solid gray; padding:5% 14%; font-size:60%; border-radius:15px;" id="A" type ="text" name="location" placeholder = "Location" required> </td>
	
			</tr>
	                   
			<tr>
				<td style="font-size:100%;">     Last name:           </td>
				<td> <input style="border:2px solid gray; padding:5% 14%; font-size:60%; border-radius:15px;" id="A" type ="text" name="n4" placeholder = "Last name" required> </td>
		
				<td style="font-size:100%;">         Class Id:                    </td>
				<td> <input style="border:2px solid gray; padding:5% 14%; font-size:60%; border-radius:15px;" style="border:2px solid gray; padding:15px 40px; font-size:16px; border-radius:15px;" id="cli" type ="text" name="classid" placeholder = "Class Id" required readonly> </td>
			</tr>

			<tr>
		
				<td style="font-size:100%;">         Class name:                    </td>
				<td> <input style="border:2px solid gray; padding:5% 14%; font-size:60%; border-radius:15px;" style="border:2px solid gray; padding:15px 40px; font-size:16px; border-radius:15px;" id="cln" type ="text" name="classname" placeholder = "Class Name" required readonly> </td>
		
				<td style="font-size:100%;">         Section:                    </td>
				<td> <input style="border:2px solid gray; padding:5% 14%; font-size:60%; border-radius:15px;" id="A" type ="text" name="section" placeholder = "Section" required> </td>
		
			</tr>
			
			
		</table>   <div class="container1">
		          <input style="position: absolute; top: 80%; left: 40%; font-size:100%; padding: 1.5% 5%;"  class="btn btn3"type="submit" name="submit" value="Submit Student"></div>
	
	</div>
        	
		
<?php	

	$query = "SELECT class_id,class_name 
			FROM  `classes` ";

$result = mysqli_query($l, $query);
	
?>
	
		<h3 style = "position: absolute; top: 30%; left: 70%; font-size:200%;"> Chose Class name </h3>
	
		<div  class="table-wrapper-scroll-y2 my-custom-scrollbar2" style="position: absolute; top: 40%; left: 60%;">
		<table style="position: absolute; top: 0px; left: 40%; cellspacing="15" id = "tbtifn" name = "tbtifn" >

		<tr>
		<td style="font-size:15pt;"> Class Id </td>
		<td style="font-size:15pt;"> Class Name </td>
		</tr>
		
		
<?php	
		
		while($row = mysqli_fetch_array($result)) {
        
?>	
		
		<tr>
                
	      <td style="font-size:18pt"> 
			<div class="container1">
			  <?php  echo $row['class_id']; ?>   
            </div>
          </td>
			
   		  <td> 
			<div class="container1">     
				<button  style=" font-size:15pt;" class="btn1 btn3" name="flln" onclick = "showClassID('<?php echo $row['class_id']; ?>' , '<?php echo $row['class_name'];?>')"> <?php echo $row['class_name']; ?>   </button> 
		     </div>
		  </td>
			 
		</tr>
			 
<?php
			
		}
			
?>	

	</table>
	</div>
	
	
	<script>
			
			function showClassID(ID,Name)
			{
			
			document.getElementById("cli").value = ID;
			document.getElementById("cln").value = Name;
				
			}
		
		</script>
	

<?php

	if (!$l) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$qqq = "SELECT course_name,course_id
				FROM courses";
		
		$r = mysqli_query($l, $qqq);
		
		echo '<div class="table-wrapper-scroll-y3 my-custom-scrollbar3" style="position: absolute; top: 11%; left: 35%;">';
        echo '<table style="position:absolute;  left:30%; font-size:150%;" cellspacing="20" cellpadding="20">';
		
		$c=0;
		
		while($row = mysqli_fetch_array($r)) {
			?>
			
			<input type "text" value = 	"<?php echo $row[0]; ?>" name = "cour_name[]"	style = "display:none;" >
			<input type "text" value = 	"<?php echo $row[1]; ?>" name = "cour_id[]"	style = "display:none;" >
			
			<?php
			$c++;
		}
		
		echo '</table>';
		echo '</div>';

		extract($_POST);

		$name_st=array();
		$cs_name=array();

		if (isset($_POST["submit"])) 
		{
			
			$id = "SELECT MAX(student_id) FROM `student_information` ";	
			
			$r = mysqli_query($l, $id);
			
			echo '<table style="position: absolute; top: 42%; left:10%;">';
			
			while($row = mysqli_fetch_array($r)) {
				
				echo '<tr>';
				
				echo '<td style = "font-size : 20pt;">';	echo $row['MAX(student_id)'];     echo'</td>';
				
			    echo '<td style = "font-size : 20pt;">';	echo $dd = $row['MAX(student_id)'];     echo'</td>';
				
				echo '</tr>';
				
			}
			
			echo '</table>';
			
			$dd++;
			
			$rand = rand();
			
			mysqli_query ($l, "INSERT INTO `proj`.`student_information` (`student_id`,`pass`,`gender`, `phone_number`, `loction`, `first_name`, `second_name`, `third_name`, `last_name`, `class_id`, `class_name`, `section`) 
			VALUES ('$dd','$rand','$_POST[gender]', '$_POST[phone_number]', '$_POST[location]', '$_POST[n1]', '$_POST[n2]', '$_POST[n3]', '$_POST[n4]', '$_POST[classid]', '$_POST[classname]', '$_POST[section]' )");	
		
		foreach($cour_name as $key44=>$val44){

		$cs_name[]=$val44;

		}
	
		foreach($cour_id as $key55=>$val55){

		$cs_id[]=$val55;

		}
		
		$p=0;
	while($p < $c){
		
		$up = "INSERT INTO `proj`.`marks` (`student_id`,`mark1`,`mark2`, `mark3`, `full_name`, `course_name`, `course_id`) 
			VALUES ('$dd','0', '0', '0', '$_POST[n1]','$cs_name[$p]','$cs_id[$p]')  ";
		
		if (mysqli_multi_query($l, $up))/* {    
		echo "New records created successfully";
		} else {    
		echo "Error: " . $up . "<br>" . mysqli_error($l);
		}
		*/
		// $r = mysqli_query ($l, $up);
		
		$p++;
		
		}
		
		// echo "<meta http-equiv='refresh' content='0; url=add_st.php'>" ;
		
	}
		
		
		mysqli_close($l);
				
?>
	
	</form>
	
</body>

</html>