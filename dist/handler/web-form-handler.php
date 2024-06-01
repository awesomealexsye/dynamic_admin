<?php
require_once('../../config.php');
require_once("database.php");
// echo "<pre>";
// print_r($_POST);exit;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tableName = $_POST['tableName'] ?? '';
    try {
        $sql = "SELECT * FROM all_table_records where table_name='".$tableName."'";
        $result = $conn->query($sql);

        // $stmt = $conn->prepare($sql);
        // $stmt->bind_param("s", $tableName);
        // $stmt->execute();
        // $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            unset($_POST['tableName']);//remove the table name from post request
            // Initialize variables
            $fields = [];
            $values = [];
            $placeholders = [];
            $bindParams = [];
            $types = '';

            // Loop through POST data to build SQL query dynamically
            foreach ($_POST as $key => $value) {
                $fields[] = $key;
                $values[] = $conn->real_escape_string($value); // Escape special characters for use in SQL
                $placeholders[] = '?'; // Prepare placeholders for prepared statement
                $types .= 's'; // Assuming all fields are strings
                $bindParams[] = &$values[count($values) - 1];
            }

            // Handle file uploads
            foreach ($_FILES as $key => $file) {
                $fields[] = $key;
                $placeholders[] = '?'; // Prepare placeholders for prepared statement
                $types .= 's'; // Assuming all fields are strings

                // Handle file upload
                $targetDir = APP_PATH."/dist/uploads/";
                $fileExtension = pathinfo(basename($file["name"]), PATHINFO_EXTENSION);
                $fileName = rand(1000,9999)."-". time().".".$fileExtension;
                $targetFile = $targetDir . $fileName;
                // echo "<pre>";
                //  print_r($targetFile);exit;
                if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                    $values[] = $fileName; // Save the path to the file
                    $bindParams[] = &$values[count($values) - 1];
                } else {
                    echo "Error uploading file: " . $file["name"];
                    // die("Error uploading file: " . $file["name"]);
                }
            }

            // Convert arrays to comma-separated strings
            $fields_str = implode(', ', $fields);
            $placeholders_str = implode(', ', $placeholders);

            // Prepare the SQL query
            echo $sql = "INSERT INTO ".$tableName." ($fields_str) VALUES ($placeholders_str)";
            echo "<pre>";
            print_r($bindParams);
            $stmt = $conn->prepare($sql);

            // Bind parameters dynamically
            $stmt->bind_param($types, ...$bindParams);

            // Execute the statement
            if ($stmt->execute()) {
                // echo "inserted successfully!";
                header("Location: ".APP_URL."dist/pages/thank-you.php?message=Record Inserted Successfully");exit;
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "No Table Record Found: " . $stmt->error;

        }
        //code...
    } catch (\Throwable $th) {
        echo "error Occur: " . $th->getMessage();
        echo "<br><h1>Contact Developer</h1>";
        exit;
    }
}
// echo "ending";exit;
