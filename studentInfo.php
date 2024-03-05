<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
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
			<input type="text" name="crebo_Opleiding">
			<br>
			<input type="submit" name="verwerkingID" value="Ga door">
		</form>
	</div>
	<?php

try {
    $host = 'localhost';
    $dbname = 'aanvraagformulier';
    $username = 'root';
    $password = '';
	$port = 3307 //port 3307 op mijn computer LET OP verander jouw port naar die van jouw!!!

	$dbh = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['verwerkingID'])) {
        $naamStudent = $_GET['naamStudent'];
        $studentNum = $_GET['studentNum'];
        $leeftijd = $_GET['leeftijd'];
        $naamOpleiding = $_GET['naamOpleiding'];
        $crebo_Opleiding = $_GET['crebo_Opleiding'];

        // Voorbereiden van de INSERT query
        $stmt = $dbh->prepare("INSERT INTO jouw_tabel (naamStudent, studentNum, leeftijd, naamOpleiding, crebo_Opleiding) VALUES (:naamStudent, :studentNum, :leeftijd, :naamOpleiding, :crebo_Opleiding)");

        // Bind de waarden aan de parameters
        $stmt->bindParam(':naamStudent', $naamStudent);
        $stmt->bindParam(':studentNum', $studentNum);
        $stmt->bindParam(':leeftijd', $leeftijd);
        $stmt->bindParam(':naamOpleiding', $naamOpleiding);
        $stmt->bindParam(':crebo_Opleiding', $crebo_Opleiding);
        $stmt->execute();

        echo "Nieuwe record toegevoegd.";
    }
} catch (PDOException $e) {
    echo "Fout: " . $e->getMessage();
}

	?>
</body>
</html>
