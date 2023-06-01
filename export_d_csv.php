<?php
header('Content-Type: text/html; charset=utf-8');
header('Content-Encoding: UTF-8');
// refer to the database
require("connect.php");

// Select the table to export
$query = "SELECT * FROM dateinter ";
if (!$result = $conn->query($query)) {
    exit($conn->errorInfo());
}

$users = array();
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $users[] = $row;
    }
}

// Set file name
$filename = "Inter_Details_" . date("Y-m-d") . ".csv"; // Add timestamp to the filename
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=' . $filename);
$output = fopen('php://output', 'w');
// Desired column Sort by Table on Database
fputcsv($output, array('No', 'University/Institute', 'Country', 'MOU', 'Specialization', 'QS Ranking', 'QS Ranking by Subject', 'Activity details', 'Date'), ',', '"');

if (count($users) > 0) {
    foreach ($users as $row) {
        // Modify the row data if needed
        // For example, if you want to add a column with the current date and time
        $row[] = date("Y-m-d");

        // Convert the row data to UTF-8 to support Thai characters
        foreach ($row as &$value) {
            $value = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
        }

        fputcsv($output, $row, ',', '"');
    }
}

fclose($output);
