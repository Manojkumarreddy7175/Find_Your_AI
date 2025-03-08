<?php
session_start();

$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    // Basic validations
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }
    if ($password !== $confirm) {
        $errors[] = "Passwords do not match.";
    }

    // Load existing users
    $usersFile = 'users.json';
    if (file_exists($usersFile)) {
        $usersData = json_decode(file_get_contents($usersFile), true);
    } else {
        $usersData = [];
    }

    // Check if email already exists
    foreach ($usersData as $user) {
        if ($user['email'] == $email) {
            $errors[] = "Email already registered.";
            break;
        }
    }

    if (empty($errors)) {
        // Save new user (password hashed)
        $newUser = [
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ];
        $usersData[] = $newUser;
        file_put_contents($usersFile, json_encode($usersData, JSON_PRETTY_PRINT));
        $_SESSION['user'] = $email;
        header("Location: dashboard.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register - AI House</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Register</h1>
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
    <form action="register.php" method="POST">
      <label for="email">Email:</label>
      <input type="email" name="email" required><br><br>
      
      <label for="password">Password:</label>
      <input type="password" name="password" required><br><br>
      
      <label for="confirm">Confirm Password:</label>
      <input type="password" name="confirm" required><br><br>
      
      <button type="submit">Register</button>
    </form>
  </main>
</body>
</html>
