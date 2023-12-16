<?php
  $sname= "localhost";
  $unmae= "root";
  $password = "";
  $db_name = "last_project_pk_ii";
  $conn = mysqli_connect($sname, $unmae, $password, $db_name);

  if (!$conn) {
    echo "Connection failed!";
  }
?>