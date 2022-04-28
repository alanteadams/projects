<?php
// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "../inc/config.php";


if($_SERVER['REQUEST_METHOD'] == 'POST' OR 1 == 1) {
  // Always return JSON format
  header('Content-Type: application/json');

  $return = [];

  $email = Filter::Email($_POST['emailVerify']);

  if ($email) {
  $user_found = User::Find($email, true);
  } else {
    $return['Please enter a valid email address!'];
  }

  if($user_found) {

    $id = (int) $user_found['id'];
    // Create a new, random password:
    $random_pass = substr(md5(uniqid(rand(), true)), 10, 15);

    $random_hash = password_hash($random_pass, PASSWORD_DEFAULT);

    // Define the query:
    $updateRandPass = $con->prepare("UPDATE users SET pass= :random_hash WHERE id= :id LIMIT 1");
    $updateRandPass->bindParam(':id', $id, PDO::PARAM_INT);
    $updateRandPass->bindParam(':random_hash', $random_hash, PDO::PARAM_STR);
    $success = $updateRandPass->execute();
    // User exists try and sign them in
      // $hash = (string) $user_found['pass'];

      if($success) { // If it ran OK.
        // // Send an email:
  			// $body = "Your password to log into <whatever site> has been temporarily changed to '$p'. Please log in using that password and this email address. Then you may change your password to something more familiar.";
  			// mail($_POST['email'], 'Your temporary password.', $body, 'From: admin@example.com');
        //
  			// // Print a message and wrap up:
  			// echo '<h1>Your password has been changed.</h1><p>You will receive the new, temporary password via email. Once you have logged in with this new password, you may change it by clicking on the "Change Password" link.</p>';
  			// include('./includes/footer.html');
  			// exit(); // Stop the script.

        // TESTING TESTING PURPOSES

        $_SESSION['varname'] = $random_pass;

        $return['redirect'] = './dashboard.php';
        $_SESSION['id'] = $id;
      } else {
        // Invalid user email/password combo
        $return['error'] = "Your password could not be changed due to a system error. We apologize for any inconvenience.";
      }


    // We can also check to see if they are able to log in.
    // Can add a header to give http status 301 404
  } else {
  // They need to create a new account
      $return['error'] = "You do not have an account <a href='./register.php'>Create one now?</a>";
  }
  // Make sure the user CAN be added AND is added

  // Return the proper information back to Javascript to redirect us

  // Json_encode looks for an array.
  echo json_encode($return, JSON_PRETTY_PRINT ); exit;
} else {
  // Die. Kill the script. Redirect the user. Do something regardless.
  exit('Invalid Url');
}
?>
