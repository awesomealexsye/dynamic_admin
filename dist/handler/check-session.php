<?php
// checkSession

// require_once('../../config.php');

if(!isset($_SESSION['admin_email'])){
    header("Location: ".APP_URL."dist/pages/login.php");
}