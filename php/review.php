
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: Content-Type');

require_once 'db/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    $name = $input['name'] ?? '';
    $rating = $input['rating'] ?? '';
    $comment = $input['comment'] ?? '';
    
    // Validate input
    if (empty($name) || empty($rating) || empty($comment)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
        exit;
    }
    
    // Validate rating
    if ($rating < 1 || $rating > 5) {
        echo json_encode(['success' => false, 'message' => 'Rating must be between 1 and 5']);
        exit;
    }
    
    // Insert review
    $query = "INSERT INTO reviews (name, rating, comment, status, created_at) VALUES (?, ?, ?, 'pending', NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sis", $name, $rating, $comment);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Review submitted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error submitting review']);
    }
    
    $stmt->close();
    $conn->close();
    
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get approved reviews
    $query = "SELECT name, rating, comment, DATE(created_at) as date FROM reviews WHERE status = 'approved' ORDER BY created_at DESC LIMIT 20";
    $result = $conn->query($query);
    
    $reviews = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }
    }
    
    echo json_encode(['success' => true, 'reviews' => $reviews]);
    $conn->close();
    
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>