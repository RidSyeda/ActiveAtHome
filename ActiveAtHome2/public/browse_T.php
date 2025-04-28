<?php
				require_once '../private/initialize.php';	//initialize the web site
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel=stylesheet type=text/css href=style.css>
</head>

<body>
<div class="header">
	ActiveAtHome! <br>
	Get in touch with Trainers!
</div>

<div class="row">
<div class="column side">
   			<?php include 'navigation_all.html';?> 
	</div>
  	
	<div class="column middle">
		
		<?php 

echo "<h2> Full list of actions </h2>";
				$Trainers_array = Trainers::find_all();	//call the find_all() function


		echo "<table border = 1 width=100%>";
			echo "<tr bgcolor=#ADD8E6>";
				echo "<th> Id </th>";
				echo "<th> Name </th>";
				echo "<th> Email </th>";
				echo "<th> Location </th>";
				echo "<th> Certifications </th>";
				echo "<th> Year </th>";
				echo "<th> Specialization </th>";
				//echo "<th> Password </th>";
			echo "</tr>";
  		

		foreach ($Trainers_array as $Trainers) {
			echo "<tr>";
				echo "<td>" . $Trainers->triId . "</td>";
				echo "<td>" . $Trainers->triName . "</td>";
				echo "<td>" . $Trainers->triEmail . "</td>";
				echo "<td>" . $Trainers->triLocation . "</td>";	
				echo "<td>" . $Trainers->triCertifications . "</td>";
				echo "<td>" . $Trainers->triYear . "</td>";	
				echo "<td>" . $Trainers->triSpecialization . "</td>";
				echo "<td> <a href=view_T.php?id=" . $Trainers->triId . "> View </td>";
				echo "<td> <a href=update_T.php?id=" . $Trainers->triId . "> Update </td>";
				echo "<td> <a href=delete_T.php?id=" . $Trainers->triId . "> Delete </td>";		
		echo "</tr>";
}			

		echo "</table>";		
?>

  	 </div>
  	 
  	 
<div class="footer">
  BIS Design & Development Module<br>
</div>

</body>


</html>
