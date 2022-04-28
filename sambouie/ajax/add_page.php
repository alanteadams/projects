<?php

	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "../inc/config.php";


	if($_SERVER['REQUEST_METHOD'] == 'POST' OR 1 == 1) {
		// Always return JSON format
		header('Content-Type: application/json');

		$return = [];

    // $allowed = '<div><p><span><br><a><img><h1><h2><h3><h4><ul><ol><li><blockquote>';

		$title = Filter::String( $_POST['title'] );
		$categories_id = Filter::String( $_POST['category'] );
		$description = Filter::String( $_POST['description'] );
		// $content = strip_tags( $_POST['content'], $allowed );
		$content = $_POST['content'];



		// $setAdmin = $con->prepare("UPDATE users SET type= :admin WHERE email= :email LIMIT 1");
		// $setAdmin->bindParam(':email', $email, PDO::PARAM_STR);
		// $setAdmin->execute();

		if(empty($return)) { // If everything's okay

	   	// Add the page to the database:
      $addContent = $con->prepare("INSERT INTO pages (categories_id, title, description, content) VALUES(:categories_id, :title, :description, :content)");
			$addContent->bindParam(':categories_id', $categories_id, PDO::PARAM_INT);
			$addContent->bindParam(':title', $title, PDO::PARAM_STR);
			$addContent->bindParam(':description', $description, PDO::PARAM_STR);
			$addContent->bindParam(':content', $content, PDO::PARAM_STR);
			$success = $addContent->execute();

      if ($success) {
        // Send an email to the administrator to let them know new content was added?
      }


		} else {
			// User does not exist, add them now.
			$return['error'] = 'Something went wrong';
		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');
	}
?>
