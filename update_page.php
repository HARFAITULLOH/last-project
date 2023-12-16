<?php 
  include "./db_conn.php";

  $id = $_GET['id'];
  $sql = "SELECT * FROM notes WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  $row = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/login_style.css?v=<?php echo time(); ?>">
  <title>Login</title>
</head>
<body>
  <div class="content-wrapper">
    <div class="content">
      <form action="./update_handle.php" method="post">
        <input type="hidden" name="id" required value="<?php echo $_GET['id']?>">
        <div class="mb-3">
          <label for="titleController" class="form-label">Title</label>
          <input type="text" class="form-control" id="titleController" name="title" required value="<?php echo $row['title']?>">
        </div>
        <div class="mb-3">
          <label for="bodyController" class="form-label">Body</label>
          <textarea class="form-control" id="bodyController" rows="4" name="body"><?php echo $row['body'] ?></textarea>
        </div>
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="submit">Update</button>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>