<?php
/*
  Template Name: Home page
 */

get_header();


add_action('wp_footer', 'san_scripts', 21);

function san_scripts() {
    ?>
<script>
jQuery(document).ready( function($) {
        var ajaxUrl = "<?php echo admin_url()?>/admin-ajax.php";

        // What page we are on.
        var page = 1; 
        // Post per page
        var ppp = 3; 

        $("#more_posts").on("click", function() {
            // When btn is pressed.
            $("#more_posts").attr("disabled",true);
            
            // Disable the button, temp.
            $.post(ajaxUrl, {
                action: "more_brands_ajax",
                offset: page,
                ppp: ppp
            })
            .success(function(posts) {
                page++;
                if(posts.nextpage >= 1){
                    $("#ajax-posts").append(posts.html);
                    page = posts.nextpage;
                }
                else{
                    $("#ajax-posts").append("<h2>no more posts</div>");
                    $("#more_posts").css("display", "none");
                    return;
                }
              
                // CHANGE THIS!
                $("#more_posts").attr("disabled", false);
            });
        });
    });
      
</script>
<?php } ?>

<?php if(get_field('bannerimage')) {  ?>
    <div class="banner" >
        <img src="<?php echo  get_field('bannerimage')  ?>">
        <span class="bannertext">
        <?php echo  get_field('bannertext') ?>
        </span>
    </div>
<?php } ?>


<div class="secttwo">
    <div class="container">
    <ul >
        <?php  
           $args = array(
            'post_type' => 'brands',
            'orderby' => 'title',
            'order'   => 'DESC',
            'posts_per_page' => 3
        );
        $query = new WP_Query( $args );
        while ( $query->have_posts() ) : $query->the_post();
        ?>
          <li>
            <div class="sectin">
                <?php   
                    /* grab the url for the full size featured image */
                    $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
                      // Resize by width and height
                     $params = array( 'width' => 400, 'height' => 300 );
                     $imageurl =  bfi_thumb( $featured_img_url, $params )
                     
                ?>
                <?php if($imageurl){ ?>
                    <div class="imgsect">
                        <img src="<?php   echo $imageurl   ?>">
                    </div>
                <?php } ?>
                <div class="textset">
                    <h3> <?php   the_title();   ?></h3>
                </div>
             
            </div>    
        </li>
           
       <?php  
        endwhile;
        wp_reset_postdata();
        ?>
      
    </ul>
    <div id="ajax-posts">

</div>
<button id="more_posts" style="font-size: 20px;">more_posts</button>


</div>
    </div>





<?php get_footer(); ?>
