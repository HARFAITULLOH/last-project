<?php
  session_start(); 
  include "./db_conn.php";

  if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    if (empty($username)) {
      header("Location: ./login_page.php?error=User Name is required");
      exit();
    }else if(empty($password)){
      header("Location: ./login_page.php?error=Password is required");
      exit();
    }else{
      $sql = "SELECT * FROM users WHERE email='$username' AND password='$password'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $username && $row['password'] === $password) {
          $_SESSION['username'] = $row['email'];
          $_SESSION['password'] = $row['password'];
          $_SESSION['name'] = $row['fullname'];
          $_SESSION['id'] = $row['id'];
          header("Location: ./main_page.php");
          exit();
        }else{
          header("Location: ./login_page.php?error=Incorect User name or password");
          exit();
        }
      }else{
        header("Location: ./login_page.php?error=Incorect User name or password");
        exit();
      }
    }
  }else{
    header("Location: ./login_page.php");
    exit();
  }
?>