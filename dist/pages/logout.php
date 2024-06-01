<?php
require_once('../../config.php');
session_destroy();
header("Location: ".APP_URL."dist/pages/login.php");exit
?>