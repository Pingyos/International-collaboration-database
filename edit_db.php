<?php
if (
  isset($_POST['id'])
  && isset($_POST['university_id'])
  && isset($_POST['university'])
  && isset($_POST['university_name'])
  && isset($_POST['date_s'])
  && isset($_POST['date_e'])
  && isset($_POST['activity'])
  && isset($_POST['name'])
) {

  require_once 'connect.php';
  $id = $_POST['id'];
  $university_id = $_POST['university_id'];
  $university = $_POST['university'];
  $university_name = $_POST['university_name'];
  $date_s = $_POST['date_s'];
  $date_e = $_POST['date_e'];
  $activity = $_POST['activity'];
  $name = $_POST['name'];
  //sql update
  $stmt = $conn->prepare("UPDATE  dateinter SET university_id=:university_id, university=:university, university_name=:university_name,date_s=:date_s, date_e=:date_e, activity=:activity, name=:name WHERE id=:id");
  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
  $stmt->bindParam(':university_id', $university_id, PDO::PARAM_STR);
  $stmt->bindParam(':university', $university, PDO::PARAM_STR);
  $stmt->bindParam(':university_name', $university_name, PDO::PARAM_STR);
  $stmt->bindParam(':date_s', $date_s, PDO::PARAM_STR);
  $stmt->bindParam(':date_e', $date_e, PDO::PARAM_STR);
  $stmt->bindParam(':activity', $activity, PDO::PARAM_STR);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
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
          timer: 2000,
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
          timer: 2000,
          showConfirmButton: false
        }, function(){
          window.location.href = "date_u.php";
        });
      </script>';
  }
  $conn = null; //close connect db
} //isset
