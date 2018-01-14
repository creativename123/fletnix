<?php

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
    <div class=\"dropdown user-info-header\">
        <p class=\"dropdown-name user-info-header-name\">Baris Urhan</p>
        <div class=\"dropdown-content\">
            <a href=\"profile.php\">Profile</a>
            <a href=\"logout.php\">Log out</a>
        </div>
    </div>
</header>";
}

function load_sidebar()
{
	echo "
	<aside>
    <ul id=\"sidebar\">
        <li><a class=\"sidebar-active\" href=\"index.php\">Home</a></li>
        <li class=\"dropdown\">
            <a class=\"dropdown-name\" href=\"catalog.php\">Catalog</a>
            <div class=\"dropdown-content\">
                <a href=\"catalog.php#catalog-category-ip\">IP hacking</a>
                <a href=\"catalog.php#catalog-category-4chan\">4chan</a>
                <a href=\"catalog.php#catalog-category-pentagon\">Pentagon hacking</a>
                <a href=\"catalog.php#catalog-category-gui\">GUI Interface</a>
            </div>
        </li>
        <li><a href=\"subscription.php\">Subscriptions</a></li>
        <li><a href=\"about-us.php\">About us</a></li>
        <li><a href=\"login.php\">login</a></li>
    </ul>
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
