const handleCheckoutButtonClick = function () {
  document.querySelector('.cart-main .cart-items-list li')
    ? (window.location = 'addressInfo.html')
    : alert('There are no items in cart');
};

document
  .getElementById('checkout-btn')
  .addEventListener('click', handleCheckoutButtonClick);
