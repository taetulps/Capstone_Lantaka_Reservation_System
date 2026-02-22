document.addEventListener('DOMContentLoaded', () => {
  const expandButtons = document.querySelectorAll('.expand-btn');
  const modalOverlay = document.querySelector('.modal-overlay');
  const closeBtn = document.querySelector('.close-btn');

  expandButtons.forEach(button => {
    button.addEventListener('click', function () {
      const rawData = this.getAttribute('data-info');
      const data = JSON.parse(rawData);
      console.log("Here is the exact data for this button:", data);
      // --- 1. SPLIT THE NAME ---
      // data.name is coming directly from your Blade file ($reservation->user->name)
      let fullName = data.name || 'Unknown';
      let nameParts = fullName.trim().split(' ');

      document.getElementById('modalName').textContent = nameParts[0]; // First word
      document.getElementById('modalLastName').textContent = nameParts.length > 1 ? nameParts.slice(1).join(' ') : ''; // Rest of the words

      // --- 2. BASIC INFO ---
      document.getElementById('modalCheckIn').textContent = data.check_in;
      document.getElementById('modalCheckOut').textContent = data.check_out;

      // Your Blade file already did the str_pad, so we just drop data.id right in!
      document.getElementById('modalFoodIdLabel').textContent = `Food ID (${data.id}):`;

      // --- 3. HANDLE THE FOOD ---
      const foodListContainer = document.getElementById('modalFoodList');
      let foodHtml = '';

      // Check if $foodItems actually has data
      if (data.foods && Object.keys(data.foods).length > 0) {

        let groupedFoods = {};

        // If Laravel sent a flat list, we group it by category
        if (Array.isArray(data.foods)) {
          data.foods.forEach(food => {
            // **IMPORTANT:** Change 'category' to match your DB column name (e.g., meal_type, type)
            let cat = food.category || food.type || 'Other';
            if (!groupedFoods[cat]) groupedFoods[cat] = [];
            groupedFoods[cat].push(food);
          });
        } else {
          // If you already grouped it in PHP, use it directly
          groupedFoods = data.foods;
        }

        // Build the HTML using your exact CSS classes
        for (const [category, items] of Object.entries(groupedFoods)) {
          foodHtml += `
                        <div class="food-category">
                            <p class="food-category-title">${category.toUpperCase()}</p>
                            <ul class="food-items">
                    `;

          items.forEach(food => {
            // Use food.name or food.food_name depending on your DB
            const foodName = typeof food === 'string' ? food : (food.name || food.food_name || 'Unknown Food');
            foodHtml += `<li>${foodName}</li>`;
          });

          foodHtml += `
                            </ul>
                        </div>
                    `;
        }
      } else {
        foodHtml = '<p class="detail-value">No food reserved.</p>';
      }

      foodListContainer.innerHTML = foodHtml;
      modalOverlay.style.display = 'flex';
    });
  });

  if (closeBtn) {
    closeBtn.addEventListener('click', () => {
      modalOverlay.style.display = 'none';
    });
  }
});