<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $data->display_name }} - Lantaka Portal</title>
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

      <div class="right-section">
        <div class="calendar-container">
          <div class="calendar-header">
            <h3>{{ now()->format('F Y') }}</h3>
            <div class="calendar-nav">
              <button class="calendar-btn prev">‹</button>
              <button class="calendar-btn next">›</button>
            </div>
          </div>

          <div class="calendar">
            <div class="calendar-weekdays">
              <div class="weekday">Mo</div><div class="weekday">Tu</div><div class="weekday">We</div>
              <div class="weekday">Th</div><div class="weekday">Fr</div><div class="weekday">Sa</div><div class="weekday">Su</div>
            </div>
            <div class="calendar-days">
              <div class="day">1</div><div class="day">2</div><div class="day">3</div><div class="day">4</div>
              <div class="day">5</div><div class="day">6</div><div class="day">7</div><div class="day">8</div>
              <div class="day">9</div><div class="day">10</div><div class="day">11</div><div class="day">12</div>
              <div class="day unavailable">13</div><div class="day">14</div><div class="day">15</div><div class="day">16</div>
              <div class="day">17</div><div class="day">18</div><div class="day selected">19</div><div class="day">20</div>
              <div class="day">21</div><div class="day">22</div><div class="day">23</div><div class="day">24</div>
              <div class="day">25</div><div class="day">26</div><div class="day">27</div><div class="day">28</div>
              <div class="day">29</div><div class="day">30</div>
            </div>
          </div>
        </div>

        <div class="booking-section">
          <form action="#" method="GET" class="booking-form"> 
              <label for="pax-input" class="pax-label">Number of Pax</label>
              <input type="number" id="pax-input" class="pax-input" 
                     placeholder="Enter No. of Pax" 
                     min="1" 
                     max="{{ $data->capacity }}">
              
              <button type="submit" class="proceed-button">PROCEED</button>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>
</html>