<?php
// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "inc/config.php";

Redirect::ForceDashboard();
?>

<?php require_once "inc/header.php"?>
<!-- <script defer src="resources/js/register.js"></script> -->
</head>
  <body>
    <section class="section-cta" id="form">
      <div class="container">
        <div class="cta">
          <div class="cta-text-box">
            <h2 class="heading-secondary">Any Questions? Simply Ask.</h2>
            <div class="cta-text">
              <?php
                         if($_GET["success"] == 1) {
                              echo "<div class=\"form-messages success\">Thank You! Your message has been sent.</div>";
                         }

                         if ($_GET["success"] == -1) {
                              echo "<div class=\"form-messages error\">Oops! Something went wrong and we couldn't send your message. </div>";
                         }
                     ?>
            </div>



              <form method="post" action="mailer.php" class="cta-form">
              <div>
                <label for="full-name">Full Name</label>
                <input
                  id="name"
                  type="text"
                  placeholder="John Doe"
                  name="name"
                  required
                />
              </div>

              <div>
                <label for="email">Email address</label>
                <input
                  id="email"
                  type="email"
                  placeholder="me@example.com"
                  name="email"
                  required
                />
              </div>

              <div>
                <label for="select-where">Where did you hear from us?</label>
                <select id="select-where" name="select-where" required>
                  <option value="">Please choose one option:</option>
                  <option value="friends">Friends and family</option>
                  <option value="youtube">YouTube video</option>
                  <option value="podcast">Podcast</option>
                  <option value="ad">Facebook ad</option>
                  <option value="others">Others</option>
                </select>
              </div>
              <div>
                <textarea
                  name="message"
                  placeholder="Your message"
                ></textarea>
              </div>

              <button type="submit" class="btn btn--form">Send my Message!</button>

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
