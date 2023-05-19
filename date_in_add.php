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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add Data</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Add Data</h3>
                                        </div>
                                        <hr>
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <input type="text" name="university_name" value="<?= $_GET['id']; ?>" hidden>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="university" class="control-label mb-1">Date Start</label>
                                                        <input type="date" name="date_s" required class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="ranking" class="control-label mb-1">Date End</label>
                                                        <input type="date" name="date_e" required class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="activity" class="control-label mb-1">Activity types</label>
                                                        <select name="activity" required class="form-control">
                                                            <option value="0">Activity types</option>
                                                            <option value="C">C</option>
                                                            <option value="A">A</option>
                                                            <option value="R">R</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name" class="control-label mb-1">Name Surname</label>
                                                        <input type="text" name="name" required class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="details" class="control-label mb-1">Activity details </label>
                                                        <textarea class="form-control" required name="details" style="height: 100px"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success btn-block">Add Data</button>
                                            </div>
                                        </form>
                                    </div>
                                    <?php require_once 'date_in_db.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>