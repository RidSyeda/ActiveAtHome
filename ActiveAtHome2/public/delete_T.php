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
	Get in touch with Trainers!
</div>

<div class="row">
	<div class="column side">
		<?php include 'navigation_all.html'; ?> 
	</div>

	<div class="column middle">
	<?php 
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$id = $_POST['id'] ?? '';
		$deleted_Trainers = Trainers::find_by_id($id);

		if ($deleted_Trainers) {
			$deleted_Trainers->delete();

			echo "<p>The following entry is deleted:</p>";
			echo "<table>";
			echo "<tr><td><b>Trainer ID</b></td><td>{$deleted_Trainers->triId}</td></tr>";
			echo "<tr><td><b>Name</b></td><td>{$deleted_Trainers->triName}</td></tr>";
			echo "<tr><td><b>Email</b></td><td>{$deleted_Trainers->triEmail}</td></tr>";
			echo "<tr><td><b>Location</b></td><td>{$deleted_Trainers->triLocation}</td></tr>";
			echo "<tr><td><b>Certification</b></td><td>{$deleted_Trainers->triCertifications}</td></tr>";
			echo "<tr><td><b>Years</b></td><td>{$deleted_Trainers->triYear}</td></tr>";
			echo "<tr><td><b>Specialization</b></td><td>{$deleted_Trainers->triSpecialization}</td></tr>";
			echo "</table>";
		} else {
			echo "<p>Trainer not found.</p>";
		}

	} else {
		$id = $_GET['id'] ?? '';
		$trainer = Trainers::find_by_id($id);

		if ($trainer) {
			echo "<p>Are you sure you want to delete this trainer?</p>";
			echo "<table>";
			echo "<tr><td><b>Name</b></td><td>{$trainer->triName}</td></tr>";
			echo "<tr><td><b>Email</b></td><td>{$trainer->triEmail}</td></tr>";
			echo "<tr><td><b>Location</b></td><td>{$trainer->triLocation}</td></tr>";
			echo "<tr><td><b>Specialization</b></td><td>{$trainer->triSpecialization}</td></tr>";
			echo "</table>";

			echo "<form method='POST' action='delete_T.php'>";
			echo "<input type='hidden' name='id' value='{$trainer->triId}'>";
			echo "<input type='submit' value='Yes, Delete'>";
			echo " <a href='browse_T.php'><button type='button'>Cancel</button></a>";
			echo "</form>";
		} else {
			echo "<p>Trainer not found.</p>";
		}
	}
	?>
	</div>

	<div class="footer">
		BIS Development Module<br>
		Not real site
	</div>
</body>
</html>