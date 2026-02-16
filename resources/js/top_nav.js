const openBtn = document.getElementById('open-modal');
const modal = document.querySelector('.user-profile-modal');

if (openBtn && modal) {
  function toggleModal() {
    modal.classList.toggle('show');
  }

  openBtn.addEventListener('click', (e) => {
    toggleModal();
  });

  document.addEventListener('click', (e) => {
    if (!modal.contains(e.target) && !openBtn.contains(e.target)) {
      modal.classList.remove('show');
    }
  });
}
