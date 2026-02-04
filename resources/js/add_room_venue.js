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
const roomOption = document.getElementById('room-option');
const venueOption = document.getElementById('venue-option');
const roomForm = document.getElementById('room-form')
const venueForm = document.getElementById('venue-form')
const createWhatTitle = document.querySelector('.modal-title');
const createWhat = document.getElementById('create-reservation');
const saveWhat = document.getElementById('save-what');

roomOption.addEventListener('click', ()=>{

  createWhatTitle.textContent = "Create Room"

  roomOption.classList.add('tab-active');
  venueOption.classList.remove('tab-active');

  roomForm.classList.add("active")
  venueForm.classList.remove("active")

  createWhat.textContent = "Create a Room Reservation"
  saveWhat.textContent = "Save Room"


});

venueOption.addEventListener('click', ()=>{

  createWhatTitle.textContent = "Create Venue"

  venueOption.classList.add('tab-active');
  roomOption.classList.remove('tab-active');

  venueForm.classList.add("active")
  roomForm.classList.remove("active")

  createWhat.textContent = "Create a Venue Reservation"
  saveWhat.textContent = "Save Venue"

});

/* Create a what? */



