<?php
include_once 'functions.php';

$db_con = connectDB("FLETNIX_DOCENT");
$sql_count_rows = "SELECT COUNT(*) as returned_rows FROM Movie WHERE movie_id = " . $_GET['m'];
$result_rows = 0;
if ($sql_count_rows = $db_con->query($sql_count_rows)) {
	foreach ($sql_count_rows as $movie) {
		$result_rows = $movie['returned_rows'];
	}
}

if (isset($_GET['m']) && is_numeric($_GET['m']) && $result_rows == 1) {
	$sql_movie_details = "SELECT * FROM Movie WHERE movie_id = " . $_GET['m'];
	$sql_movie_director = "SELECT * FROM Movie_Director md INNER JOIN Person p ON p.person_id = md.person_id WHERE md.movie_id = " . $_GET['m'];
	$sql_movie_genre = "SELECT * FROM Movie_Genre mg INNER JOIN Genre g on g.genre_name = mg.genre_name WHERE mg.movie_id = " . $_GET['m'];
	$result_movie_details = $db_con->query($sql_movie_details);
	$result_movie_director = $db_con->query($sql_movie_director);
	$result_movie_genre = $db_con->query($sql_movie_genre);
	
	foreach ($result_movie_details as $movie) {
		load_header($movie['title']);
		
		echo "<main id=\"movie-details\">
					<h2>" . $movie['title'] . "</h2>
					<img src=\"movie_posters/";
		if (!is_null($movie['cover_image'])) {
			echo $movie['cover_image'] . "\" alt=\"Movie poster\">";
		} else {
			echo "404.png\"" . "alt=\"Movie poster not found\">";
		}
		echo "
					<br>
					<a class=\"watch-now-button\" href=\"" . $movie['URL'] . "\">WATCH NOW</a>
					<p>" . $movie['description'] . "</p>
					<table>
						<tr>
							<td>Name</td>
							<td>" . $movie['title'] . "</td>
						</tr>
						<tr>
							<td>Date</td>
							<td>" . $movie['publication_year'] . "</td>
						</tr>
						<tr>
							<td>Director</td>
							<td>";
		
		foreach ($result_movie_director as $director) {
			echo $director['firstname'] . " " . $director['lastname'] . ", ";
		}
		
		echo "</td>
						</tr>
						<tr>
							<td>Duration</td>
							<td>" . $movie['duration'] . "</td>
						</tr>
						<tr>
							<td>Genre</td>
							<td>Chrime, Drama, Thriller</td>
						</tr>
					</table>
				</main>";
		load_sidebar();
		load_footer();
	}
} else {
	load_header("No movie found");
	echo "<main id=\"movie-details\">No movie found</main>";
	load_sidebar();
	load_footer();
}