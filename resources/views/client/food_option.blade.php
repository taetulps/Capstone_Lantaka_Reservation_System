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


  <!-- Main Content -->
  <main class="main-content">
    <!-- Back Button -->
    <div class="back-section">
      <button class="back-btn">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="15 18 9 12 15 6"></polyline></svg>
        <span>Back</span>
      </button>
    </div>

    <!-- Food Reservation Card -->
    <div class="reservation-card">
      <div class="card-header">
        <h2>Hall A - Food Reservation</h2>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </div>

      <!-- Include Food Toggle -->
      <div class="food-toggle-section">
        <div class="toggle-label">Include Food</div>
        <div class="toggle-buttons">
          <button class="toggle-btn">No</button>
          <button class="toggle-btn active">Yes</button>
        </div>
      </div>

      <!-- Meal Categories -->
      <div class="meals-container">
        <!-- Breakfast -->
        <div class="meal-section">
          <div class="meal-header">
            <span class="meal-name">Breakfast</span>
            <span class="toggle-status">No</span>
          </div>
          <div class="food-items">
            <div class="food-item ">
              <div class="food-name">Rice</div>
              <div class="food-price">₱ 500.00</div>
            </div>
            <div class="food-item ">
              <div class="food-name">Scrambled Eggs</div>
              <div class="food-price">₱ 700.00</div>
            </div>
            <div class="food-item ">
              <div class="food-name">Longganisa</div>
              <div class="food-price">₱ 900.00</div>
            </div>
            <div class="food-item ">
              <div class="food-name">Corned Beef</div>
              <div class="food-price">₱ 750.00</div>
            </div>
            <div class="food-item">
              <div class="food-name">Chicken Tocino</div>
              <div class="food-price">₱ 750.00</div>
            </div>
          </div>
        </div>

        <!-- Snack 1 -->
        <div class="meal-section">
          <div class="meal-header">
            <span class="meal-name">Snack</span>
            <span class="toggle-status">No</span>
          </div>
          <div class="food-items">
            <div class="food-item">
              <div class="food-name">Puto</div>
              <div class="food-price">₱ 500.00</div>
            </div>
            <div class="food-item">
              <div class="food-name">Bibingka</div>
              <div class="food-price">₱ 700.00</div>
            </div>
            <div class="food-item selected">
              <div class="food-name">Ensaymada</div>
              <div class="food-price">₱ 900.00</div>
            </div>
            <div class="food-item">
              <div class="food-name">Cassava Cake</div>
              <div class="food-price">₱ 750.00</div>
            </div>
            <div class="food-item">
              <div class="food-name">Sapin-Sapin</div>
              <div class="food-price">₱ 750.00</div>
            </div>
          </div>
        </div>

        <!-- Lunch -->
        <div class="meal-section">
          <div class="meal-header">
            <span class="meal-name">Lunch</span>
            <span class="toggle-status">No</span>
          </div>
          <div class="food-items">
            <div class="food-item ">
              <div class="food-name">Rice</div>
              <div class="food-price">₱ 500.00</div>
            </div>
            <div class="food-item">
              <div class="food-name">Chicken Adobo</div>
              <div class="food-price">₱ 700.00</div>
            </div>
            <div class="food-item">
              <div class="food-name">Fried Chicken</div>
              <div class="food-price">₱ 900.00</div>
            </div>
            <div class="food-item ">
              <div class="food-name">Beef Kulma</div>
              <div class="food-price">₱ 750.00</div>
            </div>
            <div class="food-item">
              <div class="food-name">Lumpiang Shanghai</div>
              <div class="food-price">₱ 750.00</div>
            </div>
          </div>
        </div>

        <!-- Snack 2 -->
        <div class="meal-section">
          <div class="meal-header">
            <span class="meal-name">Snack</span>
            <span class="toggle-status">No</span>
          </div>
          <div class="food-items">
            <div class="food-item">
              <div class="food-name">Puto</div>
              <div class="food-price">₱ 500.00</div>
            </div>
            <div class="food-item">
              <div class="food-name">Bibingka</div>
              <div class="food-price">₱ 700.00</div>
            </div>
            <div class="food-item">
              <div class="food-name">Ensaymada</div>
              <div class="food-price">₱ 900.00</div>
            </div>
            <div class="food-item">
              <div class="food-name">Cassava Cake</div>
              <div class="food-price">₱ 750.00</div>
            </div>
            <div class="food-item">
              <div class="food-name">Sapin-Sapin</div>
              <div class="food-price">₱ 750.00</div>
            </div>
          </div>
        </div>

        <!-- Dinner -->
        <div class="meal-section">
          <div class="meal-header">
            <span class="meal-name">Dinner</span>
            <span class="toggle-status active">No</span>
          </div>
          <div class="food-items">
            <div class="food-item ">
              <div class="food-name">Rice</div>
              <div class="food-price">₱ 500.00</div>
            </div>
            <div class="food-item ">
              <div class="food-name">Chop Suey</div>
              <div class="food-price">₱ 700.00</div>
            </div>
            <div class="food-item ">
              <div class="food-name">Caldereta</div>
              <div class="food-price">₱ 900.00</div>
            </div>
            <div class="food-item ">
              <div class="food-name">Sinigang</div>
              <div class="food-price">₱ 750.00</div>
            </div>
            <div class="food-item ">
              <div class="food-name">Buttered Shrimp</div>
              <div class="food-price">₱ 750.00</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Other Request Section -->
    <div class="other-request-section">
      <div class="section-header">
        <h3>Other Request</h3>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="6 9 12 15 18 9"></polyline></svg>
      </div>
    </div>

    <!-- Bottom Action Section -->
    <div class="action-section">
      <button class="date-select-btn">Select Venue Date</button>
      <div class="total-section">
        <span class="total-label">Total:</span>
        <span class="total-amount">₱ 5,500.00</span>
      </div>
      <button class="add-to-cart-btn">ADD TO BOOKING CART</button>
    </div>







<!-- hidden input to store selected food service date for DB -->
<input type="hidden" id="foodServiceDate" name="food_service_date" value="">

<!-- Modal -->
<div class="fooddate-overlay" id="foodDateOverlay" aria-hidden="true">
  <div class="fooddate-modal" role="dialog" aria-modal="true" aria-labelledby="foodDateTitle">
    <div class="fooddate-header">
      <h3 id="foodDateTitle">Select Date for Hall A for Food Reservation</h3>
      <button type="button" class="fooddate-close" id="foodDateClose" aria-label="Close">×</button>
    </div>

    <div class="fooddate-body">
      <!-- date boxes -->
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
