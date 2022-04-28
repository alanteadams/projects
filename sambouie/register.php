<?php
// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "inc/config.php";

// Redirect::ForceDashboard();
?>


<?php require_once "inc/header.php"?>
</head>
  <body>

    <section class="section-cta" id="cta">
      <div class="container">
        <div class="cta">
          <div class="cta-text-box">
            <h2 class="heading-secondary">Unlock your lessons!</h2>
            <p class="cta-text">
              These jam-packed lessons are guaranteed to electrify your career, life and business, no doubt.
              These are the only classes you need to win in any arena...
            </p>

            <form class="cta-form js-register" method="POST" name="sign-up">
              <div>
                <label for="first-name">First Name</label>
                <input
                  id="first-name"
                  type="text"
                  placeholder="John"
                  name="first-name"
                  required="required"
                />
              </div>
              <div>
                <label for="last-name">Last Name</label>
                <input
                  id="last-name"
                  type="text"
                  placeholder="Doe"
                  name="last-name"
                  required="required"
                />
              </div>
              <div>
                <label for="username">Username</label>
                <input
                  id="username"
                  type="text"
                  placeholder="Gladiator"
                  name="username"
                  required="required"
                />
              </div>

              <div>
                <label for="email">Email address</label>
                <input
                  id="email"
                  type="email"
                  placeholder="email@example.com"
                  name="email"
                  required="required"
                />
              </div>
              <div>
                <label for="password">Password</label>
                <input
                  id="password"
                  type="password"
                  placeholder="Your Password"
                  name="password"
                  required="required"
                />
              </div>
              <div>
                <label for="password">Confirm Password</label>
                <input
                  id="password-two"
                  type="password"
                  placeholder="Confirm Your Password"
                  name="password-two"
                  required="required"
                />
              </div>
            <div class="js-error">
              Error
            </div>

              <!-- <div>
                <label for="select-where">Where did you hear from us?</label>
                <select id="select-where" name="select-where" required>
                  <option value="">Please choose one option:</option>
                  <option value="friends">Friends and family</option>
                  <option value="youtube">YouTube video</option>
                  <option value="podcast">Podcast</option>
                  <option value="ad">Facebook ad</option>
                  <option value="others">Others</option>
                </select>
              </div> -->

              <button type="submit" class="btn btn--form">Sign me Up!</button>

              <!-- <input type="checkbox" />
              <input type="number" /> -->
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
    <?php require_once "inc/footer.php"; ?>
