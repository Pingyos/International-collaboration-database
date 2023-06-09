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
        <!-- Header-->
        <?php require_once 'header.php'; ?>
        <!-- Header-->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <?php
                            if (isset($_GET['id'])) {
                                require_once 'connect.php';
                                $stmt = $conn->prepare("SELECT* FROM dateinter WHERE id=?");
                                $stmt->execute([$_GET['id']]);
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
                                if ($stmt->rowCount() < 1) {
                                    header('Location: index.php');
                                    exit();
                                }
                            } //isset
                            ?>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Edit University Information</h3>
                                    </div>
                                    <hr>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <input type="text" name="id" value="<?= $row['id']; ?>" hidden>
                                            <input type="text" name="university_id" value="<?= $row['university_id']; ?>" hidden>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="university" class="control-label mb-1">University</label>
                                                    <input type="text" name="university" value="<?= $row['university']; ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="university" class="control-label mb-1">Date Start</label>
                                                    <input type="date" name="date_s" value="<?= $row['date_s']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="ranking" class="control-label mb-1">Date End</label>
                                                    <input type="date" name="date_e" value="<?= $row['date_e']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="activity" class="control-label mb-1">Activity types <span style="color:red;">*</span></label>
                                                    <select name="activity[]" multiple class="standardSelect" tabindex="5">
                                                        <option><?= $row['activity']; ?></option>
                                                        <?php
                                                        require_once 'connect.php';

                                                        // ดึงข้อมูลจากฐานข้อมูล
                                                        $sql = "SELECT activity FROM tage";
                                                        $result = $conn->query($sql);

                                                        // สร้างตัวเลือกในแบบฟอร์ม
                                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                            echo '<option>' . $row['activity'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            if (isset($_GET['id'])) {
                                                require_once 'connect.php';
                                                $stmt = $conn->prepare("SELECT* FROM dateinter WHERE id=?");
                                                $stmt->execute([$_GET['id']]);
                                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
                                                if ($stmt->rowCount() < 1) {
                                                    header('Location: index.php');
                                                    exit();
                                                }
                                            } //isset
                                            ?>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Name Surname</label>
                                                    <input type="text" name="name" value="<?= $row['name']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="details" class="control-label mb-1">Activity details </label>
                                                    <textarea class="form-control" name="details" style="height: 350px"><?= $row['details']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-Submit btn-block">
                                            <span type="submit">Submit</span>
                                        </button>
                                    </form>

                                    <?php require_once 'edit_db.php'; ?>
                                    <!-- <?php echo '<pre>';
                                            print_r($_POST);
                                            echo '</pre>';
                                            ?> -->
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

    <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>
</body>

</html>