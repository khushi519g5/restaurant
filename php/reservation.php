<?php
require_once 'db/connection.php';

// Set header for JSON response
header('Content-Type: application/json');

// Allow only POST method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

// Get raw JSON input
$input = json_decode(file_get_contents("php://input"), true);

// Extract values
$name   = trim($input['name'] ?? '');
$guests = trim($input['guests'] ?? '');
$date   = trim($input['date'] ?? '');
$time   = trim($input['time'] ?? '');
$phone  = trim($input['phone'] ?? '');
$email  = trim($input['email'] ?? '');

// Validate fields
if (!$name || !$guests || !$date || !$time || !$phone || !$email) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
    exit;
}

// Optional: Check if the time slot is already fully booked
$checkQuery = "SELECT COUNT(*) as count FROM reservations WHERE reservation_date = ? AND reservation_time = ?";
$checkStmt = $conn->prepare($checkQuery);
$checkStmt->bind_param("ss", $date, $time);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();
$row = $checkResult->fetch_assoc();

if ($row['count'] >= 3) {
    echo json_encode(['success' => false, 'message' => 'This time slot is fully booked.']);
    $checkStmt->close();
    $conn->close();
    exit;
}
$checkStmt->close();

// Insert the reservation
$insertQuery = "INSERT INTO reservations (name, guests, reservation_date, reservation_time, phone, email) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("sissss", $name, $guests, $date, $time, $phone, $email);

if ($stmt->execute()) {
    //sendConfirmationEmail($email, htmlspecialchars($name), $date, $time, $guests);
    echo json_encode(['success' => true, 'message' => 'Reservation successful!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $stmt->error]);
}

$stmt->close();
$conn->close();

// Function to send confirmation email
// function sendConfirmationEmail($email, $name, $date, $time, $guests) {
//     $subject = "Reservation Confirmation - Culinary Haven";
//     $message = "
//     <html>
//     <head><title>Reservation Confirmation</title></head>
//     <body>
//         <h2>Reservation Confirmed</h2>
//         <p>Dear {$name},</p>
//         <p>Thank you for your reservation at <strong>Culinary Haven</strong>!</p>
//         <p><strong>Date:</strong> {$date}<br>
//            <strong>Time:</strong> {$time}<br>
//            <strong>Guests:</strong> {$guests}</p>
//         <p>We look forward to serving you!</p>
//         <br><p style='color:gray;'>This is an automated message. Please do not reply.</p>
//     </body>
//     </html>";

//     $headers  = "MIME-Version: 1.0\r\n";
//     $headers .= "Content-type:text/html;charset=UTF-8\r\n";
//     $headers .= "From: Culinary Haven <noreply@culinaryhaven.com>\r\n";

//     mail($email, $subject, $message, $headers);
// }
// ?>
