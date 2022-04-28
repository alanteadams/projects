'use strict';

const container = document.querySelector('.review-links');
const items = container.querySelectorAll('.review-link');
const headerReplace = document.querySelector('.rating-replace');

items.forEach(function(item, index, array) {
  item.addEventListener('click', function(e) {
    e.preventDefault();

    headerReplace.innerHTML = 'Thank you for you rating!';

    if (!item.classList.contains('active')) {
      item.classList.add('active');
    }

    for (let i = index; i < array.length; i++) {
      array[i].classList.remove('active');
    }

    for (let i = index; i >= 0; --i) {
      array[i].classList.add('active');
    }
  });

  window.addEventListener('load', e => {
    e.preventDefault();

    headerReplace.innerHTML = 'Thank you for you rating!';

    if (item.classList.contains('active')) {
      const b = index;

      for (let i = b; i >= 0; --i) {
        array[i].classList.add('active');
      }
    }
  });
});
