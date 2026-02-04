
const statusCards = document.querySelector('.status-cards');

  statusCards.addEventListener('click', (e)=>{
    const activeCard = e.target.closest('.status-card'); 
    if (!activeCard) return;
    
    const isActive = activeCard.classList.contains('active');

    statusCards.querySelectorAll('.status-card').forEach(c => c.classList.remove('active'));

    if (!isActive) activeCard.classList.add('active');

  })

