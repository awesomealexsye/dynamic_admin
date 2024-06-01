<?php
// require_once('../../config.php');
function connect()
{
    // Database connection settings
    $host = DB_HOST; // Database host
    $user = DB_USER; // Database username
    $password = DB_PASS; // Database password
    $database = DB_NAME; // Database name

    // Create a new MySQLi object for database connection
    $conn = new mysqli($host, $user, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


$conn = connect();
