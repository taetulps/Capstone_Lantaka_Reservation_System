document.addEventListener('DOMContentLoaded', function () {
  const approveModal = document.getElementById('approvalOverlay');
  const approveButtons = document.querySelectorAll('.action-btn-approve');
  const exitApproveModal = approveModal ? approveModal.querySelector('.approval-close') : null;

  // Action buttons inside the modal footer
  const acceptBtn = document.querySelector('.btn-accept');
  const declineBtn = document.querySelector('.btn-decline');
  let currentUserId = null;

  approveButtons.forEach(button => {
    button.addEventListener('click', function () {
      const user = JSON.parse(this.getAttribute('data-user'));
      currentUserId = user.id;

      // Fill approval fields (make sure IDs are approve_fname, etc.)
      const nameParts = (user.name || '').trim().split(/\s+/);
      document.getElementById('approve_fname').value = nameParts[0] || '';
      document.getElementById('approve_lname').value = nameParts.slice(1).join(' ') || '';
      document.getElementById('approve_username').value = user.username || '';
      document.getElementById('approve_phone').value = user.phone || '';
      document.getElementById('approve_email').value = user.email || '';

      const imgElement = document.getElementById('approve_id_image');
      const noIdText = document.getElementById('approve_no_id');

      if (user.valid_id_path) {
        // Ensure the path is correctly prefixed with your storage link
        imgElement.src = `/storage/${user.valid_id_path}`;
        imgElement.style.display = 'block';
        if (noIdText) noIdText.style.display = 'none';
      } else {
        imgElement.style.display = 'none';
        if (noIdText) noIdText.style.display = 'block';
      }

      approveModal.classList.add('active');
    });
  });

  // Action Logic
  async function handleStatusUpdate(status) {
    if (!currentUserId) return;
    const response = await fetch(`/employee/accounts/${currentUserId}/update-status`, {
      method: 'POST',
      // Inside your handleStatusUpdate function:
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({ status: status })
    });
    const data = await response.json();
    if (data.success) { alert(data.message); location.reload(); }
  }

  if (acceptBtn) acceptBtn.addEventListener('click', () => handleStatusUpdate('approved'));
  if (declineBtn) declineBtn.addEventListener('click', () => handleStatusUpdate('declined'));

  if (exitApproveModal) {
    exitApproveModal.addEventListener('click', () => approveModal.classList.remove('active'));
  }

  window.addEventListener('click', function (event) {
    if (event.target === approveModal) {
      approveModal.classList.remove('active');
    }
  });
});