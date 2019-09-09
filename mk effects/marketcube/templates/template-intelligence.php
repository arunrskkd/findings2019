<?php  
/* 
  Template Name: intelligence  page
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
                <h2>Intelligence </h2>
                <h3><b>T</b>here are an ever-increasing number of ways to solve the challenges of Market Research.  Market Cube is uniquely positioned to consult on the best path forward with our strong knowledge of the toolsets available and their best uses, such as applying deep </h3>
        

            </div>
            <div class="section-right">

            </div>
            <div class="sect-video">
            <video src="<?php bloginfo('template_directory'); ?>/videos/v3.mp4" muted="" preload="auto" loop="" autoplay></video>
            </div>
            <div class="sect-foot">
                <div class="foot-left">
                  <div class="number">
                    <a href="http://localhost/projects/marketcube/about/">About</a>
                    01
                  </div>
                  <div class="page-link active">
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
                    <a href="http://localhost/projects/marketcube/automation/" class="nextpage">
                    
                          <span class="icon-forward"></span>
                          <h6>See more </h6>
                    
                    
                    </a>
                
                </div>
            </div>
        </section>
       
    
      </div>

    





      </div>
</main>



<?php get_footer(); ?>
