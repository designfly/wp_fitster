<?php
/**
 * Show messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! $messages ){
	return;
}

?>

<?php foreach ( $messages as $message ) : 
    if ( strpos( $message, 'dodano do koszyka' ) === false ) :?>
            <div class="woocommerce-message"><?php echo wp_kses_post( $message ); ?></div>
 <?php 
    endif;
endforeach; ?>
