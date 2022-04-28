<?php
// Allow the config
define('__CONFIG__', true);
// Require the config
//
require_once "inc/config.php";
$page_title = 'Blog Content';



// $_SESSION['user_id'] = 12;
// $_SESSION['user_not_expired'] = true;

// Validate the category ID:
if (isset($_GET['id'])) {
//
  $contentFound = Page::getPage();
  $favoriteFound = Page::getFavorite();
  $noteFound = Page::getNote();
  $ratingFound = Page::getRating();

  if (!empty($ratingFound['rating'])) {
    $rating       = Filter::INT($ratingFound['rating']);
  }

  if (!$contentFound) { // Problem
    $page_title = 'Error!';
    require_once "inc/header.php";
    echo
    '</head>
      <body>
    div class="js-error">This page has been accessed in error.</div>';
    require_once "inc/footer.php";

    exit();
  }

  Page::addHistory();

	 // Get the page info:
	 // $q = 'SELECT title, description, content FROM pages WHERE id=' . $page_id;
	 // $r = mysqli_query($dbc, $q);
	 // if (mysqli_num_rows($r) !== 1) { // Problem!
	 // 	$page_title = 'Error!';
	 // 	include('./includes/header.html');
	 // 	echo '<div class="alert alert-danger">This page has been accessed in error.</div>';
	 // 	include('./includes/footer.html');
	 // 	exit();
	 // }

  // $contentFound = $getContent->fetch(PDO::FETCH_ASSOC);
  $page_title   = $contentFound['title'];
  $page_content = $contentFound['content'];
  $date_created = $contentFound['date_created'];
  require_once "inc/header.php";
?>
 <script defer src="resources/js/review.js"></script>
  </head>
<body>
  <div class="container grid grid--blog-col ">
    <header class="main-header">
      <h1 class="blog-primary-header"><?php echo $page_title ?></h1>

    <nav class="main-nav">
      <ul class="main-nav-list">
        <a class="main-nav-link" href="./dashboard.php">Dashboard</a>
        <!-- <a class="main-nav-link" href="./favorites.php">Favorites</a> -->
        <a id="blog" class="main-nav-link" href="./blog.php">Blog</a>
        <a class="main-nav-link" href="./logout.php">Logout</a>
      </ul>
    </nav>

      <button class="btn-mobile-nav">
        <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
        <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
      </button>
    </header>
    <article>
      <header class="post-header">
        <h2 class="blog-secondary-header"><?php echo $page_title ?></h2>
        <div class="author-box">
          <!-- <img
            src="img/laura-jones.jpg"
            alt="Headshot of Laura Jones"
            height="50"
            width="50"
            class="author-img"
          /> -->

          <p id="author" class="author">
            Posted by <strong>Alante' Adams</strong> on <?php echo $date_created; ?>
          </p>
        </div>

        <!-- <img
          src="img/post-img.jpg"
          alt="HTML code on a screen"
          width="500"
          height="200"
          class="post-img"
        /> -->

        <ul class="social-links">
          <?php if (!empty($noteFound['page_id']))
          echo "
          <li>
            <a id=\"fav-link\" class=\"footer-link\" \"href=\"notes.php?id={$noteFound['page_id']}\"
              ><ion-icon class=\"favorites-notes-icon\" name=\"clipboard\"></ion-icon>
            </a>
          </li>";
          else {
            echo  "<li>
                  <a id=\"fav-link\" class=\"footer-link\" \"href=\"notes.php?id=#\"
                    ><ion-icon class=\"favorites-notes-icon\" name=\"clipboard-outline\"></ion-icon>
                  </a>
                </li>";
          }
          ?>
          <?php if ($favoriteFound) {
          echo '
         <li>
          <a id="remove-favorite-icon-link" class="footer-link" href="#"
            ><ion-icon class="favorites-notes-icon" name="star"></ion-icon>
          </a>
        </li>'; }
         else {
        echo
        '<li>
          <a id="add-favorite-icon-link" class="footer-link" href="#"
            ><ion-icon class="favorites-notes-icon" name="star-outline"></ion-icon>
          </a>
        </li>'; }
        ?>
        </ul>

        <!-- echo '<h3 id="favorite_h3"><img src="images/heart_32.png" width="32" height="32"> <span class="label label-info">This is a favorite!</span> <a id="remove_favorite_link" href="remove_from_favorites.php?id=' . $page_id . '"><img src="images/close_32.png" width="32" height="32"></a></h3>';

        echo '<h3 id="favorite_h3"><span class="label label-info">Make this a favorite!</span> <a id="add_favorite_link" href="add_to_favorites.php?id=' . $page_id . '"><img src="images/heart_32.png" width="32" height="32"></a></h3>'; -->
      </header>

      <?php echo $page_content ?>
      <div class="review-box">
          <h4 class="rating-replace">Review so that we can improve for you!</h4>
          <span class="rating-result"></span>

      <ul class="review-links">
        <li>
          <a data-rating="1" class="review-link <?php echo ($rating === 1) ? 'active' : ''; ?>" href="#"
            ><ion-icon class="social-icon" name="star-outline"></ion-icon
          ></a>
        </li>
        <li>
          <a data-rating="2" class="review-link <?php echo ($rating === 2) ? 'active' : ''; ?>" href="#"
            ><ion-icon class="social-icon" name="star-outline"></ion-icon
          ></a>
        </li>
        <li>
          <a data-rating="3" class="review-link <?php echo ($rating === 3) ? 'active' : ''; ?>" href="#"
            ><ion-icon class="social-icon" name="star-outline"></ion-icon
          ></a>
        </li>
        <li>
          <a data-rating="4" class="review-link <?php echo ($rating === 4) ? 'active' : ''; ?>" href="#"
            ><ion-icon class="social-icon" name="star-outline"></ion-icon
          ></a>
        </li>
        <li >
          <a data-rating="5" class="review-link <?php echo ($rating === 5) ? 'active' : ''; ?>" href="#"
            ><ion-icon class="social-icon" name="star-outline"></ion-icon
          ></a>
        </li>
      </ul>
    </div>
    </article>

    <aside class="blog-aside">
      <div class="container">
        <div class="add-page">
          <div class="">
            <h4 class="heading-fourth">Your Notes</h4>
            <div class="form-text">
              Write notes to instill the Lesson...
            </div>

              <form method="post" action="mailer.php" class="js-add-notes">
              <div>
                <label for="notes">Notes</label>
                <textarea
                id="notes"
                name="notes"
                placeholder="Your Notes Goes Here..."
                ></textarea>
              </div>
              <button type="submit" class="btn btn--form btn--notes">Save Notes</button>

              <!-- <input type="checkbox" />
              <input type="number" /> -->
            </form>
          </div>
          <!-- <div
            class="cta-img-box"
            role="img"
            aria-label="Customer buying book"
          ></div> -->
        </div>
      </div>
    </aside>
  </div>
<?php } else {
 }
 echo
 '<script type="text/javascript">
 const btnNavEl = document.querySelector(\'.btn-mobile-nav\');
 const headerBlog = document.querySelector(\'.main-header\');

 btnNavEl.addEventListener(\'click\', function() {
   headerBlog.classList.toggle(\'nav-open\');
 }); </script>';
  require_once "inc/footer.php" ?>
