<?php
include_once 'functions.php';
load_header("Register");
?>
    <main id="content-subscription">
        <div class="main-top">
            <h2>Available packets</h2>
            <p>All prices are a monthly fee</p>
        </div>

        <div class="main-center">
            <div class="subscription-item">
                <h3 class="subscription-item-name">Starter pack</h3>
                <ul class="subscription-item-desc">
                    <li>Cheap</li>
                    <li>Free</li>
                    <li>Green on black text</li>
                    <li>up to 720p</li>
                </ul>
                <p class="subscription-item-price">FREE</p>
            </div>
            <div class="subscription-item">
                <h3 class="subscription-item-name">Supporter pack</h3>
                <ul class="subscription-item-desc">
                    <li>Full-HD</li>
                    <li>Ad-free</li>
                    <li>Subtitles</li>
                    <li>Emotes in review</li>
                </ul>
                <p class="subscription-item-price">&euro;5,-</p>
            </div>
            <div class="subscription-item">
                <h3 class="subscription-item-name">Deluxe Edition pack</h3>
                <ul class="subscription-item-desc">
                    <li>Free Rune Scimitar in RuneScape</li>
                    <li>Exclusive previews</li>
                    <li>ULTRA-HD</li>
                    <li>Unlimited movies</li>
                </ul>
                <p class="subscription-item-price">&euro;10,-</p>
            </div>
        </div>

        <br>
        <div class="form-wrapper">
            <h2>Enter your login details</h2>
            <!-- gebruik method POST wanneer je een server hebt runnen -->
            <form method="GET" action="index.html">
                <label for="sub-name">
                    Name:
                    <input id="sub-name" type="text">
                </label>
                <label for="sub-country">
                    Country:
                    <input id="sub-country" type="text">
                </label>
                <label for="sub-bank">
                    Bank:
                    <input id="sub-bank" type="text">
                </label>
                <label for="sub-username">
                    Username:
                    <input id="sub-username" type="text">
                </label>
                <label for="sub-email">
                    E-mail:
                    <input id="sub-email" type="email">
                </label>
                <label for="sub-pass">
                    Password:
                    <input id="sub-pass" type="password">
                </label>
                <label for="sub-pass-2">
                    Password:
                    <input id="sub-pass-2" type="password">
                </label>
                <label for="sub-subscription">
                    Subscription: <br>
                    <select id="sub-subscription">
                        <option value="p_starter">Starter Pack</option>
                        <option value="p_supporter">Supporter Pack</option>
                        <option value="p_deluxe">Deluxe Edition Pack</option>
                    </select>
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