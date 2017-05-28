<?php

// Koble til database og sette opp konfigurasjon.
require 'setup.php';

// Hente ut kategori ID fra URL'en, om den eksisterer.
if (isset($_GET['category'])) {
    $categoryId = $_GET['category'];
}

// Hvis en kategori ID er satt, hente vi kun ut eventer knyttet til kategorien.
if (isset($categoryId)) {
    $chosenCategory = Category::find($categoryId);
    $events = Event::where('category_id', $categoryId)->get();

// Hvis ikke, henter vi ut alle events.
} else {
    $events = Event::all();
}

// Vi bruk av load kan vi hente inn tilknyttede kategorier for hvert event.
// Dette er derimot ikke nødvendig da Eloquent automatisk vil hente kategori
// første gang vi skriver $event->category.
// $events->load('category');

// Vi henter ut alle kategorier for bruk i dropdownen.
$categories = Category::all();

?>

<!doctype html>
<html>
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="css/reset.css">
      <link rel="stylesheet" type="text/css" href="css/hovedside.css">
      <link rel="stylesheet" type="text/css" href="css/navbar_top.css">
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
      <title>Westerdals Kork</title>
    </head>
    <body>
      <!--Importer navbar-top her. -->
      <?php require 'navbar-top.php' ?>

        <!-- Vi legger inn overskrift. Navn på kategori om det er satt, hvis ikke 'Alle eventer'. -->
        <h1><?= isset($chosenCategory) ? $chosenCategory->name : 'Alle eventer' ?></h1>

        <!-- Vi legger inn en dropdown i en form for å kunne velge kategori. Formen sender en GET spørring til samme URL. -->
        <form action = "">
            <select name="category">
                <option value = "">Velg kategori</option>
                <?php foreach ($categories as $category) { ?>
                <option value = "<?= $category->id ?>"><?= $category->name ?></option>
                <?php } ?>
            </select>
            <button type="submit">Go!</button>
        </form>

        <!-- Vi legger til en liste med events fra $events arrayen vår. -->
        <div id="event-container">
            <?php foreach ($events as $event) { ?>

              <div class="event">
                <img src="<?= $event->image_path ?>" width="300">
                <h2><?= $event->title ?></h2>
                <p><?= $event->description ?></p>
                <p><?= $event->starts_at->diffForHumans() ?></p>
                <p><?= $event->is_free ? 'Gratis' : 'Ikke Gratis' ?></p>
                <p><?= $event->category->name ?></p>

                <!-- Vi linker til delete.php og sender med event ID som GET parameter i URL'en. -->
                <a href="delete.php?id=<?= $event->id ?>">Slett</a>
              </div>

            <?php } ?>
        </div>

        <!--Lag ny event. -->
        <a id="lag-ny-event" href="new-event.php"><img src="images/plus_icon.png" alt=""></a>
    </body>
</html>
