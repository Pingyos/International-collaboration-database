<?php session_start();
if (!isset($_SESSION['login_info'])) {
    header('Location: login.php');
    exit;
}
if (isset($_SESSION['login_info'])) {
    $json = $_SESSION['login_info'];
} else {
    echo "You are not logged in.";
}
require_once 'head.php'; ?>

<body>
    <!-- Left Panel -->
    <?php require_once 'aside.php'; ?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php require_once 'header.php'; ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">

                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Dashboard</a></li>
                                    <li class="active">University Table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="date_u_add.php" class="btn btn-success">Add Data</a>
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
                                            <th>Total</th>
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
                                                <td><?= $t1['university_id']; ?></td>
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


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>


</body>

</html>