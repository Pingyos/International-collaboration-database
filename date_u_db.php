<?php
if (
    isset($_POST['spec'])
    && isset($_POST['ranking'])
    && isset($_POST['mou'])
    && isset($_POST['country'])
    && isset($_POST['university'])
    && isset($_POST['comments_u'])
) {
    require_once 'connect.php';
    // Declare variables to receive form values
    $university = $_POST['university'];
    $spec = implode(',', $_POST['spec']);
    $ranking = $_POST['ranking'];
    $mou = $_POST['mou'];
    $country = $_POST['country'];
    $comments_u = $_POST['comments_u'];
    // SQL insert statement
    $stmt = $conn->prepare("INSERT INTO university (university, ranking, mou, country, spec, comments_u)
    VALUES (:university, :ranking, :mou, :country, :spec, :comments_u)");

    $stmt->bindParam(':university', $university, PDO::PARAM_STR);
    $stmt->bindParam(':ranking', $ranking, PDO::PARAM_STR);
    $stmt->bindParam(':mou', $mou, PDO::PARAM_STR);
    $stmt->bindParam(':country', $country, PDO::PARAM_STR);
    $stmt->bindParam(':spec', $spec, PDO::PARAM_STR);
    $stmt->bindParam(':comments_u', $comments_u, PDO::PARAM_STR);
    $result = $stmt->execute();

    // sweet alert 
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
                  window.location = "date_u.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 200);
        </script>';
    } else {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "Add data Error",
                  type: "error"
              }, function() {
                  window.location = "data_u_add.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 200);
        </script>';
    }
    $conn = null; //close connect db
} //isset
