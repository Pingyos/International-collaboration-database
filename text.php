<?php
require_once 'vendor/autoload.php'; // เรียกใช้ autoloader ของ mpdf

// สร้าง PDF
$mpdf = new \Mpdf\Mpdf();

// HTML ที่คุณต้องการสร้าง PDF จาก
$html = '
<!DOCTYPE html>
<html>
<head>
    <title>PDF Export</title>
</head>
<body>
    <table>
        <tbody>
            <!-- ใส่ HTML ที่คุณต้องการสร้าง PDF ได้ที่นี่ -->
            <!-- สามารถนำโค้ด HTML จากตารางของคุณมาวางที่นี่ -->
        </tbody>
    </table>
</body>
</html>
';

// เพิ่ม HTML ลงใน PDF
$mpdf->WriteHTML($html);

// สร้าง PDF และส่งออกไปยังเบราวเซอร์
$mpdf->Output('output.pdf', 'D');
