<?php

// Allow the config
define('__CONFIG__', true);

// Require the config
require_once "../inc/config.php";

// $return = [];

// Need these values:
// if (isset($_GET['page_id'], $_GET['action'], $_SESSION['user_id'])
// 	&& filter_var($_GET['page_id'], FILTER_VALIDATE_INT, array('min_range' => 1))
// 	&& filter_var($_SESSION['user_id'], FILTER_VALIDATE_INT, array('min_range' => 1))
// 	) {

  // if (isset($_GET['id'], $_SESSION['id']) or 1 == 1) {
  if (isset($_SESSION['id']) or 1 == 1) {

	// What action is being taken?
    $categoriesFound = Page::getCategories();

    if ($categoriesFound) {

      // $return['redirect'] = "notes.php?id={$noteFound['page_id']}";
      // echo "notes.php?id={$noteFound['page_id']}"; exit();

      echo './blog.php'; exit();


      // header("Location: ./notes.php?id={$noteFound['page_id']}");
      // echo "<div><h4></h4><p>{$noteFound['note']}</p></div>\n";
      //
      //
      // echo "./notes.php?id=$noteFound['page_id']\"";
      // echo "$noteFound['page_id']";


    }
    else {
      echo "failed"; exit();
    }






		// if (mysqli_stmt_affected_rows($stmt) > 0) {
		// 	echo 'true';
		// 	exit;
		// }
// echo json_encode($return, JSON_PRETTY_PRINT); exit;
} // Invalid values or didn't work!
echo 'false';
