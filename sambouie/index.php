<?php
// Allow the config
define('__CONFIG__', true);
// Require the config
//
require_once "inc/config.php";
require_once "inc/header.php"; ?>
<script defer src="resources/js/script.js"></script>
<script defer src="resources/js/updateYear.js"></script>
  </head>
<body>


    <header class="header">
      <a href="#">
        <img class="logo" alt="Sambouie logo" src="resources/img/sambouie-logo.png" />
      </a>

      <nav class="main-nav">
        <ul class="main-nav-list">
          <li><a class="main-nav-link" href="#meals">Blog</a></li>
          <li><a class="main-nav-link" href="#meals">Podcast</a></li>
          <li>
            <a class="main-nav-link" href="#testimonials">Testimonials</a>
          </li>
          <li><a class="main-nav-link" href="#pricing">Sambouie Institute</a></li>
          <li><a class="main-nav-link nav-cta" href="#cta">Join Sambouie Institute</a></li>
        </ul>
      </nav>

      <button class="btn-mobile-nav">
        <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
        <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
      </button>
    </header>

    <main>
      <section class="section-hero">
        <div class="hero">
          <div class="hero-text-box">
            <h1 class="heading-primary">
              Capture the knowledge. <br />
              <em>forever.</em>
            </h1>
            <p class="hero-description">
              The <strong>only</strong> book you need to win&#8230;
            </p>
            <a href="https://prodigyslay.com/shop/you-may-already-have-what-it-takes-the-art-of-winning" class="btn btn--full margin-right-sm"
              >Get The Book</a
            >
            <a href="#how" class="btn btn--outline">Find out more &darr;</a>
            <div class="delivered-meals"> <!--definatelly should check this class -->
              <!-- <div class="delivered-imgs"> -->
                <ul class="social-links">
                  <li>
                    <a class="footer-link" href="https://instagram.com/alanteadams"
                      ><ion-icon class="social-icon" name="logo-instagram"></ion-icon
                    ></a>
                  </li>
                  <li>
                    <a class="footer-link" href="https://facebook.com/sambouiellc"
                      ><ion-icon class="social-icon" name="logo-facebook"></ion-icon
                    ></a>
                  </li>
                  <li>
                    <a class="footer-link" href="https://twitter.com/alanteadams"
                      ><ion-icon class="social-icon" name="logo-twitter"></ion-icon
                    ></a>
                  </li>
                </ul>
              <!-- </div> -->
              <p class="delivered-text">
                <span>Follow</span> on Social Media
              </p>
            </div>
          </div>
          <div class="hero-img-box">
            <picture>
              <!-- <source srcset="resources/img/hero.webp" type="image/webp" />
              <source srcset="resources/img/hero-min.png" type="image/png" /> -->

              <img
                src="resources/img/book-hero-img.jpg"
                class="hero-img"
                alt="Woman enjoying food, meals in storage container, and food bowls on a table"
              />
            </picture>
          </div>
        </div>
      </section>

      <!-- <section class="section-featured">
        <div class="container">
          <h2 class="heading-featured-in">As featured in</h2>
          <div class="logos">
            <img src="resources/img/logos/techcrunch.png" alt="Techcrunch logo" />
            <img
              src="resources/img/logos/business-insider.png"
              alt="Business Insider logo"
            />
            <img
              src="resources/img/logos/the-new-york-times.png"
              alt="The New York Times logo"
            />
            <img src="resources/img/logos/forbes.png" alt="Forbes logo" />
            <img src="resources/img/logos/usa-today.png" alt="USA Today logo" />
          </div>
        </div>
      </section> -->

      <section class="section-how" id="how">
        <div class="container">
          <span class="subheading">Success Maintanance</span>
          <h2 class="heading-secondary">
            Your daily dose of wisdom at your fingertips
          </h2>
        </div>

        <div class="container grid grid--2-cols grid--center-v">
          <!-- STEP 01 -->
          <div class="step-text-box">
            <p class="step-number">01</p>
            <h3 class="heading-tertiary">
              You're one step away&#8230;
            </h3>
            <p class="step-description">
              This book will be the perfect guide for you to develop and maintain
              the proper mindset it takes to win, in any arena, these psychological
              brain power lessons will put you above the competition rather in
              sports, business, life, or entertainment before you even step out
              there.
            </p>
          </div>

          <div class="step-img-box">
            <!-- <img
              src="resources/img/app/app-screen-1.png"
              class="step-img"
              alt="iPhone app
            preferences selection screen"
            /> -->
          </div>

          <!-- STEP 02 -->
          <div class="step-img-box">
            <!-- <img
              src="resources/img/app/app-screen-2.png"
              class="step-img"
              alt="iPhone app
            meal approving plan screen"
            /> -->
          </div>
          <div class="step-text-box">
            <p class="step-number">02</p>
            <h3 class="heading-tertiary">The Rules</h3>
            <p class="step-description">
              The concise rules jam-packed into this book gives you the specific
              keys to knowing when you are falling into mediocrity and how to get
              back to greatness, this self-evaluation, will help you become your
              own master by taking heed to what the simple indicators are telling
              you to stay on the road to winning!
            </p>
          </div>

          <!-- STEP 03 -->
          <div class="step-text-box">
            <p class="step-number">03</p>
            <h3 class="heading-tertiary">The Approach and Methodology</h3>
            <p class="step-description">
              It specifically tells you how to approach life with the best chance
              to win, every time, a way to look at the the world that gives you
              the edge over your enemies so that you will be outlasting the ones
              who don't understand these rules.
            </p>
          </div>
          <div class="step-img-box">
            <!-- <img
              src="resources/img/app/app-screen-3.png"
              class="step-img"
              alt="iPhone app
            delivery screen"
            /> -->
          </div>
        </div>
      </section>

      <section class="section-meals" id="meals">
        <div class="container center-text">
          <span class="subheading">Tune&mdash;In</span>
          <h2 class="heading-secondary">
            You May Already Have What It Takes
          </h2>
        </div>

        <div class="container grid grid--2-cols margin-bottom-md">
          <div class="meal">
            <img
              src="resources/img/hero-img.png"
              class="meal-img"
              alt="Japanese Gyozas"
            />
            <div class="meal-content">
              <!-- <div class="meal-tags">
                <span class="tag tag--vegetarian">Vegetarian</span>
              </div> -->
              <p class="meal-title">Podcast</p>
              <ul class="meal-attributes">
                <li class="meal-attribute">
                  <ion-icon class="meal-icon" name="mic-outline"></ion-icon>
                  <span><strong>20&#43;</strong>    episodes</span>
                </li>
                <li class="meal-attribute">
                  <ion-icon
                    class="meal-icon"
                    name="newspaper-outline"
                  ></ion-icon>
                  <span><strong>Business, Politics and Music</strong></span>
                </li>
                <li class="meal-attribute">
                  <ion-icon class="meal-icon" name="star-outline"></ion-icon>
                  <span><strong>5.0</strong> rating (537)</span>
                </li>
              </ul>
            </div>
          </div>

          <div class="meal">
            <img
              src="resources/css/img/bookshot-cailleighraven-min.png"
              class="meal-img"
              alt="Two girls smiling while holding book"
            />
            <div class="meal-content">
              <!-- <div class="meal-tags">
                <span class="tag tag--vegan">Vegan</span>
                <span class="tag tag--paleo">Paleo</span>
              </div> -->
              <p class="meal-title">Blog</p>
              <ul class="meal-attributes">
                <li class="meal-attribute">
                  <ion-icon class="meal-icon" name="book-outline"></ion-icon>
                  <span><strong>100&#43;</strong> blogs</span>
                </li>
                <!-- <li class="meal-attribute">
                  <ion-icon
                    class="meal-icon"
                    name="restaurant-outline"
                  ></ion-icon>
                  <span><strong>Business, Politics, and Music</strong></span>
                </li> -->
                <!-- <li class="meal-attribute">
                  <ion-icon class="meal-icon" name="star-outline"></ion-icon>
                  <span><strong>4.8</strong> rating (441)</span>
                </li> -->
              </ul>
            </div>
          </div>

          <!-- <div class="diets">
            <h3 class="heading-tertiary">Works with any diet:</h3>
            <ul class="list">
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Vegetarian</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Vegan</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Pescatarian</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Gluten-free</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Lactose-free</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Keto</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Paleo</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Low FODMAP</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Kid-friendly</span>
              </li>
            </ul>
          </div> -->
        </div>

        <!-- <div class="container all-recipes">
          <a href="#" class="link">See more Podcasts &rarr;</a>
        </div> -->
      </section>

      <section class="section-testimonials" id="testimonials">
        <div class="testimonials-container">
          <span class="subheading">Testimonials</span>
          <h2 class="heading-secondary">What readers of the book are saying&#8230</h2>

          <div class="testimonials">
            <figure class="testimonial">
              <img
                class="testimonial-img"
                alt="Photo of Customer Jamar"
                src="resources/img/gallery/selfbookshot-jamar.jpg"
              />
              <blockquote class="testimonial-text">
                Amazing book. Every point made was solid and backed with great
                reasoning. I also love how it not only talks about being an
                entrepreneur, but it also discusses life and the ways of human
                nature. It is also easy to read & comprehend. I recommend this to
                teens and adults who may need help understanding themselves and
                finding that spark that pushes them to be more and to do more.
              </blockquote>
              <p class="testimonial-name">&mdash; Jamar</p>
            </figure>

            <figure class="testimonial">
              <img
                class="testimonial-img"
                alt="Photo of customer Faron"
                src="resources/img/gallery/selfbookshot-faron.png"
              />
              <blockquote class="testimonial-text">
                Man! Ya'll better go and get this book right now. If you didn't get
                this book your Tripping. Go and support Grambling Authors! He really
                spoke some true principles that you can live by to succeed!
              </blockquote>
              <p class="testimonial-name">&mdash; Faron</p>
            </figure>

            <figure class="testimonial">
              <img
                class="testimonial-img"
                alt="Photo of customer Shanelle"
                src="resources/img/gallery/selfbookshot-shanelle.jpg"
              />
              <blockquote class="testimonial-text">
                I finished reading this book and I couldn't put it down. There was
                some real good knowledge packed within those pages. It was exactly
                what I needed to hear to unlock my goal driven self and live my best
                life!
              </blockquote>
              <p class="testimonial-name">&mdash; Shanelle</p>
            </figure>

            <!-- <figure class="testimonial">
              <img
                class="testimonial-img"
                alt="Photo of customer Hannah Smith"
                src="resources/img/gallery/selfbookshot-faron.png"
              />
              <blockquote class="testimonial-text">
                It is a great book for people who want to unlock their purpose.

              </blockquote>
              <p class="testimonial-name">&mdash; Helen</p>
            </figure> -->
          </div>
        </div>

        <div class="gallery">
          <figure class="gallery-item">
            <img
              src="resources/img/gallery/bookshot-bigrick.jpg"
              alt="Photo of Customer holding book"
            />
            <!-- <figcaption>Caption</figcaption> -->
          </figure>
          <figure class="gallery-item">
            <img
              src="resources/img/gallery/bookshot-bishop.jpg"
              alt="Photo of Customer holding book"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="resources/img/gallery/bookshot-jackson.jpg"
              alt="Photo of Customer holding book"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="resources/img/gallery/bookshot-jerome.jpg"
              alt="Photo of Customer holding book"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="resources/img/gallery/bookshot-kayla.jpg"
              alt="Photo of Customer holding book"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="resources/img/gallery/bookshot-pattie.jpg"
              alt="Photo of Customer holding book"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="resources/img/gallery/bookshot-smilingcustomer2.jpg"
              alt="Photo of Customer holding book"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="resources/img/gallery/bookshot-superintendent.jpg"
              alt="Photo of Customer holding book"
            />
          <!-- </figure>
          <figure class="gallery-item">
            <img
              src="resources/img/gallery/galle.jpg"
              alt="Photo of beautifully
            arranged food"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="resources/img/gallery/gallery-10.jpg"
              alt="Photo of beautifully
            arranged food"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="resources/img/gallery/gallery-11.jpg"
              alt="Photo of beautifully
            arranged food"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="resources/img/gallery/gallery-12.jpg"
              alt="Photo of beautifully
            arranged food"
            />
          </figure> -->
        </div>
      </section>

      <section class="section-pricing" id="pricing">
        <div class="container">
          <span class="subheading">Sambouie Institute</span>
          <h2 class="heading-secondary">
            The Perfect Lighthouse for You!
          </h2>
        </div>

        <div class="container grid grid--2-cols margin-bottom-md">
          <div class="pricing-plan pricing-plan--starter">
            <header class="plan-header">
              <p class="plan-name">Sambouie Institute Essential</p>
              <p class="plan-price"><span>$</span>399</p>
              <p class="plan-text">per month. </br> Online E-Learning Courses</p>
            </header>
            <ul class="list">
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Social Mirror Strategy</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Live the Amazing Life</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Very Small Talk</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Dating Secrets</span>
              </li>
            </ul>
            <div class="plan-sing-up">
              <a href="#" class="btn btn--full">Get the Game</a>
            </div>
          </div>

          <div class="pricing-plan pricing-plan--complete">
            <header class="plan-header">
              <p class="plan-name">Motionful Fitness</p>
              <p class="plan-price"><span>$</span>649</p>
              <p class="plan-text">per month. </br>Online Courses and live Trainings</p>
            </header>
            <ul class="list">
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>All of Essential+</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span><strong>Your Own</strong> Personal Nutritionist</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span><strong>Your Own</strong> Personal Fitness Trainer</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span><strong>Your Own</strong> Financial Advisor</span>
              </li>
            </ul>
            <div class="plan-sing-up">
              <a href="#" class="btn btn--full">Whole Package</a>
            </div>
          </div>
        </div>

        <div class="container grid">
          <aside class="plan-details">
            Prices include all applicable taxes. You can cancel at any time.
            Both plans include the following:
          </aside>
        </div>

        <div class="container grid grid--4-cols">
          <div class="feature">
            <ion-icon class="feature-icon" name="infinite-outline"></ion-icon>
            <p class="feature-title">Wisdom Within</p>
            <p class="feature-text">
              Get 24/7 365 acess to game that will catipult you to your goals!
            </p>
          </div>
          <div class="feature">
            <ion-icon class="feature-icon" name="nutrition-outline"></ion-icon>
            <p class="feature-title">Bite-Sized Chunks</p>
            <p class="feature-text">
              Courses served in small chunks of videos that gives you enough to ponder on for days!
            </p>
          </div>
          <div class="feature">
            <ion-icon class="feature-icon" name="wifi-outline"></ion-icon>
            <p class="feature-title">Comes to you!</p>
            <p class="feature-text">
              Simply login and you have your virtual coach on demand, no need to travel
            </p>
          </div>
          <div class="feature">
            <ion-icon class="feature-icon" name="pulse-outline"></ion-icon>
            <p class="feature-title">Live Q&A</p>
            <p class="feature-text">
            If you have a burning question simply give us a call and we will help you!*
            </p>
          </div>
        </div>
      </section>

      <section class="section-cta" id="cta">
        <div class="container">
          <div class="cta">
            <div class="cta-text-box">
              <h2 class="heading-secondary">Free Membership and Ebook</h2>
              <p class="cta-text">
                Get in on your free membership that comes with an powerful ebook. This ebook
                will definitely spark some ideas in you and complete catipult your life for that better.
              </p>

              <form class="cta-form" name="sign-up">
                <div>
                  <label for="full-name">Full Name</label>
                  <input
                    id="full-name"
                    type="text"
                    placeholder="John Doe"
                    name="full-name"
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

                <button class="btn btn--form">Sign me Up!</button>

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
    </main>
      <?php require_once "inc/footer.php"; ?>
