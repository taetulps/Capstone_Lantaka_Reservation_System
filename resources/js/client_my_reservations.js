document.addEventListener('DOMContentLoaded', () => {
  const expandButtons = document.querySelectorAll('.expand-button');
  const modalOverlay = document.querySelector('.modal-overlay');
  const closeBtn = document.querySelector('.close-btn');

  expandButtons.forEach(button => {
    button.addEventListener('click', function () {
      const data = JSON.parse(this.getAttribute('data-info'));

      // 1. Fill basic text details
      document.getElementById('modalAccommodation').textContent = data.accommodation;
      document.getElementById('modalPax').textContent = data.pax;
      document.getElementById('modalCheckIn').textContent = data.check_in;
      document.getElementById('modalCheckOut').textContent = data.check_out;
      document.getElementById('modalFoodIdLabel').textContent = `Food ID (${data.id}):`;

      // 2. Handle the food logic
      const foodListContainer = document.getElementById('modalFoodList');
      let foodHtml = '';

      if (data.foods && data.foods.length > 0) {
        let groupedFoods = {};

        // Group the foods by category
        data.foods.forEach(food => {
          let cat = food.food_category || food.category || 'Other';
          if (!groupedFoods[cat]) groupedFoods[cat] = [];
          groupedFoods[cat].push(food);
        });

        // Build HTML for each category
        for (const [category, items] of Object.entries(groupedFoods)) {
          foodHtml += `
                        <div class="food-category">
                            <p class="food-category-title">${category.toUpperCase()}</p>
                            <ul class="food-items">
                    `;
          items.forEach(food => {
            const foodName = food.food_name || food.name || 'Unknown Food';
            foodHtml += `<li>${foodName}</li>`;
          });
          foodHtml += `</ul></div>`;
        }
      } else {
        foodHtml = '<p class="detail-value" style="margin-top: 5px;">No food reserved.</p>';
      }

      // Inject the food HTML and show modal
      foodListContainer.innerHTML = foodHtml;
      modalOverlay.style.display = 'flex';
    });
  });

  // Close Modal Logic
  if (closeBtn) {
    closeBtn.addEventListener('click', () => {
      modalOverlay.style.display = 'none';
    });
  }
});