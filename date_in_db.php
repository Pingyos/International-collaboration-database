<?php
if (
    isset($_POST['date_s'])
    && isset($_POST['date_e'])
    && isset($_POST['activity'])
    && isset($_POST['name'])
    && isset($_POST['details'])
) {
    require_once 'connect.php';
    $university = $_POST['university_name'];
    $date_s = $_POST['date_s'];
    $date_e = $_POST['date_e'];
    $activity = $_POST['activity'];
    $name = $_POST['name'];
    $details = $_POST['details'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO dateinter (university,date_s,date_e,activity,name,details)
    VALUES (:university,:date_s,:date_e,:activity,:name,:details)");
    $stmt->bindParam(':university', $university, PDO::PARAM_STR);
    $stmt->bindParam(':date_s', $date_s, PDO::PARAM_STR);
    $stmt->bindParam(':date_e', $date_e, PDO::PARAM_STR);
    $stmt->bindParam(':activity', $activity, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':details', $details, PDO::PARAM_STR);
    $result = $stmt->execute();

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($result) {
        echo '<script>
        setTimeout(function() {
            swal({
                title: "Add data Success",
                type: "success"
            }, function() {
                var universityId = "' . $university_id . '";
                window.location.href = "check_date.php?university_id=" + universityId;
            });
        }, 200);
      </script>';
    } else {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "Add date Error",
                  type: "error"
              }, function() {
                  window.location = "index.php";
              });
            }, 200);
        </script>';
    }
    $conn = null; //close connect db
} //isset
