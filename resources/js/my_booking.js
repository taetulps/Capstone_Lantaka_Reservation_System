let cart = {};

function getCartKeyFromElement(element) {
  const type = element.dataset.type;
  const id = element.dataset.id;
  const checkIn = element.dataset.in;
  const checkOut = element.dataset.out;

  return `${type}_${id}_${checkIn}_${checkOut}`;
}

function formatPeso(value) {
  return `₱ ${Number(value || 0).toLocaleString(undefined, {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  })}`;
}

function renderSummaryItems() {
  const summaryItemsContainer = document.getElementById('summary-items');
  if (!summaryItemsContainer) return;

  summaryItemsContainer.innerHTML = '';

  Object.values(cart).forEach(item => {
    summaryItemsContainer.innerHTML += `
      <div class="summary-item">
        <span class="item-label">${item.name}</span>
        <span class="item-amount">${formatPeso(item.basePrice)}</span>
      </div>
    `;
  });
}

function renderSummaryFoods() {
  const foodContainer = document.getElementById('summary-foods');
  if (!foodContainer) return;

  foodContainer.innerHTML = '';

  let hasFoods = false;

  Object.values(cart).forEach(item => {
    if (item.type !== 'venue' || !item.foodDetails || item.foodDetails.length === 0) {
      return;
    }

    if (!hasFoods) {
      foodContainer.innerHTML += `
        <p style="font-weight: bold; margin: 10px 0 8px 0; font-size: 0.9em; color: #333;">
          Selected Foods:
        </p>
      `;
      hasFoods = true;
    }

    foodContainer.innerHTML += `
      <div style="margin-bottom: 12px; padding: 8px 0; border-top: 1px dashed #ddd;">
        <div style="font-weight: 600; font-size: 0.85em; color: #444; margin-bottom: 6px;">
          ${item.name}
        </div>
      </div>
    `;

    item.foodDetails.forEach(food => {
      foodContainer.innerHTML += `
        <div style="display: flex; justify-content: space-between; gap: 10px; font-size: 0.8em; color: #666; margin-bottom: 4px; padding-left: 8px;">
          <span>• ${food.food_name} (${food.dayCount} day${food.dayCount > 1 ? 's' : ''} × ${food.pax} pax)</span>
          <span>${formatPeso(food.subtotal)}</span>
        </div>
      `;
    });
  });
}

function updateGrandTotal() {
  const grandTotal = Object.values(cart).reduce((sum, item) => {
    return sum + Number(item.total || 0);
  }, 0);

  const grandTotalEl = document.getElementById('summary-grand-total');
  if (grandTotalEl) {
    grandTotalEl.innerText = formatPeso(grandTotal);
  }

  renderSummaryItems();
  renderSummaryFoods();
}

function updateHiddenSelectedItemsInput() {
  const selectedItemsInput = document.getElementById('selected-items-input');
  if (!selectedItemsInput) return;

  const selectedItems = Object.values(cart).map(item => ({
    id: item.id,
    type: item.type,
    basePrice: item.basePrice,
    check_in: item.checkIn,
    check_out: item.checkOut,
    pax: item.pax,
    total_amount: item.total,
    food: item.food || [],
    food_selections: item.foodSelections || {}
  }));

  selectedItemsInput.value = JSON.stringify(selectedItems);
}

window.selectItem = function (element) {
  const cartKey = getCartKeyFromElement(element);

  const name = element.dataset.name;
  const baseTotal = Number(element.dataset.total || 0); // accommodation total only
  const basePrice = element.dataset.base
  const id = element.dataset.id;
  const type = element.dataset.type;
  const checkIn = element.dataset.in;
  const checkOut = element.dataset.out;
  const pax = Number(element.dataset.pax || 0);
  const foodsJson = element.dataset.food || '[]';
  const foodSelectionsJson = element.dataset.foodSelections || '{}';

  const emptyMsg = document.getElementById('empty-msg');
  const summaryDetails = document.getElementById('summary-details');

  if (emptyMsg) emptyMsg.style.display = 'none';
  if (summaryDetails) summaryDetails.style.display = 'block';

  let foodArr = [];
  let foodDetails = [];
  let foodTotal = 0;
  let parsedFoodSelections = {};

  try {
    const foods = JSON.parse(foodsJson);
    parsedFoodSelections = JSON.parse(foodSelectionsJson);

    const foodDayCountMap = {};

    Object.entries(parsedFoodSelections || {}).forEach(([date, meals]) => {
      Object.entries(meals || {}).forEach(([mealType, foodIds]) => {
        if (!Array.isArray(foodIds)) return;

        foodIds.forEach(foodId => {
          const idStr = String(foodId);
          foodDayCountMap[idStr] = (foodDayCountMap[idStr] || 0) + 1;
        });
      });
    });

    if (Array.isArray(foods) && foods.length > 0) {
      foods.forEach(food => {
        const foodId = String(food.food_id);
        const dayCount = Number(foodDayCountMap[foodId] || 0);

        if (dayCount <= 0) return;

        const unitPrice = Number(food.food_price || food.Food_Price || 0);
        const foodSubtotal = unitPrice * pax * dayCount;

        foodArr.push(food.food_id);
        foodTotal += foodSubtotal;

        foodDetails.push({
          food_id: food.food_id,
          food_name: food.food_name,
          pax: pax,
          dayCount: dayCount,
          subtotal: foodSubtotal
        });
      });
    }
  } catch (error) {
    console.error('Error parsing selected food data:', error);
  }

  const finalTotal = baseTotal + foodTotal;

  cart[cartKey] = {
    key: cartKey,
    name: name,
    baseTotal: baseTotal,
    basePrice: basePrice,
    foodTotal: foodTotal,
    total: finalTotal,
    id: id,
    type: type,
    checkIn: checkIn,
    checkOut: checkOut,
    pax: pax,
    food: [...new Set(foodArr)],
    foodDetails: foodDetails,
    foodSelections: parsedFoodSelections
  };

  updateGrandTotal();
  updateHiddenSelectedItemsInput();
};

document.addEventListener('DOMContentLoaded', () => {
  const cartContainer = document.querySelector('.cart-items');
  const summaryDetails = document.getElementById('summary-details');
  const emptyMsg = document.getElementById('empty-msg');
  const checkoutForm = document.querySelector('form[action*="reservation.store"]');

  if (cartContainer) {
    cartContainer.addEventListener('click', (e) => {
      const item = e.target.closest('.cart-item');
      if (!item) return;

      const cartKey = getCartKeyFromElement(item);

      if (!item.classList.contains('highlighted')) {
        item.classList.add('highlighted');
        selectItem(item);
      } else {
        item.classList.remove('highlighted');

        delete cart[cartKey];

        updateGrandTotal();
        updateHiddenSelectedItemsInput();

        if (Object.keys(cart).length === 0) {
          if (summaryDetails) summaryDetails.style.display = 'none';
          if (emptyMsg) emptyMsg.style.display = 'block';
        }
      }
    });
  }

  if (checkoutForm) {
    checkoutForm.addEventListener('submit', function (e) {
      updateHiddenSelectedItemsInput();
        
      if (Object.keys(cart).length === 0) {
        e.preventDefault();
        alert('Please select at least one item to confirm.');
      }
    });
  }
});