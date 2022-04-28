<?php
// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "inc/config.php";

Redirect::ForceDashboard();
?>

<?php require_once "inc/header.php" ?>
<!-- <script defer src="resources/js/login.js"></script> -->
  </head>
<body>

  <section class="section-cta" id="cta">
    <div class="container">
      <div class="cta">
        <div class="cta-text-box">
          <h2 class="heading-secondary">Login</h2>
          <p class="cta-text">
            If you have an account simply login!
          </p>

          <form class="cta-form js-login" method="POST" name="sign-up">
            <div>
              <label for="email">Email address</label>
              <input
                id="email-login"
                type="email"
                placeholder="email@example.com"
                name="email-login"
                required="required"
              />
            </div>
            <div>
              <label for="password">Password</label>
              <input
                id="password-login"
                type="password"
                placeholder="Your Password"
                name="password-login"
                required="required"
              />
            </div>

            <button type="submit" class="btn btn--form">Login</button>
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
