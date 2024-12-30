<?php
function enqueue_storefront_child_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_storefront_child_styles');


function custom_post_type_cities() {
    $args = array(
        'label' => 'Cities',
        'public' => true,
        'supports' => array('title', 'editor'),
        'has_archive' => true,
        'show_in_rest' => true,
    );
    register_post_type('cities', $args);
}
add_action('init', 'custom_post_type_cities');

//custom_taxonomy function
function custom_taxonomy_countries() {
    register_taxonomy(
        'countries',
        'cities',
        array(
            'label' => 'Countries',
            'hierarchical' => true,
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'custom_taxonomy_countries');

//add_city_meta_box 
function add_city_meta_boxes() {
    add_meta_box('city_coordinates', 'City Coordinates', 'render_city_meta_box', 'cities', 'normal', 'default');
}
add_action('add_meta_boxes', 'add_city_meta_boxes');

function render_city_meta_box($post) {
    $latitude = get_post_meta($post->ID, '_latitude', true);
    $longitude = get_post_meta($post->ID, '_longitude', true);
    echo '<label for="latitude">Latitude:</label>';
    echo '<input type="text" name="latitude" value="' . esc_attr($latitude) . '" /><br><br>';
    echo '<label for="longitude">Longitude:</label>';
    echo '<input type="text" name="longitude" value="' . esc_attr($longitude) . '" />';
}

//save_city_meta_box
function save_city_meta_box_data($post_id) {
    if (isset($_POST['latitude'])) {
        update_post_meta($post_id, '_latitude', sanitize_text_field($_POST['latitude']));
    }
    if (isset($_POST['longitude'])) {
        update_post_meta($post_id, '_longitude', sanitize_text_field($_POST['longitude']));
    }
}
add_action('save_post', 'save_city_meta_box_data');

class City_Temperature_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct('city_temperature_widget', 'City Temperature Widget');
    }

    public function widget($args, $instance) {
        $city_id = $instance['city'];
        $latitude = get_post_meta($city_id, '_latitude', true);
        $longitude = get_post_meta($city_id, '_longitude', true);

        $api_key = 'd89fdbfa505549f2ab8fd4a685d957bd';
        $response = wp_remote_get("https://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&appid=$api_key&units=metric");
        $data = json_decode(wp_remote_retrieve_body($response), true);
        $temperature = isset($data['main']['temp']) ? $data['main']['temp'] . '°C' : 'N/A';

        echo $args['before_widget'];
        echo $args['before_title'] . get_the_title($city_id) . $args['after_title'];
        echo '<p>Temperature: ' . esc_html($temperature) . '</p>';
        echo $args['after_widget'];
    }

    public function form($instance) {
        // Widget form logic for selecting a city.
    }

    public function update($new_instance, $old_instance) {
        return $new_instance;
    }
}
add_action('widgets_init', function() {
    register_widget('City_Temperature_Widget');
});


?>