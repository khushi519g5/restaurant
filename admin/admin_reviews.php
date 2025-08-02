
<?php
session_start();
require_once '../php/db/connection.php';
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['approve'])) {
    $id = (int)$_GET['approve'];
    $conn->query("UPDATE reviews SET status = 'approved' WHERE id = $id");
} elseif (isset($_GET['reject'])) {
    $id = (int)$_GET['reject'];
    $conn->query("UPDATE reviews SET status = 'rejected' WHERE id = $id");
}

$reviews = $conn->query("SELECT * FROM reviews ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h3>Manage Reviews</h3>
    <table class="table table-bordered">
        <thead><tr><th>Name</th><th>Rating</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
        <?php while ($r = $reviews->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($r['name']) ?></td>
                <td><?= str_repeat("⭐", (int)$r['rating']) ?></td>
                <td><?= ucfirst($r['status']) ?></td>
                <td>
                    <?php if ($r['status'] === 'pending'): ?>
                        <a href="?approve=<?= $r['id'] ?>" class="btn btn-success btn-sm">Approve</a>
                        <a href="?reject=<?= $r['id'] ?>" class="btn btn-danger btn-sm">Reject</a>
                    <?php else: ?>
                        <span class="text-muted">Reviewed</span>
                    <?php endif ?>
                </td>
            </tr>
        <?php endwhile ?>
        </tbody>
    </table>
</body>
</html>
