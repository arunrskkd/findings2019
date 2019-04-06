<?php
get_header();
wp_enqueue_script('validate');
add_action('wp_footer', 'scripts', 25);
function scripts() {
    ?>
    <script>
                   (function ($) {
                       $.validator.addMethod("defaultInvalid", function (value, element)
                       {
                           return !(element.value == element.defaultValue);
                       });
                       $('#commentform').validate({
                           rules: {
                               author: {
                                   defaultInvalid: true
                               },
                               comment: {
                                   defaultInvalid: true
                               },
                               email: {
                                   required: true,
                                   email: true
                               },

                           },

                           messages: {
                               author: "Please enter your name",
                               comment: "Please enter your comment",
                               email: {
                                   required: "Please enter your email",
                                   email: "Invalid email address"
                               },
                           },
                       });
                        $("#commentform input, textarea").focusin(function () {
                           $(this).removeClass("error");
                       }).focusout(function () {
                           var crnt_value = $(this).val();
                           if (crnt_value == '') {
                               // $(this).parent("li").children("label").fadeIn(800);
                           }
                       });
                   })(jQuery);
       </script>
    <?php } ?>

    <div class="main-container container" id="post_<?php the_ID(); ?>">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="post clearfix" id="post-<?php the_ID(); ?>">
                <!-- <span class="post-name">Posted By
                    <span><?php// the_author_meta('display_name'); ?></span>
                    On
                    <span><?php// echo get_the_date('D, M j, Y', $post->ID); ?></span>
                </span> -->
                <h1 class="title"><?php the_title(); ?>asd </h1>
                <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
                <div class="comments-section">
                    <?php comments_template(); ?>
                </div>
            </div>
            <?php
            endwhile;
            endif; ?>
        </div>
        <?php get_footer(); ?>
