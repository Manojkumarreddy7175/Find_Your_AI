<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: submissions.php");
    exit;
}

// Get form data and sanitize it.
$name        = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$url         = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
$category    = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
$logo        = filter_input(INPUT_POST, 'logo', FILTER_SANITIZE_URL);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

// Example: Save the submission to a JSON file (for simplicity)
// In production, consider using a database (MySQL, SQLite, etc.)

$submission = [
    "name"        => $name,
    "url"         => $url,
    "category"    => $category,
    "logo"        => $logo ?: "https://via.placeholder.com/60?text=Logo", // default if empty
    "description" => $description,
    "submitted_at" => date("Y-m-d H:i:s"),
    "approved"    => false  // Mark as pending approval
];

$file = 'submissions.json';
if (file_exists($file)) {
    $submissions = json_decode(file_get_contents($file), true);
    if (!is_array($submissions)) {
        $submissions = [];
    }
} else {
    $submissions = [];
}

$submissions[] = $submission;
file_put_contents($file, json_encode($submissions, JSON_PRETTY_PRINT));

echo "Your tool has been submitted and is pending approval.";
?>
