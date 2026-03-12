@extends('layouts.client')

<link rel="stylesheet" href="{{ asset('css/client_food_options.css') }}">
@vite('resources/js/client_food_option.js')

@section('content')
<main class="main-content">
    <form action="{{ route('checkout') }}" method="GET" id="foodReservationForm">
        <input type="hidden" name="accommodation_id" value="{{ $bookingData['accommodation_id'] }}">
        <input type="hidden" name="res_name" value="{{ $bookingData['res_name'] }}">
        <input type="hidden" name="type" value="{{ $bookingData['type'] }}">
        <input type="hidden" name="check_in" value="{{ $bookingData['check_in'] }}">
        <input type="hidden" name="check_out" value="{{ $bookingData['check_out'] }}">
        <input type="hidden" name="pax" id="paxValue" value="{{ $bookingData['pax'] ?? 1 }}">

        <div class="back-section">
            <button type="button" class="back-btn" onclick="window.history.back();">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M15 10H5M5 10L10 15M5 10L10 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Back</span>
            </button>
        </div>

        @php
            $startDate = \Carbon\Carbon::parse($bookingData['check_in']);
            $endDate = \Carbon\Carbon::parse($bookingData['check_out']);
            $period = \Carbon\CarbonPeriod::create($startDate, $endDate);
        @endphp

        @foreach ($period as $venueDates)
            @php $dateKey = $venueDates->format('Y-m-d'); @endphp

            <div class="reservation-card" data-date="{{ $dateKey }}">
                <div class="card-header">
                    <div style="display: flex; flex-direction: column; gap: 2px; align-items:start;">
                        <h2>Venue - {{ $bookingData['res_name'] }}</h2>
                        <span>Food Reservations for {{ $venueDates->format('F d, Y') }}</span>
                    </div>

                    <div class="food-toggle-section">
                        <div class="toggle-label">Include Food</div>
                        <div class="toggle-buttons">
                            <button type="button" class="toggle-btn" data-toggle="no">No</button>
                            <button type="button" class="toggle-btn active" data-toggle="yes">Yes</button>
                        </div>
                    </div>
                </div>

                {{-- hidden flag if this date includes food --}}
                <input type="hidden" name="food_enabled[{{ $dateKey }}]" value="1" class="food-enabled-input">

                <div class="meals-container">

                    {{-- BREAKFAST --}}
                    <div class="meal-section">
                        <div class="meal-header">
                            <span class="meal-name">Breakfast</span>
                            <span class="toggle-status">No</span>
                        </div>
                        <div class="food-items">
                            @if(isset($foods['breakfast']) && $foods['breakfast']->count() > 0)
                                @foreach($foods['breakfast'] as $food)
                                    <label class="food-item" style="cursor: pointer;">
                                        <input
                                            type="checkbox"
                                            name="food_selections[{{ $dateKey }}][breakfast][]"
                                            value="{{ $food->food_id }}"
                                            data-price="{{ $food->food_price }}"
                                            class="food-checkbox"
                                            style="display:none;"
                                        >
                                        <div class="food-name">{{ $food->food_name }}</div>
                                        <div class="food-price">₱ {{ number_format($food->food_price, 2) }}</div>
                                    </label>
                                @endforeach
                            @else
                                <p>No breakfast items available.</p>
                            @endif
                        </div>
                    </div>

                    {{-- SNACK --}}
                    <div class="meal-section">
                        <div class="meal-header">
                            <span class="meal-name">Snack</span>
                            <span class="toggle-status">No</span>
                        </div>
                        <div class="food-items">
                            @if(isset($foods['snack']) && $foods['snack']->count() > 0)
                                @foreach($foods['snack'] as $food)
                                    <label class="food-item" style="cursor: pointer;">
                                        <input
                                            type="checkbox"
                                            name="food_selections[{{ $dateKey }}][snack][]"
                                            value="{{ $food->food_id }}"
                                            data-price="{{ $food->food_price }}"
                                            class="food-checkbox"
                                            style="display:none;"
                                        >
                                        <div class="food-name">{{ $food->food_name }}</div>
                                        <div class="food-price">₱ {{ number_format($food->food_price, 2) }}</div>
                                    </label>
                                @endforeach
                            @else
                                <p>No snack items available.</p>
                            @endif
                        </div>
                    </div>

                    {{-- LUNCH --}}
                    <div class="meal-section">
                        <div class="meal-header">
                            <span class="meal-name">Lunch</span>
                            <span class="toggle-status">No</span>
                        </div>
                        <div class="food-items">
                            @if(isset($foods['lunch']) && $foods['lunch']->count() > 0)
                                @foreach($foods['lunch'] as $food)
                                    <label class="food-item" style="cursor: pointer;">
                                        <input
                                            type="checkbox"
                                            name="food_selections[{{ $dateKey }}][lunch][]"
                                            value="{{ $food->food_id }}"
                                            data-price="{{ $food->food_price }}"
                                            class="food-checkbox"
                                            style="display:none;"
                                        >
                                        <div class="food-name">{{ $food->food_name }}</div>
                                        <div class="food-price">₱ {{ number_format($food->food_price, 2) }}</div>
                                    </label>
                                @endforeach
                            @else
                                <p>No lunch items available.</p>
                            @endif
                        </div>
                    </div>

                    {{-- DINNER --}}
                    <div class="meal-section">
                        <div class="meal-header">
                            <span class="meal-name">Dinner</span>
                            <span class="toggle-status">No</span>
                        </div>
                        <div class="food-items">
                            @if(isset($foods['dinner']) && $foods['dinner']->count() > 0)
                                @foreach($foods['dinner'] as $food)
                                    <label class="food-item" style="cursor: pointer;">
                                        <input
                                            type="checkbox"
                                            name="food_selections[{{ $dateKey }}][dinner][]"
                                            value="{{ $food->food_id }}"
                                            data-price="{{ $food->food_price }}"
                                            class="food-checkbox"
                                            style="display:none;"
                                        >
                                        <div class="food-name">{{ $food->food_name }}</div>
                                        <div class="food-price">₱ {{ number_format($food->food_price, 2) }}</div>
                                    </label>
                                @endforeach
                            @else
                                <p>No dinner items available.</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

        <div class="action-section">
            <div class="total-section">
                <span class="total-label">Total: </span>
                <span class="total-amount" id="displayTotalPrice">₱ 0.00</span>
                 <span class="total-label">/pax</span>

            </div>
            <button type="submit" class="add-to-cart-btn">ADD TO BOOKING CART</button>
        </div>
    </form>
</main>
@endsection