<?php  
/* 
  Template Name: core values page
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

        <div class="corevalue-container">
            <div class="core-wrapper">
                 <h2 class="heading">core values</h2>
                 <div class="lines">
                   
                 <img class="linesimg" src="<?php bloginfo('template_directory'); ?>/images/lines.png" > 
                 <img class="linesimg-mob" src="<?php bloginfo('template_directory'); ?>/images/linemob.png" > 
                 <img class="linesimg-mob" src="<?php bloginfo('template_directory'); ?>/images/linemob.png" >  
                    <div class="pos-sect pos1">
                         <h3>Caring</h3>   
                         <p>
                         Maintain respectful relations with customers, partners, suppliers, Digimarc employees and communities.
                         </p>   
                    </div>
                    <div class="pos-sect pos2">
                         <h3>Inovation</h3>   
                         <p>
                         Exhibit honesty and integrity at all times.
                         </p>   
                    </div>
                    <div class="pos-sect pos3">
                         <h3>Knowledge</h3>   
                         <p>
                         Be Experts in our fields
                         </p>   
                    </div>
                    <div class="pos-sect pos4">
                    <h3>Integrity</h3>   
                         <p>
                         Exhibit honesty and integrity at all times.
                         </p> 
                    </div>
                    <div class="pos-sect pos5">
                         <h3>Integrity</h3>   
                         <p>
                        Dedicated to the success of our customers, partners, Digimarc employees and shareholders 
                         </p>   
                    </div>
                    <div class="pos-sect pos6">
                         <h3>Commitment</h3>   
                         <p>
                         Dedicated to the success of our customers, partners, Digimarc employees and shareholders 
                         </p>   
                    </div>
                    <div class="posimg split">
                         <img  src="<?php bloginfo('template_directory'); ?>/images/cv-img2.png" > 
                  
                    </div>
                    <div class="posimg pos2">
                         <img src="<?php bloginfo('template_directory'); ?>/images/cv-img3.png" > 
                  
                    </div>


                 </div>  


            </div>
        </div>
        </div>
</main>
<?php get_footer(); ?>
