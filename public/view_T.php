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
			$id = $_GET['id'];
	
			if(!$id) {
						echo "problem - redirect";
				}	else {
						echo $id;
				}
				

				$specific_Trainers = Trainers::find_by_id($id);	//call the find_by_id() function
				
			echo " <p> Details of the selected item </p> ";
				
			echo "<table>";
			echo "<tr> <td><b> Trainers id </b> </td> <td>" . $specific_Trainers->triId . "</td> </tr>";
			echo "<tr> <td><b> Trainers id </b> </td> <td>" . $specific_Trainers->triName . "</td> </tr>";
			echo "<tr> <td> <b> Email </b> </td> <td>" . $specific_Trainers->triEmail . "</td> </tr>";
			echo "<tr> <td> <b> Location </b> </td> <td>" . $specific_Trainers->triLocation . "</td> </tr>";
			echo "<tr> <td> <b> Certifications </b> </td> <td>" . $specific_Trainers->triCertifications . "</td> </tr>";
			echo "<tr> <td> <b> Year </b> </td> <td>" . $specific_Trainers->triYear . "</td> </tr>";
			echo "<tr> <td> <b> Specialization </b> </td> <td>" . $specific_Trainers->triSpecialization . "</td> </tr>";
			echo "</table>";
			
			?>;

?>

  	 </div>
  	 
  	 
<div class="footer">
  BIS Development Module<br>
  Not real site
</div>

</body>


</html>
