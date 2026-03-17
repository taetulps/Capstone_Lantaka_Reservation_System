document.addEventListener('DOMContentLoaded', function () {
  const viewModal = document.getElementById('accountOverlay');
  const viewButtons = document.querySelectorAll('.action-btn-view');
  const exitViewModal = document.querySelector('.account-close');
  const updateForm = document.getElementById('updateAccountForm');

  const btnDeactivate = document.getElementById('btn-deactivate');
  const btnReactivate = document.getElementById('btn-reactivate');
  const btnSave       = document.getElementById('btn-save');

  viewButtons.forEach(button => {
    button.addEventListener('click', function () {
      const userData = this.getAttribute('data-user');
      if (!userData) return;

      const user = JSON.parse(userData);

      // 1. UPDATE FORM ACTION
      if (updateForm && user.id) {
        updateForm.setAttribute('action', `/employee/accounts/${user.id}/update`);
      }
 

      console.log(user);
      
      // 2. TOGGLE BUTTONS based on account status
      const isDeactivated = user.status === 'deactivate';
      if (btnDeactivate) btnDeactivate.style.display = isDeactivated ? 'none'  : '';
      if (btnReactivate) btnReactivate.style.display = isDeactivated ? ''      : 'none';
      if (btnSave)       btnSave.style.display       = isDeactivated ? 'none'  : '';

      // 2. SPLIT NAME CAREFULLY
      // Since your DB uses 'name', we split it by the first space found
      const fullName = user.name || '';
      const firstSpaceIndex = fullName.indexOf(' ');

      let firstName = '';
      let lastName = '';

      if (firstSpaceIndex !== -1) {
        firstName = fullName.substring(0, firstSpaceIndex);
        lastName = fullName.substring(firstSpaceIndex + 1);
      } else {
        firstName = fullName;
      }

      // 3. FILL INPUTS
      document.getElementById('view_fname').value = firstName;
      document.getElementById('view_lname').value = lastName;
      document.getElementById('view_username').value = user.username || '';
      document.getElementById('view_email').value = user.email || '';

      // Use 'phone' because that's what is in your User.php fillable
      document.getElementById('view_phone').value = user.phone || '';

      const imgElement = document.getElementById('view_id_image');
      const noIdText = document.getElementById('view_no_id');

      if (user.valid_id_path) {
        // Ensure the path is correctly prefixed with your storage link
        imgElement.src = `/storage/${user.valid_id_path}`;
        imgElement.style.display = 'block';
        if (noIdText) noIdText.style.display = 'none';
      } else {
        imgElement.style.display = 'none';
        if (noIdText) noIdText.style.display = 'block';
      }

      const idInfoField = document.getElementById('view_id_info');
      if (idInfoField) {
        idInfoField.value = user.id_info || '';
      }

      viewModal.classList.add('active');
    });
  });

  // Modal closing logic (keeps it clean)
  if (exitViewModal) {
    exitViewModal.addEventListener('click', () => viewModal.classList.remove('active'));
  }
  window.addEventListener('click', (e) => {
    if (e.target === viewModal) viewModal.classList.remove('active');
  });
});