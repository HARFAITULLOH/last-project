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
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Pesonal Notes App</span>
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./login_page.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./signup_page.php">Signup</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="content">
      <div class="header">
        <h1>Log in</h1>
        <p>to write your note</p>
      </div>
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <form action="./login_handle.php" method="post">
        <div class="mb-3">
          <label for="emailController" class="form-label">Email</label>
          <input type="email" class="form-control" id="emailController" placeholder="name@example.com" name="username">
        </div>
        <div class="mb-3">
          <label for="passwordController" class="form-label">Password</label>
          <input type="password" class="form-control" id="passwordController" name="password">
        </div>
        <p class="fg-pw"><a class="fg-pw" href="#">Forget Password?</a></p>
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="submit">Login</button>
        </div>
        <p class="sg-up">Don't have an account ?<a class="sg-up" href="./signup_page.php"> SignUp</a></p>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>