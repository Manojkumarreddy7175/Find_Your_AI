<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Your AI Tool - AI House</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="header-container">
      <h1>Submit Your AI Tool</h1>
      <nav>
        <a href="index.html">Home</a>
        <a href="dashboard.php">Dashboard</a>
      </nav>
    </div>
  </header>
  
  <main>
    <form action="process_submission.php" method="POST" class="submit-form">
      <label for="name">Tool Name:</label>
      <input type="text" name="name" id="name" required>
      
      <label for="url">Tool URL:</label>
      <input type="url" name="url" id="url" required>
      
      <label for="category">Category:</label>
      <select name="category" id="category" required>
        <option value="Text Generation">Text Generation</option>
        <option value="Content Creation">Content Creation</option>
        <option value="Image Generation">Image Generation</option>
        <!-- Add more categories as needed -->
      </select>
      
      <label for="logo">Logo URL:</label>
      <input type="url" name="logo" id="logo" placeholder="https://">
      
      <label for="description">Description (optional):</label>
      <textarea name="description" id="description" rows="4"></textarea>
      
      <button type="submit">Submit Tool</button>
    </form>
  </main>
  
  <footer>
    <p>&copy; 2024 AI House by Manoj Kumar Reddy</p>
  </footer>
</body>
</html>
