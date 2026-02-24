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

    roomOption.classList.remove('tab-active');
    venueOption.classList.remove('tab-active');
    roomForm.classList.remove('active');
    venueForm.classList.remove('active');

    if (type === 'room') {
      roomOption.classList.add('tab-active');
      roomForm.classList.add('active');

      if (createWhatTitle) createWhatTitle.textContent = 'Create Room';
      if (createWhat) createWhat.textContent = 'Create a Room Reservation';
      if (saveWhat) saveWhat.textContent = 'Save Room';
    } else {
      venueOption.classList.add('tab-active');
      venueForm.classList.add('active');

      if (createWhatTitle) createWhatTitle.textContent = 'Create Venue';
      if (createWhat) createWhat.textContent = 'Create a Venue Reservation';
      if (saveWhat) saveWhat.textContent = 'Save Venue';
    }
  }

  roomOption?.addEventListener('click', () => activate('room'));
  venueOption?.addEventListener('click', () => activate('venue'));
});