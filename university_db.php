<?php
if (
    isset($_POST['university'])
    && isset($_POST['ranking'])
    && isset($_POST['mou'])
    && isset($_POST['country'])
    && isset($_POST['comments_u'])
    && isset($_POST['spec'])
) {

    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //sql insert
    $stmt = $conn->prepare("INSERT INTO university
      (university, ranking, mou, country, comments_u ,spec)
      VALUES
      (:university, :ranking, :mou, :country, :comments_u, :spec)");
    //bindParam data type
    $stmt->bindParam(':university', $_POST['university'], PDO::PARAM_STR);
    $stmt->bindParam(':ranking', $_POST['ranking'], PDO::PARAM_STR);
    $stmt->bindParam(':mou', $_POST['mou'], PDO::PARAM_STR);
    $stmt->bindParam(':country', $_POST['country'], PDO::PARAM_STR);
    $stmt->bindParam(':comments_u', $_POST['comments_u'], PDO::PARAM_STR);
    $stmt->bindParam(':spec', $_POST['spec'], PDO::PARAM_STR);
    $result = $stmt->execute();
    $conn = null; //close connect db
    //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
    echo '
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    if ($result) {
        echo '<script>
        swal({
          title: "Add Data Success",
          text: "booking success",
          type: "success",
          timer: 2000,
          showConfirmButton: false
        }, function(){
          window.location.href = "date_u.php";
        });
      </script>';
    } else {
        echo '<script>
        swal({
          title: "Add data fail",
          text: "Add data fail",
          type: "success",
          timer: 2000,
          showConfirmButton: false
        }, function(){
          window.location.href = "date_u.php";
        });
      </script>';
    }
    $conn = null; //close connect db

} //isset
