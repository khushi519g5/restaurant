// Global variables
let currentLanguage = 'en';
let currentTheme = 'light';

// Sample data
const menuItems = [
    { id: 1, name: "Grilled Salmon", price: 28, isVeg: false, cuisine: "seafood", image: "https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=300&h=200&fit=crop" },
    { id: 2, name: "Mushroom Risotto", price: 22, isVeg: true, cuisine: "italian", image: "https://images.unsplash.com/photo-1476124369491-e7addf5db371?w=300&h=200&fit=crop" },
    { id: 3, name: "Beef Wellington", price: 45, isVeg: false, cuisine: "british", image: "https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=300&h=200&fit=crop" },
    { id: 4, name: "Quinoa Salad", price: 18, isVeg: true, cuisine: "healthy", image: "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=300&h=200&fit=crop" },
    { id: 6, name: "Truffle Pasta", price: 35, isVeg: true, cuisine: "italian", image: "https://bing.com/th?id=OSK.a9f536b2ba08c76af8d1c3c7f1468c21" },
    { id: 7, name: "Paneer Butter Masala", price: 18, isVeg: true, cuisine: "indian", image: "https://bing.com/th?id=OSK.36ef5c22ffde4107d3a85c5dd223627b" },
    { id: 8, name: "Chicken Biryani", price: 20, isVeg: false, cuisine: "indian", image: "https://bing.com/th?id=OSK.a77edaadad5e2d4a60ec0474583f451a" },
    { id: 9, name: "Margherita Pizza", price: 15, isVeg: true, cuisine: "italian", image: "https://laurenslatest.com/wp-content/uploads/2021/01/margherita-pizza-recipe-04.jpg" },
   { id: 10, name: "Beef Tacos", price: 17, isVeg: false, cuisine: "mexican", image: "https://littlesunnykitchen.com/wp-content/uploads/2021/01/Mexican-Shredded-Beef-17.jpg" },
   { id: 11, name: "Vegetable Sushi Roll", price: 14, isVeg: true, cuisine: "japanese", image: "https://www.justonecookbook.com/wp-content/uploads/2023/05/Vegetarian-Sushi-Rolls-9725-IV-1024x1536.jpg" },
   { id: 12, name: "Butter Chicken", price: 22, isVeg: false, cuisine: "indian", image: "https://www.cookingclassy.com/wp-content/uploads/2021/01/butter-chicken-4.jpg" },
   { id: 13, name: "Greek Salad", price: 12, isVeg: true, cuisine: "mediterranean", image: "https://cdn.loveandlemons.com/wp-content/uploads/2021/04/green-salad.jpg" },
   { id: 14, name: "BBQ Ribs", price: 26, isVeg: false, cuisine: "american", image: "https://youcancookit.fr/wp-content/uploads/2022/07/Ribs-au-barbecue-recette.jpg" },
   { id: 15, name: "Falafel Wrap", price: 16, isVeg: true, cuisine: "middle eastern", image: "https://tse2.mm.bing.net/th/id/OIP.QXzcAsz1Azro3ZfdgowbzAHaEK?rs=1&pid=ImgDetMain&o=7&rm=3" },
   { id: 16, name: "Shrimp Alfredo Pasta", price: 24, isVeg: false, cuisine: "italian", image: "https://i.pinimg.com/originals/93/51/f2/9351f23f4e9e5e657f07a6e67daf8b02.jpg" }   
];

const galleryImages = [
    "https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=400&h=300&fit=crop",
    "https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=400&h=300&fit=crop",
    "https://images.unsplash.com/photo-1466978913421-dad2ebd01d17?w=400&h=300&fit=crop",
    "https://images.unsplash.com/photo-1559339352-11d035aa65de?w=400&h=300&fit=crop",
    "https://images.unsplash.com/photo-1571997478779-2adcbbe9ab2f?w=400&h=300&fit=crop",
    "https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=400&h=300&fit=crop"
];

const chefs = [
    { name: "Marco Rodriguez", specialty: "Head Chef", bio: "20+ years of culinary excellence", image: "https://media.istockphoto.com/id/465400717/photo/professional-chef.jpg?s=612x612&w=0&k=20&c=qWV0EUoUQtppBtnSinPbjxfdwziXyUUTRtY2rgnSUGw=" },
    { name: "Elena Thompson", specialty: "Pastry Chef", bio: "Award-winning dessert specialist", image: "https://cdn9.dissolve.com/p/D2115_277_493/D2115_277_493_1200.jpg" },
    { name: "James Mitchell", specialty: "Sous Chef", bio: "Expert in modern cuisine", image: "https://images.unsplash.com/photo-1582750433449-648ed127bb54?w=200&h=200&fit=crop" }
];

