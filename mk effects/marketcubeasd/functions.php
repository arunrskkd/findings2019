<?php
/**
 * Acodez Themes functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Acodez_Themes
 */
if ( ! function_exists( 'acodez_themes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function acodez_themes_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Acodez Themes, use a find and replace
	 * to change 'acodez-themes' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'acodez-themes', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'acodez-themes' ),
		'footer' => esc_html__( 'Footer', 'acodez-themes' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


}
endif;
add_action( 'after_setup_theme', 'acodez_themes_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function acodez_themes_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'acodez-themes' ),
		'id'            => 'blog-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'acodez-themes' ),
		'before_widget' => '<div id="%1$s" class="pagewidget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'acodez_themes_widgets_init' );
// Hide Wordpress Version Generator
add_filter('the_generator', 'version');
function version() {
	return '';
}
/* Add Next Page Button in First Row */
add_filter( 'mce_buttons', 'my_add_next_page_button', 1, 2 ); // 1st row
/**
 * Add Next Page/Page Break Button
 */
function my_add_next_page_button( $buttons, $id ){
	/* only add this for content editor */
	if ( 'content' != $id )
		return $buttons;
	/* add next page after more tag button */
	array_splice( $buttons, 13, 0, 'wp_page' );
	return $buttons;
}
// Reset Post Data On Theme Change
function my_rewrite_flush() {
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'my_rewrite_flush');
wp_reset_postdata();
/**
 * Enqueue scripts and styles.
 */
function acodez_themes_scripts() {
	wp_enqueue_style( 'acodez-themes-style', get_stylesheet_uri() );
	//wp_enqueue_script( 'acodez-themes-navigation', get_template_directory_uri() . '/js/jquery.js', array(), '2017', true );
	wp_register_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);
	wp_register_script('jscrollpane', get_template_directory_uri() . '/js/jquery.jscrollpane.min.js', array('jquery'), '', true);
	wp_register_script('mousescroll', get_template_directory_uri() . '/js/mousescroll.js', array('jquery'), '', true);
	wp_register_script('aos', get_template_directory_uri() . '/js/aos.js', array('jquery'), '', true);
	wp_register_script('transit', get_template_directory_uri() . '/js/jquery.transit.min.js', array('jquery'), '', true);
	wp_register_script('tweenmax', get_template_directory_uri() . '/js/tweenmax.js', array('jquery'), '', true);
	wp_register_script('lazyload', get_template_directory_uri() . '/js/lazyload.js', array('jquery'), '', true);
	wp_register_script('barba', get_template_directory_uri() . '/js/barba.js', array('jquery'), '', true);
	wp_register_script('aboutpagejs', get_template_directory_uri() . '/js/aboutpage.js', array('jquery'), '', true);		
	
	wp_enqueue_script('main');
	wp_enqueue_script('transit');
	


}
add_action( 'wp_enqueue_scripts', 'acodez_themes_scripts' );

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

global $post;
// Register Custom Post Type
function custom_post_type() {


	//Brands post creation
	$labelsBrands = array(
		'name'                  => _x( 'Brands', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Brands', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Brands', 'text_domain' ),
		'name_admin_bar'        => __( 'Brands', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image (370px X 240px)', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$argsBrands = array(
		'label'                 => __( 'Brands', 'text_domain' ),
		'labels'                => $labelsBrands,
		'supports'              => array( 'title', 'editor','excerpt', 'thumbnail', 'custom-fields', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'brands', $argsBrands );

}
add_action( 'init', 'custom_post_type', 0 );


/* move_comment_field_to_bottom */
function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );
/* move_comment_field_to_bottom */

function twentytwelve_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
        case 'pingback' :
        case 'trackback' :
            // Display trackbacks differently than normal comments.
            ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <p><?php _e('Pingback:', 'twentytwelve'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(__('(Edit)', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?></p>
                <?php
                break;
            default :
                // Proceed with normal comments.
                global $post;
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                    <article id="comment-<?php comment_ID(); ?>" class="comment">
                        <div class="aside">
                            <div class="comment-meta comment-author vcard">
                                <div class="cmt1">
                                <?php
                                    echo get_avatar($comment, 44);
                                ?>
                                </div>
                                <div class="cmt2">
                                <?php
                                printf('<cite class="fn">%1$s %2$s</cite>', get_comment_author_link(),
                                        // If current post author is also comment author, make it known visually.
                                        ( $comment->user_id === $post->post_author ) ? '<span> ' . __('Post author', 'twentytwelve') . '</span>' : ''
                                );


                                printf('<time datetime="%2$s">%3$s</time>', esc_url(get_comment_link($comment->comment_ID)), get_comment_time('c'),
                                            /* translators: 1: date, 2: time */ sprintf(__('%1$s ', 'twentytwelve'), get_comment_date())
                                    );

                                ?>
                                </div>
                            </div><!-- .comment-meta -->

                            <?php if ('0' == $comment->comment_approved) : ?>
                                <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'twentytwelve'); ?></p>
                            <?php endif; ?>

                            <section class="comment-content comment">
                                <?php comment_text(); ?>
                                <?php edit_comment_link(__('Edit', 'twentytwelve'), '<p class="edit-link">', '</p>'); ?>
                            </section><!-- .comment-content -->

                            <div class="rep-det">



                                <div class="reply">
                                    <?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'twentytwelve'), 'after' => ' ', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                                </div><!-- .reply -->
                            </div>

                        </div>
                    </article><!-- #comment-## -->
                    <?php
                    break;
            endswitch; // end comment_type check
        }



				// ------ //
				include_once('inc/BFI_Thumb.php');


				/* Disallow Backend Editting */
				define('DISALLOW_FILE_EDIT', true);
				/* Disallow Backend Editting */
				//Disable XMLRPC
				add_filter('xmlrpc_enabled', '__return_false');

				/* ---- */
				remove_action('wp_head', 'print_emoji_detection_script', 7);
				remove_action('wp_print_styles', 'print_emoji_styles');
				function disable_embeds_init() {
						// Remove the REST API endpoint.
						remove_action('rest_api_init', 'wp_oembed_register_route');
						// Turn off oEmbed auto discovery.
						// Don't filter oEmbed results.
						remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
						// Remove oEmbed discovery links.
						remove_action('wp_head', 'wp_oembed_add_discovery_links');
						// Remove oEmbed-specific JavaScript from the front-end and back-end.
						remove_action('wp_head', 'wp_oembed_add_host_js');
				}
				add_action('init', 'disable_embeds_init', 9999);

				/* ---- */

				function my_deregister_scripts(){
					wp_deregister_script( 'wp-embed' );
				}
				add_action( 'wp_footer', 'my_deregister_scripts' );


				function my_login_logo_url() {
						return get_bloginfo('url');
				}

				add_filter('login_headerurl', 'my_login_logo_url');


				/* Change title for login screen */

				function my_login_logo_url_title() {
						return get_bloginfo('name');
				}

				add_filter('login_headertitle', 'my_login_logo_url_title');

				/* Change title for login screen */

				/* change login image */

				add_action("login_head", "my_login_head");

				function my_login_head() {
						echo "
					<style>
					body.login #login h1 a {
										background: url(" . get_theme_mod( 'acodez-themes_logo' ) . ") center no-repeat ;
										background-size: contain; width:320px; height:50px;
					}
					</style>
					";
				}

				/* change login image */

				function my_custom_login() {
					echo "
					<style>
					body.login { background: #000; }
					.login #backtoblog a, .login #nav a { color: #ffffff; }
					</style>
					";
				}

				// add_action('login_head', 'my_custom_login');



								function my_script_hide_type($src) {
										return str_replace("type='text/javascript'", '', $src);
								}
								add_filter('script_loader_tag', 'my_script_hide_type');

								function my_style_hide_type($src) {
										return str_replace("type='text/css'", '', $src);
								}
								add_filter('style_loader_tag', 'my_style_hide_type');


								function remove_recent_comments_style() {
										global $wp_widget_factory;
										remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
								}
								add_action('widgets_init', 'remove_recent_comments_style');

								/* *///////***** */
// add_filter('acf/settings/show_admin', '__return_false');


// theme option settings
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'Theme options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Media Settings',
		'menu_title'	=> 'Social Media',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));


}




