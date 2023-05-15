<?php
if (
    isset($_POST['date_s'])
    && isset($_POST['date_e'])
    && isset($_POST['activity'])
    && isset($_POST['name'])
    && isset($_POST['details'])
) {
    require_once 'connect.php';
    $university = $_POST['university_name'];
    $date_s = $_POST['date_s'];
    $date_e = $_POST['date_e'];
    $activity = $_POST['activity'];
    $name = $_POST['name'];
    $details = $_POST['details'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO dateinter (university,date_s,date_e,activity,name,details)
    VALUES (:university,:date_s,:date_e,:activity,:name,:details)");
    $stmt->bindParam(':university', $university, PDO::PARAM_STR);
    $stmt->bindParam(':date_s', $date_s, PDO::PARAM_STR);
    $stmt->bindParam(':date_e', $date_e, PDO::PARAM_STR);
    $stmt->bindParam(':activity', $activity, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':details', $details, PDO::PARAM_STR);
    $result = $stmt->execute();
    if ($result) {
        // Fetch university_id
        $stmt = $conn->prepare("SELECT university_id FROM university WHERE university = :university");
        $stmt->bindParam(':university', $university, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $university_id = $result['university_id'];

        ๅ
} //isset
