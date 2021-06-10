const openProductPage = function (event) {
  window.location = `productDetails.html?id=${event.target.id}`;
};

Array.from(document.querySelectorAll('.products-list .product')).forEach(
  product => {
    product.addEventListener('click', openProductPage);
  }
);

Array.from(
  document.querySelectorAll('.products-list .product .add-to-favourites-btn')
).forEach(button =>
  button.addEventListener('click', event => {
    event.stopPropagation();
    alert('Item added to Favourites');
  })
);
