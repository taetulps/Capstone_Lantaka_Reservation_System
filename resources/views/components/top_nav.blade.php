<link rel="stylesheet" href="{{ asset('css/employee_top_nav.css') }}">     
            <div class="header-left">
                <button class="menu-toggle">☰</button>
            </div>
            <div class="header-right">
                <button class="icon-btn">🔔</button>
                <div class="user-profile" id="open-modal">
                    <div class="user-avatar">👤</div>
                    <div class="user-info">
                        <p class="user-name">Welcome, {{ Auth::user()->name }}!</p>
                        
                        <p class="user-role">{{ ucfirst(Auth::user()->role) }}</p>
                    </div>
                </div>

                <div class="user-profile-modal">
                  <a href="#" class="modal-link">
                    <button class="btn-view-account">View your account</button>
                  </a>
                  <form class="modal-form">
                    <button type="submit" class="btn-logout">Logout</button>
                  </form>
                </div>
            </div>

            <script>
              const openBtn = document.getElementById('open-modal');
              const modal = document.querySelector('.user-profile-modal');

              function openModal(){
                modal.classList.toggle('show')
              }

              openBtn.addEventListener("click", openModal);  
              
              document.body.addEventListener('click', (e) => {
                const clickedInsideModal = modal.contains(e.target);
                const clickedOpenBtn = openBtn.contains(e.target);

                if (!clickedInsideModal && !clickedOpenBtn) {
                  modal.classList.remove('show');
                }
              });

            </script>
      