<?php

	// Allow the config
	define('__CONFIG__', true);
	define("ADMIN", "alanteadams48@yahoo.com");

	// Require the config
	require_once "../inc/config.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST' OR 1 == 1) {
		// Always return JSON format
		header('Content-Type: application/json');

		$return = [];

		$username = Filter::String( $_POST['username'] );
		$email = Filter::Email( $_POST['email'] );
		$firstname = Filter::String( $_POST['firstname'] );
		$lastname = Filter::String( $_POST['lastname'] );


		$user_found = User::Find($email, false);

		if($email == 'alanteadams48@yahoo.com') {
			$admin      = 'admin';
		} else {
			$admin      = 'member';
		}

		// $setAdmin = $con->prepare("UPDATE users SET type= :admin WHERE email= :email LIMIT 1");
		// $setAdmin->bindParam(':email', $email, PDO::PARAM_STR);
		// $setAdmin->execute();

		if($user_found) {
			// User exists
			// We can also check to see if they are able to log in.
			$return['error'] = "You already have an account";
			$return['is_logged_in'] = false;
		} else {
			// User does not exist, add them now.

			$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$addUser = $con->prepare("INSERT INTO users (type, username, email, pass, first_name, last_name) VALUES(:admin, LOWER(:username), LOWER(:email), :pass, :firstname, :lastname)");
			$addUser->bindParam(':username', $username, PDO::PARAM_STR);
			$addUser->bindParam(':admin', $admin, PDO::PARAM_STR);
			$addUser->bindParam(':email', $email, PDO::PARAM_STR);
			$addUser->bindParam(':pass', $pass, PDO::PARAM_STR);
			$addUser->bindParam(':firstname', $firstname, PDO::PARAM_STR);
			$addUser->bindParam(':lastname', $lastname, PDO::PARAM_STR);
			$addUser->execute();

			$id = $con->lastInsertId();



			$_SESSION['id'] = (int) $id;

			$return['redirect'] = '/sambouie/dashboard.php?message=welcome';
			$return['is_logged_in'] = true;
		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');
	}
?>
