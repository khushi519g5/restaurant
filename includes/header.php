<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#home">
            <i class="fas fa-utensils me-2"></i>
            Culinary Haven
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home" data-translate="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu" data-translate="menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallery" data-translate="gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#reviews" data-translate="reviews">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#chefs" data-translate="chefs">Chefs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact" data-translate="contact">Contact</a>
                </li>
            </ul>
            
            <div class="navbar-nav">
                <!-- Language Selector -->
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-globe"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('en')">English</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('es')">Español</a></li>
                    </ul>
                </div>
                
                <!-- Dark/Light Mode Toggle -->
                <div class="nav-item">
                    <button class="btn btn-link nav-link" onclick="toggleTheme()" id="themeToggle">
                        <i class="fas fa-moon"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
