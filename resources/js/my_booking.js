
const cartItem = document.querySelector('.cart-items');

cartItem.addEventListener('click',(e)=>{
  const item = e.target.closest('.cart-item');
  if(!item) return;

  item.classList.toggle('highlighted')
})
