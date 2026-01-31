<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accounts - Lantaka Room and Venue Reservation System</title>
  <link rel="stylesheet" href="{{asset('css/employee_accounts.css')}}">
  <link rel="stylesheet" href="{{asset('css/employee_side_nav.css')}}">
  <link rel="stylesheet" href="{{asset('css/employee_top_nav.css')}}">

</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-logo">
        <div class="logo-circle">🎓</div>
        <div class="logo-text">
          <p class="logo-title">Ateneo de Zamboanga University</p>
          <p class="logo-subtitle">Lantaka Room and Venue Reservation System</p>
        </div>
      </div>
      <nav class="nav-menu">
            <a href="{{route('employee_dashboard')}}" class="nav-item active">
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
            <a href="#" class="nav-item">
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
        <button class="menu-btn">☰</button>
        <div class="header-right">
          <button class="notification-btn">🔔</button>
          <div class="user-profile">
            <span class="user-avatar">👤</span>
            <div class="user-info">
              <p class="user-name">Welcome, Jane!</p>
              <p class="user-role">Administrator</p>
            </div>
          </div>
        </div>
      </header>

      <!-- Page Content -->
      <div class="page-content">
        <h1 class="page-title">Accounts</h1>

        <!-- Search Bar -->
        <div class="search-container">
          <input type="text" class="search-input" placeholder="Search">
        </div>

        <!-- Tabs -->
        <div class="tabs">
          <button class="tab-btn active">All</button>
          <button class="tab-btn">Employee Accounts</button>
          <button class="tab-btn">Approved Client Account</button>
          <button class="tab-btn">Declined Client Account</button>
          <button class="tab-btn">Pending Client Account</button>
        </div>

        <!-- Table -->
        <div class="table-container">
          <table class="accounts-table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Phone no.</th>
                <th>Status/Last Online</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="cell-with-icon">
                    <span class="cell-icon">👤</span>
                    <span>Beng Aray</span>
                  </div>
                </td>
                <td>Administrator</td>
                <td>bengramos19@gmail.com</td>
                <td>09977990124</td>
                <td><span class="status-badge online">Online</span></td>
                <td><button class="action-btn">✎</button></td>
              </tr>
              <tr>
                <td>
                  <div class="cell-with-icon">
                    <span class="cell-icon">👤</span>
                    <span>Suzie Ko</span>
                  </div>
                </td>
                <td>Staff</td>
                <td>anditooh22@gmail.com</td>
                <td>09972221124</td>
                <td><span class="status-text">11/2/2025 12:46:02</span></td>
                <td><button class="action-btn">✎</button></td>
              </tr>
              <tr>
                <td>
                  <div class="cell-with-icon">
                    <span class="cell-icon">👤</span>
                    <span>Jane Mendoza</span>
                  </div>
                </td>
                <td>Administrator</td>
                <td>skyflowers771@gmail.com</td>
                <td>09972971888</td>
                <td><span class="status-badge deactivated">Deactivated</span></td>
                <td><button class="action-btn">✎</button></td>
              </tr>
              <tr>
                <td>
                  <div class="cell-with-icon">
                    <span class="cell-icon">👤</span>
                    <span>Mannex Delipus</span>
                  </div>
                </td>
                <td>Client</td>
                <td>billionDollars@gmail.com</td>
                <td>09977210124</td>
                <td><span class="status-badge declined">Declined</span></td>
                <td><button class="action-btn">✎</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
