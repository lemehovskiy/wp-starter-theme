<?php


function my_browser_body_class($classes)
{
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone, $is_edge;
    if ($is_lynx) $classes[] = 'lynx';
    elseif ($is_edge) $classes[] = 'edge';
    elseif ($is_gecko) $classes[] = 'gecko';
    elseif ($is_opera) $classes[] = 'opera';
    elseif ($is_NS4) $classes[] = 'ns4';
    elseif ($is_safari) $classes[] = 'safari';
    elseif ($is_chrome) $classes[] = 'chrome';
    elseif ($is_IE) {
        $classes[] = 'ie';
        if (preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
            $classes[] = 'ie' . $browser_version[1];
    } else $classes[] = 'unknown';
    if ($is_iphone) $classes[] = 'iphone';
    if (stristr($_SERVER['HTTP_USER_AGENT'], "mac")) {
        $classes[] = 'osx';
    } elseif (stristr($_SERVER['HTTP_USER_AGENT'], "linux")) {
        $classes[] = 'linux';
    } elseif (stristr($_SERVER['HTTP_USER_AGENT'], "windows")) {
        $classes[] = 'windows';
    }
    return $classes;
}

add_filter('body_class', 'my_browser_body_class');


function remove_weird_characters($content) {
    $content = preg_replace('/\x03/', '', $content);
    return $content;
}

add_filter('the_content', 'remove_weird_characters');
add_filter('the_title', 'remove_weird_characters');


function acf_remove_weird_characters( $value, $post_id=0, $field=array() ) {
    if (isset($field['type']) && ($field['type'] == 'repeater' || $field['type'] == 'flexible_content')) {
        // abort if it's a repeater
        return $value;
    }
    if (!is_array($value)) {
        $value = preg_replace('/\x03/', '', $value);
        return $value;
    }
    $return = array();
    foreach ($value as $index => $data) {
        $return[$index] = acf_remove_weird_characters ($data);
    }
    return $return;
}

add_filter('acf/update_value', 'acf_remove_weird_characters', 10, 3);

function get_total_from_repeater_field($repeater, $repeater_field, $post_id)
{
    $arr_helper = array();

    while (have_rows($repeater, $post_id)) : the_row();

        if (get_sub_field($repeater_field)) {
            $arr_helper[] = get_sub_field($repeater_field);
        }

    endwhile;

    return array_sum($arr_helper);

}

function get_lowest_value_from_repeater_field($repeater, $repeater_field, $post_id)
{
    $arr_helper = array();

    while (have_rows($repeater, $post_id)) : the_row();
        if (get_sub_field($repeater_field)) {
            $arr_helper[] = get_sub_field($repeater_field);
        }

    endwhile;

    return min($arr_helper);

}

function get_highest_value_from_repeater_field($repeater, $repeater_field, $post_id)
{
    $arr_helper = array();

    while (have_rows($repeater, $post_id)) : the_row();
        if (get_sub_field($repeater_field)) {
            $arr_helper[] = get_sub_field($repeater_field);
        }

    endwhile;

    return max($arr_helper);

}