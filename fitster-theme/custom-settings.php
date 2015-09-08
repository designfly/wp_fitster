<?php  
add_action('admin_menu','fitster_index_settings');
function fitster_index_settings() {
  add_menu_page('Strona Główna - Teksty', 'Teksty', 'manage_options', 'fitster_index_settings.php', 'fitster_index_settings_page' , plugins_url('/images/icon.png') );    
  add_action( 'admin_init', 'register_fitster_index_settings' );
}
function register_fitster_index_settings() {
    register_setting( 'fitster_index', 'fitster_cwiczenia');
    register_setting( 'fitster_index', 'fitster_treningi');
    register_setting( 'fitster_index', 'fitster_odzywianie');
    register_setting( 'fitster_index', 'fitster_suplementacja');
    register_setting( 'fitster_index','fitster_our_shop');
    register_setting( 'fitster_index','fitster_mozliwosc1');
    register_setting( 'fitster_index','fitster_mozliwosc2');
    register_setting( 'fitster_index','fitster_mozliwosc3');
    register_setting('fitster_index','fitster_desc');
    register_setting('fitster_index','fitster_rejestracja');

    register_setting('fitster_index','fitster_transformacja');
    register_setting('fitster_index','fitster_fat_lose');
    register_setting('fitster_index','fitster_muscle');

    register_setting('fitster_index','fitster_rookie');
    register_setting('fitster_index','fitster_intermediate');
    register_setting('fitster_index','fitster_advanced');
}
function fitster_index_settings_page() {
?>
<div class="wrap">
<h2>Strona Główna - Teksty</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'fitster_index' ); ?>
    <?php do_settings_sections( 'fitster_index' ); ?>
    <p>Tutaj możesz zmienić teksty w czterech polach, które znajdują się zaraz pod sliderem.</p>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Ćwiczenia</th>
        <td><textarea name="fitster_cwiczenia"> <?php echo esc_attr( get_option('fitster_cwiczenia') ); ?> </textarea></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Treningi</th>
        <td><textarea  name="fitster_treningi"> <?php echo esc_attr( get_option('fitster_treningi') ); ?></textarea></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Odżywianie</th>
        <td><textarea  name="fitster_odzywianie"> <?php echo esc_attr( get_option('fitster_odzywianie') ); ?></textarea></td>
        </tr>
        <tr valign="top">
        <th scope="row">Suplementacja</th>
        <td><textarea  name="fitster_suplementacja"> <?php echo esc_attr( get_option('fitster_suplementacja') ); ?></textarea></td>
        </tr>        
    </table>
    <p>Tutaj możesz zmienić tekst, który znajduje się pod "Odwiedź nasz sklep".</p>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Odwiedź nasz Sklep</th>
        <td><textarea name="fitster_our_shop"> <?php echo esc_attr( get_option('fitster_our_shop') ); ?> </textarea></td>
        </tr>
    </table>
    <p>Tutaj możesz opisać możliwości wynikające z założenia konta</p>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Możliwość #1</th>
        <td><textarea name="fitster_mozliwosc1"> <?php echo esc_attr( get_option('fitster_mozliwosc1') ); ?> </textarea></td>
        </tr>
        <tr valign="top">
        <th scope="row">Możliwość #2</th>
        <td><textarea name="fitster_mozliwosc2"> <?php echo esc_attr( get_option('fitster_mozliwosc2') ); ?> </textarea></td>
        </tr>
        <tr valign="top">
        <th scope="row">Możliwość #3</th>
        <td><textarea name="fitster_mozliwosc3"> <?php echo esc_attr( get_option('fitster_mozliwosc3') ); ?> </textarea></td>
        </tr>
    </table>
    <p>Tutaj możesz umieścić krótki opis lub motto witryny, który znajdzie się w stopce pod logo.</p>
        <table class="form-table">
        <tr valign="top">
        <th scope="row">Opis:</th>
        <td><textarea name="fitster_desc"> <?php echo esc_attr( get_option('fitster_desc') ); ?> </textarea></td>
        </tr>
      </table>
    <p>Tutaj możesz umieścić tekst, który mówi dlaczego warto się zarejestrować. Jest on wyświetlany na podstronie rejestracji</p>
    <table>
    <tr valign="top">
        <th scope="row">Dlaczego warto się zarejestrować?:</th>  
        <td><textarea name="fitster_rejestracja"> <?php echo esc_attr( get_option('fitster_rejestracja') ); ?> </textarea></td>  
    </tr>
    </table>
    <p>Tutaj Uzupełnisz Opisy poszczególnych opcji w wyszukiwarce planów.</p>
    <p>Efekty:</p>
    <table>
    <tr valign="top">
        <th scope="row">Transformacja:</th>  
        <td><textarea name="fitster_transformacja"><?php echo esc_attr( get_option('fitster_transformacja') ); ?> </textarea></td>  
    </tr>
    <tr valign="top">
        <th scope="row">Utrata Tłuszczu:</th>  
        <td><textarea name="fitster_fat_lose"><?php echo esc_attr( get_option('fitster_fat_lose') ); ?> </textarea></td>  
    </tr>
    <tr valign="top">
        <th scope="row">Budowa Mięśni:</th>  
        <td><textarea name="fitster_muscle"><?php echo esc_attr( get_option('fitster_muscle') ); ?> </textarea></td>  
    </tr>
    </table>
    <p>Stopień Zaawansowania:</p>
    <table>
    <tr valign="top">
        <th scope="row">Poczatkujący:</th>  
        <td><textarea name="fitster_rookie"><?php echo esc_attr( get_option('fitster_rookie') ); ?> </textarea></td>  
    </tr> 
    <tr valign="top">
        <th scope="row">Średnio Zaawansowany:</th>  
        <td><textarea name="fitster_intermediate"><?php echo esc_attr( get_option('fitster_intermediate') ); ?> </textarea></td>  
    </tr>
    <tr valign="top">
        <th scope="row">Zaawansowany:</th>  
        <td><textarea name="fitster_advanced"><?php echo esc_attr( get_option('fitster_advanced') ); ?> </textarea></td>  
    </tr>          
    </table>
    <?php submit_button(); ?>

