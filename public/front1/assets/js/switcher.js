/*-----------------------------------------------------------------------------------
/* Styles Switcher
-----------------------------------------------------------------------------------*/

window.console = window.console || (function(){
	var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
	return c;
})();
jQuery(document).ready(function($) {
	//Color Option
	$("ul.pattern .default" ).click(function(){
		$("#color-opt").attr("href", "css/colors/default.css" );
		return false;
	});
	
	$("ul.pattern .yellow" ).click(function(){
		$("#color-opt").attr("href", "css/colors/yellow.css" );
		return false;
	});
	
	$("ul.pattern .blue" ).click(function(){
		$("#color-opt").attr("href", "css/colors/blue.css" );
		return false;
	});
	
	$("ul.pattern .red" ).click(function(){
		$("#color-opt").attr("href", "css/colors/red.css" );
		return false;
	});

	$("ul.pattern .skyblue" ).click(function(){
		$("#color-opt").attr("href", "css/colors/skyblue.css" );
		return false;
	});
	
	$("ul.pattern .green" ).click(function(){
		$("#color-opt").attr("href", "css/colors/green.css" );
		return false;
	});
	
//Theme Option
	$(".light-version, .ltr-version" ).click(function(){
		$("#theme-opt").attr("href", "css/style.css" );
		return false;
	});

	$(".rtl-version" ).click(function(){
		$("#theme-opt").attr("href", "css/style-rtl.css" );
		return false;
	});
	
	$("#style-switcher .bottom a.settings").click(function(e){
		e.preventDefault();
		var div = $("#style-switcher");
		if (div.css("left") === "-90px") {
			$("#style-switcher").animate({
				left: "0px"
			}); 
		} else {
			$("#style-switcher").animate({
				left: "-90px"
			});
		}
	})
	
	$("ul.pattern li a").click(function(e){
		e.preventDefault();
		$(this).parent().parent().find("a").removeClass("active");
		$(this).addClass("active");
	})

	$("#style-switcher").animate({
		left: "-90px"
	});
});
