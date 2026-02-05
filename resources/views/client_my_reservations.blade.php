<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Reservations - Lantaka Portal</title>
  <link rel="stylesheet" href="{{asset('css/client_my_reservations.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@200;300;400;500;600;700;800;900&family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  @vite('resources/js/client_my_reservations.js')
</head>
<body>
  <!-- Header -->
    <x-header/>
    
  <!-- Main Content -->
  <main class="main-content">
  <h1 class="page-title">My Reservations</h1>

    <!-- Search and Filters -->
    <div class="search-filters">
      <div class="search-box">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <circle cx="11" cy="11" r="8"></circle>
          <path d="m21 21-4.35-4.35"></path>
        </svg>
        <input type="text" placeholder="Search">
      </div>

      <div class="filter-dropdowns">
        <select class="filter-select">
          <option>Filter</option>
        </select>
        <select class="filter-select">
          <option>Reservation Type</option>
        </select>
        <select class="filter-select">
          <option>Status</option>
        </select>
      </div>
    </div>

    <!-- Reservations Table -->
    <div class="table-container">
      <table class="reservations-table">
        <thead>
          <tr>
            <th>Reservation</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>No. of Pax</th>
            <th>Checkout Amount</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="reservation-name">Hall A</td>
            <td>9/9/2025</td>
            <td>9/9/2025</td>
            <td>37</td>
            <td class="amount">₱ 20,500.00</td>
            <td><span class="status-badge pending">Pending</span></td>
            <td class="action-cell">
              <button class="expand-button">⤡</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
  <x-my_reservations_modal/>
</body>
</html>
