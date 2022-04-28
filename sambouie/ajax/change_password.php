<?php

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "../inc/config.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Always return JSON format
		header('Content-Type: application/json');

		$return = [];


    // Check for the existing password:
    if (isset($_POST['passwordCurrent'])) {
      $current = $_POST['passwordCurrent'];
    } else {
      $return['erorr'] = 'Please enter your current password!';
    }

    // Check for a password and match against the confirmed password:
    if (isset($_POST['passwordNew'])) {
      if ($_POST['passwordNew'] == $_POST['passwordConfirm']) {
        $pass = Filter::String($_POST['passwordNew']);
      } else {
        $return['error'] = 'Your password did not match the confirmed password!';
      }
    } else {
      $return['error'] = 'Please enter a valid password!';
    }



    if (empty($return)) { // If everything's OK.

		$User = new User($_SESSION['id']);
    $id = $User->id;

    $findPass = $con->prepare("SELECT pass FROM users WHERE id = :id LIMIT 1");
    $findPass->bindParam(':id', $id, PDO::PARAM_INT);
    $findPass->execute();

    $user_pass = $findPass->fetch(PDO::FETCH_ASSOC);

    $hash = (string) $user_pass['pass'];

        if (password_verify($current, $hash)) { // Correct!

            $pass = password_hash($_POST['passwordNew'], PASSWORD_DEFAULT);
					  // Define the query:
					  $updatePass = $con->prepare("UPDATE users SET pass= :pass WHERE id= :id LIMIT 1");
					  $updatePass->bindParam(':id', $id, PDO::PARAM_INT);
					  $updatePass->bindParam(':pass', $pass, PDO::PARAM_STR);
					  $success = $updatePass->execute();

              if ($success) { // If it ran OK.
								// Send an email, if desired.
						  $return['redirect'] = './dashboard.php';
						} else { // If it did not run ok
							$return['redirect'] = 'Your password could not be changed due to a system error. We apologize for any inconvenience.';
						}
			 } else { // Invalid password.
					$return['error'] = 'Your current password is incorrect!';
					}
		}

	echo json_encode($return, JSON_PRETTY_PRINT); exit;
} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');
}
?>
