<?php
// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "../inc/config.php";


if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Always return JSON format
  header('Content-Type: application/json');

  $return = [];

  $email = Filter::Email($_POST['emailLogin']);
  $password = Filter::String($_POST['passwordLogin']);

  $user_found = User::Find($email, true);

  if($user_found) {
    // User exists try and sign them in
      $id = (int) $user_found['id'];
      $hash = (string) $user_found['pass'];

      if(password_verify($password, $hash)) {
        // User is signed in
        $return['redirect'] = './dashboard.php';

        $_SESSION['id'] = $id;
      } else {
        // Invalid user email/password combo
        $return['error'] = "Invalid user email/password combo";
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
