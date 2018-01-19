<?php
include_once 'functions.php';
session_unset();
session_destroy();
load_header("Logout");
?>
<main>
    <p>You are now signed off, <a href="index.php">click here</a> to return to the homepage</p>
</main>
<?php
load_sidebar();
load_footer();
?>
