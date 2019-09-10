<?php  
/* 
  Template Name: about page
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
      <div class="barba-container" data-prev="http://localhost/projects/marketcube/about2" data-next="http://localhost/projects/marketcube/about2">
      <div class="aboutpage-container">
          <section id="section-1" data-page="sectionone" class="section">
            <div class="section-left">
                <h2>ABout market cube</h2>
                <h3><b>M</b>arket Cube is an Insights, Market Research Operations and Data Sciences company.we enable our clients to leverage the power.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</h3>
        

            </div>
            <div class="section-right">
            
              <a href="http://localhost/projects/marketcube/leadership/" class="abt-wavelink link1 ext-link"> <img  src="<?php bloginfo('template_directory'); ?>/images/team.png" /></a>
              <a href="http://localhost/projects/marketcube/leadership/" class="abt-wavelink link2 ext-link"> <img  src="<?php bloginfo('template_directory'); ?>/images/core-value.png" /></a>
              <a href="http://localhost/projects/marketcube/leadership/" class="abt-wavelink link3 ext-link"> <img  src="<?php bloginfo('template_directory'); ?>/images/leadrship.png" /></a>
            </div>
            <div class="sect-video">
            <!-- <video src="<?php bloginfo('template_directory'); ?>/videos/v2.mp4" muted="" preload="auto" loop="" autoplay></video> -->
            <div class="split">
                <img  src="<?php bloginfo('template_directory'); ?>/images/aboutbak.png" />
              </div>
           
          </div>
            <div class="sect-foot">
                <div class="foot-left">
                  <div class="number">
                    01
                  </div>
                  <div class="page-link">
                     <a href="http://localhost/projects/marketcube/intelligence/">
                     <h4>Intelligence</h4>
                      <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</h5>
                     </a>
                  </div>
                  <div class="page-link ">
                  <a href="http://localhost/projects/marketcube/automation/">

                  <h4>Automation </h4>
                      <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</h5>
                      </a>
                  </div>
                  <div class="page-link ">
                  <a href="http://localhost/projects/marketcube/people/">

                  <h4>People</h4>
                      <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</h5>
                      </a>
                  </div>
                
                </div>
                <div class="foot-rit">
                    <a href="http://localhost/projects/marketcube/intelligence/" class="nextpage">
                    
                          <span class="icon-forward"></span>
                          <h6>See more </h6>
                    
                    
                    </a>
                
                </div>
            </div>
            <div class="sect-foot-mobile">
                  <div class="number">
                    01
                  </div>
                  <div class="page-link">
                     <a href="http://localhost/projects/marketcube/intelligence/">
                        <h4>Intelligence</h4>
                     </a>
                  </div>

            </div>
        </section>
       
    
      </div>

    





      </div>
</main>


<?php get_footer(); ?>