const translations = {
    en: {
        welcome: "Welcome to Culinary Haven",
        subtitle: "Experience extraordinary flavors in an elegant atmosphere",
        bookTable: "Book a Table",
        menu: "Menu",
        gallery: "Gallery",
        reviews: "Reviews",
        contact: "Contact",
        home: "Home",
        chefs: "Our Chefs",
        todaysSpecial: "Today's Special - 20% Off All Seafood!",
        filterVeg: "Vegetarian Only",
        priceRange: "Price Range",
        name: "Name",
        price: "Price",
        reservation: "Make a Reservation",
        guests: "Number of Guests",
        date: "Date",
        time: "Time",
        phone: "Phone",
        email: "Email",
        message: "Message",
        submit: "Submit",
        rating: "Rating",
        writeReview: "Write a Review",
        yourName: "Your Name",
        yourReview: "Your Review",
        footerDesc: "Experience extraordinary flavors in an elegant atmosphere. Your culinary journey begins here.",
        quickLinks: "Quick Links",
        contactInfo: "Contact Info",
        copyright: "© 2024 Culinary Haven. All rights reserved."
    },
    es: {
        welcome: "Bienvenido a Culinary Haven",
        subtitle: "Experimenta sabores extraordinarios en un ambiente elegante",
        bookTable: "Reservar Mesa",
        menu: "Menú",
        gallery: "Galería",
        reviews: "Reseñas",
        contact: "Contacto",
        home: "Inicio",
        chefs: "Nuestros Chefs",
        todaysSpecial: "¡Especial de Hoy - 20% de Descuento en Mariscos!",
        filterVeg: "Solo Vegetariano",
        priceRange: "Rango de Precio",
        name: "Nombre",
        price: "Precio",
        reservation: "Hacer una Reserva",
        guests: "Número de Invitados",
        date: "Fecha",
        time: "Hora",
        phone: "Teléfono",
        email: "Correo",
        message: "Mensaje",
        submit: "Enviar",
        rating: "Calificación",
        writeReview: "Escribir Reseña",
        yourName: "Tu Nombre",
        yourReview: "Tu Reseña",
        footerDesc: "Experimenta sabores extraordinarios en un ambiente elegante. Tu viaje culinario comienza aquí.",
        quickLinks: "Enlaces Rápidos",
        contactInfo: "Información de Contacto",
        copyright: "© 2024 Culinary Haven. Todos los derechos reservados."
    }
};
document.addEventListener('DOMContentLoaded', function () {
    loadPreferences();
    initializeMenu();
    initializeGallery();
    initializeChefs();
    initializeReviews();
    initializeForms();
    initializeFilters();
    setMinReservationDate();
    setupNavbarScroll();
    setupSmoothScroll();
    setupThemeToggle();

    setTimeout(() => {
        const offerModal = new bootstrap.Modal(document.getElementById('specialOfferModal'));
        offerModal.show();
    }, 2000);
});

function loadPreferences() {
    setTheme(localStorage.getItem('theme') || 'light');
    setLanguage(localStorage.getItem('language') || 'en');
}

function setTheme(theme) {
    currentTheme = theme;
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
    const themeIcon = document.querySelector('#themeToggle i');
    if (themeIcon) {
        themeIcon.className = theme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
    }
}

function toggleTheme() {
    setTheme(currentTheme === 'light' ? 'dark' : 'light');
}

function setupThemeToggle() {
    const toggleBtn = document.getElementById('themeToggle');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', toggleTheme);
    }
}

function setLanguage(lang) {
    currentLanguage = lang;
    localStorage.setItem('language', lang);
    document.querySelectorAll('[data-translate]').forEach(el => {
        const key = el.getAttribute('data-translate');
        if (translations[lang] && translations[lang][key]) {
            el.textContent = translations[lang][key];
        }
    });
}

function changeLanguage(lang) {
    setLanguage(lang);
}

function setupSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
}

