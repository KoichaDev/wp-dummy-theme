<form action="<?php esc_url(home_url('/')); ?>" method="get" role="search" class="c-search-form">
    <label class="c-search-form__label">
        <span class="screen-reader-text">
            <?php esc_html_x('Search for:', 'label', '_theme_name') ?>
        </span>
    </label>
    <!-- the name 's' is important, because this is what WP use in order to filter your posts with this parameter -->
    <input 
        type="search" 
        name="s" 
        class="c-search-form__field"
        placeholder=<?php esc_attr_x("Search something...", 'placeholder', '_theme_name'); ?>  
        value="<?php echo esc_attr(get_search_query()); ?>"
    />
    <button
        type="submit" 
        value="Search"
        class="c-search-form__button"
    >
    <span class="u-screen-reader-text">
        <?php echo esc_html_x('Search', 'submit button', '_theme_name'); ?>
    </span>
    <i class="fas fa-search" aria-hidden="true"></i>
    </button>
</form>