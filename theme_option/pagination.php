<?php

function custom_pagination($args = array(), $query_object = 'wp_query') {

    if ($query_object == 'wp_query') {
        global $wp_query;
        $main_query = $wp_query;
    } else {
        $main_query = $query_object;
    }
    $big = 999999999;
    $search_for = array($big, '#038;');
    $replace_with = array('%#%', '');
    $pages = paginate_links(array(
        'base' => str_replace($search_for, $replace_with, esc_url(get_pagenum_link($big))),
        'format' => '?page=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $main_query->max_num_pages,
        'prev_next' => false,
        'type' => 'array',
        'prev_next' => TRUE,
        'prev_text' => '<i class="fa fa-angle-left"></i>',
        'next_text' => '<i class="fa fa-angle-right"></i>',
    ));
    if (is_array($pages)) {
        $current_page = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<ul class="pagination">';
        foreach ($pages as $i => $page) {
            if ($current_page == 1 && $i == 0) {
                echo "<li class='active'>$page</li>";
            } else {
                if ($current_page != 1 && $current_page == $i) {
                    echo "<li class='active'>$page</li>";
                } else {
                    echo "<li>$page</li>";
                }
            }
        }
        echo '</ul>';
    }
}

?>