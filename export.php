
<?php
//export.php  
if (isset($_POST["create_word"])) {
     if (empty($_POST["university"]) || empty($_POST["date_s"]) || empty($_POST["date_e"]) || empty($_POST["activity"]) || empty($_POST["name"]) || empty($_POST["details"])) {
          echo '<script>alert("Both Fields are required")</script>';
          echo '<script>window.location = "index.php"</script>';
     } else {
          header("Content-type: application/vnd.ms-word");
          header("Content-Disposition: attachment;Filename=" . rand() . ".doc");
          header("Pragma: no-cache");
          header("Expires: 0");
          echo  "University" . "\n";
          echo $_POST["university"] . "\n";
          echo "\n";
          echo  "Date" . "\n";
          echo $_POST["date_s"] . "\n";
          echo $_POST["date_e"] . "\n";
          echo "\n";
          echo  "Activity" . "\n";
          echo $_POST["activity"] . "\n";
          echo "\n";
          echo  "Name Surname" . "\n";
          echo $_POST["name"] . "\n";
          echo "\n";
          echo  "Activity details" . "\n";
          echo $_POST["details"] . "\n";
     }
}
?> 