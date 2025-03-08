<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - AI House</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Dashboard</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="logout.php">Logout</a>
    </nav>
  </header>
  <main>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
    <p>This is your dashboard. You can add more features like saving favorite AI tools or viewing reviews in the future.</p>
  </main>
</body>
</html>
