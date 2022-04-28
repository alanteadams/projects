<?php
// If there is no constant defined called __CONFIG__. DO NOT load this file.
if(!defined('__CONFIG__')) {
    exit('You do not have a config file');
}
// Force the user to be logged in or redirect.

class Page {
static function getPage() {
  $con = DB::getConnection();
  // Validate the category ID:
  	$id = Filter::INT($_GET['id']);

    $getContent = $con->prepare("SELECT title, description, content, date_created FROM pages WHERE id = :id LIMIT 1");
    $getContent->bindParam(':id', $id, PDO::PARAM_INT);
    $getContent->execute();

    return $getContent->fetch(PDO::FETCH_ASSOC);
 }

static function getPages($cat_id) {
  $con = DB::getConnection();
  // Validate the category ID:

    $getPages = $con->prepare("SELECT id, title, description FROM pages WHERE categories_id = :cat_id ORDER BY date_created DESC");
    $getPages->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
    $getPages->execute();

    return $getPages->fetchAll(PDO::FETCH_ASSOC);
 }

 static function getFavorite($flag = false) {

 $con = DB::getConnection();
 // Validate the category ID:
  $page_id = Filter::INT($_GET['id']);
  $user_id = $_SESSION['id'];

   $getFavorite = $con->prepare("SELECT user_id FROM favorite_pages WHERE user_id = :user_id AND page_id = :page_id LIMIT 1");
   $getFavorite->bindParam(':user_id', $user_id, PDO::PARAM_INT);
   $getFavorite->bindParam(':page_id', $page_id, PDO::PARAM_INT);
   $getFavorite->execute();

   if ($flag) {
     return $getFavorite->fetch(PDO::FETCH_ASSOC);
   }


     $favorite_found = (boolean) $getFavorite->rowCount();
       return $favorite_found;

 // $q = 'SELECT user_id FROM favorite_pages WHERE user_id=' . $user_id . ' AND page_id=' . $page_id;
 // $r = mysqli_query($dbc, $q);
 }

 static function getFavorites() {
   $con = DB::getConnection();
   // Validate the category ID:
   $user_id = $_SESSION['id'];

   $getFavorites = $con->prepare("SELECT id, title, description FROM pages LEFT JOIN favorite_pages ON (pages.id=favorite_pages.page_id) WHERE favorite_pages.user_id= :user_id ORDER BY title");
   $getFavorites->bindParam(':user_id', $user_id, PDO::PARAM_INT);
   $getFavorites->execute();

   return $getFavorites->fetchAll(PDO::FETCH_ASSOC);
 }

 static function getPopularPages() {
   $con = DB::getConnection();
   // Validate the category ID:

   $getPopularPages = $con->prepare("SELECT COUNT(history.id) AS num, pages.id, pages.title FROM pages, history WHERE pages.id=history.item_id AND history.type='page' GROUP BY (history.item_id) ORDER BY num DESC LIMIT 10");
   $getPopularPages->execute();

   return $getPopularPages->fetchAll(PDO::FETCH_ASSOC);
 }

 static function getHighestRatedPages() {
   $con = DB::getConnection();
   // Validate the category ID:

   $getHighestRatedPages = $con->prepare("SELECT ROUND(AVG(rating),1) AS average, pages.id, pages.title FROM pages, page_ratings WHERE pages.id=page_ratings.page_id GROUP BY (page_ratings.page_id) ORDER BY average DESC LIMIT 10");
   $getHighestRatedPages->execute();

   return $getHighestRatedPages->fetchAll(PDO::FETCH_ASSOC);
 }


 static function getCategories() {
   $con = DB::getConnection();
   // Validate the category ID:

   $getCategories = $con->prepare("SELECT id, category FROM categories");
   $getCategories->execute();

   return $getCategories->fetchAll(PDO::FETCH_ASSOC);
 }

 static function getNote() {
   $con = DB::getConnection();
   // Validate the category ID:
   $user_id = $_SESSION['id'];
   $page_id =  $_GET['id'];

   $getNote = $con->prepare("SELECT note, page_id FROM notes WHERE user_id= :user_id AND page_id= :page_id LIMIT 1");
   $getNote->bindParam(':user_id', $user_id, PDO::PARAM_INT);
   $getNote->bindParam(':page_id', $page_id, PDO::PARAM_INT);
   $getNote->execute();

   return $getNote->fetch(PDO::FETCH_ASSOC);
 }

