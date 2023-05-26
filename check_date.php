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
                            <div class="card-header">
                                <strong class="card-title">University Form</strong>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_GET['university_id'])) {
                                    require_once 'connect.php';
                                    $stmt = $conn->prepare("SELECT * FROM university WHERE university_id=?");
                                    $stmt->execute([$_GET['university_id']]);
                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $university = $row['university'];
                                }
                                ?>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="university">University/Institute : <B><?= $row['university']; ?></B></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="country">Country : <B><?= $row['country']; ?></B></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="ranking">QS Ranking : <B><?= $row['ranking']; ?></B></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="ranking">QS Ranking by Suject : <B><?= $row['qs_suject']; ?></B></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title">MOU/MOA : <B><?= $row['mou']; ?></B></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="ranking">Specialization : <B><?= $row['spec']; ?></B></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title">Comments : <B><?= $row['comments_u']; ?></B></label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <a class="btn btn-warning" data-toggle="modal" data-target="#exampleModaledit<?= $row['university']; ?>">Edit Data</a>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModaledit<?= $row['university']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document"> <!-- Add 'modal-lg' class for larger modal -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <h3 class="text-center">University</h3>
                                                        </div>
                                                        <hr>
                                                        <form method="post" novalidate="novalidate">
                                                            <?php
                                                            if (isset($_GET['university_id'])) {
                                                                require_once 'connect.php';
                                                                $stmt = $conn->prepare("SELECT* FROM university WHERE university_id=?");
                                                                $stmt->execute([$_GET['university_id']]);
                                                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                if ($stmt->rowCount() < 1) {
                                                                    header('Location: index.php');
                                                                    exit();
                                                                }
                                                            } //isset
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label for="university" class="control-label mb-1">University</label>
                                                                    <input type="text" name="university" required value="<?= $row['university']; ?>" class="form-control"> <br>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="ranking" class="control-label mb-1">QS Ranking</label>
                                                                    <input type="text" name="ranking" required value="<?= $row['ranking']; ?>" class="form-control"> <br>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="qs_suject" class="control-label mb-1">QS Ranking by Suject</label>
                                                                    <input type="text" name="qs_suject" required value="<?= $row['qs_suject']; ?>" class="form-control"> <br>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="mou" class="control-label mb-1">MOU/MOA</label>
                                                                    <input type="text" name="mou" required value="<?= $row['mou']; ?>" class="form-control"> <br>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="country" class="control-label mb-1">Country</label>
                                                                    <input type="text" name="country" required value="<?= $row['country']; ?>" class="form-control"> <br>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="spec" class="control-label mb-1">Specialization</label>
                                                                    <input type="text" name="spec" required value="<?= $row['spec']; ?>" class="form-control"> <br>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label for="comments_u" class="control-label mb-1">Comments</label>
                                                                    <input type="text" name="comments_u" required value="<?= $row['comments_u']; ?>" class="form-control"> <br>
                                                                </div>
                                                                <input type="hidden" name="university_id" value="<?= $row['university_id']; ?>">
                                                            </div>
                                                            <div>
                                                                <button type="submit" class="btn btn-success btn-block">
                                                                    <span type="submit">Submit</span>
                                                                </button>
                                                                <!-- <?php echo '<pre>';
                                                                        print_r($_POST);
                                                                        echo '</pre>';
                                                                        ?> -->
                                                            </div>
                                                        </form>
                                                        <?php require_once 'edit_u_db.php';
                                                        error_reporting(0);
                                                        ini_set('display_errors', 0); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .animated -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Form</strong>
                            </div>
                            <div class="card-body">
                                <div class="col-6">
                                    <div class="form-group">
                                        <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                            Add Data
                                        </a>
                                        <!-- <a href="?act=excel" class="btn btn-secondary">
                                            Export
                                        </a> -->
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h3 class="text-center">University</h3>
                                                    </div>
                                                    <hr>
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <input type="text" name="university_id" value="<?= $row['university_id']; ?>" hidden>
                                                            <input type="text" name="university_name" value="<?= $row['university']; ?>" hidden>
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
                                                    <?php require_once 'date_in_db.php';
                                                    error_reporting(0);
                                                    ini_set('display_errors', 0); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <th>#</th>
                                        <th>Date Start</th>
                                        <th>Date End</th>
                                        <th>Activity types</th>
                                        <th>Name-Surname</th>
                                        <th>Activity details</th>
                                        <th>Del</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once 'connect.php';
                                        $stmt = $conn->prepare("SELECT * FROM dateinter WHERE university=:university");
                                        $stmt->bindParam(':university', $row['university'], PDO::PARAM_STR);
                                        $stmt->execute();
                                        $result = $stmt->fetchAll();
                                        $countrow = 1;
                                        foreach ($result as $t1) {
                                        ?>
                                            <tr>
                                                <td><?= $countrow ?></td>
                                                <td><?= $t1['date_s']; ?></td>
                                                <td><?= $t1['date_e']; ?></td>
                                                <td><?= $t1['activity']; ?></td>
                                                <td><?= $t1['name']; ?></td>
                                                <td><?= $t1['details']; ?></td>
                                                <td><a href="del.php?id=<?= $t1['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Confirm Data Deletion !!');">Del</a></td>
                                            </tr>
                                        <?php $countrow++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
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

    <script>
        $('#exampleModal').on('shown.bs.modal', function() {
            $('#exampleModal').trigger('focus');
        });
    </script>
    <script>
        $('#exampleModaledit').on('shown.bs.modal', function() {
            $('#exampleModaledit').trigger('focus');
        });
    </script>

    <script>

    </script>
</body>

</html>