function setupNavbarScroll() {
    window.addEventListener('scroll', () => {
        const navbar = document.querySelector('.navbar');
        if (navbar) {
            navbar.style.background = window.scrollY > 100 ? 'rgba(0,0,0,0.95)' : 'rgba(0,0,0,0.9)';
        }
    });
}

// Menu
function initializeMenu() {
    displayMenu(menuItems);
}

function displayMenu(items) {
    const container = document.getElementById('menuItems');
    container.innerHTML = '';
    items.forEach(item => container.appendChild(createMenuCard(item)));
}

function createMenuCard(item) {
    const col = document.createElement('div');
    col.className = 'col-lg-4 col-md-6 mb-4';
    col.innerHTML = `
        <div class="card menu-item-card h-100">
            <div class="position-relative">
                <img src="${item.image}" class="card-img-top menu-item-image" alt="${item.name}">
                <span class="price-badge">$${item.price}</span>
                <span class="veg-badge ${item.isVeg ? 'veg' : 'non-veg'}">${item.isVeg ? '●' : '▲'}</span>
            </div>
            <div class="card-body">
                <h5 class="card-title">${item.name}</h5>
                <p class="card-text text-muted">${item.cuisine}</p>
            </div>
        </div>`;
    return col;
}

// Gallery
function initializeGallery() {
    const container = document.getElementById('galleryImages');
    galleryImages.forEach(image => {
        const col = document.createElement('div');
        col.className = 'col-lg-4 col-md-6 mb-4';
        col.innerHTML = `
            <div class="gallery-item" onclick="openImageModal('${image}')">
                <img src="${image}" alt="Gallery Image">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus text-white fa-2x"></i>
                </div>
            </div>`;
        container.appendChild(col);
    });
}

function openImageModal(imageSrc) {
    const modal = document.createElement('div');
    modal.className = 'modal fade';
    modal.innerHTML = `
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body p-0"><img src="${imageSrc}" class="img-fluid w-100" alt="Gallery Image"></div>
            </div>
        </div>`;
    document.body.appendChild(modal);
    const bsModal = new bootstrap.Modal(modal);
    bsModal.show();
    modal.addEventListener('hidden.bs.modal', () => document.body.removeChild(modal));
}

// Chefs
function initializeChefs() {
    const container = document.getElementById('chefsTeam');
    chefs.forEach(chef => {
        const col = document.createElement('div');
        col.className = 'col-lg-4 col-md-6 mb-4';
        col.innerHTML = `
            <div class="card chef-card">
                <div class="card-body">
                    <img src="${chef.image}" class="chef-image" alt="${chef.name}">
                    <h5 class="card-title">${chef.name}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">${chef.specialty}</h6>
                    <p class="card-text">${chef.bio}</p>
                </div>
            </div>`;
        container.appendChild(col);
    });
}

// Reviews
function initializeReviews() {
    loadReviews();
    initializeStarRating();
}

function loadReviews() {
    const sampleReviews = [
        { name: "Sarah Johnson", rating: 5, comment: "Absolutely amazing food and service!", date: "2024-01-15" },
        { name: "Mike Chen", rating: 4, comment: "Great atmosphere and delicious meals", date: "2024-01-10" },
        { name: "Emma Wilson", rating: 5, comment: "Best restaurant in town!", date: "2024-01-08" }
    ];
    displayReviews(sampleReviews);
}

function displayReviews(reviews) {
    const container = document.getElementById('reviewsList');
    container.innerHTML = '';
    reviews.forEach(review => container.appendChild(createReviewCard(review)));
}

function createReviewCard({ name, rating, comment, date }) {
    const stars = '★'.repeat(rating) + '☆'.repeat(5 - rating);
    const card = document.createElement('div');
    card.className = 'col-lg-6 mb-4';
    card.innerHTML = `
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h6 class="card-title mb-0">${name}</h6>
                    <small class="text-muted">${date}</small>
                </div>
                <div class="text-warning mb-2">${stars}</div>
                <p class="card-text">${comment}</p>
            </div>
        </div>`;
    return card;
}

function initializeStarRating() {
    const stars = document.querySelectorAll('.star-rating i');
    stars.forEach((star, i) => {
        star.addEventListener('click', () => {
            document.getElementById('rating').value = i + 1;
            updateStarDisplay(i + 1);
        });
        star.addEventListener('mouseover', () => updateStarDisplay(i + 1));
    });
    document.querySelector('.star-rating').addEventListener('mouseleave', () => {
        updateStarDisplay(document.getElementById('rating').value);
    });
}

