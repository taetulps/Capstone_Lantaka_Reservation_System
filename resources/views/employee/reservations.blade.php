@extends('layouts.employee')
  <title>Reservation - Lantaka System</title>
  <link rel="stylesheet" href="{{ asset('css/employee_reservations.css') }}">
  @vite('resources/js/employee_reservations.js')

@section('content')
    <main class="main-content">
      <div class="page-content">
        <h1 class="page-title">Reservation</h1>

        <div class="search-container">
          <input type="text" class="search-input" placeholder="Search">
          <span class="search-icon">🔍</span>
        </div>

        <div class="status-cards">
          <div class="status-card pending">
            <div class="status-label">Pending</div>
            <div class="status-number">{{ $reservations->where('status', 'Pending')->count() }}</div>
          </div>
          <div class="status-card confirmed">
            <div class="status-label">Confirmed</div>
            <div class="status-number">{{ $reservations->where('status', 'Confirmed')->count() }}</div>
          </div>
          <div class="status-card completed">
            <div class="status-label">Completed</div>
            <div class="status-number">{{ $reservations->where('status', 'Completed')->count() }}</div>
          </div>
          <div class="status-card cancelled">
            <div class="status-label">Cancelled</div>
            <div class="status-number">{{ $reservations->where('status', 'Cancelled')->count() }}</div>
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
              
              {{-- DYNAMIC LOOP STARTS HERE --}}
              @forelse($reservations as $reservation)
                  <tr>
                    <td class="name-cell">
                      <span class="user-icon">👤</span>
                      <span>{{ $reservation->user->name ?? 'Unknown User' }}</span>
                    </td>
                    
                    {{-- Assuming 'Client Type' is based on the user or hardcoded for now --}}
                    <td>{{ $reservation->user->usertype ?? 'External' }}</td> 

                    <td>
                        @if($reservation->type == 'room' && $reservation->room)
                            {{-- Changed to room_number to match your Model --}}
                            Room: <strong>{{ $reservation->room->room_number }}</strong>
                        @elseif($reservation->type == 'venue' && $reservation->venue)
                            Venue: <strong>{{ $reservation->venue->Venue_Name ?? $reservation->venue->name }}</strong>
                        @else
                            <span style="color: #d9534f;">Item Missing</span>
                        @endif
                    </td>
                    
                    <td>{{ \Carbon\Carbon::parse($reservation->check_in)->format('m/d/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($reservation->check_out)->format('m/d/Y') }}</td>
                    <td>{{ $reservation->pax }}</td>
                    
                    <td>
                        <span class="badge {{ strtolower($reservation->status) }}-badge">
                            {{ ucfirst($reservation->status) }}
                        </span>
                    </td>
                    
                    <td class="action-cell">
                      {{-- You can pass the ID here later for the modal --}}
                      <button class="expand-btn" data-id="{{ $reservation->id }}">⤢</button>
                    </td>
                  </tr>
              @empty
                  <tr>
                      <td colspan="8" style="text-align: center; padding: 20px;">
                          No reservations found.
                      </td>
                  </tr>
              @endforelse
              {{-- DYNAMIC LOOP ENDS HERE --}}

            </tbody>
          </table>
        </div>
      </div>
      <x-modal_e_reservations/>

    </main>
@endsection