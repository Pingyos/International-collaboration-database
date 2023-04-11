<?php
require_once 'head.php'; ?>

<body>
    <!-- Left Panel -->

    <?php require_once 'aside.php'; ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

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
                                <strong class="card-title">Add University</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">University</h3>
                                        </div>
                                        <hr>
                                        <form action="date_u_db.php" method="post" enctype="multipart/form-data">
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
                                                        <select name="mou" required class="form-control">
                                                            <option value="0">MOU/MOA</option>
                                                            <option value="YES">YES</option>
                                                            <option value="NO">NO</option>
                                                        </select>
                                                    </div>
                                                </div>
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
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="spec" class="control-label mb-1">Specialization</label>
                                                        <select data-placeholder="Choose a country..." name="spec[]" multiple class="standardSelect">
                                                            <option value="" label="default"></option>
                                                            <option value="United States">United States</option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="Afghanistan">Afghanistan</option>
                                                            <option value="Aland Islands">Aland Islands</option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Antarctica">Antarctica</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="comments_u" class="control-label mb-1">Comments</label>
                                                        <input type="text" name="comments_u" required class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success btn-block">
                                                    <span type="submit">Submit</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div><!--/.col-->
                </div>


            </div><!-- .animated -->
        </div>

        <div class="clearfix"></div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        var select_box_element = document.querySelector('#select_box');

        dselect(select_box_element, {
            search: true
        });
    </script>

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