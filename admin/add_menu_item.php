<?php
session_start();
require_once '../php/db/connection.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $price = floatval($_POST['price']);
    $cuisine = trim($_POST['cuisine']);
    $isVeg = isset($_POST['is_veg']) ? 1 : 0;
    $image = trim($_POST['image']);

    if (!empty($name) && $price > 0 && !empty($cuisine)) {
       $stmt = $conn->prepare("INSERT INTO menu_items (name, price, cuisine, is_vegetarian, image_url) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdsis", $name, $price, $cuisine, $isVeg, $image);
        if ($stmt->execute()) {
            $success = "✅ Menu item added!";
        } else {
            $error = "❌ DB Error: " . $stmt->error;
        }
    } else {
        $error = "❌ Please fill in all required fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Menu Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h3>Add New Menu Item</h3>

    <?php if ($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
    <?php if ($success): ?><div class="alert alert-success"><?= $success ?></div><?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Dish Name</label>
            <input type="text" name="name" class="form-control" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Price (₹)</label>
            <input type="number" name="price" step="0.01" class="form-control" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Cuisine</label>
            <input type="text" name="cuisine" class="form-control" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control" />
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_veg" id="is_veg">
            <label class="form-check-label" for="is_veg">Vegetarian</label>
        </div>
        <button type="submit" class="btn btn-success">Add Item</button>
        <a href="admin_menu.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
