$(document).ready(function() {
	"use strict";
	jQuery.fx.interval = 30; /* Ju lägre denna är desto högre kvalitet blir det på animationer men ju lägre den är desto mer tar den på CPU. - JF */
	var fade_in_duration = 500;
	var pop_up_duration = 500; 
	
	var body_width = $("body").width();
	
	// checks if user uses a desktop JF
	if(body_width > 576) {
		$(".fade-in").appear();
		$(".fade-in").css("opacity","0"); // gör alla object som ska fadas in osynliga från början J-F
		$(".fade-in").addClass("has-not-faded"); // denna klassen läggs till på alla object som ska fadas in när de syns J-F
		
		
		/* när ett objekt med klassen ".fade-in" kommer in på skärmen*/
		$(document.body).on('appear', ".fade-in", function(event, $ef) {
            console.log("appear");
			
			var $this = $(this);
			// kollar så den inte redan har fadats in
			if($(this).hasClass('has-not-faded') ){	
				var delay = 0;
				
				if($(this).hasClass("fade-delay-05")){
					delay = 250;
				}
				else if($(this).hasClass("fade-delay-1")){
					delay = 500;
				}
				else if($(this).hasClass("fade-delay-2")){
					delay = 1000;
				}
				else if($(this).hasClass("fade-delay-3")){
					delay = 1500;
				}
				else if($(this).hasClass("fade-delay-4")){
					delay = 2000;
				} else if($(this).hasClass("fade-delay-5")){
					delay = 2500;
				} else if($(this).hasClass("fade-delay-6")){
					delay = 3000;
				} else if($(this).hasClass("fade-delay-7")){
					delay = 3500;
				}
				
				setTimeout(function()
				{
                    var fade_duration = fade_in_duration;

                    if($this.hasClass("fade-slow")){
                        fade_duration *= 2;
                    }

					$this.removeClass("has-not-faded"); // tar bort klassen som säger att detta objekten inte har fadats in än J-F
					$this.animate( {opacity: '1' }, {duration: fade_duration, queue:false, easing: "easeOutCubic"}); // höjer opaciteten så objeket blir synligt J-F
                    if(!$this.hasClass("fade-no-moving")){
                        $(".fade-in").css("position","relative");
                        $(".fade-in").css("top","20px");
                        $this.animate( { top: '0px'}, {duration: pop_up_duration, queue:false, easing: "easeOutSine"});
                    }
					
				}, delay);
				
				
				
			}
		});
		
		// när ett objekt med klassen ".fade-in" försvinner från skärmen
		//$("body").on('disappear' ,".fade-in" , function(event, $ef) {
		//	$(this).stop(); // stoppar alla pågående animationer
		//		$(this).animate( {opacity: '0' }, 0); // sänker opacity till 0 så den inte syns igen J-F
		//	$(this).addClass("has-not-faded");	 // lägger till klassen så den kan fadas igen
		//$(this).animate( { top: '20px'}, 0);
	//});
	
	$.force_appear();
	setTimeout(function()
	{
		$.force_appear();
	}, 500);
	
} else {
		$(".fade-in").css("opacity","1"); 
}

});							
