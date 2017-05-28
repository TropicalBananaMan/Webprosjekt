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
$event->save();

header('Location: http://localhost/event-manager-pro-1/index.php');
die();
