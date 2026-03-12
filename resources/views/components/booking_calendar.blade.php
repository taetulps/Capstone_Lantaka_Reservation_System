<link rel="stylesheet" href="{{ asset('css/booking_calendar.css') }}">
@props(['occupiedDates' => '[]'])
@vite(['resources/js/booking_calendar.js'])

  <div class="calendar-container">
    <!-- Date Selection Display -->
    

    <!-- Hidden Input Fields for Laravel -->
    <input type="hidden" id="checkinDate" value="">
    <input type="hidden" id="checkoutDate" value="">

    <!-- Calendar -->
    <div class="calendar-header">
      <button id="prevMonth" class="nav-btn prev-btn">‹</button>
      <h2 class="month">November 2025</h2>
      <button id="nextMonth" class="nav-btn next-btn">›</button>
    </div>

    <div class="calendar-main">
      <div class="calendar-weekdays">
        <div class="weekday">Mo</div>
        <div class="weekday">Tu</div>
        <div class="weekday">We</div>
        <div class="weekday">Th</div>
        <div class="weekday">Fr</div>
        <div class="weekday">Sa</div>
        <div class="weekday">Su</div>
      </div>
      <div class="calendar-days">
          <!-- days render-->
      </div>
    </div>
    <br>
    <div class="date-display-section">
      <div class="date-box">
        <label>Check-in Date</label>
        <span id="checkinDisplay" class="date-value">-</span>
      </div>
      ͢
      <div class="date-box">
        <label>Check-out Date</label>
        <span id="checkoutDisplay" class="date-value">-</span>
      </div>
      <p id="dateError" class="date-error" style="display:none;"></p>

    </div>

  </div>
  <script>
    // Inject the Laravel data into a global JS variable
    window.serverOccupiedRanges = {!! $occupiedDates !!};
  </script>


<style>
  .past-date {
    color: #bbb;
    background: #f5f5f5;
    cursor: not-allowed;
    pointer-events: none;
  }


  /* FULL reserved days */
  .occupied {
    background: #ff6b6b;
    color: white;
  }

  /* START reservation (bottom half filled) */
  .occupied-start {
    background: linear-gradient(
      to top,
      #ff6b6b 50%,
      transparent 50%
    );
  }

  /* END reservation (top half filled) */
  .occupied-end {
    background: linear-gradient(
      to bottom,
      #ff6b6b 50%,
      transparent 50%
    );
  }

  /* still clickable */
  .occupied-start,
  .occupied-end {
    cursor: pointer;
  }


  /* full occupied days (middle of reservation) */
.day.occupied {
  background: #ff6b6b;
  color: white;
}

/* reservation start → diagonal lower-left fill */
.day.occupied-start {
  background: linear-gradient(
    135deg,
    transparent 50%,
    #ff6b6b 50%
  );
}

/* reservation end → diagonal upper-right fill */
.day.occupied-end {
  background: linear-gradient(
    135deg,
    #ff6b6b 50%,
    transparent 50%
  );
}

/* optional: prevent interaction with past dates */
.day.past-date {
  pointer-events: none;
  color: #ccc;
}

.in-range{
  background-color: lightblue !important;
}

.range-start{
  background-color: lightblue !important;
  color: black !important;
}

.range-end{
  background-color: lightblue !important;
  color: black !important;
}


</style>