<?php
session_start();

$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $usersFile = 'users.json';
    if (file_exists($usersFile)) {
        $usersData = json_decode(file_get_contents($usersFile), true);
    } else {
        $usersData = [];
    }

    $userFound = false;
    foreach ($usersData as $user) {
        if ($user['email'] == $email) {
            $userFound = true;
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $email;
                header("Location: dashboard.php");
                exit;
            } else {
                $errors[] = "Incorrect password.";
            }
        }
    }
    if (!$userFound) {
        $errors[] = "Email not registered.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - AI House</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Login</h1>
    <nav>
      <a href="index.html">Home</a>
    </nav>
  </header>
  <main>
    <?php if (!empty($errors)): ?>
      <div class="errors">
        <?php foreach ($errors as $error): ?>
          <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <form action="login.php" method="POST">
      <label for="email">Email:</label>
      <input type="email" name="email" required><br><br>
      
      <label for="password">Password:</label>
      <input type="password" name="password" required><br><br>
      
      <button type="submit">Login</button>
    </form>
  </main>
</body>
</html>
