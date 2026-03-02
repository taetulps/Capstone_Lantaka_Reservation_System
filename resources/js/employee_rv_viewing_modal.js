document.addEventListener('DOMContentLoaded', () => {

  const overlay = document.getElementById('rvModalOverlay');
  const modal = document.getElementById('rvEditModal');

  const closeBtn = document.getElementById('rvCloseModal');
  const cancelBtn = document.getElementById('rvCancelBtn');
  const createReservationBtn = document.getElementById('rvCreateReservation');

  const openTriggers = document.querySelectorAll('.room-card, .venue-card');

  if (!overlay || !modal) return;

  function openModal() {
    overlay.classList.add('active');
    modal.classList.add('active');
  }

  function closeModal() {
    overlay.classList.remove('active');
    modal.classList.remove('active');
  }

  // Open viewing modal
  openTriggers.forEach(el => {
    el.addEventListener('click', openModal);
  });

  // Close viewing modal
  closeBtn?.addEventListener('click', closeModal);
  cancelBtn?.addEventListener('click', closeModal);

  // Clicking outside closes
  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) {
      closeModal();
    }
  });

  // If "Create Reservation" is clicked,
  // just close this modal. The other JS will open CR modal.
  createReservationBtn?.addEventListener('click', () => {
    closeModal();
  });

});