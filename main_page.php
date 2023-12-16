<?php
  session_start();

  include "./db_conn.php";

  $owner = $_SESSION['id'];

  if(!$owner) {
    header("Location: ./login_page.php");
    exit();
  }

  $sql = "SELECT * FROM notes WHERE owner='$owner'";
  $result = mysqli_query($conn, $sql);

  if (isset($_POST['idForUpdate'])) {
    $location = "update_page.php?id=" . $_POST['idForUpdate'];
    header("Location: $location");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="./styles/main_style.css?v=<?php echo time(); ?>">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notes</title>
</head>
<body>
  <header class='note-app__header'>
    <h1>Your Notes</h1>
    <form action="./logout_handle.php" method="post">
      <button>Logout</button>
    </form>
  </header>
  <main>
    <div class='note-app__body'>
      <div class='note-input'>
        <h2 class="greeting">Hai, <?php echo $_SESSION['name']?>!</h2>
        <h2>Buat Catatanmu</h2>
        <form action="./add_note_handle.php" method="post">
          <p class='note-input__title__char-limit'>Sisa karakter judul : <span class="remainChar">50</span></p>
          <input
            type='text'
            class='note-input__title'
            placeholder='Ini adalah judul ...'
            required
            maxlength="50"
            name="title"
          />
          <textarea
            class='note-input__body'
            type='text'
            placeholder='Tuliskan catatanmu di sini ...'
            required
            name="body"
          ></textarea>
          <button type='submit'>Buat</button>
        </form>
      </div>
      <h2>Catatan Aktif</h2>
      <div class='notes-list'>
        <?php if ($result->num_rows > 0): ?>
          <?php
            while ($row = $result->fetch_assoc()):?>
              <div class='note-item'>
                <div class='note-item__content'>
                  <h3 class='note-item__title'>
                    <?php echo $row["title"]?>
                  </h3>
                  <p class='note-item__date'>
                    <?php echo $row["reg_date"]?>
                  </p>
                  <p class='note-item__body'>
                    <?php echo $row["body"]?>
                  </p>
                </div>
                <div class='note-item__action'>
                  <form action="./delete_note_handle.php" method="post">
                    <input type='hidden' name='id' value='<?php echo $row['id']?>'>
                    <button class='note-item__delete-button'>
                      Delete
                    </button>
                  </form>
                  <form method="post">
                    <input type='hidden' name='idForUpdate' value='<?php echo $row['id']?>'>
                    <button class='note-item__update-button'>
                      Update
                    </button>
                  </form>
                </div>
              </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p>Tidak ada catatan</p>
        <?php endif; ?>
      </div>
  </main>
  <script src="./scripts/main_page.js"></script>
</body>
</html>