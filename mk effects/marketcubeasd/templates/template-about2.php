<?php  
/* 
  Template Name: about2 page
 */

get_header();
wp_enqueue_script('tweenmax');
wp_enqueue_script('barba');
wp_enqueue_script('aboutpagejs');

add_action('wp_footer', 'san_scripts', 21);

function san_scripts() {
?>

<script src="https://barba.js.org/v1/dist/barba.js"></script>
<script
  crossorigin="anonymous"
  src="https://polyfill.io/v3/polyfill.min.js?features=default%2CArray.prototype.find%2CIntersectionObserver"
></script>

 
<?php } ?>
<!-- container section -->

    
    
  <main id="barba-wrapper">
      <div class="barba-container" >
      <div class="aboutpage-container">
        <section id="section-1" data-page="sectionone" class="section">
            <div class="section-left">
                <h2>ABout market cube</h2>
                <h3>Market Cube is an Insights, Market Research Operations and Data Sciences company.we enable our clients to leverage the power.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</h3>
            <a class="nav next" href="http://localhost/projects/marketcube/about/">NEXT</a>
          
  
            </div>
            <div class="section-right">

            </div>
            <div class="sect-video">
            <video src="<?php bloginfo('template_directory'); ?>/videos/v1.mp4" muted="" preload="auto" loop="" autoplay></video>
            </div>
            
        </section>
    </div>
        
       
     
   
      </div>
      
    </main>
  

    <a  href="http://localhost/projects/marketcube/sample-page/">sa</a>







<?php get_footer(); ?>
