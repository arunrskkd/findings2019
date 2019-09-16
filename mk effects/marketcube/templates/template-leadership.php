<?php  
/* 
  Template Name: leadership page
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
            <div class="section-combine">
              <div class="sect1">
              <h2>Leadership</h2>
              <h3><b>L</b>orem Ipsum is simply dummy text of tAdityAditya Raja Rajhe printing and typesetting industry. PrincipalLorem Ipsum has been the industry's standard dummy text ever since the 1500s, Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </h3>
              </div>
              <div class="sect3-outer">
                  
                  <div class="sect3">
                      <img src="<?php bloginfo('template_directory'); ?>/images/ld2.jpg" >
                      <div class="overlay popup-modal" href="#test-modal1">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                        <a href="">  <span class="icon-linkedin-in"></span></a>
                      </div>
                  </div>
                  <div class="sect3">
                      <img src="<?php bloginfo('template_directory'); ?>/images/ld3.jpg" >
                      <div class="overlay popup-modal" href="#test-modal2">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                        <a href="">  <span class="icon-linkedin-in"></span></a>
                      </div>
                  </div>
                  <div class="sect3">
                  <img src="<?php bloginfo('template_directory'); ?>/images/ld1.jpg" >

                      <a  href="<?php echo esc_url( home_url( '/' ) ); ?>leadership2/" class=" arrow">
                          <img src="<?php bloginfo('template_directory'); ?>/images/arow1.png" >
                        </a>
                        <div class="overlay popup-modal" href="#test-modal3">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                        <a href="">  <span class="icon-linkedin-in"></span></a>
                      </div>
                  </div>
                  <div class="sect3 last">
                      <img src="<?php bloginfo('template_directory'); ?>/images/ld4.jpg" >
                      <div class="overlay popup-modal" href="#test-modal4">
                          <h3>dilip singh</h3>
                          <h4>Director/Head Technology </h4>
                        <a href="">  <span class="icon-linkedin-in"></span></a>
                      </div>
                  </div>
              </div>
            </div>
        
        
        </div>
  

  </div>
</main>
<div id="test-modal1" class="mfp-hide white-popup-block leadershippop">
    <div class="sectdetails">
        <div class="container sectdtone">
            <div class="row">
                <div class="col-md-5">
                    <div class="sectimage">
                        <img src="<?php bloginfo('template_directory'); ?>/images/ld23.jpg" >
                    </div>
                </div>
                <div class="col-md-7">
                    <h2>
                    Aditya Raj
                    </h2>
                    <h3>Principal</h3>
                    <p>With over 10 years of experience in market research and catapulted by his entrepreneurial streak, Aditya started Market Cube in 2009. Bringing together a gamut of experience across several industries, Aditya oversees the growth plans, financials, sales, and marketing.</p>
                <a href=""> <span class="icon-linkedin-in"></span></a>
                </div>
            </div>
            <a  class="popup-modal-dismiss">		<img  src="<?php bloginfo('template_directory'); ?>/images/menuclose.png" />close</a>
        </div>
        <div class="btm-sect">
            Principal
        </div>
    </div>
    
</div>
<div id="test-modal2" class="mfp-hide white-popup-block leadershippop">
<div class="sectdetails">
        <div class="container sectdtone">
            <div class="row">
                <div class="col-md-5">
                    <div class="sectimage">
                        <img src="<?php bloginfo('template_directory'); ?>/images/ld3.jpg" >
                    </div>
                </div>
                <div class="col-md-7">
                    <h2>
                    Aditya Raj
                    </h2>
                    <h3>Principal</h3>
                    <p>With over 10 years of experience in market research and catapulted by his entrepreneurial streak, Aditya started Market Cube in 2009. Bringing together a gamut of experience across several industries, Aditya oversees the growth plans, financials, sales, and marketing.</p>
                <a href=""> <span class="icon-linkedin-in"></span></a>
                </div>
            </div>
            <a  class="popup-modal-dismiss">		<img  src="<?php bloginfo('template_directory'); ?>/images/menuclose.png" />close</a>
        </div>
        <div class="btm-sect">
            Principal
        </div>
    </div>
</div>
<div id="test-modal3" class="mfp-hide white-popup-block leadershippop">
<div class="sectdetails">
        <div class="container sectdtone">
            <div class="row">
                <div class="col-md-5">
                    <div class="sectimage">
                        <img src="<?php bloginfo('template_directory'); ?>/images/ld1.jpg" >
                    </div>
                </div>
                <div class="col-md-7">
                    <h2>
                    Aditya Raj
                    </h2>
                    <h3>Principal</h3>
                    <p>With over 10 years of experience in market research and catapulted by his entrepreneurial streak, Aditya started Market Cube in 2009. Bringing together a gamut of experience across several industries, Aditya oversees the growth plans, financials, sales, and marketing.</p>
                <a href=""> <span class="icon-linkedin-in"></span></a>
                </div>
            </div>
            <a  class="popup-modal-dismiss">		<img  src="<?php bloginfo('template_directory'); ?>/images/menuclose.png" />close</a>
        </div>
        <div class="btm-sect">
            Principal
        </div>
    </div>
</div>
<div id="test-modal4" class="mfp-hide white-popup-block leadershippop">
<div class="sectdetails">
        <div class="container sectdtone">
            <div class="row">
                <div class="col-md-5">
                    <div class="sectimage">
                        <img src="<?php bloginfo('template_directory'); ?>/images/ld4.jpg" >
                    </div>
                </div>
                <div class="col-md-7">
                    <h2>
                    Aditya Raj
                    </h2>
                    <h3>Principal</h3>
                    <p>With over 10 years of experience in market research and catapulted by his entrepreneurial streak, Aditya started Market Cube in 2009. Bringing together a gamut of experience across several industries, Aditya oversees the growth plans, financials, sales, and marketing.</p>
                <a href=""> <span class="icon-linkedin-in"></span></a>
                </div>
            </div>
            <a  class="popup-modal-dismiss">		<img  src="<?php bloginfo('template_directory'); ?>/images/menuclose.png" />close</a>
        </div>
        <div class="btm-sect">
            Principal
        </div>
    </div>
</div>
<?php get_footer(); ?>
