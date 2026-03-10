document.addEventListener('DOMContentLoaded', () => {
  const expandButtons = document.querySelectorAll('.expand-btn');
  const modalOverlay = document.querySelector('.modal-overlay');
  const closeBtn = document.querySelector('.close-btn');
  const statusForm = document.getElementById('statusForm');
  const statusInput = document.getElementById('statusInput');

  console.log("employee_reservations.js connection working");

  expandButtons.forEach(button => {
    button.addEventListener('click', function () {
      const data = JSON.parse(this.getAttribute('data-info'));

      console.log("ID found:", data.id);
      console.log("Type found:", data.res_type);
      console.log("User ID found:", data.userId);

      // Set status form action
      if (statusForm && data.id) {
        statusForm.action = `/employee/reservations/${data.id}/status?type=${data.res_type}`;
      } else {
        console.error("Form action not set: ID or Form missing", data.id);
      }

      // IMPORTANT: update SOA link here
      updateSoaLink(data.userId);

      const currentStatus = data.status ? data.status.toLowerCase().trim() : '';

      const statusGroups = {
        'pending': document.getElementById('pendingActions'),
        'rejected': document.getElementById('pendingActions'),
        'confirmed': document.getElementById('confirmedActions'),
        'cancelled': document.getElementById('confirmedActions'),
        'checked-in': document.getElementById('checkedInActions'),
        'checked-out': document.getElementById('checkedInActions'),
      };

      Object.values(statusGroups).forEach(group => {
        if (group) group.style.display = 'none';
      });

      if (statusGroups[currentStatus]) {
        statusGroups[currentStatus].style.display = 'flex';
      } else if (statusGroups['pending']) {
        statusGroups['pending'].style.display = 'flex';
      }

      const blockCheckin = document.getElementById('confirmedActions');
      const blockCheckout = document.getElementById('checkedInActions');
      const blockAccept = document.getElementById('pendingActions');
      const showSOA = document.getElementById('exportSection');
      const showAddChSection = document.getElementById('additionalChargesSection');
      const row = this.closest('tr');
      const badge = row.querySelector('.badge');
      const badgeStatus = badge ? badge.textContent.trim() : '';

      const discountSection = document.getElementById('discountSection');
      const checkAccomodation = data.accommodationType;

      if (badgeStatus === "Completed" || badgeStatus === "Checked-out" || badgeStatus === "Cancelled") {
        blockCheckout.style.display = 'none';
      }
      if (badgeStatus === "Rejected") {
        blockAccept.style.display = 'none';
      }
      if (badgeStatus === "Cancelled" || badgeStatus === "Completed") {
        blockCheckin.style.display = 'none';
      }
      if (badgeStatus !== "Checked-in") {
        showSOA.style.display = 'none';
        showAddChSection.style.display = 'none';
      } else {
        showSOA.style.display = 'block';
        showAddChSection.style.display = 'block';
      }

      if (badgeStatus === "Checked-in" && checkAccomodation === "Venue") {
        discountSection.classList.remove('none');
      } else {
        discountSection.classList.add('none');
      }

      let fullName = data.name || 'Unknown';
      let nameParts = fullName.trim().split(' ');

      document.getElementById('modalTitle').textContent = badge.textContent.trim();
      document.getElementById('firstName').value = nameParts[0] || '';
      document.getElementById('lastName').value = nameParts.length > 1 ? nameParts.slice(1).join(' ') : '';
      document.getElementById('phoneNumber').value = data.phone || '';
      document.getElementById('email').value = data.email || '';
      document.getElementById('affiliation').value = data.type || '';
      document.getElementById('modalName').textContent = data.accommodation || 'N/A';
      document.getElementById('modalLastName').textContent = data.pax || '1';
      document.getElementById('modalCheckIn').textContent = data.check_in || '';
      document.getElementById('modalCheckOut').textContent = data.check_out || '';
      document.getElementById('accomodation-type').textContent = data.accommodationType || '';
      document.getElementById('unit-price').textContent = `₱${data.price || 0}`;
      document.getElementById('totalAmount').textContent = `₱${data.price || 0}`;
      document.getElementById('userId').value = data.userId || '';

      const foodListContainer = document.getElementById('modalFoodList');
      if (foodListContainer && data.food_items) {
        foodListContainer.innerHTML = data.food_items;
      }

      modalOverlay.style.display = 'flex';
    });
  });

  if (closeBtn) {
    closeBtn.addEventListener('click', () => {
      modalOverlay.style.display = 'none';
    });
  }

  if (modalOverlay) {
    modalOverlay.addEventListener('click', (e) => {
      if (e.target === modalOverlay) {
        modalOverlay.style.display = 'none';
      }
    });
  }

  window.submitStatus = function (statusValue) {
    if (statusInput && statusForm) {
      statusInput.value = statusValue;
      statusForm.submit();
    }
  };

  const statusCards = document.querySelector('.status-cards');
  if (statusCards) {
    statusCards.addEventListener('click', (e) => {
      const activeCard = e.target.closest('.status-card');
      if (!activeCard) return;

      const isActive = activeCard.classList.contains('active');
      statusCards.querySelectorAll('.status-card').forEach(card => card.classList.remove('active'));

      if (!isActive) {
        activeCard.classList.add('active');
      }
    });
  }
});

function updateSoaLink(clientId) {
  const soaLink = document.getElementById('soaLink');
  const userIdInput = document.getElementById('userId');

  if (!soaLink || !userIdInput) return;

  userIdInput.value = clientId;
  soaLink.href = `/employee/SOA/${clientId}`;

  console.log('SOA LINK SET TO:', soaLink.href);
}

const addChargesBtn = document.getElementById('addAdditionalCharges');
const chargesContainer = document.getElementById('chargesContainer');

function addAditionalCharges() {
  const html = `
    <div class="charges-container-sub">
      <input type="text" placeholder="Description" class="charge-input">
      <input type="number" placeholder="Qty" class="charge-input">
      <input type="number" placeholder="₱" class="charge-input">
    </div>
  `;
  chargesContainer.innerHTML += html;
}

if (addChargesBtn) {
  addChargesBtn.addEventListener('click', addAditionalCharges);
}