<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lantaka Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/employee_dashboard.css')}}">
    <link rel="stylesheet" href="{{ asset('css/employee_side_nav.css') }}
    ">
    <link rel="stylesheet" href="{{ asset('css/employee_top_nav.css') }}">

    <!-- Fonts -->
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
            <a href="#" class="nav-item">
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
    <main class="main-container">
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

        <!-- Content Area -->
        <div class="content">
            <h1 class="page-title">Dashboard</h1>

            <!-- Stat Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <h3>Total Reservations</h3>
                        <span class="stat-icon">📅</span>
                    </div>
                    <div class="stat-value">1,234</div>
                    <div class="stat-change">+20.1% from last month</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <h3>Occupancy Rate</h3>
                        <span class="stat-icon">📊</span>
                    </div>
                    <div class="stat-value">78.5%</div>
                    <div class="stat-change">+2.5% from last month</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <h3>Revenue</h3>
                        <span class="stat-icon">💰</span>
                    </div>
                    <div class="stat-value">₱52,345</div>
                    <div class="stat-change">+15.3% from last month</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <h3>Active Guest</h3>
                        <span class="stat-icon">👥</span>
                    </div>
                    <div class="stat-value">312</div>
                    <div class="stat-change">+7.2% from last month</div>
                </div>
            </div>

            <!-- Calendar Section -->
            <div class="calendar-section">
                <div class="calendar-header">
                    <h2>January 2026</h2>
                    <div class="view-toggle">
                        <button class="toggle-btn active">Monthly</button>
                        <button class="toggle-btn">Weekly</button>
                    </div>
                </div>

                <div class="calendar">
                    <div class="calendar-grid">
                        <!-- Day headers -->
                        <div class="day-header">Sun</div>
                        <div class="day-header">Mon</div>
                        <div class="day-header">Tue</div>
                        <div class="day-header">Wed</div>
                        <div class="day-header">Thu</div>
                        <div class="day-header">Fri</div>
                        <div class="day-header">Sat</div>

                        <!-- Calendar dates -->
                        <div class="date-cell empty">28</div>
                        <div class="date-cell empty">29</div>
                        <div class="date-cell empty">30</div>
                        <div class="date-cell">Jan 1</div>
                        <div class="date-cell">2</div>
                        <div class="date-cell">3</div>
                        <div class="date-cell">4</div>

                        <div class="date-cell">5</div>
                        <div class="date-cell">6</div>
                        <div class="date-cell">7</div>
                        <div class="date-cell">8</div>
                        <div class="date-cell">9</div>
                        <div class="date-cell">10</div>
                        <div class="date-cell">1</div>

                        <div class="date-cell">12</div>
                        <div class="date-cell">13</div>
                        <div class="date-cell">14</div>
                        <div class="date-cell">15</div>
                        <div class="date-cell">16</div>
                        <div class="date-cell">17</div>
                        <div class="date-cell">18</div>

                        <div class="date-cell event">
                            <div class="date-number">19</div>
                            <div class="event-label">Hall A</div>
                        </div>
                        <div class="date-cell">20</div>
                        <div class="date-cell">21</div>
                        <div class="date-cell">22</div>
                        <div class="date-cell">23</div>
                        <div class="date-cell">24</div>
                        <div class="date-cell">25</div>

                        <div class="date-cell">26</div>
                        <div class="date-cell">27</div>
                        <div class="date-cell">28</div>
                        <div class="date-cell">29</div>
                        <div class="date-cell">30</div>
                        <div class="date-cell empty">Feb 1</div>
                        <div class="date-cell empty">2</div>
                    </div>
                </div>
            </div>

            <!-- Export Button -->
            <button class="export-btn">Export</button>
        </div>
    </main>
</body>
</html>
