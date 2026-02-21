@extends('layouts.client')
  <title>My Reservations - Lantaka Portal</title>
  <link rel="stylesheet" href="{{asset('css/client_my_reservations.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@200;300;400;500;600;700;800;900&family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  @vite('resources/js/client_my_reservations.js')

@section('content')   
  <h1 class="page-title">My Reservations</h1>

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
          {{-- DYNAMIC LOOP STARTS HERE --}}
          @forelse($reservations as $res)
            <tr>
              <td class="reservation-name">
                  @if($res->type === 'room' && $res->room)
                      <strong style="font-size: 1.1em;">
                          {{ $res->room->room_number }}
                      </strong>
                      <small style="display:block; color: #666;">Accommodation Room</small>
                  @elseif($res->type === 'venue' && $res->venue)
                      <strong style="font-size: 1.1em;">
                          {{ $res->venue->Venue_Name ?? $res->venue->name }}
                      </strong>
                      <small style="display:block; color: #666;">Event Venue</small>
                  @else
                      <span style="color: #e74c3c;">Item Not Found</span>
                  @endif
              </td>
              
              {{-- Date Formatting --}}
              <td>{{ \Carbon\Carbon::parse($res->check_in)->format('m/d/Y') }}</td>
              <td>{{ \Carbon\Carbon::parse($res->check_out)->format('m/d/Y') }}</td>
              
              <td>{{ $res->pax }}</td>
              <td class="amount">₱ {{ number_format($res->total_amount, 2) }}</td>
              
              <td>
                  {{-- Dynamic Class for Status Color (pending, confirmed, cancelled) --}}
                  <span class="status-badge {{ strtolower($res->status) }}">
                      {{ $res->status }}
                  </span>
              </td>
              
              <td class="action-cell">
                <button class="expand-button">⤡</button>
              </td>
            </tr>
          @empty
            {{-- This row shows if there are NO reservations --}}
            <tr>
                <td colspan="7" style="text-align: center; padding: 20px;">
                    You have no reservations yet.
                </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  
  <x-my_reservations_modal/>
@endsection