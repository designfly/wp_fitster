<?php /* Template Name: Strona logowania */  ?>
<?php get_header(); ?>
<div class="container login">
    <div class="header">
        <h1><strong>Zaloguj się</strong></h1>
    </div>

    <div class="col-md-12">
        <div class="col-md-6">
            <h2>Nowi użytkownicy</h2>
            <div class="row">
                <hr>
            </div>
            <p><?php echo get_option('fitster_rejestracja');?></p>

            <a class="nowe-konto"href="<?php echo get_bloginfo('url') . '/register/';?>">Stwórz konto</a>
        </div>

        <div class="col-md-6">
            <h2>Zarejestrowani użytkownicy</h2>
            <div class="row">
                <hr>
            </div>
            <p>Jeśli masz już konto zaloguj się.</p>
    <?php $template->the_action_template_message( 'login' ); ?>
    <?php $template->the_errors(); ?>
    <form name="loginform" id="loginform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login' ); ?>" method="post">
        <p>
            <label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Username', 'theme-my-login' ); ?></label>
            <input type="text" name="log" id="user_login<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'log' ); ?>" size="20" />
        </p>
        <p>
            <label for="user_pass<?php $template->the_instance(); ?>"><?php _e( 'Password', 'theme-my-login' ); ?></label>
            <input type="password" name="pwd" id="user_pass<?php $template->the_instance(); ?>" class="input" value="" size="20" autocomplete="off" />
        </p>

        <?php do_action( 'login_form' ); ?>

        <p class="forgetmenot">
            <input name="rememberme" type="checkbox" id="rememberme<?php $template->the_instance(); ?>" value="forever" />
            <label for="rememberme<?php $template->the_instance(); ?>"><?php esc_attr_e( 'Remember Me', 'theme-my-login' ); ?></label>
        </p>
        <p class="submit">
            <input type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Log In', 'theme-my-login' ); ?>" />
            <input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>" />
            <input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
            <input type="hidden" name="action" value="login" />
        </p>
    </form>

<!--             <form>
                <label>Adres Email <strong>*</strong></label>
                <input type="email" required />
                <label>Hasło <strong>*</strong></label>
                <input type="password" required />
                <span><strong>* </strong>Pola wymagane</span>
                <input type="submit" value="Zaloguj się" />
                <a href="#">Zapomiałeś hasła?</a>
            </form> -->
        </div>
    </div>
</div>

<?php get_footer(); ?>