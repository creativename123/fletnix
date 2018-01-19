<?php
include_once 'functions.php';
load_header("Login");
if (isset($_POST['email']) && isset($_POST['password'])) {
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$query = customerLoginCredentials($_POST['email'], $_POST['password']);
		if ($query) {
			session_unset();
			session_destroy();
			session_start();
			date_default_timezone_set('UTC');
			setlocale(LC_ALL, 'nld_nld');
			$_SESSION['login'] = true;
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['customer_name'] = getCustomer($_POST['email'], 'firstname') . " " . getCustomer($_POST['email'], 'lastname');
			$_SESSION['login_time'] = strftime('%A %d %B %Y, ingelogd sinds %H:%M uur', time());
			if ($_GET['redirect']) {
				header("Location: " . $_GET['redirect']);
			} else {
				header("Location: profile.php");
			}
		} else {
			echo "<h2>Probeer het opnieuw</h2>";
		}
	} else {
		echo "<h2>Laat de invoervelden niet leeg</h2>";
	}
}
?>
    <main>
        <div class="form-wrapper">
            <h2>Enter your login details, <?php
				if (isset($_GET['message'])) {
				    echo $_GET['message'];
				}
				?></h2>
            <form method="POST" action="login.php">
                <label for="email">
                    E-mail:
                    <input id="email" name="email" type="email" required>
                </label>
                <label for="password">
                    Password:
                    <input id="password" name="password" type="password" required>
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