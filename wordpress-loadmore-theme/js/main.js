
jQuery('#toggle').click(function() {
   jQuery(this).toggleClass('active');
   jQuery('#overlay').toggleClass('open');
   jQuery('header').toggleClass('open-head');
  });

jQuery(document).ready(function(){
    jQuery(".icon-bars").click(function(){
        if(jQuery(".icon-bars").hasClass("active")){
            jQuery(".icon-bars").removeClass("active");
        }else{
       jQuery(".icon-bars").addClass("active");
   }
    });

});
// mobile menu
jQuery(document).ready(function () {
    jQuery('header nav ul > li.menu-item-has-children').prepend('<span class="icon-keyboard_arrow_down sub-icon"></span></span>');
});

jQuery(document).ready(function () {
    jQuery("nav .sub-icon").click(function (e) {
       jQuery(this).toggleClass("open");
       jQuery(this).parent('li').children(".sub-menu").slideToggle();
       e.preventDefault();
   });

});



//   jQuery( window ).resize(function() {
//       bindMenuHover();
//
// });

jQuery(window).scroll(function() {
           var scroll = jQuery(window).scrollTop();

           if (scroll >= 300) {
               jQuery(".header_block").addClass("fixedheader");
           } else {
               jQuery(".header_block").removeClass("fixedheader");
           }

           if (scroll >= 1200) {
               jQuery(".header_block").addClass("scrollTop");
           } else {
               jQuery(".header_block").removeClass("scrollTop");
           }

       });


