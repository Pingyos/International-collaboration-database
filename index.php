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
// if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) { // 300 seconds = 5 minutes
//     session_unset(); // Unset all session variables
//     session_destroy(); // Destroy the session
//     header('Location: login.php'); // Redirect to login.php
//     exit;
// }

// // Update last activity time
// $_SESSION['last_activity'] = time();
?>

<!-- Your HTML code goes here -->
<?php require_once 'head.php'; ?>
<!-- Rest of your HTML code goes here -->


<body>
    <?php require_once 'aside.php'; ?>

    <div id="right-panel" class="right-panel">
        <?php require_once 'header.php'; ?>

        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <!-- totaU -->
                    <?php
                    require_once 'connect.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS totaU FROM university");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="ti-server"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">Total Agreements</div><span class="count"><?php echo $result['totaU']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stat-content">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal_totaU" class="small-box-footer">
                                            More <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- totaU -->

                    <!-- totaC -->
                    <?php
                    require_once 'connect.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS totaC FROM dateinter WHERE ( activity = 'C')");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i>C</i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">Activity C</div><span class="count"><?php echo $result['totaC']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stat-content">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal_totaC" class="small-box-footer">
                                            More <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- totaC -->

                    <!-- totaA -->
                    <?php
                    require_once 'connect.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS totaA FROM dateinter WHERE ( activity = 'A')");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i>A</i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">Activity A</div><span class="count"><?php echo $result['totaA']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stat-content">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal_totaA" class="small-box-footer">
                                            More <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- totaA -->

                    <!-- totaR -->
                    <?php
                    require_once 'connect.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS totaR FROM dateinter WHERE ( activity = 'R')");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i>R</i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">Activity R</div><span class="count"><?php echo $result['totaR']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stat-content">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal_totaR" class="small-box-footer">
                                            More <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- totaR -->

                    <!-- totaAll -->
                    <?php
                    require_once 'connect.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS totaAll FROM dateinter");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-10">
                                        <i class="ti-layout-grid2 text-warning border-warning"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">Activity C,A,R</div><span class="count"><?php echo $result['totaAll']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stat-content">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal_totaAll" class="small-box-footer">
                                            More <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- totaAll -->
                </div>

                <!-- /Widgets -->
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Activity</strong>
                            </div>
                            <div id="donutchart" style="width: 100%; height: 450px;"></div>
                        </div> <!-- .card -->

                    </div><!--/.col-->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Country</strong></div>
                            <div id="columnchart" style="width: 100%; height: 450px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Collaboration</strong>
                            </div>
                            <div id="university" style="width: 100%; height: 450px;"></div>
                        </div> <!-- .card -->
                    </div><!--/.col-->
                    <div class="col-lg-6">
                        <div class="card">

                        </div> <!-- .card -->
                    </div>
                </div>
            </div>
        </div>

        <!-- .exampleModal_totaU -->
        <div class="modal fade" id="exampleModal_totaU" tabindex="-1" role="dialog" aria-labelledby="exampleModal_totaULabel" aria-hidden="true">
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
                                <h3 class="text-center">International Collaboration</h3>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>University</th>
                                            <th>Country</th>
                                            <th>QS ranking</th>
                                            <th>MOU/MOA</th>
                                            <th>Specialization</th>
                                            <th>Status</th>
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
                                                <td><?= $t1['mou']; ?></td>
                                                <td><?= $t1['spec']; ?></td>
                                                <td><a href="check_date.php?university_id=<?= $t1['university_id']; ?>" class="btn btn-View btn-sm">View</a></td>
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
        <script>
            $('#myModal').on('shown.bs.modal', function() {
                $('#exampleModal_totaU').trigger('focus')
            })
        </script>
        <!-- .exampleModal_totaU -->

        <!-- .exampleModal_totaC -->
        <div class="modal fade" id="exampleModal_totaC" tabindex="-1" role="dialog" aria-labelledby="exampleModal_totaCLabel" aria-hidden="true">
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
                                <h3 class="text-center">Activity C</h3>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>University</th>
                                            <th>Date_s</th>
                                            <th>Date_e</th>
                                            <th>Activity types</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once 'connect.php';
                                        $stmt = $conn->prepare("SELECT * FROM dateinter WHERE activity = 'C'");
                                        $stmt->execute();
                                        $result = $stmt->fetchAll();
                                        $countrow = 1;
                                        foreach ($result as $t1) {
                                        ?>
                                            <tr>
                                                <td><?= $countrow ?></td>
                                                <td><?= $t1['university']; ?></td>
                                                <?php
                                                setlocale(LC_TIME, 'en_US'); // Set the locale to English (United States)
                                                $date_s_formatted = strftime('%d %b %Y', strtotime($t1['date_s']));
                                                ?>
                                                <td><?php echo $date_s_formatted; ?></td>
                                                <?php
                                                setlocale(LC_TIME, 'en_US'); // Set the locale to English (United States)
                                                $date_e_formatted = strftime('%d %b %Y', strtotime($t1['date_e']));
                                                ?>
                                                <td><?php echo $date_e_formatted; ?></td>
                                                <td><?= $t1['activity']; ?></td>
                                                <td><?= $t1['name']; ?></td>
                                            </tr>
                                        <?php
                                            $countrow++;
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
        <script>
            $('#myModal').on('shown.bs.modal', function() {
                $('#exampleModal_totaC').trigger('focus')
            })
        </script>
        <!-- .exampleModal_totaC -->

        <!-- .exampleModal_totaA -->
        <div class="modal fade" id="exampleModal_totaA" tabindex="-1" role="dialog" aria-labelledby="exampleModal_totaCLabel" aria-hidden="true">
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
                                <h3 class="text-center">Activity C</h3>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>University</th>
                                            <th>Date_s</th>
                                            <th>Date_e</th>
                                            <th>Activity types</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once 'connect.php';
                                        $stmt = $conn->prepare("SELECT * FROM dateinter WHERE activity = 'A'");
                                        $stmt->execute();
                                        $result = $stmt->fetchAll();
                                        $countrow = 1;
                                        foreach ($result as $t1) {
                                        ?>
                                            <tr>
                                                <td><?= $countrow ?></td>
                                                <td><?= $t1['university']; ?></td>
                                                <?php
                                                setlocale(LC_TIME, 'en_US'); // Set the locale to English (United States)
                                                $date_s_formatted = strftime('%d %b %Y', strtotime($t1['date_s']));
                                                ?>
                                                <td><?php echo $date_s_formatted; ?></td>
                                                <?php
                                                setlocale(LC_TIME, 'en_US'); // Set the locale to English (United States)
                                                $date_e_formatted = strftime('%d %b %Y', strtotime($t1['date_e']));
                                                ?>
                                                <td><?php echo $date_e_formatted; ?></td>
                                                <td><?= $t1['activity']; ?></td>
                                                <td><?= $t1['name']; ?></td>
                                            </tr>
                                        <?php
                                            $countrow++;
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
        <script>
            $('#myModal').on('shown.bs.modal', function() {
                $('#exampleModal_totaC').trigger('focus')
            })
        </script>
        <!-- .exampleModal_totaA -->

        <!-- .exampleModal_totaR -->
        <div class="modal fade" id="exampleModal_totaR" tabindex="-1" role="dialog" aria-labelledby="exampleModal_totaCLabel" aria-hidden="true">
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
                                <h3 class="text-center">Activity C</h3>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>University</th>
                                            <th>Date_s</th>
                                            <th>Date_e</th>
                                            <th>Activity types</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once 'connect.php';
                                        $stmt = $conn->prepare("SELECT * FROM dateinter WHERE activity = 'R'");
                                        $stmt->execute();
                                        $result = $stmt->fetchAll();
                                        $countrow = 1;
                                        foreach ($result as $t1) {
                                        ?>
                                            <tr>
                                                <td><?= $countrow ?></td>
                                                <td><?= $t1['university']; ?></td>
                                                <?php
                                                setlocale(LC_TIME, 'en_US'); // Set the locale to English (United States)
                                                $date_s_formatted = strftime('%d %b %Y', strtotime($t1['date_s']));
                                                ?>
                                                <td><?php echo $date_s_formatted; ?></td>
                                                <?php
                                                setlocale(LC_TIME, 'en_US'); // Set the locale to English (United States)
                                                $date_e_formatted = strftime('%d %b %Y', strtotime($t1['date_e']));
                                                ?>
                                                <td><?php echo $date_e_formatted; ?></td>
                                                <td><?= $t1['activity']; ?></td>
                                                <td><?= $t1['name']; ?></td>
                                            </tr>
                                        <?php
                                            $countrow++;
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
        <script>
            $('#myModal').on('shown.bs.modal', function() {
                $('#exampleModal_totaC').trigger('focus')
            })
        </script>
        <!-- .exampleModal_totaR -->

        <!-- .exampleModal_totaAll -->
        <div class="modal fade" id="exampleModal_totaAll" tabindex="-1" role="dialog" aria-labelledby="exampleModal_totaCLabel" aria-hidden="true">
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
                                <h3 class="text-center">Activity C</h3>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>University</th>
                                            <th>Date_s</th>
                                            <th>Date_e</th>
                                            <th>Activity types</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once 'connect.php';
                                        $stmt = $conn->prepare("SELECT * FROM dateinter");
                                        $stmt->execute();
                                        $result = $stmt->fetchAll();
                                        $countrow = 1;
                                        foreach ($result as $t1) {
                                        ?>
                                            <tr>
                                                <td><?= $countrow ?></td>
                                                <td><?= $t1['university']; ?></td>
                                                <?php
                                                setlocale(LC_TIME, 'en_US'); // Set the locale to English (United States)
                                                $date_s_formatted = strftime('%d %b %Y', strtotime($t1['date_s']));
                                                ?>
                                                <td><?php echo $date_s_formatted; ?></td>
                                                <?php
                                                setlocale(LC_TIME, 'en_US'); // Set the locale to English (United States)
                                                $date_e_formatted = strftime('%d %b %Y', strtotime($t1['date_e']));
                                                ?>
                                                <td><?php echo $date_e_formatted; ?></td>
                                                <td><?= $t1['activity']; ?></td>
                                                <td><?= $t1['name']; ?></td>
                                            </tr>
                                        <?php
                                            $countrow++;
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
        <script>
            $('#myModal').on('shown.bs.modal', function() {
                $('#exampleModal_totaC').trigger('focus')
            })
        </script>
        <!-- .exampleModal_totaAll -->

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="assets/js/main.js"></script>

        <!--  Chart js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

        <!--Chartist Chart-->
        <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
        <script src="assets/js/init/weather-init.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
        <script src="assets/js/init/fullcalendar-init.js"></script>

        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="bower_components/fastclick/lib/fastclick.js"></script>
        <script src="dist/js/adminlte.min.js"></script>
        <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="bower_components/chart.js/Chart.js"></script>
        <script src="dist/js/pages/dashboard2.js"></script>
        <script src="dist/js/demo.js"></script>
        <script>
            function returnCommentSymbol(language = "javascript") {
                const languageObject = {
                    bat: "@REM",
                    c: "//",
                    csharp: "//",
                    cpp: "//",
                    closure: ";;",
                    coffeescript: "#",
                    dockercompose: "#",
                    css: "/*DELIMITER*/",
                    "cuda-cpp": "//",
                    dart: "//",
                    diff: "#",
                    dockerfile: "#",
                    fsharp: "//",
                    "git-commit": "//",
                    "git-rebase": "#",
                    go: "//",
                    groovy: "//",
                    handlebars: "{{!--DELIMITER--}}",
                    hlsl: "//",
                    html: "<!--DELIMITER-->",
                    ignore: "#",
                    ini: ";",
                    java: "//",
                    javascript: "//",
                    javascriptreact: "//",
                    json: "//",
                    jsonc: "//",
                    julia: "#",
                    latex: "%",
                    less: "//",
                    lua: "--",
                    makefile: "#",
                    markdown: "<!--DELIMITER-->",
                    "objective-c": "//",
                    "objective-cpp": "//",
                    perl: "#",
                    perl6: "#",
                    php: "<!--DELIMITER-->",
                    powershell: "#",
                    properties: ";",
                    jade: "//-",
                    python: "#",
                    r: "#",
                    razor: "<!--DELIMITER-->",
                    restructuredtext: "..",
                    ruby: "#",
                    rust: "//",
                    scss: "//",
                    shaderlab: "//",
                    shellscript: "#",
                    sql: "--",
                    svg: "<!--DELIMITER-->",
                    swift: "//",
                    tex: "%",
                    typescript: "//",
                    typescriptreact: "//",
                    vb: "'",
                    xml: "<!--DELIMITER-->",
                    xsl: "<!--DELIMITER-->",
                    yaml: "#"
                }
                return languageObject[language].split("DELIMITER")
            }
            var savedChPos = 0
            var returnedSuggestion = ''
            let editor, doc, cursor, line, pos
            pos = {
                line: 0,
                ch: 0
            }
            var suggestionsStatus = false
            var docLang = "python"
            var suggestionDisplayed = false
            var isReturningSuggestion = false
            document.addEventListener("keydown", (event) => {
                setTimeout(() => {
                    editor = event.target.closest('.CodeMirror');
                    if (editor) {
                        const codeEditor = editor.CodeMirror
                        if (!editor.classList.contains("added-tab-function")) {
                            editor.classList.add("added-tab-function")
                            codeEditor.removeKeyMap("Tab")
                            codeEditor.setOption("extraKeys", {
                                Tab: (cm) => {

                                    if (returnedSuggestion) {
                                        acceptTab(returnedSuggestion)
                                    } else {
                                        cm.execCommand("defaultTab")
                                    }
                                }
                            })
                        }
                        doc = editor.CodeMirror.getDoc()
                        cursor = doc.getCursor()
                        line = doc.getLine(cursor.line)
                        pos = {
                            line: cursor.line,
                            ch: line.length
                        }

                        if (cursor.ch > 0) {
                            savedChPos = cursor.ch
                        }

                        const fileLang = doc.getMode().name
                        docLang = fileLang
                        const commentSymbol = returnCommentSymbol(fileLang)
                        if (event.key == "?") {
                            var lastLine = line
                            lastLine = lastLine.slice(0, savedChPos - 1)

                            if (lastLine.trim().startsWith(commentSymbol[0])) {
                                lastLine += " " + fileLang
                                lastLine = lastLine.split(commentSymbol[0])[1]
                                window.postMessage({
                                    source: 'getQuery',
                                    payload: {
                                        data: lastLine
                                    }
                                })
                                isReturningSuggestion = true
                                displayGrey("\nBlackbox loading...")
                            }
                        } else if (event.key === "Enter" && suggestionsStatus && !isReturningSuggestion) {
                            var query = doc.getRange({
                                line: Math.max(0, cursor.line - 10),
                                ch: 0
                            }, {
                                line: cursor.line,
                                ch: line.length
                            })
                            window.postMessage({
                                source: 'getSuggestion',
                                payload: {
                                    data: query,
                                    language: docLang
                                }
                            })
                            displayGrey("Blackbox loading...")
                        } else if (event.key === "ArrowRight" && returnedSuggestion) {
                            acceptTab(returnedSuggestion)
                        } else if (event.key === "Enter" && isReturningSuggestion) {
                            displayGrey("\nBlackbox loading...")
                        } else if (event.key === "Escape") {
                            displayGrey("")
                        }
                    }
                }, 0)
            })

            function acceptTab(text) {
                if (suggestionDisplayed) {
                    displayGrey("")
                    doc.replaceRange(text, pos)
                    returnedSuggestion = ""
                    updateSuggestionStatus(false)
                }
            }

            function acceptSuggestion(text) {
                displayGrey("")
                doc.replaceRange(text, pos)
                returnedSuggestion = ""
                updateSuggestionStatus(false)
            }

            function displayGrey(text) {
                if (!text) {
                    document.querySelector(".blackbox-suggestion").remove()
                    return
                }
                var el = document.querySelector(".blackbox-suggestion")
                if (!el) {
                    el = document.createElement('span')
                    el.classList.add("blackbox-suggestion")
                    el.style = 'color:grey'
                    el.innerText = text
                } else {
                    el.innerText = text
                }

                var lineIndex = pos.line;
                editor.getElementsByClassName('CodeMirror-line')[lineIndex].appendChild(el)
            }

            function updateSuggestionStatus(s) {
                suggestionDisplayed = s
                window.postMessage({
                    source: 'updateSuggestionStatus',
                    status: suggestionDisplayed,
                    suggestion: returnedSuggestion
                })
            }
            window.addEventListener('message', (event) => {
                if (event.source !== window) return
                if (event.data.source == 'return') {
                    isReturningSuggestion = false
                    const formattedCode = formatCode(event.data.payload.data)
                    returnedSuggestion = formattedCode
                    displayGrey(formattedCode)
                    updateSuggestionStatus(true)
                }
                if (event.data.source == 'suggestReturn') {
                    returnedSuggestion = event.data.payload.data
                    displayGrey(event.data.payload.data)
                    updateSuggestionStatus(true)
                }
                if (event.data.source == 'suggestionsStatus') {
                    suggestionsStatus = event.data.payload.enabled
                }
                if (event.data.source == 'acceptSuggestion') {

                    acceptSuggestion(event.data.suggestion)
                }
            })
            document.addEventListener("keyup", function() {
                returnedSuggestion = ""
                updateSuggestionStatus(false)
            })

            function formatCode(data) {
                if (Array.isArray(data)) {
                    var finalCode = ""
                    var pairs = []

                    const commentSymbol = returnCommentSymbol(docLang)
                    data.forEach((codeArr, idx) => {
                        const code = codeArr[0]
                        var desc = codeArr[1]
                        const descArr = desc.split("\n")
                        var finalDesc = ""
                        descArr.forEach((descLine, idx) => {
                            const whiteSpace = descLine.search(/\S/)
                            if (commentSymbol.length < 2 || idx === 0) {
                                finalDesc += insert(descLine, whiteSpace, commentSymbol[0])
                            }
                            if (commentSymbol.length > 1 && idx === descArr.length - 1) {
                                finalDesc = finalDesc + commentSymbol[1] + "\n"
                            }
                        })

                        finalCode += finalDesc + "\n\n" + code
                        pairs.push(finalCode)
                    })
                    return "\n" + pairs.join("\n")
                }

                return "\n" + data
            }

            function insert(str, index, value) {
                return str.substr(0, index) + value + str.substr(index)
            }
        </script>
        <!--Local Stuff-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php
                    require_once 'connect.php';

                    $stmtC = $conn->prepare("SELECT COUNT(*) AS totaC FROM dateinter WHERE activity = 'C'");
                    $stmtC->execute();
                    $countC = $stmtC->fetchColumn();

                    $stmtA = $conn->prepare("SELECT COUNT(*) AS totaA FROM dateinter WHERE activity = 'A'");
                    $stmtA->execute();
                    $countA = $stmtA->fetchColumn();

                    $stmtR = $conn->prepare("SELECT COUNT(*) AS totaR FROM dateinter WHERE activity = 'R'");
                    $stmtR->execute();
                    $countR = $stmtR->fetchColumn();

                    echo "['Activity C', " . $countC . "],";
                    echo "['Activity A', " . $countA . "],";
                    echo "['Activity R', " . $countR . "]";
                    ?>
                ]);

                var options = {
                    pieHole: 0.4,
                    colors: ['#AB8CE4', '#03A9E3', '#FB9678']
                };



                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            }
        </script>

        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Country', 'Number of Universities', {
                        role: 'tooltip'
                    }],
                    <?php
                    require_once 'connect.php';

                    $stmtC = $conn->prepare("SELECT country, COUNT(*) AS count, GROUP_CONCAT(university SEPARATOR ', ') AS universities FROM university GROUP BY country");
                    $stmtC->execute();

                    while ($row = $stmtC->fetch(PDO::FETCH_ASSOC)) {
                        echo "['" . $row['country'] . "', " . $row['count'] . ", '" . $row['universities'] . "'],";
                    }
                    ?>
                ]);

                var options = {
                    backgroundColor: '#ffff',
                    colors: ['#00C292'],
                    tooltip: {
                        isHtml: true
                    }
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
                chart.draw(data, options);

            }
        </script>

        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php
                    require_once 'connect.php';

                    $stmtC = $conn->prepare("SELECT university, COUNT(*) AS num_universities FROM dateinter GROUP BY university ORDER BY num_universities DESC");
                    $stmtC->execute();

                    while ($row = $stmtC->fetch()) {
                        echo "['" . $row['university'] . "', " . $row['num_universities'] . "],";
                    }
                    ?>
                ]);

                var options = {
                    pieHole: 0.4,
                    colors: generateRandomColors(data.getNumberOfRows())
                };

                function generateRandomColors(numColors) {
                    var colors = [];
                    for (var i = 0; i < numColors; i++) {
                        colors.push('rgb(' + Math.floor(Math.random() * 256) + ',' + Math.floor(Math.random() * 256) + ',' + Math.floor(Math.random() * 256) + ')');
                    }
                    return colors;
                }

                var chart = new google.visualization.PieChart(document.getElementById('university'));
                chart.draw(data, options);
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#bootstrap-data-table-export').DataTable();
            });
        </script>

        <script src="assets/js/lib/data-table/datatables.min.js"></script>
        <script src="assets/js/init/datatables-init.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js"></script>
        <script src="assets/js/vmap.sampledata.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.world.js"></script>
        <script src="assets/js/init/vector-init.js"></script>
</body>

</html>