</form>
</div>
<?php 
}
function register_fitster_settings() {
add_settings_section('fitster_community_section', 'Portale społecznościowie', 'fitster_community_section', 'general' );
//Facebook 
add_settings_field( 'fitster_fb', 'Facebook URL', 'fitster_fb', 'general','fitster_community_section');
register_setting( 'general', 'fitster_fb');
//Google+
add_settings_field( 'fitster_gp', 'Google+ URL', 'fitster_gp', 'general','fitster_community_section');
register_setting( 'general', 'fitster_gp');
//Youtube
add_settings_field( 'fitster_yt', 'Youtube URL', 'fitster_yt', 'general','fitster_community_section');
register_setting( 'general', 'fitster_yt');
//Instagram
add_settings_field( 'fitster_in', 'Instagram URL', 'fitster_in', 'general','fitster_community_section');
register_setting( 'general', 'fitster_in');
//Twitter
add_settings_field( 'fitster_tw', 'Twitter URL', 'fitster_tw', 'general','fitster_community_section');
}
function fitster_community_section() {
  ?>
  <p>Tutaj możesz dodać linki do portali społecznościowych.</p>
  <?php
}
function fitster_fb() {
  ?>
  <input type="text" id="fitster_fb" name="fitster_fb" value="<?php echo get_option('fitster_fb');?>"/>
  <?php 
}
function fitster_gp() {
  ?>
  <input type="text" id="fitster_gp" name="fitster_gp" value="<?php echo get_option('fitster_gp');?>"/>
  <?php 
}
function fitster_yt() {
  ?>
  <input type="text" id="fitster_yt" name="fitster_yt" value="<?php echo get_option('fitster_yt');?>"/>
  <?php 
}
function fitster_in() {
  ?>
  <input type="text" id="fitster_in" name="fitster_in" value="<?php echo get_option('fitster_in');?>"/>
  <?php 
}
function fitster_tw() {
  ?>
  <input type="text" id="fitster_tw" name="fitster_tw" value="<?php echo get_option('fitster_tw');?>"/>
  <?php 
}
add_action('admin_init','register_fitster_settings');