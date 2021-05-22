<?php
include('sess.php');
if(!isset($_SESSION['login_user'])){
header("location: tch_lofg.php"); // Redirecting To Home Page
}
?>

<!DOCTYPE html>

<html>

<head>

	<title>Add Marks</title>

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
		
		<b id="logout"  style="position: absolute; top: 15px; right: 45px;">
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
			<a href="notestea.php"><button class="btn btn3" style="padding:15px 60px;" >  Notes  </button></a>
			<a href="displaystudents.php"><button class="btn btn3" style="padding:15px 30px;" >Display students</button></a>
			<a href="displayst.php"><button class="btn btn3" style="padding:15px 30px;" >Display Marks</button></a>

		</div>
	</nav>

-->

<form action="mmm111.php" method="post">

	<div style="position: absolute; top: 15%; left: 10%;background-color:white;border-radius: 10% 10%; width:60%; height:75%;">
		<h3	style="position: absolute; top: 0%; left: 5%; font-size:200%;" >Insert Student Marks</h3>

	<table style="position:absolute; top:15%; left:15%; font-size:150%;"  cellspacing="17" >

		<thead>
            <tr>
              <th>            ID                 </th>
              <th>            Full Name          </th>
              <th>            mark 1             </th>
              <th>            mark 2             </th>
			  <th>            mark 3             </th>
            </tr>
        </thead>

	</table>

	<div class="container1">
		<input  class="btn btn3"  style="position: absolute; top: 85%; left: 45%; font-size:80%; padding: 1.5% 5%;" type="submit" name="submit_all" value="Submit All">
	</div>
	
	</div>

	

<?php

	$conn = mysqli_connect("localhost", "root", "12345678", "proj");

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$qqq = "SELECT course_name,course_id
				FROM courses WHERE tuter_id = '$_SESSION[login_user]'";
		
		$rrr = mysqli_query($conn, $qqq);
		
		echo '<div class="table-wrapper-scroll-y3 my-custom-scrollbar3" style="position: absolute; top: 11%; left: 35%;">';
        echo '<table style="position:absolute;  left:30%; font-size:150%;" cellspacing="20" cellpadding="20">';
		
		while($rorow = mysqli_fetch_array($rrr)) {
			
			echo "<tr>";
			echo "<td>"; echo"<h3>";	echo $rorow['course_name']; echo"</h3>";		echo "</td>";
			echo "<td>"; echo"<h3>";	echo $n = $rorow['course_id']; echo"</h3>";		echo "</td>";
			echo "</tr>";
			?>
			
			<input type "text" value = 	"<?php echo $rorow[0]; ?>" name = "cour_name[]"	style = "display:none;" >
			<input type "text" value = 	"<?php echo $rorow[1]; ?>" name = "cour_id[]"	style = "display:none;" >
			
			<?php
		}
		
		echo '</table>';
		echo '</div>';

		$q = "SELECT s.student_id , CONCAT (s.first_name,' ',s.last_name) AS full_name,m.mark1 ,m.mark2 ,m.mark3
			FROM  student_information s  , marks m
			where class_id = (SELECT class_id FROM `courses` WHERE
			tuter_id = '$_SESSION[login_user]')and s.student_id= m.student_id and course_id = $n ";

		$result = mysqli_query($conn, $q);

?>
	
	<div  class="table-wrapper-scroll-y my-custom-scrollbar" style="position: absolute; top:33%; left: -5%;">
        <table class="z" cellspacing="15" name = "ad" >

<?php

	$c = 0;
	$id_st=array();
	$name_st=array();
	$inputIndex = 1;
	$rowNum = 1;
	
		while($row = mysqli_fetch_row($result)) {

?>

		<tr>

			<td style="font-size:18pt;">          <?php echo $row[0]; ?>                                                         </td>

			<td style="font-size:16pt;">          <?php echo $row[1]; ?>                                                          </td>

			<td style="font-size:16pt;">          <input value = "<?php echo $row[2]; ?>" style="border:2px solid gray; padding:5px 10px; font-size:16px; border-radius:15px;" id="r" size="2" type="text" name="m1[]" id = "mk1">                            </td>

			<td style="font-size:16pt;">          <input value = "<?php echo $row[3]; ?>" style="border:2px solid gray; padding:5px 10px; font-size:16px; border-radius:15px;" id="r" size="2"  type="text" name="m2[]" id = "mk2">                           </td>

			<td style="font-size:16pt;">          <input value = "<?php echo $row[4]; ?>" style="border:2px solid gray; padding:5px 10px; font-size:16px; border-radius:15px;" id="r" size="2"  type="text" name="m3[]" id = "mk3">                           </td>

			<input type "text" value = 	"<?php echo $row[0]; ?>" name = "id[]"	style = "display:none;" >
			<input type "text" value = 	"<?php echo $row[1]; ?>" name = "name[]"	style = "display:none;" >

		</tr>

<?php

		$c++;
		$rowNum++;

	}
?>

		</table>
		</div>

<?php

	extract($_POST);

	$id_st=array();
	$name_st=array();
	$cs_name=array();
	$cs_id=array();
	$mark1=array();
	$mark2=array();
	$mark3=array();
	if (isset($_POST["submit_all"]))
		{

	foreach($id as $key11=>$val11){

    $id_st[]=$val11;

	}
	  
	foreach($name as $key22=>$val22){
		
	$name_st[]=$val22;
	   
	}

	foreach($m1 as $key1=>$val1){
	
	$mark1[]=$val1;
     
	}
    
    $k2=0;

	foreach($m2 as $key2=>$val2){

	$mark2[]=$val2;


	$k2++;

	}

	$k3=0;

	foreach($m3 as $key3=>$val3){

	$mark3[]=$val3;

	$k3++;

	}
	
	foreach($cour_name as $key44=>$val44){

	$cs_name[]=$val44;

	}
	
	foreach($cour_id as $key55=>$val55){

	$cs_id[]=$val55;

	}


		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

	$p=0;
	while($p<$c){
		$up = "update marks set mark1='$mark1[$p]',mark2='$mark2[$p]',mark3='$mark3[$p]',student_id='$id_st[$p]'
			where student_id='$id_st[$p]' and course_id=$n ";

	$result = mysqli_query($conn, $up);

	$p++;

	}

	echo "<meta http-equiv='refresh' content='0; url=mmm111.php'>" ;

	//,course_name='$cs_name[$p]',course_id='$cs_id[$p]'

	}

?>
	
</form>

</body>
</html>