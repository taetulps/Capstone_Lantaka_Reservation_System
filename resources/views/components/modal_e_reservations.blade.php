<div class="modal-overlay" style="display: none;">
  <div class="modal-container">
    <div class="modal-content">
      <div class="modal-header">
        <h2>Reservation Details</h2>
        <button class="close-btn">&times;</button>
      </div>

      <div class="modal-body">
        <div class="detail-section">
          <p class="detail-label">Name:</p>
          <p class="detail-value" id="modalName"></p>
        </div>

        <div class="detail-section">
          <p class="detail-label">Last Name:</p>
          <p class="detail-value" id="modalLastName"></p>
        </div>

        <div class="detail-section">
          <p class="detail-label">Check-in Date:</p>
          <p class="detail-value" id="modalCheckIn"></p>
        </div>

        <div class="detail-section">
          <p class="detail-label">Check-out Date:</p>
          <p class="detail-value" id="modalCheckOut"></p>
        </div>

        <div class="detail-section">
          <p class="detail-label" id="modalFoodIdLabel">Food ID:</p>
          
          <div id="modalFoodList"></div>

          <div style="margin-top: 15px;">
            <button class="reject-btn">Reject</button>
            <button class="accept-btn">Accept</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>