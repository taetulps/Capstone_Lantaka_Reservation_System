<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rooms / Venue - Lantaka</title>
  <link rel="stylesheet" href="{{asset('css/employee_room_venue.css')}}">

  <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@200;300;400;500;600;700;800;900&family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <x-side_nav />
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <!-- Header -->
      <header class="header">
            <x-top_nav/>
        </header>

      <!-- Content Section -->
      <div class="content">
        <h1 class="page-title">Room / Venue</h1>

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
            <button class="btn btn-secondary" >Food Menu</button>
            <button class="btn btn-primary" id="add_room_venue_button">Add Room/Venue</button>
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

  <!-- Add Room Venue Modal -->
  
      <!-- Modal Content -->
      <x-add_room_venue/>
  </body>
</html>
