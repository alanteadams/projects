<?php
// This file contains the database access information.
// This file establishes a connection to MySQL and selects the database.
// This file defines a function for making data safe to use in queries.
// This file defines a function for hashing passwords.
// This script is begun in Chapter 3.

// Set the database access information as constants:
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'Wagki2021!thisisouryear');
// DEFINE ('DB_HOST', 'localhost');
// DEFINE ('DB_NAME', 'ecommerce1');
DEFINE ('DB_HOST_DB_NAME_CHARSET', 'mysql:charset=utf8mb4; host=localhost;port=3306;dbname=ecommerce1');
// DEFINE ('DB_HOST_NAME_CHARSET', 'mysql:charset=utf8; host=localhost;port=3306;dbname=ecommerce1');

// // Make the connection:
// $dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//
// // Set the character set:
// mysqli_set_charset($dbc, 'utf8');
//
// // Function for escaping and trimming form data.
// // Takes one argument: the data to be treated (string).
// // Returns the treated data (string).
// function escape_data ($data, $dbc) {
//
// 	// Strip the slashes if Magic Quotes is on:
// 	if (get_magic_quotes_gpc()) $data = stripslashes($data);
//
// 	// Apply trim() and mysqli_real_escape_string():
// 	return mysqli_real_escape_string ($dbc, trim ($data));
//
// } // End of the escape_data() function.
//
// // Omit the closing PHP tag to avoid 'headers already sent' errors!
//
// // If there is no constant defined call __CONFIG__. DO NOT load this file
// if(!defined('__CONFIG__')) {
//   exit('You do not have a config file');
//   // We can redirect someone in here instead of exiting or give them a 404 page
// }

class DB {
  protected static $con;

  private function __construct() {

    try {

      // self::$con = new PDO( 'mysql:charset=utf8mb4; host=localhost;port=3306;dbname=login_course', 'root', 'Wagki2021!thisisouryear' );
      self::$con = new PDO( DB_HOST_DB_NAME_CHARSET, DB_USER, DB_PASSWORD );
      self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      self::$con->setAttribute( PDO::ATTR_PERSISTENT, false );

    } catch (PDOException $e) {
        echo "Could not connect to database."; exit;
    }
  }

  public static function getConnection() {
    // If this instance has not been started, start it
    if (!self::$con) {
      new DB();
    }

    // Return the writeable db connection
    return self::$con;

  }

// There is no need for mysqli_real_escape_string
  // public static function escape_data($data, $con) {
  //   // Strip the slashes if Magic Quotes is on:
  //   if (get_magic_quotes_gpc()) $data = stripslashes($data);
  //
  //   // Apply trim() and mysqli_real_escape_string():
  //   return mysqli_real_escape_string ($con, trim ($data));
  //
  // } // End of the escape_data() function.
  // PDO takes care of this using prepared statements
  // $safe_username = mysql_real_escape_string($username);
// mysql_query("SELECT * FROM users WHERE username = '$safe_username' LIMIT 1;")
}
?>
