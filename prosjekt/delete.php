<?php

// Koble til database og sette opp konfigurasjon.
require 'setup.php';

// Vi henter ut én event basert på event ID spesifisert i URL'en.
// (Burde vi her legge inn en test for om event ID er satt?)
$event = Event::find($_GET['id']);

// Vi sletter eventen fra databasen.
$event->delete();

// Vi redirecter tilbake til forsiden.
header('Location: http://localhost/prosjekt/index.php');
die();
