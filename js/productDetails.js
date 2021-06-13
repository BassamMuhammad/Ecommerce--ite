document
  .querySelector('.product-details__cta-btns .add-to-cart-btn')
  .addEventListener('click', event => {
    alert('Item Added to Cart.');
    const productQuantity = document.querySelector(
      '.product-details__cta-btns #quantity'
    ).value;
    window.location = `addToCart.php?id=${event.target.id}&quantity=${productQuantity}`;
  });

document
  .querySelector('.product-details  .add-to-favourites-btn')
  .addEventListener('click', () => alert('Item Added to Favourites.'));
