const toggleClass = function (element, oldClass, newClass) {
  element.classList.remove(oldClass);
  element.classList.add(newClass);
};

const toggleSecondaryLinks = function () {
  const secondaryLinks = document.querySelector('.secondary-links');
  if (secondaryLinksHidden())
    toggleClass(
      secondaryLinks,
      'secondary-links--hidden',
      'secondary-links--visible'
    );
  else
    toggleClass(
      secondaryLinks,
      'secondary-links--visible',
      'secondary-links--hidden'
    );

  function secondaryLinksHidden() {
    return secondaryLinks.classList.contains('secondary-links--hidden');
  }
};

document.querySelector('.down-arrow-link').addEventListener('click', event => {
  event.preventDefault();
  toggleSecondaryLinks();
});

document.querySelector('.hamburger-link').addEventListener('click', event => {
  event.preventDefault();
  toggleSecondaryLinks();
});
