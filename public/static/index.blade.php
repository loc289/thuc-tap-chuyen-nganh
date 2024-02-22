<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="./assets/favicon/apple-touch-icon.png"
    />
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon" />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="./assets/favicon/favicon-16x16.png"
    />
    <link rel="manifest" href="./assets/favicon/site.webmanifest" />
    <link
      rel="mask-icon"
      href="./assets/favicon/safari-pinned-tab.svg"
      color="#5bbad5"
    />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />

    <!-- Fonts -->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css" />

    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />

    <!-- Css -->
    <link rel="stylesheet" href="./assets/css/main.css" />

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script>
      $(function () {
        $("#header").load("./templates/header.html");
        $("#navigation").load("./templates/navigation.html");
        $("#footer").load("./templates/footer.html");
      });
    </script>
    <title>Watch</title>
  </head>
  <body>
    <div class="content">
      <nav id="navigation"></nav>
      <div class="container">
        <header id="header"></header>

        <footer id="footer"></footer>
      </div>
    </div>
  </body>
</html>
