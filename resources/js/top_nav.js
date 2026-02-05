const openBtn = document.getElementById('open-modal');
const modal = document.querySelector('.user-profile-modal');
  function openModal(){
    modal.classList.toggle('show')
  }

  openBtn.addEventListener("click", openModal);  

  document.body.addEventListener('click', (e) => {
    const clickedInsideModal = modal.contains(e.target);
    const clickedOpenBtn = openBtn.contains(e.target);

    if (!clickedInsideModal && !clickedOpenBtn) {
      modal.classList.remove('show');
    }
  });
             
