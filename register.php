<?php
include_once 'functions.php';
load_header("Register");

if (isset($_POST)) {
	if ($_POST['password'] == $_POST['password_validate']) {
		date_default_timezone_set('UTC');
		setlocale(LC_ALL, 'nld_nld');
		$email = $_POST['email'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$payment_number = $_POST['payment_number'];
		$payment_method = $_POST['payment_method'];
		$contract_type = $_POST['subscription'];
		
		$subscription_start = date('Y-m-d');
		$username = $_POST['username'];
		$password = $_POST['password'];
		$country_name = $_POST['country_name'];
		$gender = $_POST['gender'];
		$birth_date = $_POST['birth_date'];
		
		if (createCustomer($email, $lastname, $firstname, $payment_method, $payment_number, $contract_type, $subscription_start,
				$username, $password, $country_name, $gender, $birth_date) == 1) {
			header("Location: login.php?message=account successfully created");
		} else {
			header("Location: subscription.php");
		}
	}
}

load_sidebar();
load_footer();