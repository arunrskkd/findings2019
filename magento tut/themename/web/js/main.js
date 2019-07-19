 define([
 'jquery','fancybox','waypoints','counter','sumoselect'
],

(function  ($,fancybox) {
		
      $(document).ready(function() {
      	$(".video-popup").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});

		$('#sorter').SumoSelect();


	  });

	$(document).ready(function($) {
		$('.counter-sec .counter').counterUp({
			delay: 10,
			time: 1000
		});

		$(function(){
			 $("#location > option").each(function() {
			   if(this.value == window.location){
			     this.selected = 'selected';
			    }
			  });
	 	});
	});
	   /*Adding + - near to quqntity in Product Detail page*/
    $('.addqty').click(function(e) { 
    e.preventDefault();
       var currentValue = parseInt( $("#qty").val());
     
       $("#qty").val(currentValue + 1);
    });

    $('.subtract').click(function(e) { 
    e.preventDefault();
        var currentValue = parseInt( $("#qty").val());
    if(currentValue==1){
      $(".addqty").disabled=true;  
    }else{
         $("#qty").val(currentValue - 1);
    }
    });
     /*Adding + - near to quqntity in Product Detail page*/
})

);
