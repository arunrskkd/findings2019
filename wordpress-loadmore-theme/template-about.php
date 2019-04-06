<?php
/*
  Template Name: About page
 */

get_header();

wp_enqueue_script('owl');
add_action('wp_footer', 'san_scripts', 21);

function san_scripts() {
    ?>
<script>
jQuery(document).ready( function($) {
    jQuery('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    autoplay:true,
    autoplayTimeout:1000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
    });
      
</script>
<?php } ?>

<div class="sectpreviews">
   

   

<?php 
   // the query
   $the_query = new WP_Query( array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'post_status' => 'publish',
   )); 
?>
<?php  if ( $the_query->have_posts() ) : ?>
<div class="owl-carousel owl-theme"> 
<?php  while ( $the_query->have_posts() ) : $the_query->the_post();  ?>



    <div class="item"><img src="<?php echo   get_the_post_thumbnail_url();   ?>"><h4><?php  the_title();  ?></h4></div>


<?php 
endwhile;
  ?>
  </div>
<?php 
 wp_reset_postdata();
endif;  ?>

<div class="sectiontwo">

<?php $terms = get_terms( array(
    'taxonomy' => 'types',
    'hide_empty' => false
) );
$id = array();
if ( !empty($terms) ) :
   
?>
<ul class='list'>

<?php
    foreach( $terms as $category ) {
        $id[] = $category->term_id;
            
    ?>

        <li><?php echo  $category->name   ?></li>
 
    <?php   
    } ?>
     </ul>

     <?php
endif;  

?>
    
<?php for($i = 0;$i<count($id);$i++){ ?>

    <?php
$args = array( 'posts_per_page' => -1,
'post_type' => 'product','tax_query' => array(
    array(
        'taxonomy' => 'types',
        'field' => 'term_id',
        'terms' => array($id[$i]),
        'operator' =>'IN'
    )
) );
$myposts = get_posts( $args );
foreach ( $myposts as $postsz ) : 
?>
	<li><?php echo $postsz->post_title; ?></li>
<?php endforeach;
 ?>
  
   
<?php  }  ?>
</div>
<?php get_footer(); ?>
