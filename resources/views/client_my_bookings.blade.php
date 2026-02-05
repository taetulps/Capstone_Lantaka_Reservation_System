<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Lantaka Reservation System</title>
    <link rel="stylesheet" href="{{asset('css/client_my_bookings.css')  }}">
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@200;300;400;500;600;700;800;900&family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    @vite('resources/js/my_booking.js')
</head>
<body>
    <!-- Header -->
    <x-header/>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Back Button -->
        <h1 class="page-title">My Bookings</h1>

        <div class="checkout-container">
            <!-- Left Section - Cart Items -->
            <section class="cart-items">
                <!-- Cart Item 1 -->
                <div class="cart-item">
                    <div class="item-image">
                        <img src="/images/checkout-20page-20-28booking-20cart-29-20-281-29.jpg" alt="Hall A">
                    </div>
                    <div class="item-details">
                        <div class="item-header">
                            <h3 class="item-name">Hall A</h3>
                            <p class="item-price">₱ 15,000</p>
                        </div>
                        <p class="item-type">Venue</p>
                        <p class="item-guests">👥 37 Guests</p>
                        <p class="item-dates">Check-in November 19, 2025 • Check-out November 19, 2025</p>
                        <div class="item-inclusion">
                            <p class="inclusion-label">✓ Food Inclusion</p>
                            <p class="inclusion-detail">Food Reservation ID 00032</p>
                            <p class="inclusion-amount">Food Total Amount ₱ 5,500.00</p>
                        </div>
                    </div>
                </div>

                <!-- Cart Item 2 -->
                <div class="cart-item">
                    <div class="item-image">
                        <img src="/images/checkout-20page-20-28booking-20cart-29-20-281-29.jpg" alt="Double Bed">
                    </div>
                    <div class="item-details">
                        <div class="item-header">
                            <h3 class="item-name">Double Bed</h3>
                            <p class="item-price">₱ 3,000</p>
                        </div>
                        <p class="item-type">Room</p>
                        <p class="item-guests">👥 2 Guests</p>
                        <p class="item-dates">Check-in November 19, 2025 • Check-out November 19, 2025</p>
                    </div>
                </div>
            </section>

            <!-- Right Section - Checkout Summary -->
            <aside class="checkout-summary">
                <h2 class="summary-title">Checkout Summary</h2>
                
                <div class="summary-items">
                    <div class="summary-item">
                        <span class="item-label">Hall A</span>
                        <span class="item-amount">₱ 15,000.00</span>
                    </div>
                    <div class="summary-item">
                        <span class="item-label">Food</span>
                        <span class="item-amount">₱ 5,500.00</span>
                    </div>
                </div>

                <div class="summary-divider"></div>

                <div class="total-section">
                    <span class="total-label">Total Payable</span>
                    <span class="total-amount">₱ 20,500.00</span>
                </div>

                <button class="confirm-btn">CONFIRM RESERVATION</button>
            </aside>
        </div>
    </main>
</body>
</html>
