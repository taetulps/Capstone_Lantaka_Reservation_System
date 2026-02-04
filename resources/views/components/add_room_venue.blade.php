@vite('resources/js/add_room_venue.js')
<div class="modal-backdrop">
    <!-- Modal Container -->
    <div class="modal">
      <!-- Close Button -->
      <button class="modal-close">&times;</button>

      <!-- Modal Header -->
      <h2 class="modal-title">Create Room</h2>

      <!-- Tabs -->
      <div class="modal-tabs">
        <button class="tab-btn tab-active" id="room-option">Room</button>
        <button class="tab-btn" id="venue-option">Venue</button>
      </div>

      <!-- Modal Main -->
      <div class="modal-content">
        <form>
          <!-- ROOM CONTENT FORM -->
          <div class="form-grid active" id="room-form">
            <!-- Left Column -->
            <div class="form-column">
              <!-- Room Name -->
              <div class="form-group">
                <label for="roomName">Room Name</label>
                <input type="text" id="roomName" placeholder="Enter Room Name" class="form-input">
              </div>

              <!-- Room Type -->
              <div class="form-group">
                <label for="roomType">Room Type</label>
                <input type="text" id="roomType" placeholder="Enter Room Type" class="form-input">
              </div>

              <!-- Pricing -->
              <div class="form-group">
                <label for="pricing">Internal Pricing</label>
                <input type="number" id="internal-pricing" placeholder="₱ 0" class="form-input">
                <label for="pricing">External Pricing</label>
                <input type="number" id="external-pricing" placeholder="₱ 0" class="form-input">
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label for="status">Status</label>
                  <select id="status" class="form-input">
                    <option>Available</option>
                    <option>Unavailable</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="capacity">Capacity</label>
                  <input type="number" id="capacity" placeholder="Enter Capacity" class="form-input">
                </div>
              </div>
            </div>
            
         

            <!-- Right Column -->
            <div class="form-column">
              <!-- Description -->
              <div class="form-group">
                <label for="description">Description for Room Type</label>
                <textarea id="description" placeholder="Room Description" class="form-textarea"></textarea>
              </div>
            </div>
          </div>
        </form>
  <!-- VENUE CONTENT FORM -->
        <form>
          <div class="form-grid" id="venue-form">
            <!-- Left Column -->
            <div class="form-column">
              <!-- Room Name -->
              <div class="form-group">
                <label for="roomName">Venue Name</label>
                <input type="text" id="venueName" placeholder="Enter Venue Name" class="form-input">
              </div>

              <!-- Pricing -->
              <div class="form-group">
                <label for="pricing">Internal Pricing</label>
                <input type="number" id="internal-pricing" placeholder="₱ 0" class="form-input">
                <label for="pricing">External Pricing</label>
                <input type="number" id="external-pricing" placeholder="₱ 0" class="form-input">
              </div>

              <!-- Status & Capacity Row -->
              <div class="form-row">
                <div class="form-group">
                  <label for="status">Status</label>
                  <select id="status" class="form-input">
                    <option>Available</option>
                    <option>Unavailable</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="capacity">Capacity</label>
                  <input type="number" id="capacity" placeholder="Enter Capacity" class="form-input">
                </div>
              </div>
            </div>

            <!-- Right Column -->
            <div class="form-column">
              <!-- Description -->
              <div class="form-group">
                <label for="description">Description for Venue Type</label>
                <textarea id="description" placeholder="Venue Description" class="form-textarea"></textarea>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="modal-actions">
            <button type="button" class="btn-primary create" id="create-reservation">Create Room Reservation</button>
            <button type="button" class="btn-secondary" id="close-modal">CANCEL</button>
            <button type="submit" class="btn-success" id="save-what">SAVE ROOM</button>
          </div>
        </form>
      </div>

    </div>
  </div>