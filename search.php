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
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-6">
                                                    <label for="date_s"><B>Start Date</B></label>
                                                    <input class="form-control" type="date" id="date_s" name="date_s" value="<?php echo isset($_POST['date_s']) ? $_POST['date_s'] : ''; ?>">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="date_e"><B>End Date</B></label>
                                                    <input class="form-control" type="date" id="date_e" name="date_e" value="<?php echo isset($_POST['date_e']) ? $_POST['date_e'] : ''; ?>">
                                                </div>


                                                <div class="form-group col-6">
                                                    <label for="activity"><b>Activity Types</b></label>
                                                    <select class="form-control" name="activity" id="activity">
                                                        <option value="" disabled selected>Activity Types</option>
                                                        <?php
                                                        require_once 'connect.php';

                                                        $sql = "SELECT DISTINCT activity FROM dateinter";
                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->execute();
                                                        $checkings = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        // วนลูปแสดงตัวเลือกใน dropdown
                                                        foreach ($checkings as $checking) {
                                                            $activity = $checking['activity'];
                                                            // ไม่ต้องมีเงื่อนไขการเปรียบเทียบ $_POST['activity'] ในการเลือก
                                                            echo "<option value='$activity'>$activity</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-6">
                                                    <label for="university"><B>University</B></label>
                                                    <select class="form-control" name="university" id="university">
                                                        <option value="">University</option>
                                                        <?php
                                                        if (isset($_POST['activity'])) {
                                                            $selected_activity = $_POST['activity'];
                                                            $sql = "SELECT DISTINCT university FROM dateinter WHERE activity = :activity";
                                                            $stmt = $conn->prepare($sql);
                                                            $stmt->bindParam(':activity', $selected_activity);
                                                            $stmt->execute();
                                                            $universities = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                            // วนลูปแสดงตัวเลือกใน dropdown ของ University
                                                            foreach ($universities as $university) {
                                                                $uni_name = $university['university'];
                                                                // Check if the option's value matches the selected university in $_POST
                                                                $selected = (isset($_POST['university']) && $_POST['university'] === $uni_name) ? 'selected' : '';
                                                                echo "<option value='$uni_name' $selected>$uni_name</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" name="display_data" class="btn btn-Submit btn-block">
                                                <span>Display Data</span>
                                            </button>
                                            <hr>
                                            <?php
                                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                if (isset($_POST['display_data'])) {
                                                    require_once 'connect.php';

                                                    $sql = "SELECT * FROM dateinter WHERE 1=1 ";

                                                    if (isset($_POST['date_s']) && !empty($_POST['date_s'])) {
                                                        $start_date = $_POST['date_s'];
                                                        $sql .= "AND date_s >= :start_date ";
                                                    }

                                                    if (isset($_POST['date_e']) && !empty($_POST['date_e'])) {
                                                        $end_date = $_POST['date_e'];
                                                        $sql .= "AND date_e <= :end_date ";
                                                    }

                                                    if (isset($_POST['activity']) && !empty($_POST['activity'])) {
                                                        $selected_activity = $_POST['activity'];
                                                        $sql .= "AND activity = :activity ";
                                                    }

                                                    if (isset($_POST['university']) && !empty($_POST['university'])) {
                                                        $selected_university = $_POST['university'];
                                                        $sql .= "AND university = :university ";
                                                    }

                                                    $stmt = $conn->prepare($sql);

                                                    if (isset($start_date)) {
                                                        $stmt->bindParam(':start_date', $start_date);
                                                    }

                                                    if (isset($end_date)) {
                                                        $stmt->bindParam(':end_date', $end_date);
                                                    }

                                                    if (isset($selected_activity)) {
                                                        $stmt->bindParam(':activity', $selected_activity);
                                                    }

                                                    if (isset($selected_university)) {
                                                        $stmt->bindParam(':university', $selected_university);
                                                    }

                                                    $stmt->execute();
                                                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    if (count($results) > 0) {
                                                        echo '<a href="export_csv.php?date_s=' . $start_date . '&date_e=' . $end_date . '&activity=' . $selected_activity . '&university=' . $selected_university . '" class="btn btn-primary">Export CSV</a>';
                                                    }
                                            ?>

                                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Start Date</th>
                                                                <th>End Date</th>
                                                                <th>University</th>
                                                                <th>Activity</th>
                                                                <th>Agreement Details</th>
                                                                <!-- Add other columns you want to display -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($results as $row) : ?>
                                                                <tr>
                                                                    <td><?php echo $row['date_s']; ?></td>
                                                                    <td><?php echo $row['date_e']; ?></td>
                                                                    <td><?php echo $row['university']; ?></td>
                                                                    <td><?php echo $row['activity']; ?></td>
                                                                    <td><?php echo $row['details']; ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>

                                            <?php
                                                } else {
                                                    echo "No data found.";
                                                }
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</body>

</html>