function updateStarDisplay(rating) {
    const stars = document.querySelectorAll('.star-rating i');
    stars.forEach((star, index) => {
        star.classList.toggle('active', index < rating);
    });
}

// Forms
function initializeForms() {
    const resForm = document.getElementById('reservationForm');
    const contactForm = document.getElementById('contactForm');
    const reviewForm = document.getElementById('reviewForm');

    if (resForm) resForm.addEventListener('submit', handleReservation);
    if (contactForm) contactForm.addEventListener('submit', handleContact);
    if (reviewForm) reviewForm.addEventListener('submit', handleReview);
}

function handleReservation(e) {
    e.preventDefault();
    const form = e.target;
    const data = {
        name: form.resName.value,
        guests: form.resGuests.value,
        date: form.resDate.value,
        time: form.resTime.value,
        phone: form.resPhone.value,
        email: form.resEmail.value
    };

    fetch('php/reservation.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(result => {
        showAlert(result.success ? 'success' : 'danger', result.message || 'Reservation failed.');
        if (result.success) {
            form.reset();
            bootstrap.Modal.getInstance(document.getElementById('reservationModal')).hide();
        }
    })
    .catch(() => showAlert('danger', 'Reservation failed. Please try again later.'));
}

function handleContact(e) {
    e.preventDefault();
    const form = e.target;
    const data = {
        name: form.contactName.value,
        email: form.contactEmail.value,
        message: form.contactMessage.value
    };

    fetch('php/contact.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(result => {
        showAlert(result.success ? 'success' : 'danger', result.message || 'Message failed.');
        if (result.success) form.reset();
    })
    .catch(() => showAlert('danger', 'Message failed. Please try again later.'));
}

function handleReview(e) {
    e.preventDefault();
    const form = e.target;
    const data = {
        name: form.reviewName.value,
        rating: form.rating.value,
        comment: form.reviewComment.value
    };

    fetch('php/review.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(result => {
        showAlert(result.success ? 'success' : 'danger', result.message || 'Review failed.');
        if (result.success) {
            form.reset();
            updateStarDisplay(5);
            loadReviews();
        }
    })
    .catch(() => showAlert('danger', 'Review failed. Please try again later.'));
}

// Filters
function initializeFilters() {
    document.getElementById('vegFilter').addEventListener('change', applyFilters);
    document.getElementById('priceRange').addEventListener('input', applyFilters);
    document.getElementById('sortBy').addEventListener('change', applyFilters);
    document.getElementById('priceRange').addEventListener('input', function () {
        const value = this.value;
        document.querySelector('label[for="priceRange"]').textContent = `${translations[currentLanguage].priceRange}: $0 - $${value}`;
    });
}

function applyFilters() {
    const vegOnly = document.getElementById('vegFilter').checked;
    const maxPrice = parseInt(document.getElementById('priceRange').value);
    const sortBy = document.getElementById('sortBy').value;

    let filtered = menuItems.filter(item => (!vegOnly || item.isVeg) && item.price <= maxPrice);
    filtered.sort((a, b) => sortBy === 'price' ? a.price - b.price : a.name.localeCompare(b.name));
    displayMenu(filtered);
}

function showAlert(type, message) {
    const alert = document.createElement('div');
    alert.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    alert.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    alert.innerHTML = `${message}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>`;
    document.body.appendChild(alert);
    setTimeout(() => alert.remove(), 5000);
}

function setMinReservationDate() {
    const input = document.getElementById('resDate');
    if (input) input.min = new Date().toISOString().split('T')[0];
}


// ✅ Reservation form handler
document.addEventListener("DOMContentLoaded", function () {
    const reservationForm = document.getElementById("reservationForm");
    if (reservationForm) {
        reservationForm.addEventListener("submit", async function (e) {
            e.preventDefault();

            const formData = {
                name: document.getElementById("name").value,
                guests: document.getElementById("guests").value,
                date: document.getElementById("date").value,
                time: document.getElementById("time").value,
                phone: document.getElementById("phone").value,
                email: document.getElementById("email").value,
            };

            try {
                const response = await fetch("php/reservation.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();
                alert(result.message);
                if (result.success) reservationForm.reset();
            } catch (error) {
                alert("Something went wrong. Please try again.");
                console.error(error);
            }
        });
    }
});
