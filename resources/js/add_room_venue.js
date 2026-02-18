/* Open Close Add Room Venue Modal */
const modal = document.querySelector('.modal-backdrop');
const addButton = document.getElementById('add_room_venue_button');
const cancelButton = document.getElementById('close-modal');
const closeButton = document.querySelector('.modal-close');

function openModal(){
  modal.classList.toggle('show');
};

  addButton.addEventListener('click', ()=>{
    openModal();
  });

  cancelButton.addEventListener('click', ()=>{
    openModal();
  });

  closeButton.addEventListener('click', ()=>{
    openModal();
  });

/* Room - Venue Switch */
function activate(type) {
  // reset tabs
  roomOption.classList.remove('tab-active')
  venueOption.classList.remove('tab-active')

  // reset forms
  roomForm.classList.remove('active')
  venueForm.classList.remove('active')

  if (type === 'room') {
    roomOption.classList.add('tab-active')
    roomForm.classList.add('active')

    createWhatTitle.textContent = "Create Room"
    createWhat.textContent = "Create a Room Reservation"
    saveWhat.textContent = "Save Room"
  } else {
    venueOption.classList.add('tab-active')
    venueForm.classList.add('active')

    createWhatTitle.textContent = "Create Venue"
    createWhat.textContent = "Create a Venue Reservation"
    saveWhat.textContent = "Save Venue"
  }

  console.log('roomForm active:', roomForm.classList.contains('active'))
  console.log('venueForm active:', venueForm.classList.contains('active'))
}

roomOption.addEventListener('click', () => activate('room'))
venueOption.addEventListener('click', () => activate('venue'))
