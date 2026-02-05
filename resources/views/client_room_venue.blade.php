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
                <a href="{{ route('client_room_venue') }}" class="nav-link active">Accommodation</a>
                <a href="{{ route('login') }}" class="nav-link">Login</a></nav>
        </div>
    </header>

  <main class="main">
    
    <section class="hero">
      <h2 class="hero-title">Purposeful spaces.</h2>
      <p class="hero-subtitle">Where Faith, Fellowship, and Formation Come Together.</p>
    </section>

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

    <section class="accommodations">
      
        @if(isset($all_accommodations) && $all_accommodations->isNotEmpty())
            
            @foreach($all_accommodations as $item)
            <a href="{{ route('client.show', ['category' => $item->category, 'id' => $item->id]) }}" 
            class="book-btn">
            <div class="accommodations-grid">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/adzu_logo.png') }}" 
                             alt="{{ $item->display_name }}">
                    </div>

                    <div class="card-content">
                        <div>
                            <p class="card-type">{{ $item->category }}</p>
                            <h3 class="card-title">{{ $item->display_name }}</h3>
                            
                            <div class="card-details">
                                <span class="detail-item">👤 {{ $item->capacity }} Guests</span>
                                <span class="detail-item">₱ {{ number_format($item->external_price, 2) }}</span>
                            </div>
                        </div>

                       
                           
                        
                    </div>
                </div>
                </div>
                @endforeach
                </a>
        @else
            <p style="grid-column: 1 / -1; text-align: center;">No rooms or venues found.</p>
        @endif
        
      
    </section>

  </main>
</body>
</html>