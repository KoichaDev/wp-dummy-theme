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
    $('#_theme_name-stylesheet-inline-css').html(
      `
      a {
        color: ${to}
      }
      :focus {
        outline-color: ${to}
      }

      .c-post-sticky { 
        border-left-color: ${to}
      }

      button, input[type=submit],
      .header-nav .menu > .menu-item:not(.mega) 
      .sub-menu .menu-item a {
            background: ${to}
      }
      `
    );
  });
});

wp.customize('_theme_name_site_info', (value) => {
  value.bind((to) => {
    console.log(to);
    $('.c-site-info__text').html(stripTags(to, '<a>'));
  });
});
