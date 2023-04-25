<?php require_once 'head.php'; ?>

<body>
    <!-- Left Panel -->

    <?php require_once 'aside.php'; ?>
 
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php require_once 'header.php'; ?>
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Edit Data University</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">University</h3>
                                        </div>
                                        <hr>
                                        <form  method="post" novalidate="novalidate">
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
                                                    <label for="ranking" class="control-label mb-1">Ranking</label>
                                                    <input type="text" name="ranking" required value="<?= $row['ranking']; ?>" class="form-control"> <br>
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
                                                <div class="col-6">
                                                    <label for="comments_u" class="control-label mb-1">Comments</label>
                                                    <input type="text" name="comments_u" required value="<?= $row['comments_u']; ?>" class="form-control"> <br>
                                                </div>
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-success btn-block">
                                                    <input type="hidden" name="university_id" value="<?= $row['university_id']; ?>">
                                                    <span type="submit">Submit</span>
                                                </button>
                                            </div>
                                        </form>
                                        <?php require_once 'edit_u_db.php'; ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div><!--/.col-->
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


</body>

</html>