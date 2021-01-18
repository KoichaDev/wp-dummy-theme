import $ from 'jquery';

wp.customize('_theme_name_site_info', (value) => {
  value.bind((to) => {
    console.log(to);
    $('.c-site-info__text').html(to);
  });
});
