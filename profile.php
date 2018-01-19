<?php
include_once 'functions.php';
load_header("Profile");

if (isset($_SESSION['login']) && $_SESSION['login']) {
	$result_customer_info = getCustomerDetails($_SESSION['email']);
	if ($result_customer_info) {
		foreach ($result_customer_info as $info) {
			load_customer_details($info);
		}
	}
} else {
	header('Location: login.php?redirect=profile.php');
}

load_sidebar();
load_footer();