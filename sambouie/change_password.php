<?php
// This page is used to change an existing password.
// Users must be logged in to access this page.

// Require the configuration before any PHP code
// as the configuration controls error reporting:
define('__CONFIG__', true);
// Require the config
require_once "inc/config.php";

Redirect::ForceLogin();
?>

<?php require_once "inc/header.php" ?>
<!-- <script defer src="resources/js/login.js"></script> -->
  </head>
<body>

  <section class="section-cta" id="change">
    <div class="container">
      <div class="cta">
        <div class="cta-text-box">
          <h1 class="heading-primary">Change your Password</h1>
          <p class="cta-text">
            Use the form below to change your password.
          </p>

          <form class="cta-form js-change-password" method="POST" name="sign-up">
            <div>
              <label for="current-password">Current Password</label>
              <input
                id="current-password"
                type="password"
                placeholder="Current Password"
                name="current-password"
                required="required"
              />
            </div>
            <div>
              <label for="password-new">New Password</label>
              <input
                id="password-new"
                type="password"
                placeholder="New Password"
                name="password-new"
                required="required"
              />
            </div>
            <div>
              <label for="password-confirm">Confirm Password</label>
              <input
                id="password-confirm"
                type="password"
                placeholder="Confirm your Password"
                name="password-confirm"
                required="required"
              />
            </div>

            <button type="submit" class="btn btn--form">Change Password &rarr;</button>
          </form>
        </div>
        <div
          class="cta-img-box"
          role="img"
          aria-label="Customer buying book"
        ></div>
      </div>
    </div>
  </section>

  <?php require_once "inc/footer.php" ?>
