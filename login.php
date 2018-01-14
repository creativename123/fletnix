<?php
include_once 'functions.php';
load_header("Login");
?>
<main>
    <div class="form-wrapper">
        <h2>Enter your login details</h2>
        <!-- gebruik method POST wanneer je een server hebt runnen -->
        <form method="GET" action="profile.html">
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