 static function getNotes() {
   $con = DB::getConnection();
   // Validate the category ID:
   $user_id = $_SESSION['id'];

   $getNotes = $con->prepare("SELECT note, page_id, title FROM notes, pages WHERE user_id= :user_id AND pages.id=notes.page_id");
   $getNotes->bindParam(':user_id', $user_id, PDO::PARAM_INT);
   $getNotes->execute();

   return $getNotes->fetchAll(PDO::FETCH_ASSOC);
 }

 static function updateFavorite($flag = false) {

 $con = DB::getConnection();
 // Validate the category ID:
  $page_id = Filter::INT($_GET['id']);
  $user_id = $_SESSION['id'];

   $updateFavorite = $con->prepare("REPLACE INTO favorite_pages (user_id, page_id) VALUES (:user_id, :page_id) LIMIT 1");
   $updateFavorite->bindParam(':user_id', $user_id, PDO::PARAM_INT);
   $updateFavorite->bindParam(':page_id', $page_id, PDO::PARAM_INT);
   $updateFavorite->execute();

   $favorite_found = (boolean) $updateFavorite->rowCount();
     return $favorite_found;

  		// $q = 'REPLACE INTO favorite_pages (user_id, page_id) VALUES (?, ?)';
 }

 static function deleteFavorite($flag = false) {

 $con = DB::getConnection();
 // Validate the category ID:
  $page_id = Filter::INT($_GET['id']);
  $user_id = $_SESSION['id'];

   $deleteFavorite = $con->prepare("DELETE FROM favorite_pages WHERE user_id = :user_id AND page_id= :page_id LIMIT 1");
   $deleteFavorite->bindParam(':user_id', $user_id, PDO::PARAM_INT);
   $deleteFavorite->bindParam(':page_id', $page_id, PDO::PARAM_INT);
   $success = $deleteFavorite->execute();

   return $success;

  		// $q = 'REPLACE INTO favorite_pages (user_id, page_id) VALUES (?, ?)';
 }

 static function addHistory($flag = false) {

 $con = DB::getConnection();

  $type = 'page';
  $item_id = Filter::INT($_GET['id']);
  $user_id = $_SESSION['id'];

   $addHistory = $con->prepare("INSERT INTO history (user_id, type, item_id) VALUES (:user_id, :type, :item_id)");
   $addHistory->bindParam(':user_id', $user_id, PDO::PARAM_INT);
   $addHistory->bindParam(':type', $type, PDO::PARAM_STR);
   $addHistory->bindParam(':item_id', $item_id, PDO::PARAM_INT);
   $addHistory->execute();

       // Bonus material! Referenced in Chapter 12.
       // Record this visit to the history table:
    /*		$q = "INSERT INTO history (user_id, type, page_id) VALUES ({$_SESSION['user_id']}, 'page', $page_id)";
       $r = mysqli_query($dbc, $q);
    */

 }

 static function updateRating($flag = false) {

 $con = DB::getConnection();

  $page_id = Filter::INT($_GET['id']);
  $rating = Filter::INT($_GET['rating']);
  $user_id = $_SESSION['id'];

   $updateHistory = $con->prepare("REPLACE INTO page_ratings (user_id, page_id, rating) VALUES (:user_id, :page_id, :rating)");
   $updateHistory->bindParam(':user_id', $user_id, PDO::PARAM_INT);
   $updateHistory->bindParam(':page_id', $page_id, PDO::PARAM_INT);
   $updateHistory->bindParam(':rating', $rating, PDO::PARAM_INT);
   $success = $updateHistory->execute();


   if ($success) {
     return $success;
   }

       // Bonus material! Referenced in Chapter 12.
       // Record this visit to the history table:
    /*		$q = "INSERT INTO history (user_id, type, page_id) VALUES ({$_SESSION['user_id']}, 'page', $page_id)";
       $r = mysqli_query($dbc, $q);
    */

 }

 static function getRating() {
   $con = DB::getConnection();
   // Validate the category ID:
   $user_id = $_SESSION['id'];
   $page_id =  $_GET['id'];

   $getRating = $con->prepare("SELECT rating FROM page_ratings WHERE user_id= :user_id AND page_id= :page_id LIMIT 1");
   $getRating->bindParam(':user_id', $user_id, PDO::PARAM_INT);
   $getRating->bindParam(':page_id', $page_id, PDO::PARAM_INT);
   $getRating->execute();

   return $getRating->fetch(PDO::FETCH_ASSOC);
 }
}




?>
