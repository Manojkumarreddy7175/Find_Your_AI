<?php
session_start(); // In production, ensure only admins can access this page

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Only handle POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: admin_dashboard.php");
    exit;
}

// Locate the JSON file that stores submissions
$file = 'submissions.json';

// Load existing submissions (or initialize an empty array if file is missing or invalid)
$submissions = [];
if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true);
    if (is_array($data)) {
        $submissions = $data;
    }
}

// Retrieve the index and action from the form
$index  = isset($_POST['index']) ? intval($_POST['index']) : null;
$action = $_POST['action'] ?? '';

// Check if the index is valid
if ($index !== null && isset($submissions[$index])) {
    // Perform the requested action
    if ($action === 'approve') {
        // Mark the submission as approved
        $submissions[$index]['approved'] = true;
    } elseif ($action === 'reject') {
        // Remove the submission from the array
        array_splice($submissions, $index, 1);
    }
    
    // Save the updated submissions back to the JSON file
    file_put_contents($file, json_encode($submissions, JSON_PRETTY_PRINT));
}

// Redirect back to the admin dashboard
header("Location: admin_dashboard.php");
exit;
