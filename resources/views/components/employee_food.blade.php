<link rel="stylesheet" href="{{ asset('css/employee_food.css') }}">

<!-- FOOD MODAL OVERLAY -->
<div class="food-modal-overlay" id="foodModalOverlay">

  <!-- FOOD MODAL -->
  <div class="food-modal" id="foodModal">

    <!-- CLOSE BUTTON -->
    <button class="food-modal-close" id="foodModalClose">&times;</button>

      <!-- Main Content -->
    <main class="food-main-content toggle">

    <!-- Food Reservation Card -->
    <div class="reservation-card">
      <div class="card-header">
        <h2>Food Menu</h2>  
        <button class="add-food-button" id="add_food_button" >Add Food</button>
      </div>

      <!-- Meal Categories -->
      <div class="meals-container">
        <!-- Breakfast -->
        <div class="meal-section">
          <div class="meal-header">
            <span class="meal-name">Breakfast</span>
            <span class="toggle-status">Available</span>
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
            <span class="toggle-status">Available</span>
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
            <span class="toggle-status">Available</span>
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
            <span class="toggle-status">Available</span>
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
              <div class="food-name ">Cassava Cake</div>
              <div class="food-price">₱ 750.00</div>
            </div>
            <div class="food-item">
              <div class="food-name selected">Sapin-Sapin</div>
              <div class="food-price">₱ 750.00</div>
            </div>
          </div>
        </div>

        <!-- Dinner -->
        <div class="meal-section">
          <div class="meal-header">
            <span class="meal-name">Dinner</span>
            <span class="toggle-status active">Available</span>
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
        <div class="action-section">
          <button class="add-to-cart-btn">CONFIRM</button>
        </div>
      </div>
    </div>
  </div>
</div>

<x-employee_add_food/>

  