@extends('layouts.client')
    <title>Checkout - Lantaka Reservation System</title>
    <link rel="stylesheet" href="{{ asset('css/client_my_bookings.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@200;300;400;500;600;700;800;900&family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    @vite('resources/js/my_booking.js')


@section('content')
        <div>
            <h1 class="page-title">Checkout</h1>
    
        </div>
            
        <div class="checkout-container">

            <section class="cart-items">
                @forelse($processedItems as $item)
                <div class="cart-item" 
                        data-name="{{ $item['name'] }}"
                        data-total="{{ $item['base_total'] }}"
                        data-base="{{ $item['price'] }}"
                        data-id="{{ $item['id'] }}"
                        data-type="{{ $item['type'] }}"
                        data-in="{{ $item['check_in_raw'] }}"
                        data-out="{{ $item['check_out_raw'] }}"
                        data-pax="{{ $item['pax'] }}"
                        data-food='@json($item['selected_foods'] ?? [])'
                        data-food-selections='@json($item['food_selections'] ?? [])'
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
                                @if($item['type'] == 'room')
                                <small>({{ $item['days'] ?? 0 }} Night{{ ($item['days'] ?? 0) > 1 ? 's' : '' }})</small>
                                @endif
                            </p>
                            @if(
                                    $item['type'] === 'venue' &&
                                    !empty($item['food_selections']) &&
                                    isset($item['selected_foods']) &&
                                    $item['selected_foods']->isNotEmpty()
                                )
                                <div class="item-food-list" style="margin-top: 10px;
                                                                    width: 50vw;
                                                                    overflow-x: scroll; ">
                                    <strong style="display:block; margin-bottom:8px; color:#333;">Selected Foods by Date:</strong>

                                    <table style="width:100%; border-collapse: collapse; font-size: 0.85em;">
                                        <thead>
                                            <tr style="background:#f5f5f5;">
                                                @foreach($item['food_selections'] as $date => $meals)
                                                    <th style="border:1px solid #ddd; padding:8px; text-align:left;">
                                                        {{ \Carbon\Carbon::parse($date)->format('M d, Y') }}
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $foodsByDate = [];

                                                foreach ($item['food_selections'] as $date => $meals) {
                                                    $foodsByDate[$date] = [];

                                                    foreach ($meals as $mealType => $foodIds) {
                                                        if (!is_array($foodIds) || empty($foodIds)) {
                                                            continue;
                                                        }

                                                        $matchedFoods = $item['selected_foods']->whereIn('food_id', $foodIds);

                                                        foreach ($matchedFoods as $food) {
                                                            $foodsByDate[$date][] = $food->food_name;
                                                        }
                                                    }
                                                }

                                                $maxRows = 0;
                                                foreach ($foodsByDate as $dateFoods) {
                                                    $maxRows = max($maxRows, count($dateFoods));
                                                }
                                            @endphp

                                            @for($row = 0; $row < $maxRows; $row++)
                                                <tr>
                                                    @foreach($foodsByDate as $date => $dateFoods)
                                                        <td style="border:1px solid #ddd; padding:8px; vertical-align:top;">
                                                            {{ $dateFoods[$row] ?? '—' }}
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="empty-tray-container" style="text-align: center; padding: 50px; background: #f9f9f9; border-radius: 15px; border: 2px dashed #ddd;">
                        <div style="font-size: 50px; margin-bottom: 10px;">🛒</div>
                        <h3 style="color: #555; font-family: 'Alexandria', sans-serif;">Empty</h3>
                        <p style="color: #6e5757; font-family: 'Arsenal', sans-serif;">You haven't selected any accommodations yet.</p>
                        <a href="{{ route('client.room_venue') }}" style="display: inline-block; margin-top: 15px; padding: 10px 20px; background: #333; color: white; text-decoration: none; border-radius: 5px;">
                            Find a Room or Venue
                        </a>
                    </div>
                @endforelse
            </section>

            <aside class="checkout-summary">
                <h2 class="summary-title">Checkout Summary</h2>
                <div id="empty-msg" style="padding: 20px; text-align: center; color: #888;">
                    Click on an item to see the summary.
                </div>

                <div id="summary-details" style="display: none;">
                <form action="{{ route('reservation.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="selected_items" id="selected-items-input">

                    <div class="summary-items" id="summary-items"></div>
                    <div id="summary-foods" style="margin-top: 10px; border-top: 1px dashed #ddd; padding-top: 10px;"></div>

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
    
@endsection