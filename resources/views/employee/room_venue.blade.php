@extends('layouts.employee')
  <title>Rooms / Venue - Lantaka</title>
  <link rel="stylesheet" href="{{asset('css/employee_room_venue.css')}}">




  @vite('resources/js/employee_food.js')
  @vite('resources/js/employee_add_food.js')
  @vite('resources/js/employee/create_reservation.js')
  @vite('resources/js/employee_rv_viewing_modal.js')

  <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@200;300;400;500;600;700;800;900&family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

@section('content')
      <!-- Content Section -->
      <div class="content">
        <h1 class="page-title">Room / Venue</h1>

        <!-- Top Controls -->
        <div class="controls-section">
        <form class="search-bar" method="GET" action="{{ route('employee.room_venue') }}">
          <input
              type="text"
          <input
              type="text"
              name="search"
              value="{{ request('search') }}"
              placeholder="Search room or venue"
              class="search-input"
          >
          <button type="submit" class="search-icon">🔍</button>
        </form>

        <form class="filters-actions" method="GET" action="{{ route('employee.room_venue') }}">
          <select name="status" class="status-filter" onchange="this.form.submit()">
            <option value="">Status</option>

            <option value="Available" {{ request('status') == 'Available' ? 'selected' : '' }}>
              Available
            </option>

            <option value="Unavailable" {{ request('status') == 'Unavailable' ? 'selected' : '' }}>
              Unavailable
            </option>
          </select>
        </form>


          <div class="button-section">
            <button class="btn btn-secondary" id="food_button">Food Menu</button>
<<<<<<< HEAD
            @if(auth()->user()->role === 'admin')
=======
            @if(auth()->user()->Account_Role === 'admin')
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))
              <button class="btn btn-primary" id="add_room_venue_button">Add Room/Venue</button>
            @endif
          </div>
        </div>

        <div class="room-venue-divider">

          <!-- Div Content for both Rooms and Venues -->
          <div class="room-venue-content">


            <!-- Rooms Section -->
            <section class="rooms-section">
              <h2 class="section-title">Room</h2>
              <div class="rooms-grid">

              @foreach($rooms as $room)
                <div class="room-card {{ strtolower($room->Room_Status) }}">
                  {{ $room->Room_Number }}
                <div class="room-card {{ strtolower($room->Room_Status) }}">
                  {{ $room->Room_Number }}

                  <input type="hidden" class="room-details"
<<<<<<< HEAD
                        data-id="{{ $room->id }}"
                        data-name="{{ $room->room_number }}"
                        data-type="{{ $room->room_type }}"
                        data-capacity="{{ $room->capacity }}"
                        data-price="{{ $room->price }}"
                        data-external_price="{{ $room->external_price }}"
                        data-status="{{ $room->status }}"
                        data-description="{{ $room->description }}"
                        data-image="{{ $room->image ? asset('storage/' . $room->image) : '' }}">
=======
                        data-id="{{ $room->Room_ID }}"
                        data-name="{{ $room->Room_Number }}"
                        data-type="{{ $room->Room_Type }}"
                        data-capacity="{{ $room->Room_Capacity }}"
                        data-price="{{ $room->Room_Internal_Price }}"
                        data-external_price="{{ $room->Room_External_Price }}"
                        data-status="{{ $room->Room_Status }}"
                        data-description="{{ $room->Room_Description }}"
                        data-image="{{ $room->Room_Image ? asset('storage/' . $room->Room_Image) : '' }}">
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))
                </div>
              @endforeach

                @if($rooms->isEmpty())
                  <p style="color: #666; font-style: italic;">No rooms searched or added yet.</p>
                @endif
              </div>
            </section>




            <!-- Venues Section -->
            <section class="venues-section">
              <h2 class="section-title">Venue</h2>
              <div class="venue-grid">
              @foreach($venues as $venue)
                <div class="venue-card {{ strtolower($venue->Venue_Status) }}">
                  {{ $venue->Venue_Name }}
                <div class="venue-card {{ strtolower($venue->Venue_Status) }}">
                  {{ $venue->Venue_Name }}

                  <input type="hidden" class="venue-details"
<<<<<<< HEAD
                        data-id="{{ $venue->id }}"
                        data-name="{{ $venue->name }}"
                        data-capacity="{{ $venue->capacity }}"
                        data-price="{{ $venue->price }}"
                        data-external_price="{{ $venue->external_price }}"
                        data-status="{{ $venue->status }}"
                        data-description="{{ $venue->description }}"
                        data-image="{{ $venue->image ? asset('storage/' . $venue->image) : '' }}">
=======
                        data-id="{{ $venue->Venue_ID }}"
                        data-name="{{ $venue->Venue_Name }}"
                        data-capacity="{{ $venue->Venue_Capacity }}"
                        data-price="{{ $venue->Venue_Internal_Price }}"
                        data-external_price="{{ $venue->Venue_External_Price }}"
                        data-status="{{ $venue->Venue_Status }}"
                        data-description="{{ $venue->Venue_Description }}"
                        data-image="{{ $venue->Venue_Image ? asset('storage/' . $venue->Venue_Image) : '' }}">
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))
                </div>
              @endforeach

                  @if($venues->isEmpty())
                    <p>No venues searched or added yet.</p>
                  @endif
              </div>
            </section>
          </div>
          </div>
          </div>
      </div>
  <!-- Add Room Venue Modal -->
      <!-- Modal Content -->
      <x-add_room_venue/>
      <x-create_reservation_modal/>
      <x-employee_rv_viewing_modal/>
      <x-employee_food :foods="$foods" />

@endsection
