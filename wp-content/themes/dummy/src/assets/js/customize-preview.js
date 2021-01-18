import $ from 'jquery';
import stripTags from './helpers/strip-tags';

wp.customize('blogname', (value) => {
  value.bind((to) => {
    console.log(to);
    $('.c-header__blogname').html(to);
  });
});

wp.customize('_theme_name_site_info', (value) => {
  value.bind((to) => {
    console.log(to);
    $('.c-site-info__text').html(stripTags(to, '<a>'));
  });
});
