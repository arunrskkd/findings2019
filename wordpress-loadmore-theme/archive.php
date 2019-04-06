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
    jQuery("#search-2 .search-form").submit(function(){
        if(jQuery('#search-2 .search-form .search-field').val() !="")
        {
            return true;
        }
        jQuery('#search-2 .search-form .search-field').focus();
        return false;
    });
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
<div class="main-container container">
		<div class="row">
			<div class="col-md-9">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
				<div class="post-list">

					<h2 class="post-title">
						<a href="<?php echo get_permalink();?>" title="<?php the_title();?>"><?php the_title(); ?></a>
					</h2>
					<span class="post-name">Posted By
						<span><?php the_author_meta('display_name'); ?></span>
						On
						<span><?php echo get_the_date('D, M j, Y', $post->ID); ?></span>
					</span>
					<?php if ( has_post_thumbnail() ) {
						echo '<figure class="thumbnail">';
						the_post_thumbnail();
						echo '</figure>';
					}?>
					<?php the_excerpt();?>
					<a class="more_cts hvr-bounce-to-top" href="<?php the_permalink(); ?>">Read more</a>
					<!-- <hr> -->
				</div>
			<?php endwhile;
			//the_posts_navigation();
			?>
			<div class="pagination cityp clearfix" style="clear: both;">
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
			<p>
				<?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'smpl' ); ?>
			</p>
			
			<?php endif; ?>
		</div>
		<div class="col-md-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php
get_footer();
