<?php require_once("includes/constants.php"); ?>
<?php require_once("includes/functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>
        <?= isset($title)
            ? $title . ' - ' . WEBSITE_NAME
            : WEBSITE_NAME . ' - A votre service'
        ?>
    </title>


    <link rel="stylesheet" href="assets/css/_index.css" media="screen">
    <link rel="stylesheet" href="assets/css/_about.css" media="screen">
    <link rel="stylesheet" href="assets/css/_dropDownSide.css" media="screen">
    <link rel="stylesheet" href="assets/css/_errors.css" media="screen">
    <link rel="stylesheet" href="assets/css/_info.css" media="screen">
    <link rel="stylesheet" href="assets/css/_form.register.css" media="screen">
    <link rel="stylesheet" href="assets/css/_form.add.room.css" media="screen">
    <link rel="stylesheet" href="assets/css/_form.update.prof.css" media="screen">
    <link rel="stylesheet" href="assets/css/_form.update.password.css" media="screen">
    <link rel="stylesheet" href="assets/css/_form.login.css" media="screen">
    <link rel="stylesheet" href="assets/css/_form.profile.css" media="screen">
    <link rel="stylesheet" href="assets/css/_form.request.css" media="screen">
    <link rel="stylesheet" href="assets/css/_card.profile.css" media="screen">
    <link rel="stylesheet" href="assets/css/_list.css" media="screen">
    <link rel="stylesheet" href="assets/css/_index.next.css" media="screen">

    <link rel="stylesheet" href="assets/css/clock.css" media="screen">
    <link rel="stylesheet" href="assets/css/calendar.css" media="screen"/>

    <link rel="stylesheet" href="assets/css/print.css" media="print">
    <link rel="stylesheet" href="libraries/icon/fontawesome-pro/css/all.min.css">


</head>

<body>
<?php require_once("partials/_nav.php"); ?>
<?php require_once("partials/_flash.php"); ?>
