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
            <a href="{{route('employee_accounts')}}" class="nav-item active">
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

    <main class="main-content">
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

      <div class="page-content">
        <h1 class="page-title">Accounts</h1>

        <div class="search-container">
          <input type="text" class="search-input" placeholder="Search">
        </div>

        <!-- Tabs -->
        <div class="tabs">
          <a href="{{ route('employee_accounts') }}" class="tab-btn {{ !request('status') && !request('role') ? 'active' : '' }}">All</a>
          
          <a href="{{ route('employee_accounts', ['role' => 'employee']) }}" class="tab-btn {{ request('role') == 'employee' ? 'active' : '' }}">Employee Accounts</a>
          
          <a href="{{ route('employee_accounts', ['status' => 'approved']) }}" class="tab-btn {{ request('status') == 'approved' ? 'active' : '' }}">Approved Client Account</a>
          
          <a href="{{ route('employee_accounts', ['status' => 'declined']) }}" class="tab-btn {{ request('status') == 'declined' ? 'active' : '' }}">Declined Client Account</a>
          
          <a href="{{ route('employee_accounts', ['status' => 'pending']) }}" class="tab-btn {{ request('status') == 'pending' ? 'active' : '' }}">Pending Client Account</a>
        </div>

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
              @forelse($users as $user)
                <tr>
                  <td>
                    <div class="cell-with-icon">
                      <span class="cell-icon">👤</span>
                      <span>{{ $user->name }}</span>
                    </div>
                  </td>
                  <td>{{ ucfirst($user->role) }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phone ?? 'N/A' }}</td>
                  <td>
                    @if($user->status == 'pending')
                        <span class="status-badge pending" style="background: #ffd700; color: #000; padding: 4px 8px; border-radius: 4px;">Pending</span>
                    @elseif($user->status == 'approved')
                        <span class="status-badge online">Approved</span>
                    @elseif($user->status == 'declined')
                        <span class="status-badge deactivated">Declined</span>
                    @else
                        <span class="status-badge online">Online</span>
                    @endif
                  </td>
                  <td>
                    @if($user->status == 'pending')
                        <a href="#" class="action-btn" title="Review Account">👁️</a>
                    @else
                        <button class="action-btn">✎</button>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 20px;">No accounts found.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</body>
</html>