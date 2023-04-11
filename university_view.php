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
                                            <label for="title">Comments : <?= $row['comments_u']; ?></label>
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
                                        <a href="date_in_add.php?id=<?= $university; ?>" class="btn btn-success">Add Data</a>
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


</body>

</html>