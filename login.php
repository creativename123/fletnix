<?php
include_once 'functions.php';

if (isset($_POST)) {
	$dbcon = connectDB("FLETNIX_DOCENT");
	$sql_login_cred = "SELECT * FROM Person WHERE ";
	$dbcon->prepare($sql_login_cred);
}

load_header("Login");
?>
    <main>
        <div class="form-wrapper">
            <h2>Enter your login details</h2>
            <form method="POST" action="#">
                <label for="email">
                    E-mail:
                    <input id="email" type="email" required>
                </label>
                <label for="password">
                    Password:
                    <input id="password" type="password" required>
                </label>
                <label for="submit">
                    <input id="submit" value="submit" type="submit">
                </label>
            </form>
        </div>
    </main>
<?php
load_sidebar();
load_footer();
?>