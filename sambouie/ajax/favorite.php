<?php

// Allow the config
define('__CONFIG__', true);

// Require the config
require_once "../inc/config.php";

// Need these values:
// if (isset($_GET['page_id'], $_GET['action'], $_SESSION['user_id'])
// 	&& filter_var($_GET['page_id'], FILTER_VALIDATE_INT, array('min_range' => 1))
// 	&& filter_var($_SESSION['user_id'], FILTER_VALIDATE_INT, array('min_range' => 1))
// 	) {

  if (isset($_GET['id'], $_GET['action'], $_SESSION['id'])) {


	// What action is being taken?
	if ($_GET['action'] === 'add') {
    $success = Page::updateFavorite();

	} elseif ($_GET['action'] === 'remove') {
    $success = Page::deleteFavorite();
	}


    if ($success && $_GET['action'] === 'remove') {
      echo '<li>
        <a id="add-favorite-icon-link" class="footer-link" href="#"
          ><ion-icon class="favorites-notes-icon" name="star-outline"></ion-icon>
        </a>
      </li>';
      exit;
      }
    if ($success && $_GET['action'] === 'add') {
      echo '<li>
        <a id="remove-favorite-icon-link" class="footer-link" href="#"
          ><ion-icon class="favorites-notes-icon" name="star"></ion-icon>
        </a>
      </li>';
      exit;
      }
		// if (mysqli_stmt_affected_rows($stmt) > 0) {
		// 	echo 'true';
		// 	exit;
		// }

} // Invalid values or didn't work!
echo 'false';
