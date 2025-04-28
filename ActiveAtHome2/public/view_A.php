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
				

				$specific_Activities= Activities::find_by_id($id);	//call the find_by_id() function
				
			echo " <p> Details of the selected item </p> ";
				
			echo "<table>";
			echo "<tr> <td><b> ID </b> </td> <td>" . $specific_Activities->actiId . "</td> </tr>";
			echo "<tr> <td> <b> Name </b> </td> <td>" . $specific_Activities->actiName . "</td> </tr>";
			echo "<tr> <td> <b> Brief Description </b> </td> <td>" . $specific_Activities->actiBriefDescription . "</td> </tr>";
			echo "<tr> <td> <b> Benefits </b> </td> <td>" . $specific_Activities->actiBenefits . "</td> </tr>";
			echo "<tr> <td> <b> Price </b> </td> <td>" . $specific_Activities->actiPrice . "</td> </tr>";
			
			echo "</table>";
			


?>

  	 </div>
  	 
  	 
<div class="footer">
  BIS Development Module<br>
  Not real site
</div>

</body>


</html>
