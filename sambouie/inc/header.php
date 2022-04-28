<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php // Use a default page title if one wasn't provided...
  if (isset($page_title)) {
      echo $page_title;
  } else {
      echo 'Sambouie';
  }
  ?></title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta
    name="description"
    content="Sambouie helps people by providing business coaching and tailored information to be healthy and achieve financial independence."
  />

  <!-- Always include this line of code!!! -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="icon" href="resources/img/favicon.png" />
  <link rel="apple-touch-icon" href="resources/img/apple-touch-icon.png" />
  <link rel="manifest" href="manifest.webmanifest" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap"
    rel="stylesheet"
  />

  <link rel="stylesheet" href="resources/css/general.css" />
  <link rel="stylesheet" href="resources/css/style.css" />
  <link rel="stylesheet" href="resources/css/queries.css" />

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script
    async
    src="https://www.googletagmanager.com/gtag/js?id=G-TBQ08XJYFC"
  ></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", "G-TBQ08XJYFC");
  </script>


  <script
    type="module"
    src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"
  ></script>
  <script
    nomodule=""
    src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"
  ></script>

  <script
    defer
    src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"
  ></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <script defer src="resources/js/main.js"></script>
  <script defer src="resources/js/updateYear.js"></script>
