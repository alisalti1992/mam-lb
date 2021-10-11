<?php

use MAM\Plugin\Services\Admin\ImportOrders;

get_header();

/**
 * @var $orders WP_Query
$orders = apply_filters('mam-orders-filtered-posts', []);
if ($orders->have_posts()) {
    while ($orders->have_posts()) {
        $orders->the_post();
        if(get_field('resource_url') != ''){
            continue;
        }
        $live = get_field('live_link');
        if($live == '') {
            echo '<p>Skipped: ' . get_permalink() . '</p>';
            continue;
        }
        $resourceURL =  ImportOrders::domain($live);
        update_field('resource_url', $resourceURL, get_the_ID());
        echo '<p>Updated: ' . get_permalink() . '</p>';
    }
}

echo '<p>Done</p>';
*/
get_footer();