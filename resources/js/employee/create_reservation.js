document.addEventListener("DOMContentLoaded", () => {

  const crOverlay = document.querySelector(".cr-modal-overlay");
  const crCloseBtn = document.querySelector(".cr-close-btn");
  const crCancelBtn = document.querySelector(".cr-btn-cancel");
  const openBtn = document.getElementById("rvCreateReservation");

  if (!crOverlay) return;

  function openModal() {
    crOverlay.classList.add("show");
  }

  function closeModal() {
    crOverlay.classList.remove("show");
  }

  // Open create reservation modal
  openBtn?.addEventListener("click", openModal);

  // Close buttons
  crCloseBtn?.addEventListener("click", closeModal);
  crCancelBtn?.addEventListener("click", closeModal);

  // Click outside closes
  crOverlay.addEventListener("click", (e) => {
    if (e.target === crOverlay) {
      closeModal();
    }
  });

});