<?php

function getMoviesByGenre($amount, $genre)
{
	$db_con = connectDB("FLETNIX_DOCENT");
	$query = $db_con->prepare("SELECT TOP $amount g.genre_name, m.*  FROM Movie m
			INNER JOIN Movie_Genre mg on mg.movie_id = m.movie_id
			INNER JOIN Genre g on g.genre_name = mg.genre_name
			WHERE g.genre_name = '$genre'
			ORDER BY m.publication_year DESC");
	$query->execute();
	
	return $query->fetchAll();
}

function getGenreByName($name)
{
	$db_con = connectDB("FLETNIX_DOCENT");
	$query = $db_con->prepare("SELECT * FROM Genre WHERE genre_name = '$name'");
	$query->execute();
	
	return $query->fetchAll();
}

function getColumnInTable($column, $table)
{
	$db_con = connectDB("FLETNIX_DOCENT");
	$query = $db_con->prepare("SELECT $column FROM $table");
	$query->execute();
	
	return $query->fetchAll();
}

function getMoviesByDirectorOrTitle($top, $keyword)
{
	$db_con = connectDB("FLETNIX_DOCENT");
	$query = $db_con->prepare("SELECT TOP $top m.* FROM Movie m
			LEFT JOIN Movie_Director md on md.movie_id = m.movie_id
			LEFT JOIN Person p on p.person_id = md.person_id
			WHERE m.title LIKE '%$keyword%' OR (p.firstname  LIKE '%$keyword%' OR p.lastname LIKE '%$keyword%')
			ORDER BY m.publication_year DESC, m.title ASC");
	$query->execute();
	
	return $query->fetchAll();
}

function customerLoginCredentials($email, $password)
{
	$db_con = connectDB("FLETNIX_DOCENT");
	$query = $db_con->prepare("SELECT * FROM Customer
	WHERE customer_mail_address = '$email' AND
	[password] = '$password'");
	$query->execute();
	
	return $query->fetchAll();
}

function getCustomerDetails($email)
{
	$db_con = connectDB("FLETNIX_DOCENT");
	$query = $db_con->prepare("SELECT * FROM Customer
	WHERE customer_mail_address = '$email'");
	$query->execute();
	
	return $query->fetchAll();
}

function getCustomer($email, $column)
{
	$db_con = connectDB("FLETNIX_DOCENT");
	$query = $db_con->prepare("SELECT $column FROM Customer
	WHERE customer_mail_address = '$email'");
	$query->execute();
	
	$result = $query->fetchAll();
	
	foreach ($result as $info) {
		return $info[ $column ];
	}
}

function createCustomer($email, $lastname, $firstname, $payment_method, $payment_number, $contract_type, $subscription_start,
						$username, $password, $country_name, $gender, $birth_date)
{
	$db_con = connectDB("FLETNIX_DOCENT");
	$query = $db_con->prepare("INSERT INTO Customer VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$query->execute(array($email, $lastname, $firstname, $payment_method, $payment_number, $contract_type, $subscription_start,
		null, $username, $password, $country_name, $gender, $birth_date));
	
	return $query->rowCount();
}