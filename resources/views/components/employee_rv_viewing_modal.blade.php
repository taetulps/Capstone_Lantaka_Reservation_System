<link rel="stylesheet" href="{{asset('css/employee_rv_viewing_modal.css')}}">
@vite('resources/js/employee_rv_viewing_modal.js')

<!-- Modal Overlay -->
<div class="rv-modal-overlay" id="rvModalOverlay"></div>

<!-- Edit Room / Venue Modal -->
<div class="rv-modal" id="rvEditModal">
  <div class="rv-modal-content">

    <div class="rv-modal-header">
      <h2>Edit Room / Venue Details</h2>
      <button class="rv-close-btn" id="rvCloseModal">&times;</button>
    </div>

    <form class="rv-modal-form">
      <div class="rv-middle-content">
        <div class="rv-middle-left">
          <div class="rv-form-group">
            <label for="rvRoomName">Room Name</label>
            <input type="text" id="rvRoomName" placeholder="Room 101">
          </div>

          <div class="rv-form-group">
            <label for="rvRoomType">Room Type</label>
            <input type="text" id="rvRoomType" placeholder="Single Bed Room">
          </div>

          <div class="rv-form-group">
            <label for="rvPricing">Pricing</label>
            <div class="rv-price-input">
              <span class="rv-currency">₱</span>
              <input type="number" id="rvPricing" placeholder="5000">
            </div>
          </div>

          <div class="rv-form-group">
            <label for="rvStatus">Status</label>
            <select id="rvStatus">
              <option value="available">Available</option>
              <option value="unavailable">Unavailable</option>
              <option value="maintenance">Maintenance</option>
            </select>
          </div>

          <div class="rv-form-group">
            <label for="rvCapacity">Capacity</label>
            <input type="number" id="rvCapacity" placeholder="0">
          </div>

        </div>
        
        <div class="rv-middle-right">
          <div class="rv-form-group rv-description-group">
            <label for="rvRoomDescription">Description for Room Type</label>
            <textarea id="rvRoomDescription" placeholder="Enter description" rows="8"></textarea>
          </div>
        </div>
      </div>

      <div class="rv-form-actions">
        <button type="button" class="rv-btn rv-btn-primary" id="rvCreateReservation">
          Create Reservation
        </button>

        <button type="button" class="rv-btn rv-btn-secondary" id="rvCancelBtn">
          CANCEL
        </button>

        <button type="submit" class="rv-btn rv-btn-success">
          SAVE
        </button>
      </div>

    </form>

    <!-- Hidden data attributes for each room -->
    <div id="rvRoomDataStore" style="display: none;">
      <div
        data-room-id="101"
        data-name="Room 101"
        data-type="Single Bed Room"
        data-pricing="5000"
        data-status="available"
        data-capacity="2"
        data-description="The Single Room offers a cozy and comfortable space ideal for solo guests seeking rest and privacy. It features a well-appointed single bed, a work desk, and modern amenities to ensure a pleasant stay. Designed with simplicity and functionality in mind, the room provides a relaxing ambiance for both short and extended visits. Perfect for students, professionals, or travelers looking for comfort and convenience within the Lantaka Campus.">
      </div>

      <div
        data-room-id="102"
        data-name="Room 102"
        data-type="Double Bed Room"
        data-pricing="7500"
        data-status="available"
        data-capacity="4"
        data-description="The Double Room provides a spacious area perfect for couples or guests preferring extra space. Equipped with modern amenities and comfortable furnishings.">
      </div>

      <div
        data-room-id="hall-a"
        data-name="Hall A"
        data-type="Venue"
        data-pricing="15000"
        data-status="available"
        data-capacity="50"
        data-description="Hall A is a versatile and spacious venue designed to accommodate a wide range of gatherings and events. Perfect for conferences, banquets, and special occasions.">
      </div>
    </div>

  </div>
</div>
