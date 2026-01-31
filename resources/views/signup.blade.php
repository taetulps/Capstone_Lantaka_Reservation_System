<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up - Lantaka Room and Venue Reservation System</title>
  <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>
<body>
  <div class="signup-container">
    <!-- Background -->
    <div class="background"></div>
    <div class="card-header">
        <div class="logo-section">
          <div class="logo-icon">🎓</div>
          <p class="university-name">Ateneo de Zamboanga University</p>
        </div>
        <h1 class="main-title">Lantaka Room and Venue Reservation System</h1>
        <p class="subtitle">-Lantaka Online Room & Venue Reservation System-</p>
      </div>
    <!-- Signup Form Card -->
    <div class="signup-card">
      <!-- Header -->
      

      <!-- Form -->
      <form class="signup-form">
        <h2 class="form-title">Sign up</h2>

        <!-- Two Column Layout -->
        <div class="form-grid">
          <!-- Left Column -->
          <div class="form-column">
            <!-- First Name -->
            <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="text" id="firstName" name="firstName" placeholder="Enter First Name" required>
            </div>

            <!-- Last Name -->
            <div class="form-group">
              <label for="lastName">Last Name</label>
              <input type="text" id="lastName" name="lastName" placeholder="Enter Last Name" required>
            </div>

            <!-- Phone Number -->
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="tel" id="phone" name="phone" placeholder="Enter Phone Number" required>
            </div>

            <!-- Email -->
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Enter Email" required>
            </div>

            <!-- Affiliation -->
            <div class="form-group">
              <label for="affiliation">Affiliation</label>
              <select id="affiliation" name="affiliation" required>
                <option value="">Enter Affiliation</option>
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
                <option value="staff">Staff</option>
                <option value="external">External</option>
              </select>
            </div>
          </div>

          <!-- Right Column -->
          <div class="form-column">
            <!-- Username -->
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" id="username" name="username" placeholder="Enter Username" required>
            </div>

            <!-- Password -->
            <div class="form-group">
              <label for="password">Password</label>
              <div class="password-input-group">
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
                <button type="button" class="toggle-password" id="togglePassword">👁️</button>
              </div>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
              <label for="confirmPassword">Confirm Password</label>
              <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Re-enter Password" required>
            </div>

            <!-- Valid ID -->
            <div class="form-group">
              <label for="validId">Valid ID</label>
              <div class="file-upload">
                <input type="file" id="validId" name="validId" accept="image/*" required>
                <div class="upload-label">
                  <div class="upload-icon">⬇️</div>
                  <p class="upload-text">Upload Image</p>
                  <p class="upload-hint">Drag or Click to upload image</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="submit-btn">Sign Up</button>
        <p class="signup-text">
                Already have an account? <a href="{{ route('login') }}" class="signup-link">Login</a>
      </form>
    </div>
  </div>

  <script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
      const passwordInput = document.getElementById('password');
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
    });

    // File upload drag and drop
    const fileInput = document.getElementById('validId');
    const uploadLabel = document.querySelector('.upload-label');

    uploadLabel.addEventListener('dragover', (e) => {
      e.preventDefault();
      uploadLabel.style.backgroundColor = 'rgba(0, 0, 0, 0.05)';
    });

    uploadLabel.addEventListener('dragleave', () => {
      uploadLabel.style.backgroundColor = 'transparent';
    });

    uploadLabel.addEventListener('drop', (e) => {
      e.preventDefault();
      uploadLabel.style.backgroundColor = 'transparent';
      if (e.dataTransfer.files.length) {
        fileInput.files = e.dataTransfer.files;
      }
    });

    uploadLabel.addEventListener('click', () => {
      fileInput.click();
    });

    fileInput.addEventListener('change', function() {
      if (this.files.length > 0) {
        uploadLabel.innerHTML = `<p class="upload-text">✓ ${this.files[0].name}</p>`;
      }
    });
  </script>
</body>
</html>
