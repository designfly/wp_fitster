
    <div id="pageup">
        <i class="fa fa-chevron-up"></i>
    </div>
    <div id="search">
   
        <div class="wyszukiwanie">
         <form method="get" action="<?php echo home_url( '/' );?>">
            <input placeholder="Szukaj" type="text" name="s" />
        </div>
        <button><i class="fa fa-search"></i></button>
    </form>
    </div>

    <div id="cart">
        <div class="koszyczek">
            <div class="podglad">
            <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
             <span>Masz <a href="<?php echo WC()->cart->get_cart_url(); ?>">
                <?php
                $cart_count = sizeof( WC()->cart->get_cart());
                    $modulo = $cart_count % 10;
                    if($modulo == 1) {
                        echo $cart_count.' produkt';
                    } elseif($modulo > 1 && $modulo < 5) {
                        echo $cart_count.' produkty';
                    } else {
                        echo $cart_count.' produktów';
                    }
                    ?>
                </a> w swoim koszyku.</span>
            <?php
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                    $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                    $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                    $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                    ?>

                <div class="produkt">
                    <?php echo $thumbnail;?>
                    <h2><a href="#"><?php echo $product_name;?></a></h2>
                    <p><?php echo $product_price;?> &times; <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', $cart_item['quantity'], $cart_item, $cart_item_key ); ?></p>
                    <a href="<?php echo WC()->cart->get_remove_url( $cart_item_key); ?>"><button class="usun"><i class="fa fa-times"></i> Usuń z koszyka</button></a>
                </div>
                <?php 
                    }
                }
                ?>
                <?php else : ?>

            <span><?php _e( 'No products in the cart.', 'woocommerce' ); ?></span>

                <?php endif; ?>
            </div>
            <div class="price">
                <span class="subtotal">Razem</span>
            <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
                <span class="cena"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
            <?php else: ?>
                <span class="cena">0 zł</span>
            <?php endif;?>
            </div>
        
            <div class="akcje">
                <a href="<?php echo WC()->cart->get_cart_url(); ?>">Zobacz koszyk</a>
            <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
                <a href="<?php echo WC()->cart->get_checkout_url(); ?>">kupuje i płacę</a>
            <?php endif;?>
            </div>
        </div>  
        <button><i class="fa fa-shopping-cart"></i></button>
    </div>

    <footer>
        <div class="container level-1">
            <div class="col-md-4">  
                <div class="row">
                    <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png"></a>
                </div>
            </div>
            <div class="col-md-4">  
                <p>
