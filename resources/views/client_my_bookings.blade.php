<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Lantaka Reservation System</title>
    <link rel="stylesheet" href="{{ asset('css/client_my_bookings.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@200;300;400;500;600;700;800;900&family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    @vite('resources/js/my_booking.js')
</head>
<body>
    <x-header/>

    <main class="main-content">
        <div style="margin-bottom: 20px;">
             <a href="javascript:history.back()" style="text-decoration: none; color: #333; font-weight: bold;">
                ← Back
            </a>
        </div>
        
        <h1 class="page-title">Checkout</h1>

        <div class="checkout-container">
            <section class="cart-items">
                
                <div class="cart-item">
                    <div class="item-image">                    
                        <img src="{{ (isset($img) && $img) ? asset('storage/' . $img) : asset('images/adzu_logo.png') }}" 
                             alt="{{ $name ?? 'Item' }}">
                    </div>
                    <div class="item-details">
                        <div class="item-header">
                            <h3 class="item-name">{{ $name ?? 'Unknown Item' }}</h3>
                            <p class="item-price">
                                ₱ {{ number_format($price ?? 0, 2) }}
                            </p>
                        </div>
                        <p class="item-type">{{ ucfirst($type ?? 'Accommodation') }}</p>
                                       
                        <p class="item-guests">👥 {{ request('pax', 1) }} Guests</p>
                        
                        <p class="item-dates">
                            Check-in {{ isset($checkIn) ? $checkIn->format('F d, Y') : 'N/A' }} • 
                            Check-out {{ isset($checkOut) ? $checkOut->format('F d, Y') : 'N/A' }}
                            <br>
                            <small>({{ $days ?? 1 }} Night{{ ($days ?? 1) > 1 ? 's' : '' }})</small>
                        </p>
                    </div>
                </div>

            </section>

            <aside class="checkout-summary">
                <h2 class="summary-title">Checkout Summary</h2>
                
                <form action="{{ route('reservation.store') }}" method="POST">
                    @csrf
                    
                    <input type="hidden" name="type" value="{{ $type ?? 'room' }}">
                                   
                    <input type="hidden" name="id" value="{{ $data->id ?? $data->Room_ID ?? $data->Venue_ID ?? 0 }}">                    
                    
                    <input type="hidden" name="check_in" value="{{ request('check_in') }}">
                    <input type="hidden" name="check_out" value="{{ request('check_out') }}">
                    <input type="hidden" name="pax" value="{{ request('pax', 1) }}">
                    <input type="hidden" name="total_amount" value="{{ $totalPrice ?? 0 }}">

                    <div class="summary-items">
                        <div class="summary-item">
                            <span class="item-label">{{ $name ?? 'Item' }} (x{{ $days ?? 1 }} nights)</span>
                            <span class="item-amount">₱ {{ number_format($totalPrice ?? 0, 2) }}</span>
                        </div>
                    </div>

                    <div class="summary-divider"></div>

                    <div class="total-section">
                        <span class="total-label">Total Payable</span>
                        <span class="total-amount">₱ {{ number_format($totalPrice ?? 0, 2) }}</span>
                    </div>

                    <button type="submit" class="confirm-btn">CONFIRM RESERVATION</button>
                </form>
            </aside>
        </div>
    </main>
</body>
</html>