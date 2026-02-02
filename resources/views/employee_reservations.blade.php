<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation - Lantaka System</title>
  <link rel="stylesheet" href="{{ asset('css/employee_reservations.css') }}">
  <link rel="stylesheet" href="{{ asset('css/employee_side_nav.css') }}">
  <link rel="stylesheet" href="{{ asset('css/employee_top_nav.css') }}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@200;300;400;500;600;700;800;900&family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>

<!-- Sidebar -->
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
            <a href="{{route('employee_reservations')}}" class="nav-item active">
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
            <a href="{{route('employee_room_venue')}}" class="nav-item">
                <span class="icon">🏛️</span>
                <span>Rooms / Venue</span>
            </a>
            <a href="#" class="nav-item">
                <span class="icon">📋</span>
                <span>Event Logs</span>
            </a>
        </nav>
    </aside>

    <div class="container">

    <!-- Main Content -->
    <main class="main-content">
      <!-- Top Header -->
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

      <!-- Page Content -->
      <div class="page-content">
        <h1 class="page-title">Reservation</h1>

        <!-- Search Bar -->
        <div class="search-container">
          <input type="text" class="search-input" placeholder="Search">
          <span class="search-icon">🔍</span>
        </div>

        <!-- Status Cards -->
        <div class="status-cards">
          <div class="status-card pending">
            <div class="status-label">Pending</div>
            <div class="status-number">3</div>
          </div>
          <div class="status-card confirmed">
            <div class="status-label">Confirmed</div>
            <div class="status-number">5</div>
          </div>
          <div class="status-card completed">
            <div class="status-label">Completed</div>
            <div class="status-number">29</div>
          </div>
          <div class="status-card cancelled">
            <div class="status-label">Cancelled</div>
            <div class="status-number">9</div>
          </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
          <div class="filter-group">
            <select class="filter-select">
              <option>Date </option>
              <option>Last week </option>
              <option>Last month </option>
              <option>Last year </option>
            </select>
          </div>
          <div class="filter-group">
            <select class="filter-select">
              <option>Client Type ▼</option>
            </select>
          </div>
          <div class="filter-group">
            <select class="filter-select">
              <option>Accommodation Type ▼</option>
            </select>
          </div>
        </div>

        <!-- Table -->
        <div class="table-wrapper">
          <table class="reservation-table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Client Type</th>
                <th>Accommodation</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>No. of Pax</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="name-cell">
                  <span class="user-icon">👤</span>
                  <span>Jane Doe</span>
                </td>
                <td>External</td>
                <td>Room (Single Bed)</td>
                <td>9/25/2025</td>
                <td>9/26/2025</td>
                <td>1</td>
                <td><span class="badge pending-badge">Pending</span></td>
                <td class="action-cell">
                  <button class="expand-btn">⤢</button>
                </td>
              </tr>
              <tr>
                <td class="name-cell">
                  <span class="user-icon">👤</span>
                  <span>Jack Sparrow</span>
                </td>
                <td>External</td>
                <td>Room (Double Bed)</td>
                <td>9/27/2025</td>
                <td>9/29/2025</td>
                <td>3</td>
                <td><span class="badge pending-badge">Pending</span></td>
                <td class="action-cell">
                  <button class="expand-btn">⤢</button>
                </td>
              </tr>
              <tr>
                <td class="name-cell">
                  <span class="user-icon">👤</span>
                  <span>Nilo Kow</span>
                </td>
                <td>External</td>
                <td>Room (Matrimonial)</td>
                <td>9/27/2025</td>
                <td>9/28/2025</td>
                <td>2</td>
                <td><span class="badge pending-badge">Pending</span></td>
                <td class="action-cell">
                  <button class="expand-btn">⤢</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
