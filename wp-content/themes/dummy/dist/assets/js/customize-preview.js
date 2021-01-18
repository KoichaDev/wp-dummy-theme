import $ from 'jquery';
import stripTags from './helpers/strip-tags';

wp.customize('blogname', (value) => {
  value.bind((to) => {
    console.log(to);
    $('.c-header__blogname').html(to);
  });
});

// transport preview for the color accent of WP Customize
wp.customize('_theme_name_accent_colour', (value) => {
  value.bind((to) => {
    let inlineCSS = ``;
    let inlineCSSObj = _theme_name['inline-css'];
    for (let selector in _theme_name['inline-css']) {
      inlineCSS += `${selector} {`;
      for (let prop in inlineCSSObj[selector]) {
        let value = inlineCSSObj[selector][prop];
        inlineCSS += `${prop}: ${wp.customize(value).get()}`;
      }
      inlineCSS += `}`;
    }
    $('#_theme_name-stylesheet-inline-css').html(inlineCSS);
  });
});

wp.customize('_theme_name_site_info', (value) => {
  value.bind((to) => {
    console.log(to);
    $('.c-site-info__text').html(stripTags(to, '<a>'));
  });
});
