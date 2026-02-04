<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accounts - Lantaka Room and Venue Reservation System</title>
  <link rel="stylesheet" href="{{asset('css/employee_accounts.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@200;300;400;500;600;700;800;900&family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
  <aside class="sidebar">
      <x-side_nav/>
    </aside>

    <main class="main-content">
      <header class="header">
        <x-top_nav/>
      </header>

      <div class="page-content">
        <h1 class="page-title">Accounts</h1>

        <div class="search-container">
          <form action="{{ route('employee_accounts') }}" method="GET">
            <input type="text" name="search" class="search-input" placeholder="Search by name or email" value="{{ request('search') }}">
          </form>
        </div>

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