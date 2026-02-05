const modal = document.querySelector('.modal-overlay')
const modalBody = document.querySelector('.modal-body')
const moreDetailsBtn = document.querySelector('.expand-button')
const closeBtnModal = document.querySelector(".close-btn")

closeBtnModal.addEventListener('click', ()=>{
  modal.classList.remove('show')
})

modal.addEventListener('click', (e)=>{
  if(e.target === modal) modal.classList.remove('show') 
})

moreDetailsBtn.addEventListener('click', ()=>{
  modal.classList.add('show')
})