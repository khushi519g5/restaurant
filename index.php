<?php
// Enable error display during development
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
?>
<?php
require_once './php/db/connection.php';
$result = $conn->query("SELECT * FROM menu_items");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culinary Haven - Fine Dining Restaurant</title>
    <meta name="description" content="Experience extraordinary flavors in an elegant atmosphere at Culinary Haven. Book your table today for an unforgettable dining experience.">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🍽️</text></svg>" type="image/svg+xml">
    
    <style>
        /* Add padding so fixed navbar doesn't hide content */
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body>

<!-- Include your navigation header inside the body -->
<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section id="home" class="hero-section">
    <video autoplay muted loop class="hero-video">
        <source src="cooking.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="hero-overlay"></div>
    <div class="hero-content text-center text-white">
        <h1 class="hero-title" data-translate="welcome">Welcome to Culinary Haven</h1>
        <p class="hero-subtitle" data-translate="subtitle">Experience extraordinary flavors in an elegant atmosphere</p>
        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#reservationModal" data-translate="bookTable">Book a Table</button>
    </div>
</section>

<!-- [Your menu, gallery, reviews, etc. sections go here as is] -->
     <!-- Menu Section -->
    <section id="menu" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-translate="menu">Menu</h2>
            
            <!-- Filters -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="vegFilter">
                        <label class="form-check-label" for="vegFilter" data-translate="filterVeg">
                            Vegetarian Only
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="priceRange" class="form-label" data-translate="priceRange">Price Range: $0 - $60</label>
                    <input type="range" class="form-range" min="0" max="60" value="60" id="priceRange">
                </div>
                <div class="col-md-4">
                    <select class="form-select" id="sortBy">
                        <option value="name" data-translate="name">Name</option>
                        <option value="price" data-translate="price">Price</option>
                    </select>
                </div>
            </div>

            <!-- Menu Items -->
            <div class="row" id="menuItems">
                <!-- Menu items will be loaded here -->
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5" data-translate="gallery">Gallery</h2>
            <div class="row" id="galleryImages">
                <!-- Gallery images will be loaded here -->
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section id="reviews" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-translate="reviews">Reviews</h2>
            
            <!-- Write Review Form -->
            <div class="row mb-5">
                <div class="col-lg-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" data-translate="writeReview">Write a Review</h5>
                            <form id="reviewForm">
                                <div class="mb-3">
                                    <label for="reviewName" class="form-label" data-translate="yourName">Your Name</label>
                                    <input type="text" class="form-control" id="reviewName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="rating" class="form-label" data-translate="rating">Rating</label>
                                    <div class="star-rating">
                                        <i class="fas fa-star" data-rating="1"></i>
                                        <i class="fas fa-star" data-rating="2"></i>
                                        <i class="fas fa-star" data-rating="3"></i>
                                        <i class="fas fa-star" data-rating="4"></i>
                                        <i class="fas fa-star" data-rating="5"></i>
                                    </div>
                                    <input type="hidden" id="rating" name="rating" value="5">
                                </div>
                                <div class="mb-3">
                                    <label for="reviewComment" class="form-label" data-translate="yourReview">Your Review</label>
                                    <textarea class="form-control" id="reviewComment" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" data-translate="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Display -->
            <div id="reviewsList">
                <!-- Reviews will be loaded here -->
            </div>
        </div>
    </section>

    <!-- Chefs Section -->
    <section id="chefs" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5" data-translate="chefs">Our Chefs</h2>
            <div class="row" id="chefsTeam">
                <!-- Chefs will be loaded here -->
            </div>
        </div>
    </section>

<!-- Reservation Modal -->
<div class="modal fade" id="reservationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="php/reservation.php" method="POST" class="modal-content" id="reservationForm">
            <div class="modal-header">
                <h5 class="modal-title" data-translate="reservation">Make a Reservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="resName" class="form-label" data-translate="name">Name</label>
                    <input type="text" class="form-control" id="resName" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="resGuests" class="form-label" data-translate="guests">Guests</label>
                    <select class="form-select" id="resGuests" name="guests" required>
                        <option value="">Select guests</option>
                        <?php for ($i = 1; $i <= 8; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="resDate" class="form-label" data-translate="date">Date</label>
                    <input type="date" class="form-control" id="resDate" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="resTime" class="form-label" data-translate="time">Time</label>
                    <input type="time" class="form-control" id="resTime" name="time" required>
                </div>
                <div class="mb-3">
                    <label for="resPhone" class="form-label" data-translate="phone">Phone</label>
                    <input type="tel" class="form-control" id="resPhone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="resEmail" class="form-label" data-translate="email">Email</label>
                    <input type="email" class="form-control" id="resEmail" name="email" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary w-100" data-translate="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
