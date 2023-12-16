<?php
  session_start(); 
  include "./db_conn.php";

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $id = validate($_POST['id']);

  $sql = "DELETE FROM notes WHERE id = $id";
  $result = mysqli_query($conn, $sql); 
  if ($result) {
    header("Location: ./main_page.php");
    exit();
  }
?>