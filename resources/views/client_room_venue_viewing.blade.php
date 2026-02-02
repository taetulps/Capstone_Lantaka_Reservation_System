<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Room Viewing - Lantaka Portal</title>
  <link rel="stylesheet" href="{{ asset('css/client_room_venue_viewing.css') }}">
  <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@700;800&family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Header -->
  <header class="header">
        <div class="header-container">

            <a href="{{ asset('/') }}">
              <div class="logo-section">
                  <img src="{{ asset('images/adzu_logo.png') }}" class="logo">
                  <div class="header-text">
                      <p class="subtitle-text">Ateneo de Zamboanga University</p>
                      <h1 class="header-title">Lantaka Room and Venue Reservation Portal</h1>
                      <h1 class="tagline"> &lt;Lantaka Online Room & Venue Reservation System/&gt; </h1>
                  </div>
              </div>
            </a>
            <nav class="nav">
                <a href="{{ route(name: 'client_room_venue') }}" class="nav-link active">Accommodation</a>
                <a href="{{ route('login') }}" class="nav-link">Login</a></nav>
        </div>
    </header>

  <!-- Main Content -->
  <main class="container">
    <!-- Back Button -->
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
      <!-- Left Section - Images and Details -->
      <div class="left-section">
        <!-- Main Image -->
        <div class="main-image-container">
          <img src="/images/room-20viewing-20-282-29.jpg" alt="Hall A Venue" class="main-image">
        </div>

        <!-- Thumbnail Gallery -->
        <div class="thumbnail-gallery">
          <div class="thumbnail active"></div>
          <div class="thumbnail"></div>
          <div class="thumbnail"></div>
          <div class="thumbnail"></div>
          <div class="thumbnail"></div>
        </div>

        <!-- Venue Details -->
        <div class="venue-details">
          <h2 class="venue-name">Hall A</h2>
          <p class="venue-type">Venue</p>
          
          <div class="venue-specs">
            <div class="spec-item">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z" stroke="currentColor" stroke-width="2"/>
              </svg>
              <div>
                <p class="spec-label">Max Guests</p>
                <p class="spec-value">50</p>
              </div>
            </div>
            <div class="spec-item">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M3 3h18v18H3z" stroke="currentColor" stroke-width="2"/>
              </svg>
              <div>
                <p class="spec-label">Area</p>
                <p class="spec-value">300 sqm</p>
              </div>
            </div>
          </div>

          <p class="price">₱ 15,000<span>/night</span></p>

          <p class="venue-description">
            Hall A is a versatile and spacious venue within the Lantaka Campus designed to accommodate a wide range of gatherings from retreats and seminars to conferences and banquets. The elegantly furnished space, complemented by natural lighting and a peaceful view of the campus grounds, provides an ideal environment for reflection, collaboration, and learning.
          </p>
        </div>
      </div>

      <!-- Right Section - Calendar and Booking -->
      <div class="right-section">
        <!-- Calendar -->
        <div class="calendar-container">
          <div class="calendar-header">
            <h3>November 2025</h3>
            <div class="calendar-nav">
              <button class="calendar-btn prev">‹</button>
              <button class="calendar-btn next">›</button>
            </div>
          </div>

          <div class="calendar">
            <div class="calendar-weekdays">
              <div class="weekday">Mo</div>
              <div class="weekday">Tu</div>
              <div class="weekday">We</div>
              <div class="weekday">Th</div>
              <div class="weekday">Fr</div>
              <div class="weekday">Sa</div>
              <div class="weekday">Su</div>
            </div>

            <div class="calendar-days">
              <div class="day">1</div>
              <div class="day">2</div>
              <div class="day">3</div>
              <div class="day">4</div>
              <div class="day">5</div>
              <div class="day">6</div>
              <div class="day">7</div>
              <div class="day">8</div>
              <div class="day">9</div>
              <div class="day">10</div>
              <div class="day">11</div>
              <div class="day">12</div>
              <div class="day unavailable">16</div>
              <div class="day">17</div>
              <div class="day">18</div>
              <div class="day selected">19</div>
              <div class="day">20</div>
              <div class="day">21</div>
              <div class="day">22</div>
              <div class="day">23</div>
              <div class="day">24</div>
              <div class="day unavailable">25</div>
              <div class="day">26</div>
              <div class="day">27</div>
              <div class="day">28</div>
              <div class="day">29</div>
              <div class="day">30</div>
              <div class="day inactive">1</div>
              <div class="day inactive">2</div>
              <div class="day inactive">3</div>
              <div class="day inactive">4</div>
            </div>
          </div>
        </div>

        <!-- Booking Controls -->
        <div class="booking-section">
          <label for="pax-input" class="pax-label">Number of Pax</label>
          <input type="number" id="pax-input" class="pax-input" placeholder="Enter No. of Pax" min="1" max="50">
          <button class="proceed-button">PROCEED</button>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
