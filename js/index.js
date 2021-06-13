const openProductPage = function (event) {
  window.location = `productDetails.php?id=${event.target.id}`;
};

Array.from(document.querySelectorAll(".products-list .product")).forEach(
  (product) => {
    product.addEventListener("click", openProductPage);
  }
);
Array.from(document.querySelectorAll(".add-to-cart-btn")).forEach((product) => {
  product.addEventListener("click", () => alert("Item Added to Cart."));
});
Array.from(document.querySelectorAll(".add-to-favourites-btn")).forEach(
  (product) => {
    product.addEventListener("click", () => alert("Item Added to Favourites."));
  }
);

// document
//   .querySelector(".add-to-cart-btn")
//   .addEventListener("click", () => alert("Item Added to Cart."));

// document
//   .querySelector(".add-to-favourites-btn")
//   .addEventListener("click", () => alert("Item Added to Favourites."));
