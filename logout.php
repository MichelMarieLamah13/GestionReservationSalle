<?php
session_start();
session_destroy();
$_SESSION=[];
require_once('includes/functions.php');
redirect('login.php');
