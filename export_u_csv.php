<?php
// refer to the database
require("connect.php");

// Select the table to export
$query = "SELECT * FROM university";
if (!$result = $conn->query($query)) {
    exit($conn->errorInfo());
}

$users = array();
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $users[] = $row;
    }
}

// set file name
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Inter_University.csv');
$output = fopen('php://output', 'w');
// desired column Sort by Table on Database
fputcsv($output, array('No', 'University/Institute', 'Country', 'MOU', 'Specialization','QS Ranking', 'QS Ranking by Subject', 'Activity details','Date'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
