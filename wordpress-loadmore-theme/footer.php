<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acodez_Themes
 */

?>
<?php if(is_page_template('template-home.php')){?>
    <div class="section-five">
        <div class="map-section">
            <div class="map" id="map"></div>
                <footer id="colophon" class="site-footer">
                    <div class="container">
                        <div class="site-links" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="col-one">
                                <?php if(get_field('home_footer_contact_title','option')){?>
                                <h2><?php echo get_field('home_footer_contact_title','option');?></h2>
                                <?php } ?>
                                <ul>
                                    <?php if(get_field('contact_address','option')){?>
                                        <li><?php echo get_field('contact_address','option');?></li>
                                    <?php } ?>
                                    <?php if(get_field('contact_phone_number','option')){?>
                                        <li>Phone : <a href="tell:<?php echo str_replace(' ', '', get_field('contact_phone_number','option'));?>"><?php echo get_field('contact_phone_number','option');?></a></li>
                                    <?php } ?>
                                    <?php if(get_field('fax_number','option')){?>
                                        <li>Fax :  <?php echo get_field('fax_number','option');?> </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-two">
                                <?php if(get_field('home_footer_menu_title','option')){?>
                                <h2><?php echo get_field('home_footer_menu_title','option');?></h2>
                                <?php } ?>
                                <?php wp_nav_menu( array('container' => 'false', 'theme_location' => 'primary', 'menu_id' => 'footer-menu' ) ); ?>
                            </div>
                        </div>
                        <div class="copy-right">
                            <?php echo get_field('copy_right_text','option');?>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

<?php } ?>

<?php if(!is_page_template('template-home.php')){?>
    <footer id="colophon" class="site-footer inner-footer">
        <div class="container">
            <!-- <div class="footer-Menu">
                <?php wp_nav_menu( array('container' => 'false', 'theme_location' => 'primary', 'menu_id' => 'footer-menu' ) ); ?>
            </div> -->
            <div class="copy-right">
                <?php echo get_field('copy_right_text','option');?>
            </div>
        </div>
    </footer>
<?php } ?>

<?php wp_footer();  ?>

    <script>

    </script>
</body>
</html>
