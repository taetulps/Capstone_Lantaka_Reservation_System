<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Reservation - Lantaka</title>
  <link rel="stylesheet" href="{{ asset('css/client_food_options.css') }}">
  @vite('resources/js/client_food_option.js')
</head>
<body>
  <!-- Header -->


  <main class="main-content">
    
    <form action="{{ route('checkout') }}" method="GET" id="foodReservationForm">
      
      <input type="hidden" name="accommodation_id" value="{{ request('accommodation_id') }}">
      <input type="hidden" name="type" value="{{ request('type') }}">
      <input type="hidden" name="check_in" value="{{ request('check_in') }}">
      <input type="hidden" name="check_out" value="{{ request('check_out') }}">
      <input type="hidden" name="pax" id="paxValue" value="{{ request('pax', 1) }}">

      <div class="back-section">
        <button type="button" class="back-btn" onclick="window.history.back();">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="15 18 9 12 15 6"></polyline></svg>
          <span>Back</span>
        </button>
      </div>

      <div class="reservation-card">
        <div class="card-header">
          <h2>Hall A - Food Reservation</h2>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </div>

        <div class="food-toggle-section">
          <div class="toggle-label">Include Food</div>
          <div class="toggle-buttons">
            <button type="button" class="toggle-btn">No</button>
            <button type="button" class="toggle-btn active">Yes</button>
          </div>
        </div>

        <div class="meals-container">
          
          <div class="meal-section">
            <div class="meal-header">
              <span class="meal-name">Breakfast</span>
              <span class="toggle-status">No</span>
            </div>
            <div class="food-items">
              @if(isset($foods['breakfast']) && $foods['breakfast']->count() > 0)
                @foreach($foods['breakfast'] as $food)
                  <label class="food-item" style="cursor: pointer;">
                    <input type="checkbox" name="selected_foods[]" value="{{ $food->food_id }}" data-price="{{ $food->food_price }}" class="food-checkbox" style="display:none;">
                    <div class="food-name">{{ $food->food_name }}</div>
                    <div class="food-price">₱ {{ number_format($food->food_price, 2) }}</div>
                  </label>
                @endforeach
              @else
                <p>No breakfast items available.</p>
              @endif
            </div>
          </div>

          <div class="meal-section">
            <div class="meal-header">
              <span class="meal-name">Snack</span>
              <span class="toggle-status">No</span>
            </div>
            <div class="food-items">
              @if(isset($foods['snack']) && $foods['snack']->count() > 0)
                @foreach($foods['snack'] as $food)
                  <label class="food-item" style="cursor: pointer;">
                    <input type="checkbox" name="selected_foods[]" value="{{ $food->food_id }}" data-price="{{ $food->food_price }}" class="food-checkbox" style="display:none;">
                    <div class="food-name">{{ $food->food_name }}</div>
                    <div class="food-price">₱ {{ number_format($food->food_price, 2) }}</div>
                  </label>
                @endforeach
              @else
                <p>No snack items available.</p>
              @endif
            </div>
          </div>

          <div class="meal-section">
            <div class="meal-header">
              <span class="meal-name">Lunch</span>
              <span class="toggle-status">No</span>
            </div>
            <div class="food-items">
              @if(isset($foods['lunch']) && $foods['lunch']->count() > 0)
                @foreach($foods['lunch'] as $food)
                  <label class="food-item" style="cursor: pointer;">
                    <input type="checkbox" name="selected_foods[]" value="{{ $food->food_id }}" data-price="{{ $food->food_price }}" class="food-checkbox" style="display:none;">
                    <div class="food-name">{{ $food->food_name }}</div>
                    <div class="food-price">₱ {{ number_format($food->food_price, 2) }}</div>
                  </label>
                @endforeach
              @else
                <p>No lunch items available.</p>
              @endif
            </div>
          </div>

          <div class="meal-section">
            <div class="meal-header">
              <span class="meal-name">Dinner</span>
              <span class="toggle-status active">No</span>
            </div>
            <div class="food-items">
              @if(isset($foods['dinner']) && $foods['dinner']->count() > 0)
                @foreach($foods['dinner'] as $food)
                  <label class="food-item" style="cursor: pointer;">
                    <input type="checkbox" name="selected_foods[]" value="{{ $food->food_id }}" data-price="{{ $food->food_price }}" class="food-checkbox" style="display:none;">
                    <div class="food-name">{{ $food->food_name }}</div>
                    <div class="food-price">₱ {{ number_format($food->food_price, 2) }}</div>
                  </label>
                @endforeach
              @else
                <p>No dinner items available.</p>
              @endif
            </div>
          </div>

        </div>
      </div>

      <div class="other-request-section">
        <div class="section-header">
          <h3>Other Request</h3>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </div>
      </div>

      <div class="action-section">
        <button type="button" class="date-select-btn">Select Venue Date</button>
        <div class="total-section">
          <span class="total-label">Total:</span>
          <span class="total-amount" id="displayTotalPrice">₱ 0.00</span>
        </div>
        <button type="submit" class="add-to-cart-btn">ADD TO BOOKING CART</button>
      </div>

      <input type="hidden" id="foodServiceDate" name="food_service_date" value="">

    </form>
    
    <div class="fooddate-overlay" id="foodDateOverlay" aria-hidden="true">
      <div class="fooddate-modal" role="dialog" aria-modal="true" aria-labelledby="foodDateTitle">
        <div class="fooddate-header">
          <h3 id="foodDateTitle">Select Date for Hall A for Food Reservation</h3>
          <button type="button" class="fooddate-close" id="foodDateClose" aria-label="Close">×</button>
        </div>
        <div class="fooddate-body">
          <div class="fooddate-dates" id="foodDateList">
            <button type="button" class="fooddate-chip" data-date="2026-02-18">18</button>
            <button type="button" class="fooddate-chip" data-date="2026-02-19">19</button>
            <button type="button" class="fooddate-chip" data-date="2026-02-20">20</button>
          </div>
          <p class="fooddate-error" id="foodDateError" style="display:none;"></p>
        </div>
        <div class="fooddate-footer">
          <button type="button" class="fooddate-confirm" id="foodDateConfirm">CONFIRM</button>
        </div>
      </div>
    </div>
  </main>
</body>
</html>