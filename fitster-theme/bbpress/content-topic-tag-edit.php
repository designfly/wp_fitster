<?php

/**
 * Topic Tag Edit Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>
<div class="container forum">
	<div class="header">
        <h1><strong>forum</strong></h1>
    </div>
    <div class="under">

    </div>
<div class="bg">
<div id="bbpress-forums">

	<?php bbp_breadcrumb(); ?>

	<?php bbp_topic_tag_description(); ?>

	<?php do_action( 'bbp_template_before_topic_tag_edit' ); ?>

	<?php bbp_get_template_part( 'form', 'topic-tag' ); ?>

	<?php do_action( 'bbp_template_after_topic_tag_edit' ); ?>

</div>
</div>
</div>