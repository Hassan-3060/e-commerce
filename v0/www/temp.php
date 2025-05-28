<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopMaster - Votre boutique en ligne</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #667eea;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #667eea;
        }

        .nav-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 0.5rem 1rem;
            border: 1px solid #ddd;
            border-radius: 25px;
            width: 250px;
            outline: none;
        }

        .cart-icon, .user-icon {
            position: relative;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            background: #667eea;
            color: white;
            transition: transform 0.3s;
        }

        .cart-icon:hover, .user-icon:hover {
            transform: scale(1.1);
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #e74c3c;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Main Content */
        main {
            background: rgba(255, 255, 255, 0.9);
            margin: 20px auto;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            text-align: center;
            padding: 4rem 2rem;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease-out;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        .cta-button {
            background: white;
            color: #667eea;
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            animation: fadeInUp 1s ease-out 0.6s both;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        /* Categories */
        .categories {
            padding: 3rem 2rem;
        }

        .categories h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: #333;
            font-size: 2rem;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .category-card {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .category-card:hover {
            transform: translateY(-5px);
        }

        .category-card h3 {
            margin-bottom: 0.5rem;
        }

        /* Products */
        .products {
            padding: 0 2rem 3rem;
        }

        .products h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: #333;
            font-size: 2rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, #f0f2f5, #e1e8ed);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #999;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-info h4 {
            margin-bottom: 0.5rem;
            color: #333;
        }

        .product-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 1rem;
        }

        .add-to-cart {
            width: 100%;
            background: #667eea;
            color: white;
            border: none;
            padding: 0.8rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }

        .add-to-cart:hover {
            background: #5a67d8;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 2rem;
            border-radius: 15px;
            width: 90%;
            max-width: 500px;
            position: relative;
            animation: slideIn 0.3s ease-out;
        }

        .close {
            position: absolute;
            right: 1rem;
            top: 1rem;
            font-size: 2rem;
            cursor: pointer;
            color: #999;
        }

        .close:hover {
            color: #333;
        }

        /* Cart Styles */
        .cart-items {
            margin: 1rem 0;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background: #f8f9fa;
            margin-bottom: 0.5rem;
            border-radius: 8px;
        }

        .cart-total {
            font-size: 1.2rem;
            font-weight: bold;
            text-align: right;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 2px solid #667eea;
        }

        /* Footer */
        footer {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            text-align: center;
            padding: 2rem;
            margin-top: 2rem;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .search-box input {
                width: 150px;
            }
        }
    </style>
</head>
<body>
<!-- Header -->
<header>
    <nav class="container">
        <a href="#" class="logo">🛍️ ShopMaster</a>
        <ul class="nav-links">
            <li><a href="#home">Accueil</a></li>
            <li><a href="#categories">Catégories</a></li>
            <li><a href="#products">Produits</a></li>
            <li><a href="#about">À propos</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="nav-actions">
            <div class="search-box">
                <input type="text" placeholder="Rechercher des produits..." id="searchInput">
            </div>
            <div class="cart-icon" onclick="openCart()">
                🛒
                <span class="cart-count" id="cartCount">0</span>
            </div>
            <div class="user-icon" onclick="openUserPanel()">
                👤
            </div>
        </div>
    </nav>
</header>

<!-- Main Content -->
<main class="container">
    <!-- Hero Section -->
    <section class="hero" id="home">
        <h1>Bienvenue sur ShopMaster</h1>
        <p>Découvrez notre sélection de produits de qualité à des prix imbattables</p>
        <button class="cta-button" onclick="scrollToProducts()">Découvrir nos produits</button>
    </section>

    <!-- Categories -->
    <section class="categories" id="categories">
        <h2>Nos Catégories</h2>
        <div class="category-grid">
            <div class="category-card" onclick="filterProducts('electronique')">
                <h3>📱 Électronique</h3>
                <p>Smartphones, ordinateurs, accessoires</p>
            </div>
            <div class="category-card" onclick="filterProducts('mode')">
                <h3>👗 Mode</h3>
                <p>Vêtements, chaussures, accessoires</p>
            </div>
            <div class="category-card" onclick="filterProducts('maison')">
                <h3>🏠 Maison</h3>
                <p>Décoration, mobilier, équipements</p>
            </div>
            <div class="category-card" onclick="filterProducts('sport')">
                <h3>⚽ Sport</h3>
                <p>Équipements sportifs, vêtements</p>
            </div>
        </div>
    </section>

    <!-- Products -->
    <section class="products" id="products">
        <h2>Nos Produits</h2>
        <div class="product-grid" id="productGrid">
            <!-- Products will be dynamically inserted here -->
        </div>
    </section>
</main>

<!-- Footer -->
<footer>
    <div class="container">
        <p>&copy; 2025 ShopMaster. Tous droits réservés.</p>
        <p>Service client: contact@shopmaster.fr | 📞 01 23 45 67 89</p>
    </div>
</footer>

<!-- Cart Modal -->
<div id="cartModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeCart()">&times;</span>
        <h2>🛒 Mon Panier</h2>
        <div id="cartItems" class="cart-items">
            <!-- Cart items will be inserted here -->
        </div>
        <div class="cart-total" id="cartTotal">
            Total: 0€
        </div>
        <button class="cta-button" style="width: 100%; margin-top: 1rem;" onclick="checkout()">
            Procéder au paiement
        </button>
    </div>
</div>

<!-- User Panel Modal -->
<div id="userModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeUserPanel()">&times;</span>
        <h2>👤 Mon Compte</h2>
        <div style="text-align: center; padding: 2rem;">
            <button class="cta-button" style="margin: 0.5rem;" onclick="login()">Se connecter</button>
            <button class="cta-button" style="margin: 0.5rem;" onclick="register()">S'inscrire</button>
            <div style="margin-top: 1rem;">
                <p>Mes commandes</p>
                <p>Mes favoris</p>
                <p>Paramètres du compte</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Sample product data
    const products = [
        {id: 1, name: "iPhone 15 Pro", price: 1199, category: "electronique", image: "📱"},
        {id: 2, name: "MacBook Air M3", price: 1299, category: "electronique", image: "💻"},
        {id: 3, name: "Casque AirPods", price: 179, category: "electronique", image: "🎧"},
        {id: 4, name: "Robe d'été", price: 89, category: "mode", image: "👗"},
        {id: 5, name: "Sneakers Nike", price: 129, category: "mode", image: "👟"},
        {id: 6, name: "Sac à main", price: 199, category: "mode", image: "👜"},
        {id: 7, name: "Canapé moderne", price: 899, category: "maison", image: "🛋️"},
        {id: 8, name: "Lampe design", price: 159, category: "maison", image: "💡"},
        {id: 9, name: "Tapis berbère", price: 299, category: "maison", image: "🪴"},
        {id: 10, name: "Vélo électrique", price: 1599, category: "sport", image: "🚴"},
        {id: 11, name: "Tapis de yoga", price: 49, category: "sport", image: "🧘"},
        {id: 12, name: "Haltères", price: 99, category: "sport", image: "🏋️"}
    ];

    let cart = [];
    let currentCategory = 'all';

    // Initialize the page
    function init() {
        displayProducts(products);
        updateCartCount();
    }

    // Display products
    function displayProducts(productsToShow) {
        const productGrid = document.getElementById('productGrid');
        productGrid.innerHTML = '';

        productsToShow.forEach(product => {
            const productCard = document.createElement('div');
            productCard.className = 'product-card';
            productCard.innerHTML = `
                    <div class="product-image">${product.image}</div>
                    <div class="product-info">
                        <h4>${product.name}</h4>
                        <div class="product-price">${product.price}€</div>
                        <button class="add-to-cart" onclick="addToCart(${product.id})">
                            Ajouter au panier
                        </button>
                    </div>
                `;
            productGrid.appendChild(productCard);
        });
    }

    // Add to cart
    function addToCart(productId) {
        const product = products.find(p => p.id === productId);
        const existingItem = cart.find(item => item.id === productId);

        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({...product, quantity: 1});
        }

        updateCartCount();
        showNotification(`${product.name} ajouté au panier!`);
    }

    // Update cart count
    function updateCartCount() {
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        document.getElementById('cartCount').textContent = totalItems;
    }

    // Filter products by category
    function filterProducts(category) {
        currentCategory = category;
        const filteredProducts = category === 'all'
            ? products
            : products.filter(p => p.category === category);
        displayProducts(filteredProducts);
    }

    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const filteredProducts = products.filter(p =>
            p.name.toLowerCase().includes(searchTerm)
        );
        displayProducts(filteredProducts);
    });

    // Cart modal functions
    function openCart() {
        const modal = document.getElementById('cartModal');
        const cartItems = document.getElementById('cartItems');
        const cartTotal = document.getElementById('cartTotal');

        cartItems.innerHTML = '';
        let total = 0;

        if (cart.length === 0) {
            cartItems.innerHTML = '<p style="text-align: center;">Votre panier est vide</p>';
        } else {
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;

                const cartItem = document.createElement('div');
                cartItem.className = 'cart-item';
                cartItem.innerHTML = `
                        <div>
                            <strong>${item.name}</strong><br>
                            ${item.price}€ x ${item.quantity}
                        </div>
                        <div>
                            <button onclick="removeFromCart(${item.id})" style="background: #e74c3c; color: white; border: none; padding: 0.5rem; border-radius: 5px; cursor: pointer;">
                                Supprimer
                            </button>
                        </div>
                    `;
                cartItems.appendChild(cartItem);
            });
        }

        cartTotal.textContent = `Total: ${total}€`;
        modal.style.display = 'block';
    }

    function closeCart() {
        document.getElementById('cartModal').style.display = 'none';
    }

    function removeFromCart(productId) {
        cart = cart.filter(item => item.id !== productId);
        updateCartCount();
        openCart(); // Refresh cart display
    }

    // User panel functions
    function openUserPanel() {
        document.getElementById('userModal').style.display = 'block';
    }

    function closeUserPanel() {
        document.getElementById('userModal').style.display = 'none';
    }

    function login() {
        alert('Fonctionnalité de connexion - À implémenter avec votre backend');
        closeUserPanel();
    }

    function register() {
        alert('Fonctionnalité d\'inscription - À implémenter avec votre backend');
        closeUserPanel();
    }

    // Checkout function
    function checkout() {
        if (cart.length === 0) {
            alert('Votre panier est vide!');
            return;
        }
        alert('Redirection vers le paiement - À implémenter avec votre système de paiement');
        cart = [];
        updateCartCount();
        closeCart();
    }

    // Utility functions
    function scrollToProducts() {
        document.getElementById('products').scrollIntoView({behavior: 'smooth'});
    }

    function showNotification(message) {
        // Create notification
        const notification = document.createElement('div');
        notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: #28a745;
                color: white;
                padding: 1rem;
                border-radius: 8px;
                z-index: 3000;
                animation: slideIn 0.3s ease-out;
            `;
        notification.textContent = message;
        document.body.appendChild(notification);

        // Remove after 3 seconds
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    // Close modals when clicking outside
    window.addEventListener('click', function(event) {
        const cartModal = document.getElementById('cartModal');
        const userModal = document.getElementById('userModal');

        if (event.target === cartModal) {
            closeCart();
        }
        if (event.target === userModal) {
            closeUserPanel();
        }
    });

    // Initialize the application
    init();
</script>
</body>
</html>