/* * *********** contact form *********** */
/*
add_action('wp_ajax_nopriv_contactform', 'bi_contactform');
add_action('wp_ajax_contactform', 'bi_contactform');

function bi_contactForm() {
	if (!(isset($_POST['fname']) && !empty($_POST['fname']) && isset($_POST['email']) && !empty($_POST['email'])  )) {
		echo 'Enter all the fields';
	} else if (!is_email($_POST['email'])) {
		echo 'Sorry, You have entered an invalid Email Address';
	} else {
		if (get_field('contact_e-mail_address','option')) {
			$to = get_field('contact_e-mail_address','option');
		 } else {
			$to = get_bloginfo('admin_email');
		}

		ob_start();
		?>

		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<title>.:  :.</title>
			</head>

			<body style="background-color:#F0EEE0; margin:0px;">
				<table width="100%" border="0" cellpadding="0">
					<tr>
						<td align="center" valign="top" style="background-color:#F0EEE0; margin:0px;"><table width="572" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:18px; color:#444444; ">
								<tr>
									<td align="center" valign="top" style="padding-bottom:10px;">&nbsp;</td>
								</tr>
								<tr>
									<td align="left" valign="top" style="background-color:#FFF; padding:20px; border-right:1px solid #d6d6d6; border-bottom:2px solid #d6d6d6;">
										<p style="color:#504e4e; font-size:16px;"><span class="footer"><strong>Contact email</strong></span></p>
										<table width="100%" border="0" cellspacing="2" cellpadding="4">
											<tr>
												<td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;">Name</td>
												<td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;"><strong><?php echo $_POST['fname'] .' '.$_POST['lname']; ?></strong></td>
											</tr>
											<tr>
												<td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;">E-mail </td>
												<td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;"><strong><?php echo $_POST['email'] ?></strong></td>
											</tr>
											<tr>
												<td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;">Message</td>
												<td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;"><strong><?php echo nl2br($_POST['message']) ?></strong></td>
											</tr>

										</table>
										<p>Thank you<br />
											<a href="<?php echo home_url('/'); ?>" target="_blank" style="color:#504e4e;"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a><br />
										</p></td>
								</tr>
								<tr>
									<td align="left" valign="top" style=" text-align:center; color:#4c4c4c; font-size:11px; padding:15px 0px;"><span class="footer"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>. All rights reserved.</span></td>
								</tr>
							</table></td>
					</tr>
				</table>
			</body>
		</html>

		<?php
		$message = ob_get_contents();
		ob_end_clean();
		$subject = esc_attr( get_bloginfo( "name", "display" ) ). ' - Contact Email';
		$headers[] = 'From: ' . $_POST["name"] . ' <' . $_POST["email"] . '>';
		add_filter('wp_mail_content_type', 'ch_html_content_type');

		function ch_html_content_type() {
			return 'text/html';
		}

		$thnq = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>.:  :.</title></head><body style="background-color:#F0EEE0; margin:0px;"><table width="100%" border="0" cellpadding="0"><tr><td align="center" valign="top" style="background-color:#F0EEE0; margin:0px;"><table width="572" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:18px; color:#444444; "><tr><td align="center" valign="top" style="padding-bottom:10px;">&nbsp;</td></tr><tr><td align="left" valign="top" style="background-color:#FFF; padding:20px; border-right:1px solid #d6d6d6; border-bottom:2px solid #d6d6d6;">';
		$thnq .= '<p style="text-align: center;"><img src="'.  esc_url( get_theme_mod( 'acodez-themes_logo' ) ).'" alt="" style="width:201px; height:auto;background: #c5cacc; padding: 10px; " /></p>';
		$thnq .= '<p style="color:#504e4e; font-size:16px; padding-left: 2px;">';
		$thnq .= '<span class="footer"><strong>Email acknowledgement from '.esc_attr( get_bloginfo( "name", "display" ) ) .' website</strong></span>';
		$thnq .= '</p><table width="100%" border="0" cellspacing="2" cellpadding="4"><tr>';
		$thnq .= '<td  align="left" colspan="2" valign="middle" style="border-bottom:1px solid #e2dfd9; padding-left: 0px;">Thank you for showing your interest. We will get back to you shortly.</td>';
		$thnq .= '</tr></table><p>Thank you<br />';
		$thnq .= '<a href="'. home_url('/').'" target="_blank" style="color:#504e4e;">'.esc_attr( get_bloginfo( "name", "display" ) ).'</a><br />';
		$thnq .= '</p></td></tr><tr>';
		$thnq .= '<td align="left" valign="top" style=" text-align:center; color:#4c4c4c; font-size:11px; padding:15px 0px;"><span class="footer">'.esc_attr( get_bloginfo( "name", "display" ) ).'. All rights reserved</span></td>';
		$thnq .= '</tr></table></td></tr></table></body></html>';

		$pieces = explode(",", $to);
		$to1 =$pieces[0];

		$head[] = 'From: '.esc_attr( get_bloginfo( "name", "display" ) ).' <' . $to1 . '>';
		$subj = esc_attr( get_bloginfo( "name", "display" ) ) .' - Contact email acknowledgement';


		if (wp_mail($to, $subject, $message, $headers)) {
			echo 1;
			wp_mail($_POST["email"], $subj, $thnq, $head);
		} else {
			echo 0;
		}
	}
	die();

} */

