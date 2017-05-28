<?php

require 'vendor/autoload.php';
require 'setup.php';

use Carbon\Carbon;

Carbon::setLocale('no');

$event = new Event();
$event->title = $_POST['title'];
$event->starts_at = new Carbon($_POST['date'] . ' ' . $_POST['time']);
$event->description = $_POST['description'];
$event->image_path = $_POST['image-path'];
$event->is_free = isset($_POST['is-free']);
$event->category_id = $_POST['category'];
if($_POST['category'] == 0 || $_POST['category'] > 4) {
  header('Location: http://localhost/prosjekt/index.php');
}
else{
  header('Location: http://localhost/prosjekt/index.php');
  $event->save();
  die();
}
