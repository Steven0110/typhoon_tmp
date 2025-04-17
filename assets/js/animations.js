$(window).scroll(function() {
	$(".hold").each(function(i, e){
        let top_of_element = $(this).offset().top;
        let bottom_of_element = $(this).offset().top + $(this).outerHeight();
        let bottom_of_screen = $(window).scrollTop() + window.innerHeight;
        let top_of_screen = $(window).scrollTop();

        if((bottom_of_screen - 100 > top_of_element) && (top_of_screen < bottom_of_element)){
			$(e).removeClass("hold");
			$(e).addClass($(e).attr("data-animation"));
			if($(e).attr("data-animation-speed") != "")
				$(e).addClass($(e).attr("data-animation-speed"));
            console.log(e);
        }
    });
});