<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acodez_Themes
 */

get_header();

add_action('wp_footer', 'san_scripts', 21);

function san_scripts() {
    ?>
    <script>

    jQuery("#no-result .search-form").submit(function(){
        if(jQuery('#no-result .search-form .search-field').val() !="")
        {
            return true;
        }
        jQuery('#no-result .search-form .search-field').focus();
        return false;
    });
    </script>

<?php }
?>

<div class="main-container">
<div class="container  clearfix default_pages ">

    <div class="blog_listing ">

      <h2 class="title"> Search results for <?php echo get_search_query(); ?>: </h2>

				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
          <div class="post-repeat" >
              <?php if(wp_get_attachment_url(get_post_thumbnail_id($post->ID))){ ?>
                <div class="img_outer">
                  <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="" />
                </div>
              <?php } ?>
              <h2 title="<?php the_title(); ?>" ><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>

              <?php the_excerpt(); ?>
              <a class="rmore" href="<?php the_permalink(); ?>" >Read more</a>
          </div>

			<?php endwhile; ?>

			       <div class="pagination clearfix" style="clear: both;">
								<?php $big = 999999999; // need an unlikely integer
										echo paginate_links( array(
										'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
										'format' => '?paged=%#%',
                    'prev_text' => __('Previous'),
                    'next_text' => __('Next'),
										'current' => max( 1, get_query_var('paged') ),
										'total' => $wp_query->max_num_pages
								) ); ?>

				       </div>
			<?php
			else : ?>
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'acodez-themes' ); ?></p>
			<div id="no-result" class="search-sec">
				<?php get_search_form();  ?>
			</div>
			<?php endif; ?>

		<!-- </div> -->
	</div>
</div>
</div>
<?php
get_footer();
