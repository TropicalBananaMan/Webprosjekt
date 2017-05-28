<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/hovedside.css">
    <link rel="stylesheet" href="css/navbar_top.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <title>Westerdals Kork</title>
  </head>
  <body>
    <!--Importer navbar-top her. -->
    <?php require 'navbar-top.php' ?>

    <!--Container for alle events her. Hver event har informasjon, som f.eks. tittel, dato, gratis/ikke
        gratis, og knapper til redigering og sletting. -->
    <div id="event-container">

    </div>

    <!--Lag ny event. -->
    <a id="lag-ny-event" href="#"><img src="images/plus_icon.png" alt=""></a>
  </body>
</html>
