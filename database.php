<?php 
function bostonpizza_database() {

    global $wpdb;
    global $bosstonpizza_db_version;
    $bosstonpizza_db_version = "1.0";

    $charset_collate = $wpdb->get_charset_collate();
    $table = $wpdb->prefix . 'reservations';

    $sql = "CREATE TABLE IF NOT EXISTS $table(
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            name varchar(50) NOT NULL,
            date datetime NOT NULL,
            email varchar(50) DEFAULT '' NOT NULL,
            phone varchar(12) NOT NULL,
            message longtext NOT NULL,
            PRIMARY KEY (id)
    ) $charset_collate; ";

    require_once(ABSPATH. 'wp-admin/includes/upgrade.php');
    dbDelta( $sql );
}
add_action('after_setup_theme', 'bostonpizza_database' );


function bostonpizza_save_reservation() {
    global $wpdb;

    if ( isset( $_POST['submit_reservation']) && $_POST['hidden'] == "1" ) {
        
         $name = sanitize_text_field($_POST['name']);
            $date = sanitize_text_field($_POST['date']);
            $email = sanitize_email($_POST['email']);
            $phone = sanitize_text_field($_POST['phone']);
            $message = sanitize_text_field($_POST['message']);

            $table = $wpdb->prefix . 'reservations';

            $data = array(
                'name' => $name,
                'date' => $date,
                'email' => $email,
                'phone' => $phone,
                'message' => $message
            );

            $format = array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s'
            );

        $wpdb->insert($table, $data, $format);
        $url = get_page_by_title('Thanks for the reservation!');
        wp_redirect(get_permalink($url));
        exit();
    }

}

add_action('init', 'bostonpizza_save_reservation' );


