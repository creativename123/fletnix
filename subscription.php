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
            <h2>Register to Fletnix</h2>
            <form method="POST" action="register.php">
                <label for="email">
                    E-mail:
                </label>
                <input id="email" name="email" type="email">

                <label for="lastname">
                    Last name:
                </label>
                <input id="lastname" name="lastname" type="text">

                <label for="firstname">
                    First name:
                </label>
                <input id="firstname" name="firstname" type="text">

                <label for="payment_method">
                    Payment method:
                </label>
                <select id="payment_method" name="payment_method">
                    <option value="Mastercard">Mastercard</option>
                    <option value="Visa">Visa</option>
                    <option value="Amex">Amex</option>
                </select>
                
                <label for="payment_number">
                    Payment card number:
                </label>
                <input id="payment_number" name="payment_number" type="text">

                <label for="subscription">
                    Subscription: <br>
                </label>
                <select id="subscription" name="subscription">
                    <option value="Basic">Starter Pack</option>
                    <option value="Premium">Supporter Pack</option>
                    <option value="Pro">Deluxe Edition Pack</option>
                </select>
	
                <label for="username">
                    Username:
                </label>
                <input id="username" name="username" type="text">

                <label for="password">
                    Password:
                </label>
                <input id="password" name="password" type="password">

                <label for="password_validate">
                    Validate password:
                </label>
                <input id="password_validate" name="password_validate" type="password">

                <label for="country_name">
                    Country name:
                </label>
                <input id="country_name" name="country_name" type="text">

                <label for="gender">
                    Gender: <br>
                </label>
                <select id="gender" name="gender">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>

                <label for="birth_date">
                    Birth date:
                </label>
                <input id="birth_date" name="birth_date" type="text" placeholder="YYYY-MM-DD">
                
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