<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TEST</title>
  <link rel="stylesheet" href="{{ asset('css/client_room_venue_viewing.css') }}">
  <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@700;800&family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>

  <x-header/>

  <main class="container">
    <div class="back-section">
      <a href="{{ route('client_room_venue') }}">
      <button class="back-button">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
          <path d="M15 10H5M5 10L10 15M5 10L10 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span>Back</span>
      </button>
      </a>
    </div>

    <div class="content-wrapper">
      

      <div class="right-section">
        
        <x-booking_calendar/>

        <div class="booking-section">
          <form action="#" method="GET" class="booking-form"> 
              <label for="pax-input" class="pax-label">Number of Pax</label>
              <input type="number" id="pax-input" class="pax-input" 
                     placeholder="Enter No. of Pax" 
                     min="1" 
                     max="5">
              
              <button type="submit" class="proceed-button">PROCEED</button>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>
</html>