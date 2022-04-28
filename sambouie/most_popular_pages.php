<?php
// Allow the config
define('__CONFIG__', true);
// Require the config
//
require_once "inc/config.php";
$page_title = 'The Most Popular Pages';




// $_SESSION['user_id'] = 12;
// $_SESSION['user_not_expired'] = true;

// Validate the category ID:
// Validate the category ID:
  $getPopularPages = Page::getPopularPages();


  if (!$getPopularPages) { // Problem
    $page_title = 'Error!';
    require_once "inc/header.php";
    echo
    '</head>
      <body>
    div class="js-error">This page has been accessed in error.</div>';
    require_once "inc/footer.php";
    exit();
  }

  require_once "inc/header.php";
  ?>
</head>
<body>
<div class="container grid grid--blog-col ">
  <header class="main-header">
    <h1 class="blog-primary-header"><?php echo $page_title ?></h1>

  <nav class="main-nav">
    <ul class="main-nav-list">
      <a class="main-nav-link" href="./dashboard.php">Dashboard</a>
      <a class="main-nav-link" href="./favorites.php">Favorites</a>
      <a id="blog" class="main-nav-link" href="./blog.php">Blog</a>
      <a class="main-nav-link" href="css-grid.html">Logout</a>
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

        <!-- <p id="author" class="author">
          Posted by <strong>Alante' Adams</strong> on Monday, June 21st 2027
        </p> -->
      </div>

      <!-- <img
        src="img/post-img.jpg"
        alt="HTML code on a screen"
        width="500"
        height="200"
        class="post-img"
      /> -->

      <!-- echo '<h3 id="favorite_h3"><img src="images/heart_32.png" width="32" height="32"> <span class="label label-info">This is a favorite!</span> <a id="remove_favorite_link" href="remove_from_favorites.php?id=' . $page_id . '"><img src="images/close_32.png" width="32" height="32"></a></h3>';

      echo '<h3 id="favorite_h3"><span class="label label-info">Make this a favorite!</span> <a id="add_favorite_link" href="add_to_favorites.php?id=' . $page_id . '"><img src="images/heart_32.png" width="32" height="32"></a></h3>'; -->
    </header>
    <?php
    if ($getPopularPages) {
     foreach ($getPopularPages as $getPopularPage) {
        // echo $favoriteFound['id'] . '.' . $favoriteFound['title'] . '.' . $favoriteFound['description'] . '<br>';

        // echo '<div><h4><a href="page.php?id={$favoriteFound[\'id\']}' . '">' . $favoriteFound[\'title\']' . '</a></h4><p>' . $favoriteFound[\'description\']' . '</p></div>\n';

        echo "<div><h4><a href=\"page.php?id={$getPopularPage['id']}\">{$getPopularPage['num']}</a></h4><p>{$getPopularPage['title']}</p></div>\n";
    }
  }
     ?>
  </article>

  <!-- <aside class="blog-aside">
    <h4 class="blog-fourth-header">Related posts</h4>

    <ul class="related">
      <li class="related-post">
        <img
          src="img/related-1.jpg"
          alt="Person programming"
          width="75"
          height="75"
        />
        <div>
          <a href="#" class="related-link">How to Learn Web Development</a>
          <p class="related-author">By Jonas Schmedtmann</p>
        </div>
      </li>
      <li class="related-post">
        <img
          src="img/related-2.jpg"
          alt="Lightning"
          width="75"
          height="75"
        />
        <div>
          <a href="#" class="related-link">The Unknown Powers of CSS</a>
          <p class="related-author">By Jim Dillon</p>
        </div>
      </li>
      <li class="related-post">
        <img
          src="img/related-3.jpg"
          alt="JavaScript code on a screen"
          width="75"
          height="75"
        />
        <div>
          <a href="#" class="related-link">Why JavaScript is Awesome</a>
          <p class="related-author">By Matilda</p>
        </div>
      </li>
    </ul>
  </aside> -->
</div>
<?php

echo
'<script type="text/javascript">
const btnNavEl = document.querySelector(\'.btn-mobile-nav\');
const headerBlog = document.querySelector(\'.main-header\');

btnNavEl.addEventListener(\'click\', function() {
 headerBlog.classList.toggle(\'nav-open\');
}); </script>';
require_once "inc/footer.php" ?>
