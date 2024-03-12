CREATE DATABASE IF NOT EXISTS aanvraagformulier;
use aanvraagformulier;
CREATE TABLE studentid(
	naamStudent varchar(30) NOT NULL,
	studentNum int NOT NULL,
	leeftijd int NOT NULL,
	naamOpleiding varchar(30) NOT NULL,
	crebo_Opleiding int NOT NULL
    bestandUpload varchar(200) NOT NULL
)
