document.addEventListener('DOMContentLoaded', () => {
  const modal = document.querySelector('.modal-backdrop');
  const addButton = document.getElementById('add_room_venue_button');
  const cancelButton = document.getElementById('close-modal');
  const closeButton = document.querySelector('.modal-close');

  const roomOption = document.getElementById('room-option');
  const venueOption = document.getElementById('venue-option');
  const roomForm = document.getElementById('room-form');
  const venueForm = document.getElementById('venue-form');

  const createWhatTitle = document.querySelector('.modal-title');
  const createWhat = document.getElementById('create-reservation');
  const saveWhat = document.getElementById('save-what');

  if (!modal) return;

  const openModal = () => {
    modal.classList.add('show');
    activate('room');
  };

  const closeModal = () => {
    modal.classList.remove('show');
  };

  addButton?.addEventListener('click', openModal);
  cancelButton?.addEventListener('click', closeModal);
  closeButton?.addEventListener('click', closeModal);

  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });

  // close on ESC
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeModal();
  });

  function activate(type) {
    if (!roomOption || !venueOption || !roomForm || !venueForm) return;

    const roomInputs = roomForm.querySelectorAll('input, select, textarea');
    const venueInputs = venueForm.querySelectorAll('input, select, textarea');
    const categoryInput = document.getElementById('category_input');

    if (type === 'room') {
      // 1. Visual Tabs
      roomOption.classList.add('tab-active');
      venueOption.classList.remove('tab-active');
      roomForm.style.display = 'flex'; // Ensure it shows
      venueForm.style.display = 'none';

      // 2. Data Integrity: Enable Room, Disable Venue
      roomInputs.forEach(i => i.disabled = false);
      venueInputs.forEach(i => i.disabled = true);
      if (categoryInput) categoryInput.value = 'Room';

      if (createWhatTitle) createWhatTitle.textContent = 'Create Room';
    } else {
      // 1. Visual Tabs
      venueOption.classList.add('tab-active');
      roomOption.classList.remove('tab-active');
      venueForm.style.display = 'flex';
      roomForm.style.display = 'none';

      // 2. Data Integrity: Enable Venue, Disable Room
      venueInputs.forEach(i => i.disabled = false);
      roomInputs.forEach(i => i.disabled = true);
      if (categoryInput) categoryInput.value = 'Venue';

      if (createWhatTitle) createWhatTitle.textContent = 'Create Venue';
    }
  }

  roomOption?.addEventListener('click', () => activate('room'));
  venueOption?.addEventListener('click', () => activate('venue'));
});