// function to support svg image
// function add_file_types_to_uploads($file_types){
// 	$new_filetypes = array();
// 	$new_filetypes['svg'] = 'image/svg+xml';
// 	$file_types = array_merge($file_types, $new_filetypes );
// 	return $file_types;
// }
// add_action('upload_mimes', 'add_file_types_to_uploads');


//Function to limit string length
// function limitString($text, $maxchar, $end='...') {
//     if (strlen($text) > $maxchar || $text == '') {
//         $words = preg_split('/\s/', $text);
//         $output = '';
//         $i      = 0;
//         while (1) {
//             $length = strlen($output)+strlen($words[$i]);
//             if ($length > $maxchar) {
//                 break;
//             }
//             else {
//                 $output .= " " . $words[$i];
//                 ++$i;
//             }
//         }
//         $output .= $end;
//     }
//     else {
//         $output = $text;
//     }
//     return $output;
// }


//Contact form


add_action('wp_ajax_nopriv_contactform', 'db_contactform');
add_action('wp_ajax_contactform', 'db_contactform');

function db_contactform() {


    if (!(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['lname']) && !empty($_POST['lname']) && isset($_POST['phone']) && !empty($_POST['phone']) && isset($_POST['email']) && !empty($_POST['email']) )) {
        echo 'Enter all the fields';

    } else if (!is_email($_POST['email'])) {
        echo 'Sorry, You have entered an invalid Email Address';
    } else {
        if (get_field('contact_receiver_mail','option')) {
            $to = get_field('contact_receiver_mail','option');
        } else {
            $to = get_bloginfo('admin_email');
        }

        ob_start();
        ?>

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>.:  :.</title>
            </head>

            <body style="background-color:#F0EEE0; margin:0px;">
                <table width="100%" border="0" cellpadding="0">
                    <tr>
                        <td align="center" valign="top" style="background-color:#F0EEE0; margin:0px;"><table width="572" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:18px; color:#444444; ">
                                <tr>
                                    <td align="center" valign="top" style="padding-bottom:10px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" style="background-color:#FFF; padding:20px; border-right:1px solid #d6d6d6; border-bottom:2px solid #d6d6d6;">
                                        <p style="color:#504e4e; font-size:16px;"><span class="footer"><strong>Contact email</strong></span></p>
                                        <table width="100%" border="0" cellspacing="2" cellpadding="4">
                                            <tr>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;">Your Name</td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;"><strong><?php echo $_POST['name']; ?></strong></td>
                                            </tr>
                                             <tr>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;">Last Name</td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;"><strong><?php echo $_POST['lname']; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;">E-mail </td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;"><strong><?php echo $_POST['email'] ?></strong></td>
                                            </tr>
                                             <tr>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;">Phone number</td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;"><strong><?php echo $_POST['phone']; ?></strong></td>
                                            </tr>

                                            <tr>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;">Message</td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;"><strong><?php echo nl2br($_POST['message']) ?></strong></td>
                                            </tr>

                                        </table>
                                        <p>Thank you<br />
                                            <a href="<?php echo home_url('/'); ?>" target="_blank" style="color:#504e4e;"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> </a><br />
                                        </p></td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" style=" text-align:center; color:#4c4c4c; font-size:11px; padding:15px 0px;"><span class="footer"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>. All rights reserved</span></td>
                                </tr>
                            </table></td>
                    </tr>
                </table>
            </body>
        </html>

        <?php
        $message = ob_get_contents();
        ob_end_clean();
        $subject =  get_bloginfo( 'name', 'display' )  .'- Contact Email';
        $headers[] = 'From: ' . $_POST["fname"] . ' <' . $_POST["email"] . '>';
        add_filter('wp_mail_content_type', 'ch_html_content_type');

        function ch_html_content_type() {
            return 'text/html';
        }

        $thnq = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>.:  :.</title></head><body style="background-color:#F0EEE0; margin:0px;"><table width="100%" border="0" cellpadding="0"><tr><td align="center" valign="top" style="background-color:#F0EEE0; margin:0px;"><table width="572" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:18px; color:#444444; "><tr><td align="center" valign="top" style="padding-bottom:10px;">&nbsp;</td></tr><tr><td align="left" valign="top" style="background-color:#FFF; padding:20px; border-right:1px solid #d6d6d6; border-bottom:2px solid #d6d6d6;">';
        $thnq .= '<p style="background: #FFF;text-align: center;">
<img class="logo2" src="'.esc_url( get_theme_mod( 'acodez-themes_logo' ) ).'" alt="image" style="width:130px; height:auto; padding: 10px; background: #212121; " />
        </p>';
        $thnq .= '<p style="color:#504e4e; font-size:16px; padding-left: 2px;">';
        $thnq .= '<span class="footer"><strong>Email acknowledgement from '. esc_attr( get_bloginfo( 'name', 'display' ) ) .' website</strong></span>';
        $thnq .= '</p><table width="100%" border="0" cellspacing="2" cellpadding="4"><tr>';
        $thnq .= '<td  align="left" colspan="2" valign="middle" style="border-bottom:1px solid #e2dfd9; padding-left: 0px;">Thank You for showing your interest. We will get back to you shortly.</td>';
        $thnq .= '</tr></table><p>Thank you<br />';
        $thnq .= '<a href="'. home_url('/').'" target="_blank" style="color:#504e4e;">'. esc_attr( get_bloginfo( 'name', 'display' ) ) .'</a><br />';
        $thnq .= '</p></td></tr><tr>';
        $thnq .= '<td align="left" valign="top" style=" text-align:center; color:#4c4c4c; font-size:11px; padding:15px 0px;"><span class="footer">'.esc_attr( get_bloginfo( 'name', 'display' ) ).' All rights reserved</span></td>';
        $thnq .= '</tr></table></td></tr></table></body></html>';

        $pieces = explode(",", $to);
        $to1 =$pieces[0];

        $head[] = 'From:'.esc_attr( get_bloginfo( 'name', 'display' ) ).' <' . $to1 . '>';
        $subj = esc_attr( get_bloginfo( 'name', 'display' ) ).' Contact email acknowledgement';


        if (wp_mail($to, $subject, $message, $headers)) {
            echo 1;
            wp_mail($_POST["email"], $subj, $thnq, $head);
        } else {
            echo 0;
        }

    }


    die();

}
