<?php get_header();?>

<?php 
global $wp_query;
$term = $wp_query->get_queried_object();

$children = get_terms( $term->taxonomy, array(
'parent'    => $term->term_id,
'hide_empty' => false
) );
// print_r($children); // uncomment to examine for debugging
if($children) { // get_terms will return false if tax does not exist or term wasn't found.
	include 'taxonomy-product_cat_parent.php';
} else {
	include 'taxonomy-product_cat_child.php';
}

?>


<?php get_footer();?>