<?php
session_start(); // In production, ensure only admins can access

$file = 'submissions.json';
$submissions = [];

// Load existing submissions
if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true);
    if (is_array($data)) {
        $submissions = $data;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Approve Tools</title>
</head>
<body>
    <h1>Pending Submissions</h1>
    <?php foreach($submissions as $index => $item): ?>
        <?php if(empty($item['approved'])): ?>
            <div>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($item['name']); ?></p>
                <p><strong>URL:</strong> <?php echo htmlspecialchars($item['url']); ?></p>
                <p><strong>Category:</strong> <?php echo htmlspecialchars($item['category']); ?></p>
                <p><strong>Logo:</strong> <?php echo htmlspecialchars($item['logo']); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($item['description']); ?></p>

                <form action="process_admin.php" method="POST">
                    <input type="hidden" name="index" value="<?php echo $index; ?>">
                    <input type="hidden" name="action" value="approve">
                    <button type="submit">Approve</button>
                </form>

                <form action="process_admin.php" method="POST">
                    <input type="hidden" name="index" value="<?php echo $index; ?>">
                    <input type="hidden" name="action" value="reject">
                    <button type="submit">Reject</button>
                </form>
            </div>
            <hr>
        <?php endif; ?>
    <?php endforeach; ?>
</body>
</html>
