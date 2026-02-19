@vite('resources/js/employee_add_food.js')
<link rel="stylesheet" href="{{ asset('css/employee_add_food.css') }}">

<!-- ADD FOOD MODAL OVERLAY -->
<div id="addFoodOverlay" class="addfood-overlay">

  <!-- ADD FOOD MODAL -->
  <div id="addFoodModal" class="addfood-modal">
    <div class="addfood-content">

      <div class="addfood-header">
        <h2>Add Food</h2>
        <button class="addfood-close" id="addFoodClose">&times;</button>
      </div>

      <form class="addfood-form">
        <!-- Food Name and Status -->
        <div class="addfood-row">
          <div class="addfood-group">
            <label for="addFoodName">Food Name</label>
            <input type="text" id="addFoodName" placeholder="Rice" required>
          </div>

          <div class="addfood-group">
            <label for="addFoodStatus">Status</label>
            <select id="addFoodStatus" required>
              <option value="available">Available</option>
              <option value="unavailable">Unavailable</option>
            </select>
          </div>
        </div>

        <!-- Food Type -->
        <div class="addfood-group">
          <label>Food Type</label>
          <div class="addfood-radio">
            <label class="addfood-radio-label">
              <input type="radio" name="foodType" value="breakfast" checked>
              <span>Breakfast</span>
            </label>
            <label class="addfood-radio-label">
              <input type="radio" name="foodType" value="snack">
              <span>Snack</span>
            </label>
            <label class="addfood-radio-label">
              <input type="radio" name="foodType" value="lunch">
              <span>Lunch</span>
            </label>
            <label class="addfood-radio-label">
              <input type="radio" name="foodType" value="dinner">
              <span>Dinner</span>
            </label>
          </div>
        </div>

        <!-- Pricing -->
        <div class="addfood-group">
          <label for="addFoodPrice">Pricing</label>
          <div class="addfood-price">
            <span class="addfood-currency">₱</span>
            <input type="number" id="addFoodPrice" placeholder="500.00" step="0.01" required>
          </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="addfood-submit">Add Food</button>
      </form>
    </div>
  </div>

</div>
  