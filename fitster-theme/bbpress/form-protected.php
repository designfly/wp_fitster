<?php

/**
 * Password Protected
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
	<fieldset class="bbp-form" id="bbp-protected">
		<Legend><?php _e( 'Protected', 'bbpress' ); ?></legend>

		<?php echo get_the_password_form(); ?>

	</fieldset>
</div>
</div>
</div>