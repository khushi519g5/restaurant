
<?php
session_start();
require_once '../php/db/connection.php';
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['read'])) {
    $id = (int)$_GET['read'];
    $conn->query("UPDATE contact_messages SET status = 'read' WHERE id = $id");
}

$messages = $conn->query("SELECT * FROM contact_messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h3>Manage Contact Messages</h3>
    <table class="table table-bordered">
        <thead><tr><th>Name</th><th>Email</th><th>Message</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
        <?php while ($m = $messages->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($m['name']) ?></td>
                <td><?= htmlspecialchars($m['email']) ?></td>
                <td><?= nl2br(htmlspecialchars($m['message'])) ?></td>
                <td><?= ucfirst($m['status']) ?></td>
                <td>
                    <?php if ($m['status'] === 'unread'): ?>
                        <a href="?read=<?= $m['id'] ?>" class="btn btn-info btn-sm">Mark as Read</a>
                    <?php else: ?>
                        <span class="text-muted">Viewed</span>
                    <?php endif ?>
                </td>
            </tr>
        <?php endwhile ?>
        </tbody>
    </table>
</body>
</html>
