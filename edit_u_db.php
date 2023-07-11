<?php
if (
  isset($_POST['university'])
  && isset($_POST['ranking'])
  && isset($_POST['department'])
  && isset($_POST['spec'])
  && isset($_POST['mou'])
  && isset($_POST['country'])
  && isset($_POST['comments_u'])
  && isset($_POST['university_id'])
  && isset($_POST['qs_suject'])
  && isset($_POST['signed'])
  && isset($_POST['expired'])
) {

  require_once 'connect.php';
  $university_id = $_POST['university_id'];
  $university = $_POST['university'];
  $department = $_POST['department'];
  $spec = $_POST['spec'];
  $ranking = $_POST['ranking'];
  $mou = $_POST['mou'];
  $country = $_POST['country'];
  $comments_u = $_POST['comments_u'];
  $qs_suject = $_POST['qs_suject'];
  $signed = $_POST['signed'];
  $expired = $_POST['expired'];
  //sql update
  $stmt = $conn->prepare("UPDATE  university SET university=:university, signed=:signed, expired=:expired, department=:department, ranking=:ranking,mou=:mou, country=:country, spec=:spec, qs_suject=:qs_suject, comments_u=:comments_u WHERE university_id=:university_id");
  $stmt->bindParam(':university_id', $university_id, PDO::PARAM_STR);
  $stmt->bindParam(':department', $department, PDO::PARAM_STR);
  $stmt->bindParam(':spec', $spec, PDO::PARAM_STR);
  $stmt->bindParam(':university', $university, PDO::PARAM_STR);
  $stmt->bindParam(':ranking', $ranking, PDO::PARAM_STR);
  $stmt->bindParam(':mou', $mou, PDO::PARAM_STR);
  $stmt->bindParam(':country', $country, PDO::PARAM_STR);
  $stmt->bindParam(':comments_u', $comments_u, PDO::PARAM_STR);
  $stmt->bindParam(':qs_suject', $qs_suject, PDO::PARAM_STR);
  $stmt->bindParam(':signed', $signed, PDO::PARAM_STR);
  $stmt->bindParam(':expired', $expired, PDO::PARAM_STR);
  $stmt->execute();
  $stmt = $conn->prepare("SELECT university_id FROM university WHERE university = :university");
  $stmt->bindParam(':university', $university, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $university_id = $result['university_id'];
  // sweet alert 
  echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

  if ($stmt->rowCount() >= 0) {

    echo '<script>
        swal({
          title: "Edit Data Success",
          text: "success",
          type: "success",
          timer: 1500,
          showConfirmButton: false
        }, function(){
          window.location = "check_date.php?university_id=' . $university_id . '";
        });
      </script>';
  } else {
    echo '<script>
        swal({
          title: "Edit data fail",
          text: "fail",
          type: "fail",
          timer: 1500,
          showConfirmButton: false
        }, function(){
          window.location.href = "date_u.php";
        });
      </script>';
  }
  $conn = null; //close connect db
} //isset
