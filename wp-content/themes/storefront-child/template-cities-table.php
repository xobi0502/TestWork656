<?php
/* Template Name: Cities Table */
get_header();
global $wpdb;

$cities = $wpdb->get_results("
    SELECT p.ID, p.post_title, t.name AS country, pm.meta_value AS latitude, pm2.meta_value AS longitude
    FROM $wpdb->posts p
    LEFT JOIN $wpdb->term_relationships tr ON p.ID = tr.object_id
    LEFT JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
    LEFT JOIN $wpdb->terms t ON tt.term_id = t.term_id
    LEFT JOIN $wpdb->postmeta pm ON p.ID = pm.post_id AND pm.meta_key = '_latitude'
    LEFT JOIN $wpdb->postmeta pm2 ON p.ID = pm2.post_id AND pm2.meta_key = '_longitude'
    WHERE p.post_type = 'cities' AND p.post_status = 'publish'
");

echo '<table><tr><th>Country</th><th>City</th><th>Temperature</th></tr>';
foreach ($cities as $city) {
    $latitude = esc_attr($city->latitude);
    $longitude = esc_attr($city->longitude);

    $api_key = 'd89fdbfa505549f2ab8fd4a685d957bd';
    $response = wp_remote_get("https://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&appid=$api_key&units=metric");
    $data = json_decode(wp_remote_retrieve_body($response), true);
    $temperature = isset($data['main']['temp']) ? $data['main']['temp'] . '°C' : 'N/A';

    echo '<tr><td>' . esc_html($city->country) . '</td><td>' . esc_html($city->post_title) . '</td><td>' . esc_html($temperature) . '</td></tr>';
}
echo '</table>';
get_footer();
