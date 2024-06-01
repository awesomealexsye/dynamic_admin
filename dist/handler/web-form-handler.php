<?php
require_once('../../config.php');
require_once("database.php");

// echo "<pre>";
// print_r($_POST);exit;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tableName = $_POST['tableName'] ?? '';
    try {
        $sql = "SELECT * FROM all_table_records WHERE table_name='" . $tableName . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            unset($_POST['tableName']); // remove the table name from post request
            // Initialize variables
            $fields = [];
            $values = [];

            // Loop through POST data to build SQL query dynamically
            foreach ($_POST as $key => $value) {
                $fields[] = $key;
                $values[] = "'" . $conn->real_escape_string($value) . "'"; // Escape special characters for use in SQL
            }

            // Handle file uploads
            foreach ($_FILES as $key => $file) {
                $fields[] = $key;

                // Handle file upload
                $targetDir = APP_PATH . "/dist/uploads/";
                $fileExtension = pathinfo(basename($file["name"]), PATHINFO_EXTENSION);
                $fileName = rand(1000, 9999) . "-" . time() . "." . $fileExtension;
                $targetFile = $targetDir . $fileName;

                if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                    $values[] = "'" . $fileName . "'"; // Save the path to the file
                } else {
                    echo "Error uploading file: " . $file["name"];
                    // die("Error uploading file: " . $file["name"]);
                }
            }

            // Convert arrays to comma-separated strings
            $fields_str = implode(', ', $fields);
            $values_str = implode(', ', $values);

            // Prepare the SQL query
            $sql = "INSERT INTO " . $tableName . " ($fields_str) VALUES ($values_str)";
            // echo "<pre>";
            // print_r($sql);

            // Execute the statement
            if ($conn->query($sql) === TRUE) {
                header("Location: " . APP_URL . "dist/pages/thank-you.php?message=Record Inserted Successfully");
                exit;
            } else {
                echo "Error: " . $conn->error;
            }

        } else {
            echo "No Table Record Found";
        }
    } catch (\Throwable $th) {
        echo "Error Occurred: " . $th->getMessage();
        echo "<br><h1>Contact Developer</h1>";
        exit;
    }
}
// echo "ending";exit;
?>