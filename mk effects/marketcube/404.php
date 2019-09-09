<?php get_header();
add_action('wp_footer', 'san_scripts', 21);

function san_scripts() {
    ?>
    <script>

    jQuery(".searchform2").submit(function(){
        if(jQuery('.searchform2 #s').val() !="")
        {
            return true;
        }
        jQuery('.searchform2 #s').focus();
        return false;
    });
    </script>

<?php } ?>





<div class="main-container">
    <div class="scetion_for_not_for clearfix ">
  <div class="container clearfix">

            <div class="notf-cnt">
                <h1><?php echo __('404','acodez-themes'); ?></h1>
                <h2><?php echo __('Page Not found','acodez-themes'); ?> <span>:(</span></h2>
                <p><?php echo __('Sorry, but the page you were trying to view does not exist.','acodez-themes'); ?></p>
                <p><?php echo __('It looks like this was the result of either','acodez-themes'); ?>:</p>
                <ul>
                    <li> <?php echo __('a mistyped address','acodez-themes'); ?></li>
                    <li> <?php echo __('an out-of-date link','acodez-themes'); ?></li>
                </ul>


                   <form role="search" method="get" class="searchform2" action="<?php echo home_url('/');?>">
                        <input type="search" class="sfd" placeholder="Search …" value="" name="s">
                        <input type="submit" class="land-btn" value="Search">
                    </form>   

            </div>

</div>


    </div>

</div>

<?php get_footer(); ?>
