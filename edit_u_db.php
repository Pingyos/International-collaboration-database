<?php
if (
    isset($_POST['university'])
    && isset($_POST['ranking'])
    && isset($_POST['mou'])
    && isset($_POST['country'])
    && isset($_POST['university_id'])
) {

    require_once 'connect.php';
    $university_id = $_POST['university_id'];
    $university = $_POST['university'];
    $ranking = $_POST['ranking'];
    $mou = $_POST['mou'];
    $country = $_POST['country'];
    //sql update
    $stmt = $conn->prepare("UPDATE  university SET university=:university, ranking=:ranking,mou=:mou, country=:country WHERE university_id=:university_id");
    $stmt->bindParam(':university_id', $university_id, PDO::PARAM_STR);
    $stmt->bindParam(':university', $university, PDO::PARAM_STR);
    $stmt->bindParam(':ranking', $ranking, PDO::PARAM_STR);
    $stmt->bindParam(':mou', $mou, PDO::PARAM_STR);
    $stmt->bindParam(':country', $country, PDO::PARAM_STR);
    $stmt->execute();

    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() >= 0) {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "Edit Data Success",
                  type: "success"
              }, function() {
                  window.location = "data_u.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 200);
        </script>';
    } else {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "Edit Data Error",
                  type: "error"
              }, function() {
                  window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 200);
        </script>';
    }
    $conn = null; //close connect db
} //isset
