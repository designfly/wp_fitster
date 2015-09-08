<?php
/**
 * Review order table
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="col-md-12 podsumowanie">
		<h2>Podsumowanie zamówienia</h2>
		<hr>
		<table>
			<tr class="top-table">
				<td>Produkt</td>
				<td>Cena</td>
				<td>Ilość</td>
				<td>Razem</td>
			</tr>
		<?php
			do_action( 'woocommerce_review_order_before_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					?>
					<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						<td class="product-name">
							<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
						</td>
						<td><?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?></td>
						<td><?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity',$cart_item['quantity'], $cart_item, $cart_item_key ); ?>
							<?php echo WC()->cart->get_item_data( $cart_item ); ?></td>
						<td class="product-total">
							<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
						</td>
					</tr>
					<?php
				}
			}

			do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="others coupon-<?php echo esc_attr( $code ); ?>">
				<td><?php wc_cart_totals_coupon_label( $coupon ); ?></td>
				<td></td>
				<td></td>
				<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>
				<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

			<tr>
				<td>Wysyłka</td>
				<td></td>
				<td></td>
				<td><?php echo WC()->cart->get_cart_shipping_total(); ?></td>
			</tr>

			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

		<?php endif; ?>

			<tr>
				<td></td>
				<td></td>
				<td class="bottom-table"><?php echo WC()->cart->cart_contents_count; ?></td>
				<td class="bottom-table"><?php echo WC()->cart->total.get_woocommerce_currency_symbol();?></td>
			</tr>
		</table>