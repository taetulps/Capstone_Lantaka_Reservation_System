@extends('layouts.employee')
    <title>Guest Management Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/employee_reservations.css') }}">
    @vite('resources/js/employee_reservations.js')

@section('content')
<main class="main-content">
      <div class="page-content">
        <h1 class="page-title">Guest</h1>

        <div class="search-container">
          <input type="text" class="search-input" placeholder="Search">
          <span class="search-icon">🔍</span>
        </div>

        <div class="status-cards">
          <div class="status-card pending">
            <div class="status-label">Pending</div>
            <div class="status-number">12</div>
          </div>
          <div class="status-card confirmed">
            <div class="status-label">Checked-in</div>
            <div class="status-number">14</div>
          </div>
          <div class="status-card completed">
            <div class="status-label">Checked-out</div>
            <div class="status-number">22</div>
          </div>
          <div class="status-card cancelled">
            <div class="status-label">Cancelled</div>
            <div class="status-number">2</div>
          </div>
        </div>

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
                <span>John Doe</span>
              </td>

              <td>Internal</td>

              <td>
                Room: <strong>101</strong>
              </td>

              <td>03/01/2026</td>
              <td>03/03/2026</td>
              <td>4</td>

              <td>
                <span class="badge pending-badge">Pending</span>
              </td>

              <td class="action-cell">
                <button class="expand-btn" data-id="1">⤢</button>
              </td>
            </tr>

            <tr>
              <td class="name-cell">
                <span class="user-icon">👤</span>
                <span>Maria Santos</span>
              </td>

              <td>External</td>

              <td>
                Venue: <strong>Grand Ballroom</strong>
              </td>

              <td>03/05/2026</td>
              <td>03/06/2026</td>
              <td>120</td>

              <td>
                <span class="badge confirmed-badge">Confirmed</span>
              </td>

              <td class="action-cell">
                <button class="expand-btn" data-id="2">⤢</button>
              </td>
            </tr>

            <tr>
              <td class="name-cell">
                <span class="user-icon">👤</span>
                <span>Alex Rivera</span>
              </td>

              <td>Internal</td>

              <td>
                Room: <strong>205</strong>
              </td>

              <td>03/10/2026</td>
              <td>03/12/2026</td>
              <td>2</td>

              <td>
                <span class="badge completed-badge">Completed</span>
              </td>

              <td class="action-cell">
                <button class="expand-btn" data-id="3">⤢</button>
              </td>
            </tr>
            </tbody>
          </table>

        </div>
      </div>
      <x-modal_e_reservations/>
    </main>
@endsection