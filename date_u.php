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
                        <div class="form-group">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                Add Data
                            </button>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="university" class="control-label mb-1">University</label>
                                                            <input type="text" name="university" required class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="ranking" class="control-label mb-1">QS Ranking</label>
                                                            <input type="text" name="ranking" required class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="MOU" class="control-label mb-1">MOU/MOA</label>
                                                            <select name="mou" class="form-control" required>
                                                                <option value="">Select MOU/MOA</option>
                                                                <option value="YES">YES</option>
                                                                <option value="NO">NO</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="ranking_suject" class="control-label mb-1">QS Ranking by Suject</label>
                                                            <input type="text" name="ranking_suject" required class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="country" class="control-label mb-1">Country</label>
                                                            <?php
                                                            require_once 'connect.php';
                                                            $query = "
                                                            SELECT country_name FROM apps_countries 
                                                            ORDER BY country_name ASC
                                                        ";
                                                            $result = $conn->query($query);
                                                            ?>
                                                            <select name="country" required class="form-control">
                                                                <option value="">Select Country</option>
                                                                <?php
                                                                foreach ($result as $row) {
                                                                    echo '<option value="' . $row["country_name"] . '">' . $row["country_name"] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="spec" class="control-label mb-1">Specialization</label>
                                                            <input type="text" name="spec" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="comments_u" class=" form-control-label">Comments</label>
                                                            <textarea name="comments_u" id="comments_u" rows="5" placeholder="Content..." class="form-control"></textarea>
                                                        </div>
                                                    </div>
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
                                            <?php require_once 'date_u_db.php';
                                            error_reporting(0);
                                            ini_set('display_errors', 0); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>University/Institute</th>
                                            <th>Country</th>
                                            <th>QSranking</th>
                                            <th>Detial</th>
                                            <th>Del</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once 'connect.php';
                                        $stmt = $conn->prepare("SELECT* FROM university");
                                        $stmt->execute();
                                        $result = $stmt->fetchAll();
                                        $countrow = 1;
                                        foreach ($result as $t1) {
                                        ?>
                                            <tr>
                                                <td><?= $countrow ?></td>
                                                <td><?= $t1['university']; ?></td>
                                                <td><?= $t1['country']; ?></td>
                                                <td><?= $t1['ranking']; ?></td>
                                                <td><a href="check_date.php?university_id=<?= $t1['university_id']; ?>" class="btn btn-success btn-sm">View</a></td>
                                                <td><a href="del_u.php?university_id=<?= $t1['university_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Confirm Data Deletion !!');">Del</a></td>
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


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>

    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#exampleModal').trigger('focus')
        })
    </script>

</body>

</html>