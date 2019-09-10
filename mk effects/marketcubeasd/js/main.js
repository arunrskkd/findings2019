
(function ($) {

    $(document).ready(function(){

        $(".menuicon").click(function(){
           if($(this).hasClass("open")){
            $(this).removeClass("open");
            $(".navigation").removeClass("nav-open");
           }
           else{
            $(this).addClass("open");
            $(".navigation").addClass("nav-open");
           }
    
        });
        
        
    
    
    });
})(jQuery)