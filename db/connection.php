<?php

function connectDB($dbname)
{
	$hostname = "localhost";
	$username = "sa";
	$pw = "Eikenblad15@";
	
	try {
		return new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling = 0",
			"$username",
			"$pw");
	} catch (PDOException $exception) {
		echo $exception;
	}
}
