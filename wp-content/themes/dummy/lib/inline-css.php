<?php 
    $accent_colour = sanitize_hex_color( get_theme_mod( '_theme_name_accent_colour', '#20ddae' ) );
    $inline_styles = "
        a {
            color: {$accent_colour}
        }
    "; 