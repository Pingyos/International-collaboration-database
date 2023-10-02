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
?>
<!doctype html>
<html lang="en" dir="ltr">

<?php require_once 'head.php' ?>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <?php require_once 'sidebar.php' ?>

    <main class="main-content">
        <div class="position-relative iq-banner">
            <?php require_once 'Nav.php' ?>


        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Search Data</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" class="mt-3 text-center">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="choices-single-default">Start</label>
                                            <input class="form-control" type="date" id="date_s" name="date_s" value="<?php echo isset($_POST['date_s']) ? $_POST['date_s'] : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="choices-single-default">End</label>
                                            <input class="form-control" type="date" id="date_e" name="date_e" value="<?php echo isset($_POST['date_e']) ? $_POST['date_e'] : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="choices-single-default">Activity Types</label>
                                            <select class="form-control" name="activity" id="activity">
                                                <option value="" disabled selected>Show All</option>
                                                <?php
                                                require_once 'connect.php';

                                                $sql = "SELECT DISTINCT activity FROM dateinter";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->execute();
                                                $checkings = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                // วนลูปแสดงตัวเลือกใน dropdown
                                                foreach ($checkings as $checking) {
                                                    $activity = $checking['activity'];
                                                    // ไม่ต้องมีเงื่อนไขการเปรียบเทียบ $_POST['activity'] ในการเลือก
                                                    echo "<option value='$activity'>$activity</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="choices-single-default">University</label>
                                            <select class="form-control" name="university" id="university">
                                                <option value="">Show All</option>
                                                <?php
                                                if (isset($_POST['activity'])) {
                                                    $selected_activity = $_POST['activity'];
                                                    $sql = "SELECT DISTINCT university FROM dateinter WHERE activity = :activity";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bindParam(':activity', $selected_activity);
                                                    $stmt->execute();
                                                    $universities = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    // วนลูปแสดงตัวเลือกใน dropdown ของ University
                                                    foreach ($universities as $university) {
                                                        $uni_name = $university['university'];
                                                        // Check if the option's value matches the selected university in $_POST
                                                        $selected = (isset($_POST['university']) && $_POST['university'] === $uni_name) ? 'selected' : '';
                                                        echo "<option value='$uni_name' $selected>$uni_name</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" name="display_data" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                        if (isset($_POST['display_data'])) {
                                            require_once 'connect.php';

                                            $sql = "SELECT * FROM dateinter WHERE 1=1 ";

                                            if (isset($_POST['date_s']) && !empty($_POST['date_s'])) {
                                                $start_date = $_POST['date_s'];
                                                $sql .= "AND date_s >= :start_date ";
                                            }

                                            if (isset($_POST['date_e']) && !empty($_POST['date_e'])) {
                                                $end_date = $_POST['date_e'];
                                                $sql .= "AND date_e <= :end_date ";
                                            }

                                            if (isset($_POST['activity']) && !empty($_POST['activity'])) {
                                                $selected_activity = $_POST['activity'];
                                                $sql .= "AND activity = :activity ";
                                            }

                                            if (isset($_POST['university']) && !empty($_POST['university'])) {
                                                $selected_university = $_POST['university'];
                                                $sql .= "AND university = :university ";
                                            }

                                            $stmt = $conn->prepare($sql);

                                            if (isset($start_date)) {
                                                $stmt->bindParam(':start_date', $start_date);
                                            }

                                            if (isset($end_date)) {
                                                $stmt->bindParam(':end_date', $end_date);
                                            }

                                            if (isset($selected_activity)) {
                                                $stmt->bindParam(':activity', $selected_activity);
                                            }

                                            if (isset($selected_university)) {
                                                $stmt->bindParam(':university', $selected_university);
                                            }

                                            $stmt->execute();
                                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    ?>
                                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Start</th>
                                                        <th>End</th>
                                                        <th>University</th>
                                                        <th>Activity</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($results as $row) : ?>
                                                        <tr>
                                                            <td><?php echo $row['date_s']; ?></td>
                                                            <td><?php echo $row['date_e']; ?></td>
                                                            <td><?php echo $row['university']; ?></td>
                                                            <td><?php echo $row['activity']; ?></td>
                                                            <td>
                                                                <div class="flex align-items-center list-user-action">
                                                                    <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdropLive<?= $row['id']; ?>">
                                                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M15.7161 16.2234H8.49609" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M15.7161 12.0369H8.49609" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M11.2521 7.86011H8.49707" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.909 2.74976C15.909 2.74976 8.23198 2.75376 8.21998 2.75376C5.45998 2.77076 3.75098 4.58676 3.75098 7.35676V16.5528C3.75098 19.3368 5.47298 21.1598 8.25698 21.1598C8.25698 21.1598 15.933 21.1568 15.946 21.1568C18.706 21.1398 20.416 19.3228 20.416 16.5528V7.35676C20.416 4.57276 18.693 2.74976 15.909 2.74976Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg>
                                                                        </span>
                                                                    </a>
                                                                    <a class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="Date-University-Edit.php?university_id=<?= $t1['university_id']; ?>">
                                                                        <span class="btn-inner">
                                                                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <div class="modal fade" id="staticBackdropLive<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel<?= $row['id']; ?>" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="staticBackdropLiveLabel<?= $row['id']; ?>">Details</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-card text-start">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">University</label>
                                                                                            <input type="text" name="university" value="<?= $row['university']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Department</label>
                                                                                            <?php
                                                                                            require_once 'connect.php';
                                                                                            $universityId = $row['university_id'];
                                                                                            $universityQuery = "SELECT university,department,ranking,mou,signed,expired,country,qs_suject FROM university WHERE university_id = :university_id";
                                                                                            $universityStmt = $conn->prepare($universityQuery);
                                                                                            $universityStmt->bindParam(':university_id', $universityId);
                                                                                            $universityStmt->execute();
                                                                                            $universityRow = $universityStmt->fetch(PDO::FETCH_ASSOC);
                                                                                            $departmentName = $universityRow['department'];
                                                                                            ?>
                                                                                            <input type="text" value="<?= $departmentName; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Ranking</label>
                                                                                            <input type="text" value="<?= $universityRow['ranking']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">qs_suject</label>
                                                                                            <input type="text" value="<?= $universityRow['qs_suject']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">MOU</label>
                                                                                            <input type="text" value="<?= $universityRow['mou']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Country</label>
                                                                                            <input type="text" value="<?= $universityRow['country']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Signed</label>
                                                                                            <input type="text" value="<?= $universityRow['signed']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Expired</label>
                                                                                            <input type="text" value="<?= $universityRow['expired']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>

                                                                                    <hr>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Start</label>
                                                                                            <input type="text" name="date_s" value="<?= $row['date_s']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">End</label>
                                                                                            <input type="text" name="date_e" value="<?= $row['date_e']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Activity</label>
                                                                                            <input type="text" name="activity" value="<?= $row['activity']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Name</label>
                                                                                            <input type="text" name="name" value="<?= $row['name']; ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">details</label>
                                                                                            <textarea class="form-control" name="details" style="height: 250px" disabled><?= $row['details']; ?></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                    <?php
                                        } else {
                                            echo "No data found.";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <a class="btn btn-fixed-end btn-warning btn-icon btn-setting" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        <svg width="24" viewBox="0 0 24 24" class="animated-rotate" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <circle cx="12.1747" cy="11.8891" r="2.63616" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
        </svg>
    </a>
    <!-- Wrapper End-->
    <!-- offcanvas start -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" data-bs-scroll="true" data-bs-backdrop="true" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <div class="d-flex align-items-center">
                <h3 class="offcanvas-title me-3" id="offcanvasExampleLabel">Settings</h3>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body data-scrollbar">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="mb-3">Scheme</h5>
                    <div class="d-grid gap-x-3 grid-cols-3 mb-4">
                        <div class="btn-border" data-setting="color-mode" data-name="color" data-value="auto">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="M7,2V13H10V22L17,10H13L17,2H7Z" />
                            </svg>
                            <span class="ms-2 "> Auto </span>
                        </div>
                        <div class="btn-border" data-setting="color-mode" data-name="color" data-value="dark">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="M9,2C7.95,2 6.95,2.16 6,2.46C10.06,3.73 13,7.5 13,12C13,16.5 10.06,20.27 6,21.54C6.95,21.84 7.95,22 9,22A10,10 0 0,0 19,12A10,10 0 0,0 9,2Z" />
                            </svg>
                            <span class="ms-2 "> Dark </span>
                        </div>
                        <div class="btn-border active" data-setting="color-mode" data-name="color" data-value="light">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8M12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18M20,8.69V4H15.31L12,0.69L8.69,4H4V8.69L0.69,12L4,15.31V20H8.69L12,23.31L15.31,20H20V15.31L23.31,12L20,8.69Z" />
                            </svg>
                            <span class="ms-2 "> Light</span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mt-4 mb-3">Color Customizer</h5>
                        <button class="btn btn-transparent p-0" data-value="theme-color-default" data-info="#079aa2" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Default">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.4799 12.2424C21.7557 12.2326 21.9886 12.4482 21.9852 12.7241C21.9595 14.8075 21.2975 16.8392 20.0799 18.5506C18.7652 20.3986 16.8748 21.7718 14.6964 22.4612C12.518 23.1505 10.1711 23.1183 8.01299 22.3694C5.85488 21.6205 4.00382 20.196 2.74167 18.3126C1.47952 16.4293 0.875433 14.1905 1.02139 11.937C1.16734 9.68346 2.05534 7.53876 3.55018 5.82945C5.04501 4.12014 7.06478 2.93987 9.30193 2.46835C11.5391 1.99683 13.8711 2.2599 15.9428 3.2175L16.7558 1.91838C16.9822 1.55679 17.5282 1.62643 17.6565 2.03324L18.8635 5.85986C18.945 6.11851 18.8055 6.39505 18.549 6.48314L14.6564 7.82007C14.2314 7.96603 13.8445 7.52091 14.0483 7.12042L14.6828 5.87345C13.1977 5.18699 11.526 4.9984 9.92231 5.33642C8.31859 5.67443 6.8707 6.52052 5.79911 7.74586C4.72753 8.97119 4.09095 10.5086 3.98633 12.1241C3.8817 13.7395 4.31474 15.3445 5.21953 16.6945C6.12431 18.0446 7.45126 19.0658 8.99832 19.6027C10.5454 20.1395 12.2278 20.1626 13.7894 19.6684C15.351 19.1743 16.7062 18.1899 17.6486 16.8652C18.4937 15.6773 18.9654 14.2742 19.0113 12.8307C19.0201 12.5545 19.2341 12.3223 19.5103 12.3125L21.4799 12.2424Z" fill="#31BAF1" />
                                <path d="M20.0941 18.5594C21.3117 16.848 21.9736 14.8163 21.9993 12.7329C22.0027 12.4569 21.7699 12.2413 21.4941 12.2512L19.5244 12.3213C19.2482 12.3311 19.0342 12.5633 19.0254 12.8395C18.9796 14.283 18.5078 15.6861 17.6628 16.8739C16.7203 18.1986 15.3651 19.183 13.8035 19.6772C12.2419 20.1714 10.5595 20.1483 9.01246 19.6114C7.4654 19.0746 6.13845 18.0534 5.23367 16.7033C4.66562 15.8557 4.28352 14.9076 4.10367 13.9196C4.00935 18.0934 6.49194 21.37 10.008 22.6416C10.697 22.8908 11.4336 22.9852 12.1652 22.9465C13.075 22.8983 13.8508 22.742 14.7105 22.4699C16.8889 21.7805 18.7794 20.4073 20.0941 18.5594Z" fill="#0169CA" />
                            </svg>
                        </button>
                    </div>
                    <div class="grid-cols-5 mb-4 d-grid gap-x-2">
                        <div class="btn-border" data-value="theme-color-blue" data-info="#573BFF" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-1">
                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32">
                                <circle cx="12" cy="12" r="10" fill="#00C3F9" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#573BFF" />
                            </svg>
                        </div>
                        <div class="btn-border" data-value="theme-color-gray" data-info="#FD8D00" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-2">
                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32">
                                <circle cx="12" cy="12" r="10" fill="#91969E" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#FD8D00" />
                            </svg>
                        </div>
                        <div class="btn-border" data-value="theme-color-red" data-info="#366AF0" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-3">
                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32">
                                <circle cx="12" cy="12" r="10" fill="#DB5363" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#366AF0" />
                            </svg>
                        </div>
                        <div class="btn-border" data-value="theme-color-yellow" data-info="#6410F1" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-4">
                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32">
                                <circle cx="12" cy="12" r="10" fill="#EA6A12" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#6410F1" />
                            </svg>
                        </div>
                        <div class="btn-border" data-value="theme-color-pink" data-info="#25C799" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-5">
                            <svg class="customizer-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32">
                                <circle cx="12" cy="12" r="10" fill="#E586B3" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#25C799" />
                            </svg>
                        </div>

                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mb-3 mt-4">Scheme Direction</h5>
                    <div class="d-grid gap-x-3 grid-cols-2 mb-4">
                        <div class="text-center">
                            <img src="assets/images/settings/dark/01.png" alt="ltr" class="mode dark-img img-fluid btn-border p-0 flex-column active" data-setting="dir-mode" data-name="dir" data-value="ltr">
                            <img src="assets/images/settings/light/01.png" alt="ltr" class="mode light-img img-fluid btn-border p-0 flex-column active" data-setting="dir-mode" data-name="dir" data-value="ltr">
                            <span class=" mt-2"> LTR </span>
                        </div>
                        <div class="text-center">
                            <img src="assets/images/settings/dark/02.png" alt="" class="mode dark-img img-fluid btn-border p-0 flex-column" data-setting="dir-mode" data-name="dir" data-value="rtl">
                            <img src="assets/images/settings/light/02.png" alt="" class="mode light-img img-fluid btn-border p-0 flex-column" data-setting="dir-mode" data-name="dir" data-value="rtl">
                            <span class="mt-2 "> RTL </span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mt-4 mb-3">Sidebar Color</h5>
                    <div class="d-grid gap-x-3 grid-cols-2 mb-4">
                        <div class="btn btn-border mb-4" data-setting="sidebar" data-name="sidebar-color" data-value="sidebar-dark">
                            <i class="text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="currentColor">
                                    <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </svg>
                            </i>
                            <span class="ms-2 "> Dark </span>
                        </div>
                        <div class="btn btn-border mb-4" data-setting="sidebar" data-name="sidebar-color" data-value="sidebar-color">
                            <i class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="currentColor">
                                    <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </svg>
                            </i>
                            <span class="ms-2 "> Color </span>
                        </div>
                        <div class="btn btn-border active" data-setting="sidebar" data-name="sidebar-color" data-value="sidebar-white">
                            <i class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="currentColor">
                                    <circle cx="12" cy="12" r="8" fill="currentColor" stroke="black" stroke-width="3"></circle>
                                </svg>
                            </i>
                            <span class="ms-2 "> White </span>
                        </div>
                        <div class="btn btn-border " data-setting="sidebar" data-name="sidebar-color" data-value="sidebar-transparent">
                            <i class="text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="currentColor">
                                    <circle cx="12" cy="12" r="8" fill="#F5F6FA" stroke="black" stroke-width="3"></circle>
                                </svg>
                            </i>
                            <span class="ms-2 "> Transparent </span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mt-4 mb-3">Sidebar Types</h5>
                    <div class="d-grid gap-x-3 grid-cols-3 mb-4">
                        <div class="text-center">
                            <img src="assets/images/settings/dark/03.png" alt="mini" class="mode dark-img img-fluid btn-border p-0 flex-column" data-setting="sidebar" data-name="sidebar-type" data-value="sidebar-mini">
                            <img src="assets/images/settings/light/03.png" alt="mini" class="mode light-img img-fluid btn-border p-0 flex-column" data-setting="sidebar" data-name="sidebar-type" data-value="sidebar-mini">
                            <span class="mt-2">Mini</span>
                        </div>
                        <div class="text-center">
                            <img src="assets/images/settings/dark/04.png" alt="hover" class="mode dark-img img-fluid btn-border p-0 flex-column" data-setting="sidebar" data-name="sidebar-type" data-value="sidebar-hover" data-extra-value="sidebar-mini">
                            <img src="assets/images/settings/light/04.png" alt="hover" class="mode light-img img-fluid btn-border p-0 flex-column" data-setting="sidebar" data-name="sidebar-type" data-value="sidebar-hover" data-extra-value="sidebar-mini">
                            <span class="mt-2">Hover</span>
                        </div>
                        <div class="text-center">
                            <img src="assets/images/settings/dark/05.png" alt="boxed" class="mode dark-img img-fluid btn-border p-0 flex-column" data-setting="sidebar" data-name="sidebar-type" data-value="sidebar-boxed">
                            <img src="assets/images/settings/light/05.png" alt="boxed" class="mode light-img img-fluid btn-border p-0 flex-column" data-setting="sidebar" data-name="sidebar-type" data-value="sidebar-boxed">
                            <span class="mt-2">Boxed</span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mt-4 mb-3">Sidebar Active Style</h5>
                    <div class="d-grid gap-x-3 grid-cols-2 mb-4">
                        <div class="mb-4 text-center">
                            <img src="assets/images/settings/dark/06.png" alt="rounded-one-side" class="mode dark-img img-fluid btn-border p-0 flex-column" data-setting="sidebar" data-name="sidebar-item" data-value="navs-rounded">
                            <img src="assets/images/settings/light/06.png" alt="rounded-one-side" class="mode light-img img-fluid btn-border p-0 flex-column" data-setting="sidebar" data-name="sidebar-item" data-value="navs-rounded">
                            <span class="mt-2">Rounded One Side</span>
                        </div>
                        <div class="mb-4 text-center">
                            <img src="assets/images/settings/dark/07.png" alt="rounded-all" class="mode dark-img img-fluid btn-border p-0 flex-column active" data-setting="sidebar" data-name="sidebar-item" data-value="navs-rounded-all">
                            <img src="assets/images/settings/light/07.png" alt="rounded-all" class="mode light-img img-fluid btn-border p-0 flex-column active" data-setting="sidebar" data-name="sidebar-item" data-value="navs-rounded-all">
                            <span class="mt-2">Rounded All</span>
                        </div>
                        <div class="mb-4 text-center">
                            <img src="assets/images/settings/dark/08.png" alt="pill-one-side" class="mode dark-img img-fluid btn-border p-0 flex-column" data-setting="sidebar" data-name="sidebar-item" data-value="navs-pill">
                            <img src="assets/images/settings/light/09.png" alt="pill-one-side" class="mode light-img img-fluid btn-border p-0 flex-column" data-setting="sidebar" data-name="sidebar-item" data-value="navs-pill">
                            <span class="mt-2">Pill One Side</span>
                        </div>
                        <div class="mb-4 text-center">
                            <img src="assets/images/settings/dark/09.png" alt="pill-all" class="mode dark-img img-fluid btn-border p-0 flex-column" data-setting="sidebar" data-name="sidebar-item" data-value="navs-pill-all">
                            <img src="assets/images/settings/light/08.png" alt="pill-all" class="mode light-img img-fluid btn-border p-0 flex-column" data-setting="sidebar" data-name="sidebar-item" data-value="navs-pill-all">
                            <span class="mt-2">Pill All</span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mt-4 mb-3">Navbar Style</h5>
                    <div class="d-grid gap-x-3 grid-cols-2">
                        <div class="mb-4 text-center">
                            <img src="assets/images/settings/dark/11.png" alt="image" class="mode dark-img img-fluid btn-border p-0 flex-column" data-setting="navbar" data-target=".iq-navbar" data-name="navbar-type" data-value="nav-glass">
                            <img src="assets/images/settings/light/10.png" alt="image" class="mode light-img img-fluid btn-border p-0 flex-column" data-setting="navbar" data-target=".iq-navbar" data-name="navbar-type" data-value="nav-glass">
                            <span class="mt-2">Glass</span>
                        </div>
                        <div class="mb-4 text-center">
                            <img src="assets/images/settings/dark/10.png" alt="color" class="mode dark-img img-fluid btn-border p-0 flex-column" data-setting="navbar" data-target=".iq-navbar-header" data-name="navbar-type" data-value="navs-bg-color">
                            <img src="assets/images/settings/light/11.png" alt="color" class="mode light-img img-fluid btn-border p-0 flex-column" data-setting="navbar" data-target=".iq-navbar-header" data-name="navbar-type" data-value="navs-bg-color">
                            <span class="mt-2">Color</span>
                        </div>
                        <div class="mb-4 text-center">
                            <img src="assets/images/settings/dark/12.png" alt="sticky" class="mode dark-img img-fluid btn-border p-0 flex-column" data-setting="navbar" data-target=".iq-navbar" data-name="navbar-type" data-value="navs-sticky">
                            <img src="assets/images/settings/light/12.png" alt="sticky" class="mode light-img img-fluid btn-border p-0 flex-column" data-setting="navbar" data-target=".iq-navbar" data-name="navbar-type" data-value="navs-sticky">
                            <span class="mt-2">Sticky</span>
                        </div>
                        <div class="mb-4 text-center">
                            <img src="assets/images/settings/dark/13.png" alt="transparent" class="mode dark-img img-fluid btn-border p-0 flex-column" data-setting="navbar" data-target=".iq-navbar" data-name="navbar-type" data-value="navs-transparent">
                            <img src="assets/images/settings/light/13.png" alt="transparent" class="mode light-img img-fluid btn-border p-0 flex-column" data-setting="navbar" data-target=".iq-navbar" data-name="navbar-type" data-value="navs-transparent">
                            <span class="mt-2">Transparent</span>
                        </div>
                        <div class="btn btn-border active col-span-full" data-setting="navbar" data-name="navbar-default" data-value="default">
                            <i class="text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="currentColor">
                                    <circle cx="12" cy="12" r="8" fill="#F5F6FA" stroke="black" stroke-width="3"></circle>
                                </svg>
                            </i>
                            <span class="ms-2 "> Default Navbar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Library Bundle Script -->
    <script src="assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="assets/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="assets/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="assets/js/charts/vectore-chart.js"></script>
    <script src="assets/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="assets/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="assets/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="assets/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="assets/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->
    <script src="assets/vendor/aos/dist/aos.js"></script>

    <!-- App Script -->
    <script src="assets/js/hope-ui.js" defer></script>
</body>

</html>