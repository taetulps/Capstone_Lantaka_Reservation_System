document.addEventListener('DOMContentLoaded', function () {
  const viewModal = document.getElementById('accountOverlay');
  const viewButtons = document.querySelectorAll('.action-btn-view');
  const exitViewModal = viewModal.querySelector('.account-close'); // Look specifically inside THIS modal

  viewButtons.forEach(button => {
    button.addEventListener('click', function () {
      const user = JSON.parse(this.getAttribute('data-user'));

      const nameParts = (user.name || '').trim().split(/\s+/);
      document.getElementById('view_fname').value = nameParts[0] || '';
      document.getElementById('view_lname').value = nameParts.slice(1).join(' ') || '';

      document.getElementById('view_username').value = user.username || user.name;
      document.getElementById('view_phone').value = user.phone || 'N/A';
      document.getElementById('view_email').value = user.email || '';

      viewModal.classList.add('active');
    });
  });

  if (exitViewModal) {
    exitViewModal.addEventListener('click', function () {
      viewModal.classList.remove('active');
    });
  }

  // Use a named check to prevent interfering with other modals
  window.addEventListener('click', function (event) {
    if (event.target === viewModal) {
      viewModal.classList.remove('active');
    }
  });
});