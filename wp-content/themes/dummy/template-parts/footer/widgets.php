<?php 
    // This will display how many footer we want on the column of the layout
    $footer_layout = '3,3,3,3';
    $columns = explode(',', $footer_layout);
    $GLOBALS['footer_background'] = 'dark';
    $widget_active = false;
    foreach ($columns as $i => $column) {
        if(is_active_sidebar('footer-sidebar-' . ($i + 1))) {
            $widget_active = true;
        }
    }
    if($widget_active) : ?>
    <div class="c-footer c-footer--<?php $footer_background; ?>">
        <div class="o-container">
            <div class="o-row">
                <?php foreach($columns as $i => $column) : ?>
                    <div class="
                        o-row__column 
                        o-row__column--span-12 
                        o-row__column--span-<?php echo $column; ?>@medium">
                        <?php if(is_active_sidebar( 'footer-sidebar-' . ($i + 1))) {
                            dynamic_sidebar('footer-sidebar-' . ($i + 1));
                        }?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>