<?php
require 'wp_bootstrap_pagination.php';
require 'wp_bootstrap_navwalker.php';
require 'function-comments.php';
require 'custom-comments.php';
require 'custom-settings.php';

// function update_ratings() {
//       $photos_ratings = array();
//       $sum = 0;
//       $galleries_ids;



//         // global $post;
//         // $photos_ratings = array();
//         // $sum = 0;
//         // $ids = mpp_get_all_media_ids();
//         // foreach ($ids as $id) {
//         //   $ratings = get_post_meta($id,'ratings',true);
//         //   if(empty($ratings)) {
//         //     $ratings = array('0');
//         //   }
//         //   foreach ($ratings as $user => $rating) {
//         //     $sum +=$rating;
//         //   }
//         //   $photos_ratings[] = $sum/sizeof($rating);
//         //  } 
//         //  if(empty($photos_ratings)) {
//         //   $photos_ratings = array('0');
//         //  }
//         //  $gallery_rating = array_sum($photos_ratings)/sizeof($photos_ratings);
// }
add_action('wp_ajax_remove_date','ajax_remove_date');
function ajax_remove_date() {
    $index = $_POST['index'];
    $post_id = $_POST['id'];
    $values = get_post_meta($post_id,'chart_values',true);
    unset($values[$index]);
    update_post_meta($post_id,'chart_values',$values);

}

function add_chart() {
  if(isset($_POST['add_chart']) && $_POST['add_chart'] == '1') {
    $chart_name = $_POST['chart_name'];
    $chart_unit = $_POST['chart_unit'];
    $chart_present = $_POST['chart_present'];
    $chart_goal = array($_POST['chart_goal']);
    $user_ID = get_current_user_id(); 
    $day = time();
    $chart_values = array(
      $day => $chart_present, 
      );
    $post_id = wp_insert_post(
      array(
        'comment_status'  =>  'closed',
        'ping_status'   =>  'closed',
        'post_author'   =>  $user_ID,
        'post_title'    =>  $chart_name,
        'post_status'   =>  'publish',
        'post_type'   =>  'wykres'
      )
  );

    update_post_meta($post_id, 'chart_goal', $chart_goal);
    update_post_meta($post_id, 'chart_values',$chart_values);
    update_post_meta($post_id,'chart_unit',$chart_unit);
  }
}
function update_chart() {
  if(isset($_POST['update_chart']) && $_POST['update_chart'] == '1') {
    $post_id = url_to_postid( "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] );
    $value = $_POST['update_value'];
    $date = strtotime($_POST['update_date']);
    $chart_values = get_post_meta($post_id,'chart_values',true);
    $chart_values[$date] = $value;
    update_post_meta($post_id,'chart_values',$chart_values);
  }
}
add_action( 'init', 'add_chart' );
add_action( 'init', 'update_chart' );
function my_member_username() {
  global $members_template;

  return $members_template->member->user_login;
}
add_filter( 'bp_member_name' , 'my_member_username' );

function my_bp_displayed_user_fullname() {
  global $bp;

  return $bp->displayed_user->userdata->user_login;
}
add_filter( 'bp_displayed_user_fullname' , 'my_bp_displayed_user_fullname' );
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_home_text' );
function jk_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Appartment'
  $defaults['home'] = 'Strona Główna';
  return $defaults;
}
function remove_my_meta_boxes() {
    remove_meta_box( 'woocommerce-product-images',  'product', 'side');
}
add_action( 'add_meta_boxes' , 'remove_my_meta_boxes', 40 );
add_filter('posts_orderby', 'group_by_post_type', 10, 2);
function group_by_post_type($orderby, $query) {
    global $wpdb;
    if ($query->is_search) {
        return $wpdb->posts . '.post_type DESC';
    }
    // provide a default fallback return if the above condition is not true
    return $orderby;
}
// function redirect_login_page() {
//     $login_page  = home_url( '/login/' );
//     global $pagenow;
//     if( $pagenow == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
//         wp_redirect($login_page);
//         exit;
//     }
// }
// add_action('init','redirect_login_page');
// add_action( 'after_setup_theme', 'register_my_menu' );
// function register_my_menu() {
//   register_nav_menus( array(
//   'header_menu' => 'Menu Główne',
//   'footer_menu' => 'Menu w Stopce',
// ) );
// }
// add_filter('wp_authenticate_user', 'check_active',10,2);
// function check_active($user) {
//   $token = get_user_meta($user->ID,'email-confirmation-token',true);
//   if($token != '') {
//     wp_redirect(home_url( '/login/' )."?login=not_active");
//     // $errors = new Wp_Error();
//     // $errors->add( 'account_not_active', "<strong>BŁĄD: </strong>Konto nie jest aktywne." );
//     // return $errors;
//     exit;
//   } else {
//     return $user;
//   }
// }
// function logout_page() {
//     $login_page  = home_url();
//     wp_redirect($login_page);
//     exit;
// }
// add_action('wp_logout','logout_page');

