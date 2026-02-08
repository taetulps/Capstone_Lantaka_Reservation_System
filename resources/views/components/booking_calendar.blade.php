<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="{{ asset('css/booking_calendar.css') }}">
    @vite(['resources/js/booking_calendar.js'])
  </head>
  <body>
  <div class="date-picker-container">
    <div class="date-picker-header">
      <h2>Select Date Range</h2>
    </div>

    <div class="calendar-wrapper">
    <div class="calendar-container">
          <div class="calendar-header">
            <h3 class="month"></h3>
            <div class="calendar-nav">
              <button class="calendar-btn prev" id="prevMonth">‹</button>
              <button class="calendar-btn next" id="nextMonth">›</button>
            </div>
          </div>

          <div class="calendar">
            <div class="calendar-weekdays">
              <div class="weekday">Mon</div>
              <div class="weekday">Tue</div>
              <div class="weekday">Wed</div>
              <div class="weekday">Thu</div>
              <div class="weekday">Fri</div>
              <div class="weekday">Sat</div>
              <div class="weekday">Sun</div>
            </div>

            <div class="calendar-days">
    

            </div>
          </div>
    </div>
  </div>
  </body>
</html>