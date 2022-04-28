<?php
// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "inc/config.php";

// Redirect::ForceDashboard();
// Have to add if not admin redirect to dashboard.php
// I have to refactor the redirect  class lator.

$page_title = 'Add a Site Content Page';

require_once "inc/header.php";
?>
  <script defer src="https://cdn.tiny.cloud/1/4n6f41uurfvfxpajkquty0x0ifgznq5hdcerx3nzjpp65q0c/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script defer src="resources/js/tinymce.js"></script>
</head>
  <body>
    <section class="section-add-page" id="form">
      <div class="container">
        <div class="add-page">
          <div class="add-page-text-box">
            <h1 class="heading-secondary">Add a Site Content Page</h1>
            <div class="add-page-text">
              Fill out the form to add a page of content:
            </div>



              <form method="post" action="mailer.php" class="js-add-page">
              <div>
                <label for="title">Title</label>
                <input
                  id="title"
                  type="text"
                  placeholder="Title"
                  name="title"
                  required
                />
              </div>

              <div>
                <label for="category">Category</label>
                <select id="category" name="category" required>
                  <option value="">Please choose one option:</option>
                  <option value="1">Common Attacks</option>
                  <option value="2">Database Security</option>
                  <option value="3">General Web Security</option>
                  <option value="4">Javascript Security</option>
                  <option value="5">PHP Security</option>
                  <option value="6">PDF Guides</option>
                </select>
              </div>

              <div>
                <label for="description">Description</label>
                <textarea
                id="description"
                name="description"
                placeholder="Your Description"
                ></textarea>
              </div>

              <div>
                <label for="content">Content</label>
                <textarea
                id="content"
                name="content"
                placeholder="Your Content Goes Here..."
                ></textarea>
              </div>


              <button type="submit" class="btn btn--form">Post Content</button>

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
    </section>
    <?php require_once "inc/footer.php"; ?>
