<?php
// session_start();
// if (!isset($_SESSION['login_info'])) {
//     header('Location: login.php');
//     exit;
// }
// if (isset($_SESSION['login_info'])) {
//     $json = $_SESSION['login_info'];
// } else {
//     echo "You are not logged in.";
// }
require_once 'head.php'; ?>

<body>
    <?php require_once 'aside.php'; ?>
    <div id="right-panel" class="right-panel">
        <?php require_once 'header.php'; ?>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {

            // ============================================================================
            // เริ่มต้นให้โหลดข้อมูลทั้งหมดออกมาแสดง โดยเรียกฟังก์ชัน all_users()
            all_users();

            // สร้างฟังก์ชันดึงข้อมูลจากตาราง user ทั้งหมด โดยอ่านจากไฟล์ all_users.php
            function all_users() {
                $.ajax({
                    url: 'all_users.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // กำหนดตัวแปรเก็บโครงสร้างแถวของตาราง
                        var trstring = "";
                        // ตัวแปรนับจำนวนแถว
                        var countrow = 1;

                        // วนลูปข้อมูล JSON ลงตาราง
                        $.each(data, function(key, value) {
                            // ทดสอบแสดงชื่อ
                            // console.log(value.fullname);
                            // แสดงค่าลงในตาราง
                            trstring += `
                                    <tr>
                                        <td class="text-center">${countrow}</td>
                                        <td class="text-center">${value.fullname}</td>
                                        <td class="text-center">${value.nickname}</td>
                                        <td class="text-center">${value.province}</td>
                                        <td class="text-center">${value.mpoint}</td>
                                        <th class="text-center">${value.status}</th>
                                    </tr>`;
                            $('table tbody').html(trstring);
                            countrow++;
                        });
                    }
                });
            }

            // ============================================================================
            // เมื่อมีการ submit form
            $('form#search_user').submit(function(event) {
                event.preventDefault();

                // รับค่าจากฟอร์ม
                var fullname = $('input#fullname').val();
                var nickname = $('input#nickname').val();
                var province = $('input#province').val();

                // ส่งค่าไป search_result.php ด้วย jQuery Ajax
                $.ajax({
                    url: 'search_result.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        fullname: fullname,
                        nickname: nickname,
                        province: province
                    },
                    success: function(data) {
                        if (data.length != 0) {
                            // กรณีมีข้อมูล
                            // กำหนดตัวแปรเก็บโครงสร้างแถวของตาราง
                            var trstring = "";

                            // ตัวแปรนับจำนวนแถว
                            var countrow = 1;

                            // วนลูปข้อมูล JSON ลงตาราง
                            $.each(data, function(key, value) {
                                // แสดงค่าลงในตาราง
                                trstring += `
                                    <tr>
                                        <td class="text-center">${countrow}</td>
                                        <td class="text-center">${value.fullname}</td>
                                        <td class="text-center">${value.nickname}</td>
                                        <td class="text-center">${value.province}</td>
                                        <td class="text-center">${value.mpoint}</td>
                                        <th class="text-center">${value.status}</th>
                                    </tr>`;
                                $('table tbody').html(trstring);
                                countrow++;
                            });


                        } else {
                            alert('ไม่พบข้อมูลที่ค้นหา');
                        }
                    }
                });
            });

            // ============================================================================
            // เมื่อกดปุ่มล้างข้อมูลการค้นหา
            $('input#resetform').click(function() {
                // ล้างค่าในฟอร์มทั้งหมด
                $("#search_user").trigger('reset');
                // โฟกัสช่องชื่อ
                $('input#fullname').focus();
                // เรียกแสดงผลข้อมูลทั้งหมด
                all_users();
            });

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>


</body>

</html>