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
              @forelse($reservations as $res)
                <tr>
                  <td class="name-cell">
                    <span class="user-icon">👤</span>
                    <span>{{ $res->user->name ?? $res->user->first_name ?? 'Unknown' }}</span>
                  </td>

                  <td>External</td>

                  <td>
                    @if($res->type === 'room' && $res->room)
                        Room: <strong>{{ $res->room->room_number }}</strong>
                    @elseif($res->type === 'venue' && $res->venue)
                        Venue: <strong>{{ $res->venue->Venue_Name ?? $res->venue->name }}</strong>
                    @else
                        <span style="color: #e74c3c;">Not Found</span>
                    @endif
                  </td>

                  <td>{{ \Carbon\Carbon::parse($res->check_in)->format('m/d/Y') }}</td>
                  <td>{{ \Carbon\Carbon::parse($res->check_out)->format('m/d/Y') }}</td>
                  <td>{{ $res->pax }}</td>

                  <td>
                    <span class="badge {{ strtolower($res->status) }}-badge">
                        {{ ucfirst($res->status) }}
                    </span>
                  </td>

                  @php
                      $accName = '';
                      if($res->type === 'room' && $res->room) $accName = 'Room ' . $res->room->room_number;
                      elseif($res->type === 'venue' && $res->venue) $accName = 'Venue: ' . ($res->venue->Venue_Name ?? $res->venue->name);
                  @endphp
                  
                  <td class="action-cell">
                    <button class="expand-btn" data-info="{{ json_encode([
                        'id' => str_pad($res->id, 5, '0', STR_PAD_LEFT),
                        'name' => $res->user->name ?? $res->user->first_name ?? 'Unknown',
                        'accommodation' => $accName,
                        'pax' => $res->pax,
                        'check_in' => \Carbon\Carbon::parse($res->check_in)->format('F d, Y'),
                        'check_out' => \Carbon\Carbon::parse($res->check_out)->format('F d, Y'),
                        'foods' => $res->foods 
                    ]) }}">
                        ⤢
                    </button>
                  </td>
                </tr>
              @empty
                <tr>
                    <td colspan="8" style="text-align: center; padding: 20px;">No guest reservations found.</td>
                </tr>
              @endforelse
            </tbody>
          </table>

        </div>
      </div>
      <x-modal_e_reservations/>
    </main>
@endsection