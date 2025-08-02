
<?php
session_start();
require_once '../php/db/connection.php';
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM menu_items WHERE id = $id");
}

$menuItems = $conn->query("SELECT * FROM menu_items ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h3>Manage Menu Items</h3>
    <a href="add_menu_item.php" class="btn btn-primary mb-3">+ Add New Item</a>
    <table class="table table-bordered">
        <thead>
            <tr><th>Name</th><th>Price</th><th>Cuisine</th><th>Actions</th></tr>
        </thead>
        <tbody>
        <?php while ($item = $menuItems->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td>₹<?= number_format($item['price'], 2) ?></td>
                <td><?= htmlspecialchars($item['cuisine']) ?></td>
                <td>
                    <a href="edit_menu_item.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?delete=<?= $item['id'] ?>" onclick="return confirm('Delete this item?')" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        <?php endwhile ?>
        </tbody>
    </table>
</body>
</html>
