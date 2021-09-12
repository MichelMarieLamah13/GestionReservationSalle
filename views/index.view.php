<?php $title = "Acceuil" ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once("partials/_header.php"); ?>
<div style="padding-left:16px" class="description" id="main">
    <h1 class="header"><?= WEBSITE_NAME; ?></h1>

    <div class="calendar-container">
        <span id="dycalendar-today-with-skin" class="dycalendar-container skin-blue"></span>
        <span class="dyclock-analog-9 dyclock-container" style="float:right;"></span>
    </div>

</div>
</div>
<script src="assets/js/clock.min.js"></script>
<script src="assets/js/clock.default.js"></script>
<script src="assets/js/calendar.min.js"></script>
<script src="assets/js/calendar.default.js"></script>
<?php require_once("partials/_footer.php"); ?>
