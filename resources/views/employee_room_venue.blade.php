<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rooms / Venue - Lantaka</title>
  <link rel="stylesheet" href="{{asset('css/employee_room_venue.css')}}">
  <link rel="stylesheet" href="{{asset('css/employee_side_nav.css')}}">
  <link rel="stylesheet" href="{{asset('css/employee_top_nav.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@200;300;400;500;600;700;800;900&family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
  <aside class="sidebar">
        <div class="logo">
            <div class="logo-icon">
              <img src="{{ asset('images/adzu_logo.png') }}" class="logo-image">
            </div>
            <div class="logo-text">
                <div class="logo-subtitle">Ateneo de Zamboanga University</div>
                <div class="logo-title">Lantaka Room and Venue Reservation System
                </div>
            </div>
        </div>
        
        <nav class="nav-menu">
            <a href="{{route('employee_dashboard')}}" class="nav-item">
                <span class="icon">📈</span>
                <span>Dashboard</span>
            </a>
            <a href="{{route('employee_reservations')}}" class="nav-item">
                <span class="icon">📅</span>
                <span>Reservation</span>
            </a>
            <a href="#" class="nav-item">
                <span class="icon">👥</span>
                <span>Guest</span>
            </a>
            <a href="{{route('employee_accounts')}}" class="nav-item">
                <span class="icon">👤</span>
                <span>Accounts</span>
            </a>
            <a href="{{route('employee_room_venue')}}" class="nav-item active">
                <span class="icon">🏛️</span>
                <span>Rooms / Venue</span>
            </a>
            <a href="#" class="nav-item">
                <span class="icon">📋</span>
                <span>Event Logs</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <!-- Header -->
      <header class="header">
            <div class="header-left">
                <button class="menu-toggle">☰</button>
            </div>
            <div class="header-right">
                <button class="icon-btn">🔔</button>
                <div class="user-profile">
                    <div class="user-avatar">👤</div>
                    <div class="user-info">
                        <div class="user-greeting">Welcome, Jane !</div>
                        <div class="user-role">Administrator</div>
                    </div>
                </div>
            </div>
        </header>

      <!-- Content Section -->
      <div class="content">
        <h1 class="page-title">Rooms/Venues</h1>

        <!-- Top Controls -->
        <div class="controls-section">
          <div class="search-bar">
            <input type="text" placeholder="Search" class="search-input">
            <span class="search-icon">🔍</span>
          </div>

          <div class="filters-actions">
            <select class="status-filter">
              <option>Status</option>
              <option>Available</option>
              <option>Occupied</option>
              <option>Unavailable</option>
            </select>
          </div>
          <div class="button-section">
            <button class="btn btn-secondary">Food Menu</button>
            <button class="btn btn-primary">Add Room/Venue</button>
          </div>
        </div>

        <div class="room-venue-divider">

          <!-- Div Content for both Rooms and Venues -->
          <div class="room-venue-content">
            
            <!-- Rooms Section -->
            <section class="rooms-section">
              <h2 class="section-title">Room</h2>
              <div class="rooms-grid">
                <div class="room-card active">Room 101</div>
                <div class="room-card">Room 106</div>
                <div class="room-card">Room 102</div>
                <div class="room-card">Room 107</div>
                <div class="room-card">Room 103</div>
                <div class="room-card">Room 108</div>
                <div class="room-card">Room 104</div>
                <div class="room-card">Room 105</div>
              </div>
            </section>

            <!-- Venues Section -->
            <section class="venues-section">
              <h2 class="section-title">Venue</h2>
              <div class="venue-grid">
                  <div class="venue-card active">Capiz Hall</div>
                  <div class="venue-card unavailable">Hall A</div>
                  <div class="venue-card occupied">Hall B</div>
                </div>
            </section>
          </div> 
          <section class="description-show">
            
          </section>
          </div>
      </div>
    </main>
  </div>
</body>
</html>
