@extends('layouts.employee')
  <title>{{ $data->display_name }} - Lantaka Portal</title>
  <link rel="stylesheet" href="{{ asset('css/client_room_venue_viewing.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@700;800&family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  
@section('content')
<div class="content">
    <h1 class="page-title">Create Reservation for: <strong>{{ $client->name }}</strong></h1>

    <div class="content-wrapper">
      <div class="left-section">
        <div class="main-image-container">
           <img src="{{ $data->image ? asset('storage/' . $data->image) : asset('images/adzu_logo.png') }}" 
                alt="{{ $data->display_name }}" 
                class="main-image">
        </div>

        <div class="thumbnail-gallery">
          <div class="thumbnail active"></div>
          <div class="thumbnail"></div>
          <div class="thumbnail"></div>
          <div class="thumbnail"></div>
          <div class="thumbnail"></div>
        </div>

        <div class="venue-details">
          <h2 class="venue-name">{{ $data->display_name }}</h2>
          <p class="venue-type">{{ $category }}</p>
          
          <div class="venue-specs">
            <div class="spec-item">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z" stroke="currentColor" stroke-width="2"/>
              </svg>
              <div>
                <p class="spec-label">Max Guests</p>
                <p class="spec-value">{{ $data->capacity }}</p>
              </div>
            </div>
            <div class="spec-item">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
              </svg>
              <div>
                <p class="spec-label">Status</p>
                <p class="spec-value" style="color: {{ $data->status === 'Available' ? 'green' : 'red' }}">
                    {{ $data->status }}
                </p>
              </div>
            </div>
          </div>

          <p class="price">₱ {{ number_format($data->external_price, 2) }}<span>/use</span></p>

          <p class="venue-description">
            {{ $data->description ?? 'No description provided for this accommodation.' }}
          </p>
        </div>
      </div>
{{--
          <h3>Select Dates</h3>
          <input type="text" id="calendar-input" placeholder="Check-in  →  Check-out" 
                 style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; margin-top: 10px;">
          --}}
      <div class="right-section">
        <div class="calendar-container">
          <x-booking_calendar :occupiedDates="json_encode($occupiedDates)" />

        </div> 
        <div class="booking-section">

        @if ($errors->any())
        <div style="background:#ffd6d6;padding:10px;border-radius:6px;margin-bottom:10px;">
            <strong>Validation Errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('employee.reservations.prepare') }}" method="POST" class="booking-form" id="bookingForm">
        @csrf

          <input type="hidden" name="user_id" value="{{ $client->id }}">
          <input type="hidden" name="accommodation_id" value="{{ $data->id }}">
          <input type="hidden" name="type" value="{{ strtolower($category) }}">
          <input type="hidden" name="check_in" id="check_in">
          <input type="hidden" name="check_out" id="check_out">

          <label for="pax-input" class="pax-label">Number of Pax</label>
          <input
              type="number"
              name="pax"
              id="pax-input"
              class="pax-input"
              placeholder="Enter No. of Pax"
              min="1"
              max="{{ $data->capacity }}"
              required
          >

          <button type="submit" class="proceed-button">PROCEED</button>
            
        </form>
        </div>
        <a href="{{ route('employee.create_food_reservation') }}">test</a>
      </div>
    </div>  
</div>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {

    const bookingForm = document.getElementById('bookingForm');
    if (!bookingForm) return;

    bookingForm.addEventListener('submit', function (e) {

        const calendarCheckIn = document.getElementById('checkinDate');
        const calendarCheckOut = document.getElementById('checkoutDate');

        const hiddenCheckIn = document.getElementById('check_in');
        const hiddenCheckOut = document.getElementById('check_out');

        // Only fill values if calendar exists
        if (calendarCheckIn && calendarCheckOut) {
            hiddenCheckIn.value = calendarCheckIn.value;
            hiddenCheckOut.value = calendarCheckOut.value;
        }

        // Validate after assignment
        if (!hiddenCheckIn.value || !hiddenCheckOut.value) {
            e.preventDefault();
            alert('Please select both a check-in and check-out date.');
            return;
        }

    });

});
</script>
