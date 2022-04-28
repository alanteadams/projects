<?php

// If there is no constant defined call __CONFIG__. DO NOT load this file
if(!defined('__CONFIG__')) {
  exit('You do not have a config file');
  // We can redirect someone in here instead of exiting or give them a 404 page
}


class User {

  private $con;

  public $id;
  public $username;
  public $firstname;
  public $lastname;
  public $email;
  public $date_created;

  public function __construct(int $id) {
    $this->con = DB::getConnection();

    $id = Filter::Int( $id );

    $user = $this->con->prepare("SELECT id, username, email, first_name, last_name, date_created FROM users WHERE id = :id LIMIT 1");
    $user->bindParam(':id', $id, PDO::PARAM_INT);
    $user->execute();

    if($user->rowCount() == 1) {
      $user = $user->fetch(PDO::FETCH_OBJ);

      $this->id            = (int)    $user->id;
      $this->username      = (string) $user->username;
      $this->email         = (string) $user->email;
      $this->firstname     = (string) $user->first_name;
      $this->lastname      = (string) $user->last_name;
      $this->date_created  = (string) $user->date_created;

    } else {
      // No user.
      // Redirect to logout
      header("Location: /logout.php"); exit;

    }
  }

  public function setEmail($new_email) {
    // User = new User(1);
    // $User->setEmail("new@email.com");

    // echo $this->email; // The current email address
    // echo $this->id; // The existing user id

    // $this->con->prepare("....SQL STATEMENT");
  }



  // public static function Find($email, $username = ' ', $return_assoc = false) {
  public static function Find($email, $return_assoc = false) {
    $con = DB::getConnection();
    // Make sure the user does not exist
    // Make sure the email address and username are available:
    $email = (string) Filter::Email($email);
    // $username = (string) Filter::String($username);

    // $findUser = $con->prepare("SELECT id, username, pass FROM users WHERE email = LOWER(:email) OR username = LOWER(:username) LIMIT 1");
    $findUser = $con->prepare("SELECT id, pass FROM users WHERE email = LOWER(:email) LIMIT 1");
    $findUser->bindParam(':email', $email, PDO::PARAM_STR);
    // $findUser->bindParam(':username', $username, PDO::PARAM_STR);
    $findUser->execute();



    if($return_assoc) {
      return $findUser->fetch(PDO::FETCH_ASSOC);
    }

    $user_found = (boolean) $findUser->rowCount();
      return $user_found;
 }
}
?>
