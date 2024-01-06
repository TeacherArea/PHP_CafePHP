<?php
  include ('../resources/settings/globals.php');
  date_default_timezone_set('Europe/Stockholm');
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo TITLE ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <script src="script/clock.js"></script>
</head>
<body onload="startTime()">
<div class="header">
  <h1>Welcome to Café PHP</h1>
  <h2>Probably the best café in the world</h2>
</div>
<div class="init-backgroundimage init-display-container init-text-white">
  <?php include '../resources/calc/arrays.php'; ?>