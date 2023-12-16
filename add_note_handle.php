<?php
  session_start(); 
  include "./db_conn.php";

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $title = validate($_POST['title']);
  $body = validate($_POST['body']);
  $owner = $_SESSION['id'];

  $sql = "INSERT INTO notes (title, body, owner, archived)
          VALUES ('$title', '$body', '$owner', false)";
  $result = mysqli_query($conn, $sql); 
  if ($result) {
    header("Location: ./main_page.php");
    exit();
  }
?>