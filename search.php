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
                                    <div class="col-md-12 text-center">
                                        <form name="search_user" id="search_user" method="POST" action="search.php">
                                            <div class="form-row">
                                                <div class="form-group col-4">
                                                    <label for="activity"><B>Activity Types</B></label>
                                                    <input type="text" class="form-control" id="activity" name="activity">
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="date_s"><B>Year</B></label>
                                                    <input type="text" class="form-control" id="date_s" name="date_s">
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="university"><B>University</B></label>
                                                    <input type="text" class="form-control" id="university" name="university">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button id="submit" name="submit" type="submit" class="btn btn-View col-sm-2 mt-2"><i class="fa fa-search"></i>
                                                    Search
                                                </button>
                                                <input type="button" class="btn btn-Del col-sm-2 mt-2" id="resetform" name="resetform" value="Clearance">
                                            </div>
                                        </form>
                                    </div>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <th style="width: 2%;">#</th>
                                            <th style="width: 8%;">Start</th>
                                            <th style="width: 8%;">End</th>
                                            <th style="width: 15%;">University</th>
                                            <th style="width: 8%;">Activity types</th>
                                            <th style="width: 50%;">Agreement Details</th>
                                            <th style="width: 5%;">Detail</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        function formatDate_S(dateString) {
            const date = new Date(dateString);
            const options = {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            };
            return date.toLocaleDateString('en-US', options).replace(/\//g, '/');
        }
    </script>
        <script>
        function formatDate_E(dateString) {
            const date = new Date(dateString);
            const options = {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            };
            return date.toLocaleDateString('en-US', options).replace(/\//g, '/');
        }
    </script>

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
                            console.log(value.activity);
                            // แสดงค่าลงในตาราง
                            trstring += `
                                    <tr>
                                    <td>${countrow}</td>
                                    <td>${formatDate_S(value.date_s)}</td>
                                    <td>${formatDate_E(value.date_e)}</td>
                                    <td>${value.university}</td>
                                    <td>${value.activity}</td>
                                    <td>${value.details}</td>

                                        <td><a href="check_date.php?university_id=${value.university_id}" class="btn btn-go btn-sm"><i class="fa fa-location-arrow"></i> Go </a></td>
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
                var activity = $('input#activity').val();
                var date_s = $('input#date_s').val();
                var university = $('input#university').val();

                // ส่งค่าไป search_result.php ด้วย jQuery Ajax
                $.ajax({
                    url: 'search_result.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        activity: activity,
                        date_s: date_s,
                        university: university
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
                                    <td>${countrow}</td>
                                        <td>${formatDate_S(value.date_s)}</td>
                                        <td>${formatDate_E(value.date_e)}</td>
                                        <td>${value.university}</td>
                                        <td>${value.activity}</td>
                                        <td>${value.details}</td>
                                        <td><a href="check_date.php?university_id=${value.university_id}" class="btn btn-go btn-sm"><i class="fa fa-location-arrow"></i> Go </a></td>
                                    </tr>`;
                                $('table tbody').html(trstring);
                                countrow++;
                            });


                        } else {
                            alert('no information found');
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
                $('input#activity').focus();
                // เรียกแสดงผลข้อมูลทั้งหมด
                all_users();
            });

        });
    </script>

</body>

</html>