// function login_failed() {
//     $login_page  = home_url( '/login/' );
//     wp_redirect( $login_page . '?login=failed' );
//     exit;
// }
// add_action( 'wp_login_failed', 'login_failed' );

function fitster_meta_boxes_theme() {
  add_meta_box("featured_box", "Polecane", "fitster_featured_box", "article", "side", "high");
  add_meta_box("featured_box", "Polecane", "fitster_featured_box", "plan", "side", "high");
  add_meta_box("plan_treningu","Plan Treningu","repeatable_meta_box_display", "plan","normal","high");
  add_meta_box("cechy_treningu","Cechy Treningu","fitster_cechy_box","plan","side","high");
  }
  function fitster_cechy_box() {
    global $post;
    $gender = get_post_meta($post->ID, 'plan_gender',true);
    $target = get_post_meta($post->ID, 'plan_cel',true);
    $difficulty = get_post_meta($post->ID, 'plan_trudnosc',true);
    $gender_options = array(
      'man' => 'Dla Mężczyzn',
      'woman' => 'Dla Kobiet',
      );
    $target_options = array(
      'transformacja' => 'Transformacja',
      'fat_lose' => 'Utrata Tłuszczu',
      'muscle' => 'Budowa Mięśni'
    );
    $difficulty_options = array(
      'rookie' => 'Początkujący',
      'intermediate' => 'Średniozaawansowany',
      'advanced' => 'zaawansowany'
      )
    ?>
    <label>Płeć:</label><br>
    <select name="gender">
      <?php foreach ($gender_options as $key => $value):?>
      <option value="<?php echo $key;?>"<?php if($key == $gender) echo 'selected';?>><?php echo $value;?></option>
    <?php endforeach;?>
    </select><br>
    <label>Cel:</label><br>
    <select name="cel">
      <?php foreach ($target_options as $key => $value):?>
      <option value="<?php echo $key;?>"<?php if($key == $target) echo 'selected';?>><?php echo $value;?></option>
    <?php endforeach;?>
    </select><br>
    <label>Stopień Zaawansowania</label><br>
    <select name="trudnosc">
      <?php foreach ($difficulty_options as $key => $value):?>
      <option value="<?php echo $key;?>"<?php if($key == $difficulty) echo 'selected';?>><?php echo $value;?></option>
    <?php endforeach;?>
    </select><br>
    <?php
  }
