<?php
// session_start();

// // Check if session login_info is set
// if (!isset($_SESSION['login_info'])) {
//     header('Location: login.php');
//     exit;
// } else {
//     $json = $_SESSION['login_info'];
// }

// // Check for inactivity
// if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 2000)) { //  2000seconds = 33 minutes
//     session_unset(); // Unset all session variables
//     session_destroy(); // Destroy the session
//     header('Location: login.php'); // Redirect to login.php
//     exit;
// }

// // Update last activity time
// $_SESSION['last_activity'] = time();
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

                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Add Tage</h3>
                                    </div>
                                    <hr>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="activity" class="control-label mb-1">Activity types</label>
                                                    <input type="text" name="activity" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-Submit btn-block">
                                            <span type="submit">Submit</span>
                                        </button>
                                    </form>
                                    <?php require_once 'addtage_db.php'; ?>
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