<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lantaka Room and Venue Reservation System - Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="background-overlay"></div>
    
    <main class="login-container">
        <div class="login-card">
            <!-- Logo Section -->
            <div class="logo-section">
            <img src="{{ asset('images/adzu_logo.png') }}" class="logo">
            </div>

            <!-- University Text -->
            <p class="university-name">Ateneo de Zamboanga University</p>

            <!-- Main Heading -->
            <h1 class="main-heading">Lantaka Room and Venue Reservation System</h1>

            <!-- Subtitle -->
            <p class="subtitle">Lantaka Online Room & Venue Reservation System</p>

            <!-- Login Form -->
            <form class="login-form" method="POST" action="{{ route('login.post') }}">
                @csrf
                <!-- Username Input -->
                <div class="input-group">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <input 
                        type="text" 
                        name="username"
                        class="form-input" 
                        placeholder="Username" 
                        required
                    >
                </div>

                <!-- Password Input -->
                <div class="input-group">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <input 
                        type="password" 
                        name="password"
                        class="form-input" 
                        placeholder="Password" 
                        required
                    >
                </div>

                <!-- Login Button -->
                <button type="submit" class="login-btn">LOGIN</button>
            </form>

            <!-- Sign Up Link -->
            <p class="signup-text">
                Don't have an account? <a href="#" class="signup-link">Sign up</a>
                <br>  
                <br>
                <a href="{{ route('employee_dashboard') }}" class="signup-link"> Employee Dashboard Page Test</a>
                <br>
                <a href="{{ route('index') }}" class="signup-link">Index Page Test</a>
            </p>
        </div>
    </main>
</body>
</html>