function repeatable_meta_box_display() {
  global $post;
  $fields = get_post_meta($post->ID, 'plan_treningu');
  if($fields[0]) {
    $fields[0] = array_values($fields[0]);
    $days_count = count($fields[0]);
  } else {
    $days_count = 1;
  }
?>
<style type="text/css">
.empty-exercise {
  display: none;
}
</style>
  <script type="text/javascript">
jQuery(document).ready(function($) {
  var dni = <?php echo $days_count;?>;
  var days = new Array(
    <?php 
    if($fields[0]) {
    foreach ($fields[0] as $key => $value) {
      $liczba = count($value['cwiczenia']);
      if($liczba == 0) {
        $liczba = 1;
      }
      if($key == $days_count-1) {
        echo $liczba;
      } else {
        echo $liczba.',';
      }
    }} else {
      echo 1;
    }
    ?>);
  $('.metabox_submit').click(function(e) {
    e.preventDefault();
    $('#publish').click();
  });
  $('#add-row').on('click', function() {
    var row = $('.empty-row.screen-reader-text').clone(true);
    row.removeClass('empty-row screen-reader-text');
    row.attr('data-count',dni);
    row.find('h2').html('Dzień '+(dni+1));
    row.find(".opis_dnia").attr("name","dni["+dni+"][opis]");
    row.find('.nazwa_cw').attr("name",'dni['+dni+'][cwiczenia][0][nazwa]');
    row.find('.serie').attr("name",'dni['+dni+'][cwiczenia][0][serie]');
    row.find('.powtorzenia').attr("name",'dni['+dni+'][cwiczenia][0][powtorzenia]');
    row.insertBefore('#repeatable-fieldset-one tbody>tr:last');
    days[dni] = 1;
    dni++;
    return false;
  });
  $('.remove-row').on('click', function() {
    $(this).parents('tr').remove();
    return false;
  });
  $(".exercise").on("click",'.remove-exercise',function(e) {
    e.preventDefault();
    $(this).parent().remove();
  });
   $('.exercise-container').on('click','.add_exercise', function(e) {
    e.preventDefault();
    var parent = $(this).parent().parent();
    var exercise = $('.empty-exercise.screen-reader-text').clone(true);
    var day = parseInt($(this).parent().parent().parent().parent().data('count'));
    var count = days[day];
    console.log(days[day]);
    exercise.find('.nazwa_cw').attr("name",'dni['+day+'][cwiczenia]['+count+'][nazwa]');
    exercise.find('.serie').attr("name",'dni['+day+'][cwiczenia]['+count+'][serie]');
    exercise.find('.powtorzenia').attr("name",'dni['+day+'][cwiczenia]['+count+'][powtorzenia]');
    exercise.removeClass('empty-exercise screen-reader-text');
    element = $(this).parent().parent().find('.exercise:last');
    exercise.insertAfter(element);
    count++;
    days[day] = count;
    return false;
  });

  $('#repeatable-fieldset-one tbody').sortable({
    opacity: 0.6,
    revert: true,
    cursor: 'move',
    handle: '.sort'
  });
});
  </script>
  <table id="repeatable-fieldset-one" width="100%">
  <thead>
    <tr>
      <th width="2%"></th>
      <th width="90%">Dni Ćwiczeń</th>
      <th width="2%"></th>
    </tr>
  </thead>
  <tbody>
  <?php
  if ($fields[0]) :

    foreach ( $fields[0] as $key=>$field ) :
?>
  <tr class="day" data-count="<?php echo $key;?>">
    <td><a class="button remove-row" href="#">-</a></td>
    <td>
      <div class="exercise-container" data-count="<?php echo count($fields['cwiczenia']);?>">
        <h2>Dzień <?php echo $key+1;?></h2>
          <label>Krótki opis dnia</label>
          <textarea class="opis_dnia" style="width: 100%" name="dni[0][opis]"><?php echo $field['opis'];?></textarea>
          <label>Ćwiczenia</label>
          <?php if($field['cwiczenia']) : ?>
          <?php foreach ($field['cwiczenia'] as $key2 => $cwiczenie) : ?>
          <div class="exercise">
          <input type="text" placeholder="nazwa Ćwiczenia" class="nazwa_cw" name="dni[<?php echo $key;?>][cwiczenia][<?php echo $key2;?>][nazwa]" value="<?php echo $cwiczenie['nazwa'];?>"/>
          <input type="text" placeholder="Ilość Serii" class="serie" name="dni[<?php echo $key;?>][cwiczenia][<?php echo $key2;?>][serie]" value="<?php echo $cwiczenie['serie'];?>"/>
          <input type="text" placeholder="Ilość powtórzeń" class="powtorzenia" name="dni[<?php echo $key;?>][cwiczenia][<?php echo $key2;?>][powtorzenia]" value="<?php echo $cwiczenie['powtorzenia'];?>"> 
           <a class="remove-exercise button" href="#">Usuń Ćwiczenie</a>
          </div>
        <?php endforeach;?>
      <?php endif;?>
          <p>
            <a class="add_exercise button" href="#">Dodaj Kolejne Ćwiczenie</a>
          </p>
      </div>
    </td>
  </tr>
 <?php endforeach;
  else :
    // show a blank one
?>
  <tr class="day" data-count="0">
    <td><a class="button remove-row" href="#">-</a></td>
    <td>
      <div class="exercise-container" data-count="0">
        <h2>Dzień 1</h2>
          <label>Krótki opis dnia</label>
          <textarea class="opis_dnia" style="width: 100%" name="dni[0][opis]"></textarea>
          <label>Ćwiczenia</label>
          <div class="exercise">
          <input type="text" placeholder="nazwa Ćwiczenia" class="nazwa_cw" name="dni[0][cwiczenia][0][nazwa]"/>
          <input type="text" placeholder="Ilość Serii" class="serie" name="dni[0][cwiczenia][0][serie]"/>
          <input type="text" placeholder="Ilość powtórzeń" class="powtorzenia" name="dni[0][cwiczenia][0][powtorzenia]"> 
           <a class="remove-exercise button" href="#">Usuń Ćwiczenie</a>
          </div>
          <p>
            <a class="add_exercise button" href="#">Dodaj Kolejne Ćwiczenie</a>
          </p>
      </div>
    </td>
  </tr>
  <?php endif; ?>
   <!-- empty hidden exercise for jQuery -->
        <div class="exercise empty-exercise screen-reader-text">
          <input type="text" placeholder="nazwa Ćwiczenia" class="nazwa_cw"/>
          <input type="text" placeholder="Ilość Serii" class="serie"/>
          <input type="text" placeholder="Ilość powtórzeń" class="powtorzenia"> 
          <a class="remove-exercise button" href="#">Usuń Ćwiczenie</a>
        </div>

  <!-- empty hidden day for jQuery -->
  <tr class="day empty-row screen-reader-text">
    <td><a class="button remove-row" href="#">-</a></td>
    <td>
      <div class="exercise-container" data-count="0">
        <h2>Dzień</h2>
          <label>Krótki opis dnia</label>
          <textarea style="width: 100%" class="opis_dnia"></textarea>
          <label>Ćwiczenia</label>
          <div class="exercise">
          <input type="text" placeholder="nazwa Ćwiczenia" class="nazwa_cw"/>
          <input type="text" placeholder="Ilość Serii" class="serie"/>
          <input type="text" placeholder="Ilość powtórzeń" class="powtorzenia">
           <a class="remove-exercise button" href="#">Usuń Ćwiczenie</a> 
          </div>
          <p>
            <a class="add_exercise button" href="#">Dodaj Kolejne Ćwiczenie</a>
          </p>
      </div>
    </td>    
  </tr>
  </tbody>
  </table>
 
  <p><a id="add-row" class="button" href="#">Dodaj kolejny Dzień</a>
  </p>
  
  <?php
}

