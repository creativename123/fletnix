<?php
include_once 'functions.php';

load_header("Catalog");
$result_all_genres = getColumnInTable("genre_name", "Genre");

echo "<main><div class=\"catalog\">";
if (isset($_GET['keyword'])) {
	$result_get_movie_director_keyword = getMoviesByDirectorOrTitle(30, $_GET['keyword']);
	echo "<div id=\"catalog-category-" . $_GET['keyword'] . "\">Aantal resultaten op '" . $_GET['keyword'] . "': " .
		count($result_get_movie_director_keyword) . "</div>";
	foreach ($result_get_movie_director_keyword as $movie) {
		load_movie_description($movie['movie_id'], $movie['title'], $movie['duration'], $movie['publication_year'], $movie['description'], $movie['cover_image']);
	}
} else if (isset($_GET['genre'])) {
	$result_get_movie_genre = getMoviesByGenre(30, $_GET['genre']);
	$result_get_genre = getGenreByName($_GET['genre']);
	
	foreach ($result_get_genre as $genre) {
		
		load_category_genre_separator($genre['genre_name']);
		foreach ($result_get_movie_genre as $movie) {
			load_movie_description($movie['movie_id'], $movie['title'], $movie['duration'], $movie['publication_year'], $movie['description'], $movie['cover_image']);
		}
	}
} else {
	foreach ($result_all_genres as $genre) {
		$result_movie = getMoviesByGenre(2, $genre['genre_name']);
		load_category_genre_separator($genre['genre_name']);
		foreach ($result_movie as $movie) {
			load_movie_description($movie['movie_id'], $movie['title'], $movie['duration'], $movie['publication_year'], $movie['description'], $movie['cover_image']);
		}
	}
}

echo "</div></main>";
load_sidebar();
load_catalog_filter();
load_footer();