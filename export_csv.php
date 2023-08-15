<?php
require_once 'connect.php';

if (isset($_GET['date_s']) && isset($_GET['date_e']) && isset($_GET['activity']) && isset($_GET['university'])) {
    $sql = "SELECT * FROM dateinter WHERE 1=1 ";

    $start_date = $_GET['date_s'];
    $end_date = $_GET['date_e'];
    $selected_activity = $_GET['activity'];
    $selected_university = $_GET['university'];

    $sql .= "AND date_s >= :start_date ";
    $sql .= "AND date_e <= :end_date ";
    $sql .= "AND activity = :activity ";
    $sql .= "AND university = :university ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':end_date', $end_date);
    $stmt->bindParam(':activity', $selected_activity);
    $stmt->bindParam(':university', $selected_university);

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Set the content type to CSV
    header('Content-Type: text/csv');
    // Define the output file name
    header('Content-Disposition: attachment; filename="exported_data.csv"');

    // Open output stream to php://output
    $output = fopen('php://output', 'w');

    // Write CSV header
    fputcsv($output, array_keys($results[0]));

    // Write each data row to CSV
    foreach ($results as $row) {
        fputcsv($output, $row);
    }

    // Close the output stream
    fclose($output);

    // End the script execution
    exit;
}
