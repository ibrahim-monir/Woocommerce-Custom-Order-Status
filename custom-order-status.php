// Register Custom Order Status "Confirm"
function custom_register_order_status_confirmed() {
    register_post_status( 'wc-confirmed', array(
        'label'                     => 'Confirmed',
        'public'                    => true,
        'show_in_admin_status_list'  => true,
        'show_in_admin_all_list'     => true,
        'exclude_from_search'        => false,
        'label_count'                => _n_noop( 'Confirmed (%s)', 'Confirmed (%s)' )
    ));
}
add_action( 'init', 'custom_register_order_status_confirmed' );

// Add Custom Order Status to WooCommerce Order Statuses
function custom_add_order_status_confirmed( $order_statuses ) {
    $order_statuses['wc-confirmed'] = 'Confirmed';
    return $order_statuses;
}
add_filter( 'wc_order_statuses', 'custom_add_order_status_confirmed' );

function custom_order_status_confirmed_style() {
    echo '<style>
        mark.status-confirmed {
            background: #EB6508 !important; /* Blue color */
            color: #fff !important;
        }
    </style>';
}
add_action( 'admin_head', 'custom_order_status_confirmed_style' );

