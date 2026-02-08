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
                @foreach($processedItems as $item)
                    <div class="cart-item" 
                    onclick="selectItem(
                        '{{ $item['name'] }}', 
                        '{{ $item['total'] }}', 
                        '{{ $item['id'] }}', 
                        '{{ $item['type'] }}', 
                        '{{ $item['check_in_raw'] }}', 
                        '{{ $item['check_out_raw'] }}', 
                        '{{ $item['pax'] }}'
                    )" 
                    style="cursor: pointer; margin-bottom: 15px;"> 
                      
                        <div class="item-image">                    
                            <img src="{{ $item['img'] ? asset('storage/' . $item['img']) : asset('images/adzu_logo.png') }}" alt="Item">
                        </div>
                        <div class="item-details">
                            <div class="item-header">
                                <h3 class="item-name">{{ $item['name'] }}</h3>
                                <p class="item-price">₱ {{ number_format($item['price'], 2) }}</p>
                            </div>
                            <p class="item-type">{{ ucfirst($item['type']) }}</p>
                            <p class="item-guests">👥 {{ $item['pax'] }} Guests</p>
                            <p class="item-dates">
                                {{ $item['check_in'] }} • {{ $item['check_out'] }}
                                <br>
                                <small>({{ $item['days'] }} Nights)</small>
                            </p>
                        </div>
                    </div>
                @endforeach
            </section>

            <aside class="checkout-summary">
                <h2 class="summary-title">Checkout Summary</h2>
                <div id="empty-msg" style="padding: 20px; text-align: center; color: #888;">
                    Click on an item to see the summary.
                </div>

                <div id="summary-details" style="display: none;">
                    <form action="{{ route('reservation.store') }}" method="POST">
                        @csrf
                        {{-- These are the "hidden boxes" that the JS fills up --}}
                        <input type="hidden" name="id" id="form-id">
                        <input type="hidden" name="type" id="form-type">
                        <input type="hidden" name="check_in" id="form-check-in">
                        <input type="hidden" name="check_out" id="form-check-out">
                        <input type="hidden" name="pax" id="form-pax">
                        <input type="hidden" name="total_amount" id="form-total-amount">

                        <div class="summary-items">
                            <div class="summary-item">
                                <span class="item-label" id="summary-name"></span>
                                <span class="item-amount" id="summary-total"></span>
                            </div>
                        </div>
                        <div class="summary-divider"></div>
                        <div class="total-section">
                            <span class="total-label">Total Payable</span>
                            <span class="total-amount" id="summary-grand-total"></span>
                        </div>
                        <button type="submit" class="confirm-btn">CONFIRM RESERVATION</button>
                    </form>
                </div>
            </aside>
        </div>
    </main>
    <script>
    function selectItem(name, total, id, type, checkIn, checkOut, pax) {
        // 1. Show the summary div
        document.getElementById('empty-msg').style.display = 'none';
        document.getElementById('summary-details').style.display = 'block';

        // 2. Update the Text Labels for the user to see
        document.getElementById('summary-name').innerText = name;
        let formattedTotal = '₱ ' + parseFloat(total).toLocaleString(undefined, {minimumFractionDigits: 2});
        document.getElementById('summary-total').innerText = formattedTotal;
        document.getElementById('summary-grand-total').innerText = formattedTotal;

        // 3. FILL THE HIDDEN INPUTS (This fixes the SQL error)
        document.getElementById('form-id').value = id;
        document.getElementById('form-type').value = type;
        document.getElementById('form-check-in').value = checkIn;
        document.getElementById('form-check-out').value = checkOut;
        document.getElementById('form-pax').value = pax;
        document.getElementById('form-total-amount').value = total;
    }
    </script>
</body>
</html>