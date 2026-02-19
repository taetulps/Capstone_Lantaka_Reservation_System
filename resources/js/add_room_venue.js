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

  function openModal(){
    modal.classList.toggle('show');
  }

  addButton?.addEventListener('click', openModal);
  cancelButton?.addEventListener('click', openModal);
  closeButton?.addEventListener('click', openModal);

  function activate(type) {
    roomOption.classList.remove('tab-active');
    venueOption.classList.remove('tab-active');

    roomForm.classList.remove('active');
    venueForm.classList.remove('active');

    if (type === 'room') {
      roomOption.classList.add('tab-active');
      roomForm.classList.add('active');

      createWhatTitle.textContent = "Create Room";
      createWhat.textContent = "Create a Room Reservation";
      saveWhat.textContent = "Save Room";
    } else {
      venueOption.classList.add('tab-active');
      venueForm.classList.add('active');

      createWhatTitle.textContent = "Create Venue";
      createWhat.textContent = "Create a Venue Reservation";
      saveWhat.textContent = "Save Venue";
    }

    console.log('roomForm active:', roomForm.classList.contains('active'));
    console.log('venueForm active:', venueForm.classList.contains('active'));
  }

  roomOption?.addEventListener('click', () => activate('room'));
  venueOption?.addEventListener('click', () => activate('venue'));

});
