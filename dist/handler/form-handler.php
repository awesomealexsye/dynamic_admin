<?php
require_once('../../config.php');
require_once("database.php");
require_once(APP_PATH."/dist/handler/check-session.php");
function createTableQuery($data)
{
    // Extracting the data from the input array
    $tableName = $data['tableName'];
    $fieldTypes = $data['fieldType'];
    $fieldNames = $data['fieldNames'];
    $fieldLengths = $data['fieldLength'];

    // Start building the SQL query with the id field as the primary key
    $sql = "CREATE TABLE $tableName (\n";
    $sql .= "    id INT AUTO_INCREMENT PRIMARY KEY,\n";

    // Loop through the fields and add them to the query
    for ($i = 0; $i < count($fieldNames); $i++) {
        $name = $fieldNames[$i];
        $type = $fieldTypes[$i];
        $length = $fieldLengths[$i];

        // Add the field definition to the query
        $sql .= "    $name $type($length),\n";
    }

    // Add the status and created_at fields
    $sql .= "    status INT DEFAULT 1,\n";
    $sql .= "    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP\n";

    // Close the SQL query
    $sql .= ");";

    return $sql;
}

function insertIntoAllTableRecords($conn, $table_info)
{
    $tableName = $table_info['tableName'];
    $is_editable = $table_info['is_editable'];
    $is_deletable = $table_info['is_deletable'];

    // Prepare an SQL statement to insert into the all_table_records table
    $stmt = $conn->prepare("INSERT INTO all_table_records (table_name, is_editable, is_deletable, status, created_at) VALUES (?, ?, ?, 1, NOW())");
    $stmt->bind_param("sii", $tableName, $is_editable, $is_deletable);

    // Execute the statement and check if it was successful
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Populate the inputData array with POST data
    $inputData = array(
        "tableName" => $_POST['tableName'],
        "fieldType" => $_POST['fieldType'],
        "fieldNames" => $_POST['fieldNames'],
        "fieldLength" => $_POST['fieldLength']
    );
    $is_editable = $_POST['is_editable'] ?? 0;
    $is_deletable = $_POST['is_deletable'] ?? 0;
    $tableName = $_POST['tableName'] ?? 0;
    $table_info = array('is_editable'=>$is_editable,'is_deletable'=>$is_deletable,'tableName'=>$tableName);


    // Generate the SQL query
    $sqlQuery = createTableQuery($inputData);

    // Execute the SQL query
    if ($conn->query($sqlQuery) === TRUE) {
        // Insert into all_table_records
        if (insertIntoAllTableRecords($conn,$table_info)) {
            header("Location: ".APP_URL."dist/pages/thank-you.php?message=Created Successfully");
            exit();
        } else {
            echo "Error inserting into all_table_records: " . $conn->error;
        }
    } else {
        echo "Error creating table: " . $conn->error;
    }
}
