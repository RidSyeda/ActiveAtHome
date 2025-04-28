<?php
require_once '../private/initialize.php';	//initialize the web site
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
   		<?php include 'navigation_all.html';?> 
	</div>
<div class="column middle">

<?php 
$id = $_GET['id'];
$specific_Trainers = Trainers::find_by_id($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $specific_Trainers !== null)

{
	// Define args BEFORE using it
	$args = [];
	$args['triId'] = $_POST['triId'] ?? null;
	$args['triName'] = $_POST['triName'] ?? null;
	$args['triEmail'] = $_POST['triEmail'] ?? null;
	$args['triLocation'] = $_POST['triLocation'] ?? null;
	$args['triCertifications'] = $_POST['triCertifications'] ?? null;
	$args['triYear'] = $_POST['triYear'] ?? null;
	$args['triSpecialization'] = $_POST['triSpecialization'] ?? null;

	$specific_Trainers->merge_attributes($args);
	$results = $specific_Trainers->update();

	if($results) {
		echo "Successful updating";
	}

	echo " <p> Details of the updated item </p> ";
	echo "<table>";
	echo "<tr><td><b>Id</b></td><td>" . $specific_Trainers->triId . "</td></tr>";
	echo "<tr><td><b>Name</b></td><td>" . $specific_Trainers->triName . "</td></tr>";
	echo "<tr><td><b>Email</b></td><td>" . $specific_Trainers->triEmail . "</td></tr>";
	echo "<tr><td><b>Location</b></td><td>" . $specific_Trainers->triLocation . "</td></tr>";
	echo "<tr><td><b>Certifications</b></td><td>" . $specific_Trainers->triCertifications . "</td></tr>";
	echo "<tr><td><b>Year</b></td><td>" . $specific_Trainers->triYear . "</td></tr>";
	echo "<tr><td><b>Specialization</b></td><td>" . $specific_Trainers->triSpecialization . "</td></tr>";
	echo "</table>";

} else {
	echo "<p>Use the following form to update the selected item<br>";
	echo "ATTENTION: all *** fields must be numbers</p>";

	echo "<form action='update_T.php?id={$id}' method='post'>";
	echo "<table>";
	echo "<tr><td>Id</td><td><input type='text' name='triId' value='{$specific_Trainers->triId}'></td></tr>";
	echo "<tr><td>Name</td><td><input type='text' name='triName' value='{$specific_Trainers->triName}'></td></tr>";
	echo "<tr><td>Email</td><td><input type='email' name='triEmail' value='{$specific_Trainers->triEmail}'></td></tr>";
	echo "<tr><td>Location</td><td><input type='text' name='triLocation' value='{$specific_Trainers->triLocation}'></td></tr>";
	echo "<tr><td>Certifications</td><td><input type='text' name='triCertifications' value='{$specific_Trainers->triCertifications}'></td></tr>";
	echo "<tr><td>Years of experience***</td><td><input type='number' min='1' max='35'name='triYear' value='{$specific_Trainers->triYear}'></td></tr>";
	echo "<tr><td>Specialization</td><td><textarea name='triSpecialization' rows='5' cols='30'>{$specific_Trainers->triSpecialization}</textarea></td></tr>";
	echo "</table>";
	echo "<input type='submit' value='Update Record' />";
	echo "</form>";
}
?>

</div>

<div class="footer">
  BIS Development Module<br>
  Not real site
</div>

</body>
</html>