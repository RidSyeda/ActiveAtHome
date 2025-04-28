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
	Get in touch with Activities!
</div>

<div class="row">
  	<div class="column side">
   			<?php include 'navigation_all.html';?> 
	</div>
  	
	<div class="column middle">
		
		<?php 

echo "<h2> Full list of actions </h2>";
				$Activities_array = Activities::find_all();	//call the find_all() function


		echo "<table border = 1 width=100%>";
			echo "<tr bgcolor=#ADD8E6>";
				echo "<th> Name </th>";

			echo "</tr>";
  		

		foreach ($Activities_array as $Activities) {
			echo "<tr>";

			echo '<td style="text-align: center;"><a href="view_A.php?id=' . $Activities->actiId . '">' . $Activities->actiName . '</a></td>';		
				
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