<?php echo get_option('fitster_desc');?>
                    </p>
            </div>
            <div class="col-md-4">  
 <!--                <div class="row news">
                    <h2>newsletter</h2>
                    <hr> <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.</p>
                    <input placeholder="Tutaj wpisz swój email" type="text"/>           
                    <button><i class="fa fa-paper-plane"></i></button>
                </div> -->
                <div class="row media-s">
                    <h2>media społecznościowe</h2>
                    <div class="row">
                        <hr> 
                    </div>
                <div class="row">
                    <a href="<?php echo get_option('fitster_fb');?>"><i class="fa fa-facebook"></i></a>
                <a href="<?php echo get_option('fitster_yt');?>"><i class="fa fa-youtube"></i></a>
                <a href="<?php echo get_option('fitster_in');?>"><i class="fa fa-instagram"></i></a>
                <a href="<?php echo get_option('fitster_gp');?>"><i class="fa fa-google-plus"></i></a>
                <a href="<?php echo get_option('fitster_tw');?>"><i class="fa fa-twitter"></i></a>
                </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.js"></script>  
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/raty/jquery.raty.js"></script>
<script type="text/javascript">
    (function($) {
    
       $(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
    });
    
})( jQuery );

    </script>

    <!-- menu - wyszukiwanie -->
    <script type="text/javascript">
        (function($) {
    
    

        $( "#search-menu input").focus(function() {
          $(".navbar-fixed-top li").hide();
          $("#search-menu").show();
          $("#search-menu").animate({width:"600px"},700);
          // $("#search-menu").css("width", "600px"); 
          // $("#search-menu").css("transition:.5s");
        });

        $( "#search-menu input").focusout(function() {
          $(".navbar-fixed-top li").show();
          $("#search-menu").css("width", "");
        });

        $(document).scroll(function() {
              var y = $(this).scrollTop();
              if (y > 200) {
                $('.first-level').fadeOut();
                $('.second-level').fadeOut();
              }else{
                $('.first-level').fadeIn();
                $('.second-level').fadeIn();
              }
            });
        })( jQuery );
    </script>

    <!-- ikony pageup, cart, search -->
    <script>
    (function($) {
        $(document).scroll(function() {
          var y = $(this).scrollTop();
          if (y > 200) {
            $('#pageup').css('display','flex');
          } else {
            $('#pageup').fadeOut();
          }
        });

        $(document).scroll(function() {
          var y = $(this).scrollTop();
          if (y > 200) {
            $('#search').css('display','flex');
          } else {
            $('#search').fadeOut();
          }
        });

        $(document).scroll(function() {
          var y = $(this).scrollTop();
          if (y > 200) {
            $('#cart').css('display','flex');
          } else {
            $('#cart').fadeOut();
          }
        });
    })( jQuery );
    </script>

    <script type="text/javascript">
    (function($) {
        $('#pageup').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    })( jQuery );
    </script>


    <!-- menu -->
    <script type="text/javascript">
    (function($) {
    
        $( ".link").hover(function() {
            var id = $(this).data('id');
            $('.part').hide();
            $('.part[data-id='+id+']').show(); 
        });
    
})( jQuery );

    </script>








    <script type="text/javascript">
    (function($) {
    $(".rate_button").click(function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        $("#rating option").removeAttr('selected');
        $(".rate_button").removeClass('active');
        $(this).addClass('active');
        $("#rating").find('option[value='+id+']').attr('selected','selected');
    });
    $(".ilosc button.remove").click(function(event) {
        event.preventDefault();
        var quantity = parseInt($("#quantity_input").val());
        if(quantity>1) {
           $("#quantity_input").val(quantity-1); 
       } 
    });
    $(".ilosc button.add").click(function(event) {
        event.preventDefault();
        var parent = $(this).parent();
        var max = parent.find("#quantity_input").data('max');
        var quantity = parseInt(parent.find("#quantity_input").val());
        if(max != 'unlimited') {
            if(quantity+1 <= parseInt(max)) {
              parent.find("#quantity_input").val(quantity+1);    
            } 
        } else{
            parent.find("#quantity_input").val(quantity+1);
        }
        
            
    });
    })( jQuery );
    </script>
    <script>
    (function($) {
$("#filter_options").click(function(event) {
    event.preventDefault();
    var brands = '';
    var form = $(this).parent();
    $.each(form.find('.brand_checkbox:checked'),function(i, value) {
        brands += $(value).val()+',';
    });
    var start_price = $('.cena_od').val();
    var end_price = $('.cena_do').val();
    prices = start_price+"_"+end_price;
    form.find('input[name=marki]').val(brands);  
    form.find('input[name=cena]').val(prices);
    $("#options_form").submit();    
});
    $('.mpp-item-rate').raty({
          score: function() {
    return $(this).attr('data-score');
  },
        starOff: '<?php echo get_stylesheet_directory_uri(); ?>/js/raty/images/star-off.png',
        starOn: '<?php echo get_stylesheet_directory_uri(); ?>/js/raty/images/star-on.png',
        click: function(score, evt) {
        jQuery.ajax({
       type: "POST",
       url: ajaxurl,
       data: "action=rate_photo&id="+<?php echo $post->ID;?>+"&user_id="+<?php echo get_current_user_id();?>+"&rate="+score,  
       success: function(msg){
            $('.voted').show();
       }
   });
      }
    });



})( jQuery );
    </script>
<?php wp_footer();?>
</body>
</html>