@vite('resources/js/employee/create_reservation.js')
  <link rel="stylesheet" href="{{ asset('css/create_reservation.css') }}">

  <div class="cr-modal-overlay"> 
  <div class="cr-modal-content">
    <button class="cr-close-btn">&times;</button>
    <h1 class="cr-title">Create Reservation</h1>

    <form class="cr-form">
      <div class="cr-form-section">
        <label>Account Search</label>
        <input type="text" placeholder="Search for Existing Account" class="cr-full-width">
      </div>

      <div class="cr-form-row">
        <div class="cr-form-group">
          <label>Room Name</label>
          <input type="text" value="Room 101" readonly>
        </div>
        <div class="cr-form-group">
          <label>Capacity</label>
          <input type="text" value="2" readonly>
        </div>
      </div>

      <div class="cr-form-row cr-date-row">
        <div class="cr-form-group">
          <label>Check-in</label>
          <input type="text" value="September 25, 2025" readonly>
        </div>

        <span class="cr-arrow">→</span>

        <div class="cr-form-group">
          <label>Check-out</label>
          <input type="text" value="September 26, 2025" readonly>
        </div>
      </div>

      <div class="cr-button-group">
        <button type="button" class="cr-btn cr-btn-cancel">CANCEL</button>
        <button type="submit" class="cr-btn cr-btn-proceed">PROCEED</button>
      </div>
    </form>
  </div>
</div>