add_action('save_post', 'repeatable_meta_box_save');
function repeatable_meta_box_save($post_id) {
  update_post_meta( $post_id, 'plan_treningu', $_POST['dni']);
}
  function fitster_featured_box($post) {
    $featured = get_post_meta($post->ID, 'featured', true);
    ?>
  <input type="checkbox" id="featured" name="featured" placeholder="Polecane?" value="tak" <?php if($featured=='tak') echo 'checked';?>/>
    <?php 
  }
  function fitster_meta_boxes_theme_save($post_id, $post) {
  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
    return $post_id;
  }
  if(isset($_POST['gender'])) {
      update_post_meta($post_id,'plan_gender',$_POST['gender']);
  }
  if(isset($_POST['cel'])) {
      update_post_meta($post_id,'plan_cel',$_POST['cel']);
  }
  if(isset($_POST['trudnosc'])) {
      update_post_meta($post_id,'plan_trudnosc',$_POST['trudnosc']);
  }
if( isset( $_POST['featured'] ) ) {
        update_post_meta( $post_id, 'featured', $_POST['featured']);
    } else {
        update_post_meta( $post_id, 'featured', 'nie');
    }
}
add_action('add_meta_boxes', 'fitster_meta_boxes_theme');
add_action( 'save_post', 'fitster_meta_boxes_theme_save',10,2 );
function custom_excerpt($new_length = 20) {
  add_filter('excerpt_length', function () use ($new_length) {
    return $new_length;
  }, 999);
    add_filter( 'excerpt_more', 'new_excerpt_more' );
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}
function custom_excerpt_length( $length ) {
  return 35;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more( $more ) {
  return ' <a class="more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Czytaj więcej') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

//Zarejestrowanie typu postu - plan
    function sw_post_type_plan() {
    register_taxonomy(  
        'plany_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'plany',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Kategorie Planów',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'plany', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  

       $labels = array(
    'name' => __( 'Plany Ćwiczeń'), 
    'singular_name' => __('Plan'),
    'rewrite' => array(
        'slug' => __( 'Plan' ) 
    ),
    'add_new' => _x('Dodaj nowy Plan', 'Plany'), 
    'edit_item' => __('Edytuj Plan'),
    'new_item' => __('Nowy Plan'), 
    'view_item' => __('Zobacz Plan'),
    'search_items' => __('Wyszukaj Plany'), 
    'not_found' =>  __('Nie znaleziono żadnych Planów'),
    'not_found_in_trash' => __('W koszu nie znaleziono żadnych Planów'),
    'parent_item_colon' => ''
);
    $args = array(
    'taxonomies' => array('plany_categories','post_tag'),
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
        'rewrite' => array(
        'slug' => __( 'plan' ) 
    ),
    'capability_type' => 'post',
    'hierarchical' => true,
    'show_in_nav_menus' => true,
    'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'tags',
        'comments'
    )
);
register_post_type(__( 'Plan' ), $args);
register_taxonomy_for_object_type( 'plany_categories', 'Plan' );
   }
add_action( 'init', 'sw_post_type_plan' );
//Zarejestrowanie typu postu - artykul
    function sw_post_type_article() {
    register_taxonomy(  
        'article_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'articles',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Kategorie Artykułów',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'articles', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  

       $labels = array(
    'name' => __( 'Artykuły'), 
    'singular_name' => __('Artykuł'),
    'rewrite' => array(
        'slug' => __( 'Artykul' ) 
    ),
    'add_new' => _x('Dodaj nowy Artykuł', 'Artykuły'), 
    'edit_item' => __('Edytuj Artykuł'),
    'new_item' => __('Nowy Artykuł'), 
    'view_item' => __('Zobacz Artykuł'),
    'search_items' => __('Wyszukaj Artykuły'), 
    'not_found' =>  __('Nie znaleziono żadnych Artykułów'),
    'not_found_in_trash' => __('W koszu nie znaleziono żadnych Artykułów'),
    'parent_item_colon' => ''
);
    $args = array(
    'taxonomies' => array('article_categories','post_tag'),
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
        'rewrite' => array(
        'slug' => __( 'artykul' ) 
    ),
    'capability_type' => 'post',
    'hierarchical' => true,
    'show_in_nav_menus' => true,
    'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'tags',
        'comments'
    )
);
register_post_type(__( 'Article' ), $args);
register_taxonomy_for_object_type( 'article_categories', 'Article' );
   }
add_action( 'init', 'sw_post_type_article' );
add_action( 'after_setup_theme', 'woocommerce_support' );
add_action( 'after_setup_theme', 'fitster_custom_image_dimensions' );
function fitster_custom_image_dimensions() {
	add_image_size( 'sidebar_thumb', '130', '130', 1 );
	add_image_size('brand','290');
    add_image_size('article_top', '755');
    add_image_size('article_thumb', '250','160', 1 );
    add_image_size('plan_5col','368');
}
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
function fitster_woocommerce_image_dimensions() {
	global $pagenow;
 
	if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
		return;
	}

  	$catalog = array(
		'width' 	=> '253',	// px
		'height'	=> '152',	// px
		'crop'		=> 1 		// true
	);

	$single = array(
		'width' 	=> '360',	// px
		'height'	=> '360',	// px
		'crop'		=> 1 		// true
	);

	$thumbnail = array(
		'width' 	=> '245',	// px
		'height'	=> '245',	// px
		'crop'		=> 1 		// false
	);

	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}
add_action( 'after_switch_theme', 'fitster_woocommerce_image_dimensions', 1 );

// Lets create the function to house our form
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );