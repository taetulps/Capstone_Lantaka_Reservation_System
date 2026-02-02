<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Now - Lantaka Room and Venue Reservation Portal</title>
  <link rel="stylesheet" href="{{asset('css/client_room_venue.css')}}">
  <link rel="stylesheet" href="{{asset('css/nav.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@700;800&family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Header -->
  <header class="header">
        <div class="header-container">

            <div class="logo-section">
                <img src="{{ asset('images/adzu_logo.png') }}" class="logo">
                <div class="header-text">
                    <p class="subtitle-text">Ateneo de Zamboanga University</p>
                    <h1 class="header-title">Lantaka Room and Venue Reservation Portal</h1>
                    <h1 class="tagline"> &lt;Lantaka Online Room & Venue Reservation System/&gt; </h1>
                </div>
            </div>
            
            <nav class="nav">
                <a href="{{ route(name: 'client_room_venue') }}" class="nav-link active">Accommodation</a>
                <a href="{{ route('login') }}" class="nav-link">Login</a></nav>
        </div>
    </header>

  <!-- Main Content -->
  <main class="main">
    <!-- Hero Section -->
    <section class="hero">
      <h2 class="hero-title">Purposeful spaces.</h2>
      <p class="hero-subtitle">Where Faith, Fellowship, and Formation Come Together.</p>
    </section>

    <!-- Filters Section -->
    <section class="filters-section">
      <div class="filter-tabs">
        <button class="tab-btn active">All</button>
        <button class="tab-btn">Rooms</button>
        <button class="tab-btn">Venue</button>
      </div>

      <div class="filter-dropdowns">
        <select class="dropdown">
          <option>Capacity</option>
          <option>2 Guests</option>
          <option>4 Guests</option>
          <option>50+ Guests</option>
        </select>
        <select class="dropdown">
          <option>Availability</option>
          <option>Available Now</option>
          <option>Coming Soon</option>
        </select>
      </div>
    </section>

    <!-- Accommodation Cards -->
    <section class="accommodations">
      <!-- Single Bed Room -->
       <a  href="{{ route('client_room_venue_viewing') }}">
      <div class="card">
        <div class="card-image">
          <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=500&h=300&fit=crop" alt="Single Bed Room">
        </div>
        <div class="card-content">
          <p class="card-type">Room</p>
          <h3 class="card-title">Single Bed</h3>
          <div class="card-details">
            <span class="detail-item">👤 2 Guests</span>
            <span class="detail-item">🛏️ 1 Bed</span>
          </div>
        </div>
      </div>
      </a>

      <!-- Double Bed Room -->
      <div class="card">
        <div class="card-image">
          <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=500&h=300&fit=crop" alt="Double Bed Room">
        </div>
        <div class="card-content">
          <p class="card-type">Room</p>
          <h3 class="card-title">Double Bed</h3>
          <div class="card-details">
            <span class="detail-item">👤 4 Guests</span>
            <span class="detail-item">🛏️ 2 Bed</span>
          </div>
        </div>
      </div>

      <!-- Matrimonial Room -->
      <div class="card">
        <div class="card-image">
          <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=500&h=300&fit=crop" alt="Matrimonial Room">
        </div>
        <div class="card-content">
          <p class="card-type">Room</p>
          <h3 class="card-title">Matrimonial</h3>
          <div class="card-details">
            <span class="detail-item">👤 2 Guests</span>
            <span class="detail-item">🛏️ 1 Bed</span>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-image">
          <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=500&h=300&fit=crop" alt="Matrimonial Room">
        </div>
        <div class="card-content">
          <p class="card-type">Room</p>
          <h3 class="card-title">Matrimonial</h3>
          <div class="card-details">
            <span class="detail-item">👤 2 Guests</span>
            <span class="detail-item">🛏️ 1 Bed</span>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-image">
          <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=500&h=300&fit=crop" alt="Matrimonial Room">
        </div>
        <div class="card-content">
          <p class="card-type">Room</p>
          <h3 class="card-title">Matrimonial</h3>
          <div class="card-details">
            <span class="detail-item">👤 2 Guests</span>
            <span class="detail-item">🛏️ 1 Bed</span>
          </div>
        </div>
      </div>

      <!-- Hall A Venue -->
      <div class="card">
        <div class="card-image">
          <img src="https://images.unsplash.com/photo-1519671482677-1346aadc2e73?w=500&h=300&fit=crop" alt="Hall A Venue">
        </div>
        <div class="card-content">
          <p class="card-type">Venue</p>
          <h3 class="card-title">Hall A</h3>
          <div class="card-details">
            <span class="detail-item">👤 50 Guests</span>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>
</html>
