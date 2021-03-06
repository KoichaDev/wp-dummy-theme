<?php 
    $footer_background = _theme_name_sanitize_footer_background(get_theme_mod('_theme_name_footer_background', 'dark'));
    // 2nd param is the default value will be added on the site
    $footer_customization_site_info = get_theme_mod( '_theme_name_site_info', '')
?>

<div class="c-site-info c-site-info--<?php echo $footer_background; ?>">
    <div class="o-container">
        <div class="o-row">
            <div class="o-row__column o-row__column--span12 c-site-info__text">
                <?php if($footer_customization_site_info) :
                $allowed_once = ['a' => [
                    'href' => [],
                    'title' => [], 
                ]];
                echo wp_kses( $footer_customization_site_info, $allowed_once );
                else : ?>
                    <p>All Right Reserved</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>