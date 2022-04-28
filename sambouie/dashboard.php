<?php
// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "inc/config.php";

  // Page::ForceLogin();
  Redirect::ForceLogin();



  $User = new User($_SESSION['id']);
?>

<?php require_once "inc/header.php"; ?>
<!-- <script defer src="resources/js/script.js"></script> -->
</title>
</head>
  <body>
    <div class="body--dashboard">
    <nav class="nav--dashboard">
      Nav
    </nav>
    <menu class="menu--dashboard">
      <!-- <button class="btn btn--menu">Review</button>
      <button class="btn btn--menu">Liked</button>
      <button class="btn btn--menu">Favorites</button> -->
      <a href="./favorites.php" class="btn btn--menu">Favorites</a>
      <a href="./all_notes.php" class="btn btn--menu">Notes</a>
      <a href="./blog.php" class="btn btn--menu">Blog</a>
      <a href="./logout.php" class="btn btn--menu">Logout</a>
    </menu>

    <section class="section--dashboard">
      <div class="content view">Social Mirror Strategy</div>
      <div class="content">Live the Amazing Life</div>
      <div class="content">Very Small Talk</div>
      <div class="content">Dating Secrets</div>
      <div class="content">Stripe API</div>
      <div class="content">Youtube API</div>
      <div class="content">Lulu API</div>
      <div class="content">Mailchimp API</div>
      <div class="content">ADD SMS CONFIRMATION (VIA TWILIO)</div>
    </section>

    <main class="main--dashboard">
      <h1>Dashboard</h1>
      Welcome to the Dashboard, General. <?php echo $_SESSION['varname'] ?>
    </main>

    <aside class=aside--dashboard>
      <h4>Bulletin Board</h4>
      <p class="notes">
        Hello, <?php echo $User->firstname . ' ' . $User->lastname; ?> you've been a member since <?php echo $User->date_created; ?>
      </p>
    </aside>
  </div>
    <?php require_once "inc/footer.php"; ?>
