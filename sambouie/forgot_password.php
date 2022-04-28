<?php
// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "inc/config.php";

// Redirect::ForceDashboard();
// session_regenate_id(true);
?>

<?php require_once "inc/header.php" ?>
<!-- <script defer src="resources/js/login.js"></script> -->
  </head>
<body>

  <section class="section-cta" id="forgot">
    <div class="container">
      <div class="cta">
        <div class="cta-text-box">
          <h1 class="heading-primary">Reset your password</h1>
          <p class="cta-text">
            Enter your email address below to reset your password.
          </p>

          <form class="cta-form js-verify-email" method="POST" name="sign-up">
            <div>
              <label for="email">Email address</label>
              <input
                id="email-verify"
                type="email"
                placeholder="email@example.com"
                name="email-verify"
                required="required"
              />
            </div>
            <button type="submit" class="btn btn--form">Reset &rarr;</button>
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
