<?php  
/* 
  Template Name: leadership4 page
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
        <div class="leadership-container">
          <div class="sect-ldfour">
              <div class="fourin blank">
              
              </div>
              <div class="fourin blank">
              
              </div>
              <div class="fourin">
                <img src="<?php bloginfo('template_directory'); ?>/images/ld19.jpg" > 
                <div class="overlay">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                          <span class="icon-linkedin-in"></span>
                      </div>
              </div>
              <div class="fourin">
                <img src="<?php bloginfo('template_directory'); ?>/images/ld20.jpg" > 
                <div class="overlay">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                          <span class="icon-linkedin-in"></span>
                      </div>
              </div>
              <div class="fourin">
              <img src="<?php bloginfo('template_directory'); ?>/images/ld19.jpg" > 
              <div class="overlay">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                          <span class="icon-linkedin-in"></span>
                      </div>
              </div>
          </div>
          <div class="sect-ldfour">
              
             <div class="leftsect">
                <div class="fourin2">
                    <img src="<?php bloginfo('template_directory'); ?>/images/ld21.jpg" > 
                    <div class="overlay">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                          <span class="icon-linkedin-in"></span>
                      </div>
                  </div>
                  <div class="fourin2">
                    <img src="<?php bloginfo('template_directory'); ?>/images/ld22.jpg" > 
                    <div class="overlay">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                          <span class="icon-linkedin-in"></span>
                      </div>
                  </div>
                  <div class="fourin2 blank">
                  
                  </div>
                  <div class="fourin3 ">
                    <p>Our people love their jobs, serving your logistics. 
Welcome to our Market cube family.</p>
                  </div>
                 
             </div>
             <div class="ritsect">
                <h3>Would you like 
to join our
family?</h3>
<a href="" class="btn-vc">See all vacancies</a>



             </div>
          </div>
        
        
        </div>
  

  </div>
</main>

<?php get_footer(); ?>
