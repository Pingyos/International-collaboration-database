<?php
include 'connectdb.php';

// รับค่าจาก jQuery

$activity = $_POST['activity'];
$date_s = $_POST['date_s'];
$university = $_POST['university'];

// เช็คว่าทั้ง 3 ช่องต้องไม่เป็นค่าว่าง
if (!empty($activity) or !empty($date_s) or !empty($university)) {
    $sql = "SELECT * FROM dateinter WHERE activity LIKE '%$activity%' AND date_s LIKE '%$date_s%' AND university LIKE '%$university'";
    $qeury = mysqli_query($connect, $sql);

    // กำหนดตัวแปรไว้เก็บข้อมูลที่ค้นหาได้
    $search_data = array();
    // วนลูปค้นหาข้อมูล
    while ($result = mysqli_fetch_assoc($qeury)) {
        // เก็บข้อมูลที่ค้นหาได้ลงตัวแปร
        $search_data[] = $result;
    }

    // ทดสอบแสดงผลลัพธ์ที่ค้นเจอ

    // echo "<pre>";
    // print_r($search_data);
    // echo "</pre>";


    // แสดงข้อมูลออกเป็น JSON Data
    echo json_encode($search_data);
}
