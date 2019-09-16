<?php  
/* 
  Template Name: leadership3 page
 */

get_header();
wp_enqueue_script('tweenmax');
wp_enqueue_script('barba');
wp_enqueue_script('aboutpagejs');
add_action('wp_footer', 'san_scripts', 21);

function san_scripts() {
?>
<script
  crossorigin="anonymous"
  src="https://polyfill.io/v3/polyfill.min.js?features=default%2CArray.prototype.find%2CIntersectionObserver"
></script>


<?php } ?>
<!-- container section -->

   
    
  

<main id="barba-wrapper">
      <div class="barba-container" >
        <div class="leadership-container ">
          <div class="sect-ldthree">
                <div class="sectrow">
                    <div class="sectin blank">

                    </div>
                    <div class="sectin" >
                        <img src="<?php bloginfo('template_directory'); ?>/images/ld13.jpg" > 
                        <div class="overlay">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                          <span class="icon-linkedin-in"></span>
                      </div>
                    </div>
                    <div class="sectin blank">
                        
                    </div>
                    <div class="sectin">
                        <img src="<?php bloginfo('template_directory'); ?>/images/ld14.jpg" > 
                        <div class="overlay">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                          <span class="icon-linkedin-in"></span>
                      </div>
                    </div>
                    <div class="sectin blank">

                    </div>
                </div>
                <div class="sectrow">
                    <div class="sectin">
                        <img src="<?php bloginfo('template_directory'); ?>/images/ld16.jpg" >
                        <div class="overlay">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                          <span class="icon-linkedin-in"></span>
                      </div>
                    </div>
                    <div class="sectin threecol" >
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's
                    </div>
                    <div class="sectin">
                        <img src="<?php bloginfo('template_directory'); ?>/images/ld15.jpg" >
                        <div class="overlay">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                          <span class="icon-linkedin-in"></span>
                      </div>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>leadership4/" class="arrobefore2"><img src="<?php bloginfo('template_directory'); ?>/images/arrow2.png" ></a>
                    </div>
                            
                </div>
                <div class="sectrow">
                     <div class="sectin">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>leadership4/" class="arrobefore"><img src="<?php bloginfo('template_directory'); ?>/images/arrow2.png" ></a>
                        </div>
                        <div class="sectin ">
                            <img src="<?php bloginfo('template_directory'); ?>/images/ld17.jpg" >
                            <div class="overlay">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                          <span class="icon-linkedin-in"></span>
                      </div>
                        
                        </div>
                        <div class="sectin blank">

                        </div>
                        <div class="sectin">
                            <img src="<?php bloginfo('template_directory'); ?>/images/ld18.jpg" >
                            <div class="overlay">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                          <span class="icon-linkedin-in"></span>
                      </div>
                        </div>
                        <div class="sectin blank">

                        </div>
</div>
          </div>
        
        
        </div>
  

  </div>
</main>

<?php get_footer(); ?>
