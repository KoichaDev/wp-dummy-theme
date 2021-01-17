const navigation = document.querySelector('.c-navigation');

navigation.addEventListener(
  'mouseenter',
  (e) => {
    if (e.target.classList.contains('menu-item-has-children')) {
      e.target.classList.add('open');
    }
  },
  true
);

navigation.addEventListener(
  'mouseleave',
  (e) => {
    if (e.target.classList.contains('menu-item-has-children')) {
      e.target.classList.remove('open');
    }
  },
  true
);
