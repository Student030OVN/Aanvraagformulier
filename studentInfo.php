<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Vrijstelling</title>
	<link type="image" rel="icon" href="https://www.rocmn.nl/themes/custom/rocmn_assets/images/favicons/favicon.ico?v=LbWPk0bBNN">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="studentenID">
		<form action="" method="GET">
			<label for="naamStudent">Student Naam :</label>
			<input type="text" name="naamStudent">
			<br>
			<label for="studentNum">Studentnummer :</label>
			<input type="text" name="studentNum">
			<br>
			<label for="leeftijd">leeftijd :</label>
			<input type="text" name="leeftijd">
			<br>
			<label for="naamOpleiding">Naam opleiding :</label>
			<input type="text" name="naamOpleiding">
			<br>
			<label for="crebo_Opleiding">Crebo Opleiding :</label>
			<input type="number" name="crebo_Opleiding">
			<br>
			<br>
			<form action="upload.php" method="GET" enctype="multipart/form-data">
				Select image to upload:
				<input type="file" name="bestandUpload" id="bestandUpload">
				<input type="submit" name="verwerkingID" value="Ga door">
			</form>
			<br>
		</form>

	</div>
	<?php

	try {

		$port = 3306;
		$host = 'localhost';
		$dbname = 'aanvraagformulier';
		$username = 'root';
		$password = '';

		$dbh = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if (isset($_GET['verwerkingID'])) {
			$naamStudent = $_GET['naamStudent'];
			$studentNum = $_GET['studentNum'];
			$leeftijd = $_GET['leeftijd'];
			$naamOpleiding = $_GET['naamOpleiding'];
			$crebo_Opleiding = $_GET['crebo_Opleiding'];
			$bestandUpload = $_GET['bestandUpload'];

			// Voorbereiden van de INSERT query
			$stmt = $dbh->prepare("INSERT INTO studentid (naamStudent, studentNum, leeftijd, naamOpleiding, crebo_Opleiding, bestandUpload) VALUES (:naamStudent, :studentNum, :leeftijd, :naamOpleiding, :crebo_Opleiding, :bestandUpload)");

			// Bind de waarden aan de parameters
			$stmt->bindParam(':naamStudent', $naamStudent);
			$stmt->bindParam(':studentNum', $studentNum);
			$stmt->bindParam(':leeftijd', $leeftijd);
			$stmt->bindParam(':naamOpleiding', $naamOpleiding);
			$stmt->bindParam(':crebo_Opleiding', $crebo_Opleiding);
			$stmt->bindParam(':bestandUpload', $bestandUpload);
			$stmt->execute();

			echo "Nieuwe record toegevoegd.";
		}
	} catch (PDOException $e) {
		echo "Fout: " . $e->getMessage();
	}

	?>
</body>

</html>