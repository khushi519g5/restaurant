
<?php
session_start();
require_once '../php/db/connection.php';
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['action'], $_GET['id'])) {
    $id = (int)$_GET['id'];
    $action = $_GET['action'] === 'confirm' ? 'confirmed' : 'cancelled';
    $stmt = $conn->prepare("UPDATE reservations SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $action, $id);
    $stmt->execute();
}

$reservations = $conn->query("SELECT * FROM reservations ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Reservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h3>Manage Reservations</h3>
    <table class="table table-bordered">
        <thead>
            <tr><th>Name</th><th>Date</th><th>Time</th><th>Guests</th><th>Status</th><th>Actions</th></tr>
        </thead>
        <tbody>
            <?php while ($row = $reservations->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= $row['date'] ?></td>
                    <td><?= $row['time'] ?></td>
                    <td><?= $row['guests'] ?></td>
                    <td><span class="badge bg-<?= $row['status'] === 'confirmed' ? 'success' : ($row['status'] === 'pending' ? 'warning' : 'danger') ?>">
                        <?= ucfirst($row['status']) ?></span></td>
                    <td>
                        <?php if ($row['status'] === 'pending'): ?>
                            <a href="?action=confirm&id=<?= $row['id'] ?>" class="btn btn-sm btn-success">Confirm</a>
                            <a href="?action=cancel&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">Cancel</a>
                        <?php else: ?>
                            <span class="text-muted">No action</span>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</body>
</html>