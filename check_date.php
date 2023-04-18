<?php
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
                                            <label for="university">University/Institute : <?= $row['university']; ?></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="country">Country : <?= $row['country']; ?></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="ranking">QS Ranking by Suject : <?= $row['ranking']; ?></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title">MOU/MOA : <?= $row['mou']; ?></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="ranking">Specialization : <?= $row['spec']; ?></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="title">MOU/MOA : <?= $row['comments_u']; ?></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <a href="edit_u.php?university_id=<?= $row['university_id']; ?>" class="btn btn-warning">Edit Data</a>
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
                                                    <?php require_once 'date_in_db.php'; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo '<pre>';
                                print_r($_POST);
                                echo '</pre>';
                                ?>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <th>#</th>
                                        <th>Date Start</th>
                                        <th>Date End</th>
                                        <th>Activity types</th>
                                        <th>Name-Surname</th>
                                        <th>Activity details</th>
                                    </thead>

                                    <tdoby>
                                        <?php
                                        $stmt2 = $conn->prepare("SELECT * FROM dateinter WHERE university='" . $row['university'] . "'");
                                        $stmt2->execute();
                                        $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                                        $countrow = 1;
                                        foreach ($result as $row => $data) {
                                            echo "<tr>
                                                    <td>{$countrow}</td>
                                                    <td>{$data['date_s']}</td>
                                                    <td>{$data['date_e']}</td>
                                                    <td>{$data['activity']}</td>
                                                    <td>{$data['name']}</td>
                                                    <td>{$data['details']}</td>
                                                </tr>";
                                            $countrow++;
                                        }
                                        ?>
                                    </tdoby>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
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

</body>

</html>