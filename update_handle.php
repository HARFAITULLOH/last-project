<?php
  include "./db_conn.php";

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $id = validate($_POST['id']);
  $title = validate($_POST['title']);
  $body = validate($_POST['body']);

  $sql = "UPDATE notes SET title='$title', body='$body' WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    header("Location: ./main_page.php");
    exit();
  }
?>