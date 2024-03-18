<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<div class="top">
				<img src="logo.png" alt="">
			<h1>Aanvraagformulier</h1>
		</div>
	</header>
	<div class="studentenID">
		<form action="" method="GET">
			<label for="naamStudent">Student Naam :</label>
			<input type="text" name="naamStudent" class="placeholder">
			<br>
			<label for="studentNum">Studentnummer :</label>
			<input type="number" name="studentNum" class="placeholder">
			<br>
			<label for="leeftijd">leeftijd :</label>
			<input type="number" name="leeftijd" class="placeholder">
			<br>
			<label for="naamOpleiding">Naam opleiding :</label>
			<input type="text" name="naamOpleiding" class="placeholder">
			<br>
			<label for="crebo_Opleiding">Crebo Opleiding :</label>
			<select name="crebo_Opleiding" id="crebo_Opleiding">
				<option hidden>--Kies--</option>
				<option value="1">klas 1</option>
				<option value="2">klas 2</option>
			</select>
			<br>
			<input type="submit" name="verwerkingID" value="Ga door" >
		</form>
		<div class="foto">
			<img src="foto.png" alt="">
		</div>
	</div>
	<?php

	$host = 'localhost';
	$dbname = 'aanvraagformulier';
	$username = 'root';
	$password = '';
	$port = 3307; // Verander deze naar de poort die je gebruikt

		try {
			$dbh = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if (isset($_GET['verwerkingID'])) {
				$naamStudent = $_GET['naamStudent'];
				$studentNum = $_GET['studentNum'];
				$leeftijd = $_GET['leeftijd'];
				$naamOpleiding = $_GET['naamOpleiding'];
				$crebo_Opleiding = $_GET['crebo_Opleiding'];

				$stmt = $dbh->prepare("INSERT INTO studentid (naamStudent, studentNum, leeftijd, naamOpleiding, crebo_Opleiding) VALUES (:naamStudent, :studentNum, :leeftijd, :naamOpleiding, :crebo_Opleiding)");

				$stmt->bindParam(':naamStudent', $naamStudent);
				$stmt->bindParam(':studentNum', $studentNum);
				$stmt->bindParam(':leeftijd', $leeftijd);
				$stmt->bindParam(':naamOpleiding', $naamOpleiding);
				$stmt->bindParam(':crebo_Opleiding', $crebo_Opleiding);
				$stmt->execute();

				header("Location: invullenDoorStudent.php");
			}
		} catch (PDOException $e) {
			echo "Fout: " . $e->getMessage();
		}
		?>
</body>
</html>
