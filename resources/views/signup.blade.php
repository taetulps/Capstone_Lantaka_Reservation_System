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
    <div class="background"></div>
    <div class="card-header">
        <div class="logo-section">
          <div class="logo-icon">🎓</div>
          <p class="university-name">Ateneo de Zamboanga University</p>
        </div>
        <h1 class="main-title">Lantaka Room and Venue Reservation System</h1>
        <p class="subtitle">-Lantaka Online Room & Venue Reservation System-</p>
      </div>

    <div class="signup-card">
      
      @if ($errors->any())
        <div class="error-container" style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li style="font-size: 0.85rem;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
            {{ session('success') }}
        </div>
      @endif
      
      <form class="signup-form" method="POST" action="{{ route('register.post') }}" enctype="multipart/form-data">
        @csrf
        <h2 class="form-title">Sign up</h2>

        <div class="form-grid">
          <div class="form-column">
            <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="text" id="firstName" name="firstName" placeholder="Enter First Name" value="{{ old('firstName') }}" required>
            </div>

            <div class="form-group">
              <label for="lastName">Last Name</label>
              <input type="text" id="lastName" name="lastName" placeholder="Enter Last Name" value="{{ old('lastName') }}" required>
            </div>

            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="tel" id="phone" name="phone" placeholder="Enter Phone Number" value="{{ old('phone') }}" required>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Enter Email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
              <label for="affiliation">Affiliation</label>
              <select id="affiliation" name="affiliation" required>
                <option value="">Enter Affiliation</option>
                <option value="student" {{ old('affiliation') == 'student' ? 'selected' : '' }}>Student</option>
                <option value="faculty" {{ old('affiliation') == 'faculty' ? 'selected' : '' }}>Faculty</option>
                <option value="staff" {{ old('affiliation') == 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="external" {{ old('affiliation') == 'external' ? 'selected' : '' }}>External</option>
              </select>
            </div>
          </div>

          <div class="form-column">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" id="username" name="username" placeholder="Enter Username" value="{{ old('username') }}" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <div class="password-input-group">
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
                <button type="button" class="toggle-password" id="togglePassword">👁️</button>
              </div>
            </div>

            <div class="form-group">
              <label for="confirmPassword">Confirm Password</label>
              <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Re-enter Password" required>
            </div>

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

        <button type="submit" class="submit-btn">Sign Up</button>
        <p class="signup-text">
                Already have an account? <a href="{{ route('login') }}" class="signup-link">Login</a>
        </p>
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

    // File upload logic
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
        updateFileName(e.dataTransfer.files[0].name);
      }
    });

    uploadLabel.addEventListener('click', () => {
      fileInput.click();
    });

    fileInput.addEventListener('change', function() {
      if (this.files.length > 0) {
        updateFileName(this.files[0].name);
      }
    });

    function updateFileName(name) {
        uploadLabel.innerHTML = `<p class="upload-text" style="color: #28a745;">✓ ${name}</p>`;
    }
  </script>
</body>
</html>