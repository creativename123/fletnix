<?php
include_once "db/connection.php";
include_once "sql_queries.php";
session_start();

function load_header($header_name = "")
{
	echo "
<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>$header_name</title>
    <link rel=\"stylesheet\" href=\"style/style.css\">
</head>
<body>
<header>
    <h1><a href=\"index.php\">Fletnix</a><span class=\"page-title\">:~/ $header_name</span></h1>
    <div class=\"dropdown user-info-header\">";
	
	if (isset($_SESSION['login'])) {
		echo "<p class=\"dropdown-name user-info-header-name\">" . $_SESSION['customer_name'] . "</p>
        <div class=\"dropdown-content\">
            <a href=\"profile.php\">Profile</a>
            <a href=\"logout.php\">Log out</a>
        </div>";
	} else {
		echo "<p class=\"dropdown-name user-info-header-name\"><a href='login.php'>Login</a></p>";
	}
	
	echo "</div>
</header>";
	
}

function load_sidebar()
{
	echo "
	<aside>
    <ul id=\"sidebar\">
        <li><a class=\"\" href=\"index.php\">Home</a></li>
        <li><a href=\"catalog.php\">Catalog</a></li>
        <li><a href=\"subscription.php\">Subscriptions</a></li>
        <li><a href=\"about-us.php\">About us</a></li>";
	
	if (!isset($_SESSION['login'])) {
		echo "<li><a href=\"login.php\">login</a></li>";
	}
	echo "</ul>
</aside>";
}

function load_footer()
{
	echo "
	<footer>
    &copy; Baris & Erhan, 2017
</footer>
</body>
</html>";
}

function load_catalog_filter()
{
	$db_con = connectDB("FLETNIX_DOCENT");
	$sql_genre_list = "SELECT * FROM Genre";
	$result_genre_list = $db_con->query($sql_genre_list);
	echo "<div id=\"sidebar_catalog_genre\">
<h4 class=\"genre-search-header\">Zoeken op titel of regiseur:</h4>
<form action=\"\" method=\"GET\">
<input type=\"text\" name=\"keyword\">
<input type=\"submit\" value=\"Zoeken\">
</form><h3>Genres:</h3>
    <ul>";
	
	foreach ($result_genre_list as $genre) {
		echo "<li><a href=\"catalog.php?genre=" . $genre['genre_name'] . "\">" . $genre['genre_name'] . "</a></li>";
	}
	echo "</ul>
</div>";
}

function load_movie_description($movieId, $title, $duration, $year, $description, $cover)
{
	echo "
<div class=\"catalog-item\">
	<div class=\"catalog-item-media\">
		<a href=\"movie.php?m=" . $movieId . "\">
		<img src=\"movie_posters/" . $cover . "\" alt=\"Movie poster\">
		</a>
	</div>
	<div class=\"catalog-item-description\">
		<p>Name: " . $title . "<br>Duration: " . $duration . "<br>Year: " . $year . "</p>
		<p>" . $description . "<br><a href=\"movie.php?m=" . $movieId . "\">Learn more</a></p>
	</div>
</div>";
}

function load_category_genre_separator($genre)
{
	echo "<div id=\"catalog-category-" . $genre . "\">
                " . $genre .
		"</div >";
}

function load_customer_details($info)
{
	echo "<main id=\"content-profile\">
                <h2>" . $info['firstname'] . " " . $info['lastname'] . "</h2 >
                <p> Country: " . $info['country_name'] . "<br>
                    Subscription: None <br>
                    <br >
					E-mail: " . $info['customer_mail_address'] . "<br>
                    Username: " . $info['user_name'] . "<br>
                    Subscription type: " . $info['contract_type'] . " <br>
                    Subscription start: " . $info['subscription_start'] . "<br>
                    Subscription end: " . $info['subscription_end'] . "
                </p >
            </main > ";
}