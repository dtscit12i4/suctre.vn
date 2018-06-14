// Openmenu Mobile
$(".open-menu").hover(function(){
	$(this).find("i").css("cursor","pointer");
	})
	$(".open-menu").click(function(){
		if($(this).hasClass("active")) {
			$(this).removeClass('active');
			var parent = $(this).parent(".mmenu-mobile");
			parent.find(".mmenu").stop().slideUp("medium");
		} else {
	$(this).addClass('active');
		var parent = $(this).parent(".mmenu-mobile");
		parent.find(".mmenu").stop().slideDown("medium");
	}
});

// Open List
$(".title-list-pr").hover(function(){
	$(this).find("div").css("cursor","pointer");
	})
	$(".title-list-pr").click(function(){
		if($(this).hasClass("active")) {
			$(this).removeClass('active');
			var parent = $(this).parent(".wrap-left");
			parent.find(".list-left").stop().slideUp("medium");
		} else {
	$(this).addClass('active');
		var parent = $(this).parent(".wrap-left");
		parent.find(".list-left").stop().slideDown("medium");
	}
});

// Header Fixed
$(window).scroll(function() {
	if ($(this).scrollTop() > 250){
		$('.header-menu').addClass('header-fixed');
	} else {
		$('.header-menu').removeClass('header-fixed');
	}
});