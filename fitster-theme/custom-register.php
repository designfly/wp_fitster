<?php 
add_action ( 'user_register', 'send_activation_link');
function send_activation_link($user_id) {
$user_info=get_userdata( $user_id );
$to = $user_info->user_email;
$subject = 'Potwierdź swój E-mail';
// The unique token can be inserted in the message with %s
$message = 'Thank you. Please <a href="<?= home_url("confirm") ?>?token=%s">confirm</a> to continue';
  EmailConfirmation::send($user_id, $to, $subject, $message,$headers='');
}
add_action('register_post', 'binda_register_fail_redirect', 99, 3);

function binda_register_fail_redirect( $sanitized_user_login, $user_email, $errors ){
    //this line is copied from register_new_user function of wp-login.php
    $errors = apply_filters( 'registration_errors', $errors, $sanitized_user_login, $user_email );
    //this if check is copied from register_new_user function of wp-login.php
    if ( $errors->get_error_code() ){
        //setup your custom URL for redirection
        $redirect_url = get_bloginfo('url') . '/rejestracja';
        //add error codes to custom redirection URL one by one
        session_start();
        $_SESSION['errors'] = array();
        foreach ( $errors->errors as $e => $m ){
            // $redirect_url = add_query_arg( $e, '1', $redirect_url );
            $_SESSION['errors'][] = $m[0];
        }
        //add finally, redirect to your custom page with all errors in attributes
        wp_redirect( $redirect_url );
        exit;   
    }
}
// Check the form for errors
add_action( 'register_post', 'check_extra_register_fields', 10, 3 );
function check_extra_register_fields($login, $email, $errors) {
	if ( $_POST['password'] !== $_POST['repeat_password'] ) {
		$errors->add( 'passwords_not_matched', "Hasła muszą być takie same." );
	}
	if ( strlen( $_POST['password'] ) < 8 ) {
		$errors->add( 'password_too_short', "Hasło jest za krótkie" );
	}
}
add_action( 'user_register', 'register_extra_fields', 100 );
function register_extra_fields( $user_id ){
	$userdata = array();

	$userdata['ID'] = $user_id;
	if ( $_POST['password'] !== '' ) {
		$userdata['user_pass'] = $_POST['password'];
	}
	$new_user_id = wp_update_user( $userdata );
}
?>