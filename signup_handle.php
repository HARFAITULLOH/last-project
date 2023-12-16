<?php
  include "./db_conn.php";

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $username = validate($_POST['email']);
  $password = validate($_POST['password']);
  $fullname = validate($_POST['fullname']);
  $confirm_password = validate($_POST['confirm_password']);

  if(strlen($password) < 8) {
    header("Location: ./signup_page.php?error=Password must have 8 or more character");
    exit();
  }

  if($password !== $confirm_password) {
    header("Location: ./signup_page.php?error=Make sure your password and confirm password suitable");
    exit();
  }

  $sql = "SELECT * FROM users WHERE email='$username'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) === 1) {
    header("Location: ./signup_page.php?error=Email already exist");
    exit();
  }


  $sql = "INSERT INTO users (fullname, password, email)
          VALUES ('$fullname', '$password', '$username')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    header("Location: ./signup_page.php?success=Congratss! Your account created");
    exit();
  }
?>