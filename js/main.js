$(function(){
	//set min-height
	var height = $(window).innerHeight();
	var el_heights = $('header').innerHeight() + $('nav').innerHeight() + $('footer').innerHeight();
	var margins = parseInt($('header').css("margin-top")) + parseInt($('header').css("margin-bottom"))+ parseInt($('nav').css("margin-bottom")) +parseInt($('footer').css("margin-top"));
	$("#error_404_bg, .content > .container").css("min-height", height - el_heights - margins);
	//error block
	$('#error_block').show(500);
	$('#error_block').delay(5000).hide(1000);
	$('#close_window').click(function(){$('#error_block').hide(500)});

});
$(function()
{
	//jQuery Captcha Validation
	WEBAPP = {
		cache: {},
		init: function() {
			//DOM cache
			this.cache.$refreshCaptcha = $('#refresh-captcha');
			this.cache.$captchaImg = $('img#captcha');
			this.eventHandlers();
		},
		eventHandlers: function() {
			//generate new captcha
			WEBAPP.cache.$refreshCaptcha.on('click', function(e)
			{
				WEBAPP.cache.$captchaImg.attr("src","http://book/php/captcha.php?rnd=" + Math.random());
			});
		}
	}
	WEBAPP.init();
});