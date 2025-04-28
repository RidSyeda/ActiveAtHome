<?php
	require_once '../private/initialize.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="header">
	ActiveAtHome! <br>
	Activities with Trainers!  
</div>

<div class="row">
	<div class="column side">
		<?php include 'navigation_all.html'; ?> 
	</div>

	<div class="column middle">
	<?php 
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$args = [];
		$args['triName'] = $_POST['triName'] ?? '';
		$args['triEmail'] = $_POST['triEmail'] ?? '';
		$args['triLocation'] = $_POST['triLocation'] ?? '';
		$args['triCertifications'] = $_POST['triCertifications'] ?? '';
		$args['triYear'] = $_POST['triYear'] ?? '';
		$args['triSpecialization'] = $_POST['triSpecialization'] ?? '';

		// Instantiate the Trainers object first
		$Trainers = new Trainers;

		// Then merge the form values
		$Trainers->merge_attributes($args);

		// Create the new record
		$result = $Trainers->create();

		if ($result) {
			echo "<p>New Trainer added successfully!</p>";
		} else {
			echo "<p>Failed to add Trainer. Please try again.</p>";
		}

	} else {
		// Show form
		echo "<p>Use the following form to enter details for the new item.<br>ATTENTION: all *** fields must be Filled</p>";

		echo "<form action='add_T.php' method='post'>";
		echo "<table>";
		echo "<tr> <td>Name ***</td> <td><input type='text' name='triName'></td> </tr>";
		echo "<tr> <td>Email</td> <td><input type='email' name='triEmail'></td> </tr>";
		echo "<tr> <td>Location</td> <td><input type='text' name='triLocation'></td> </tr>";
		echo "<tr> <td>Certifications</td> <td><input type='text' name='triCertifications'></td> </tr>";
		echo "<tr> <td>Year of Experience ***</td> <td><input type='number' name='triYear' min='1' max='35'></td> </tr>";
		echo "<tr> <td>Specialization</td> <td><input type='text' name='triSpecialization'></td> </tr>";
		echo "</table>";
		echo "<br><input type='submit' value='Add New'>";
		echo "</form>";
	}
	?>
	</div>

	<div class="footer">
	BIS Design & Development Module<br>
	Not real site
	</div>
</body>
</html>