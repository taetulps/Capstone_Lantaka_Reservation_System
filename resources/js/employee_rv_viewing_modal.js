// resources/js/employee_rv_viewing_modal.js

document.addEventListener('DOMContentLoaded', () => {
  const overlay = document.getElementById('rvModalOverlay')
  const modal = document.getElementById('rvEditModal')

  const closeBtn = document.getElementById('rvCloseModal')
  const cancelBtn = document.getElementById('rvCancelBtn')

  // 👉 CHANGE THIS selector to whatever should OPEN the modal
  // Example: clicking a room card
  const openTriggers = document.querySelectorAll('.room-card, .venue-card')

  function openModal() {
    overlay.classList.add('active')
    modal.classList.add('active')
  }

  function closeModal() {
    overlay.classList.remove('active')
    modal.classList.remove('active')
  }

  // open modal
  openTriggers.forEach(el => {
    el.addEventListener('click', openModal)
  })

  // close buttons
  closeBtn?.addEventListener('click', closeModal)
  cancelBtn?.addEventListener('click', closeModal)

  // click outside modal closes it
  overlay?.addEventListener('click', closeModal)
})
