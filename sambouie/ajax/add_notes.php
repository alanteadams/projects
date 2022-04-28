<?php

// Allow the config
define('__CONFIG__', true);

// Require the config
require_once "../inc/config.php";


if($_SERVER['REQUEST_METHOD'] == 'POST' OR 1 == 1) {
  // Always return JSON format
  header('Content-Type: application/json');

  $return = [];

  $allowed = '<div><p><span><br><a><img><h1><h2><h3><h4><ul><ol><li><blockquote>';



  if (isset($_POST['notes'])) {

    $note = strip_tags( $_POST['notes'], $allowed );

//     $q = "REPLACE INTO notes (user_id, page_id, note) VALUES ($user_id, $page_id, '" . escape_data($notes, $dbc) . "')";
//     $r = mysqli_query($dbc, $q);
//     if (mysqli_affected_rows($dbc) > 0) {
//       echo '<div class="alert alert-success">Your notes have been saved.</div>';
//     }
//   }
// }

$user_id = $_SESSION['id'];
$page_id = $_POST['id'];

$addNotes = $con->prepare("REPLACE INTO notes (user_id, page_id, note) VALUES(:user_id, :page_id, :note)");
$addNotes->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$addNotes->bindParam(':page_id', $page_id, PDO::PARAM_INT);
$addNotes->bindParam(':note', $note, PDO::PARAM_STR);
$success = $addNotes->execute();

if ($success) {
  // echo '<div>
  // <p>
  // You just added notes successfully.
  // </p>
  // </div>'
  $return['success'] = true;


} else {
  $return['error'] = 'Something went wrong';
}

}
echo json_encode($return, JSON_PRETTY_PRINT); exit;

 } else {
  // Die. Kill the script. Redirect the user. Do something regardless.
  exit('Invalid URL');
}
?>
