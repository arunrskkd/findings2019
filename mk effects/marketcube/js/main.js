
(function ($) {

    $(document).ready(function(){

        $(".menuicon").click(function(){
           if($(this).hasClass("open")){
            $(this).removeClass("open");
            $(".navigation").removeClass("nav-open");
            $(". navigation-bottom").removeClass("mb-open");
           
           }
           else{
            $(this).addClass("open");
            $(".navigation").addClass("nav-open");
            $(". navigation-bottom").addClass("mb-open");
           }
    
        });
        
        
    
    
    });
})(jQuery)