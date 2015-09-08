<?php
switch ( bp_current_action() ) :
	case 'general':
	bp_get_template_part( 'members/single/settings/general');
	break;
	case 'profile'        :
		bp_get_template_part( 'members/single/settings/profile');
	break;
endswitch;