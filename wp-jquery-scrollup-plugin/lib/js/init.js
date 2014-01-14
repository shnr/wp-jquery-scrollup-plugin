(function($){

$(document).ready(function(){

	var theme = initoptions.theme;
	var options = initoptions.options;
	var opt;

	switch(theme){
		case 'custom':
			var _scrollName = (options.scrollName != "")? options.scrollName : 'scrollUp';
			var _scrollDistance = (options.scrollDistance != "")? options.scrollDistance : 300;
			var _scrollFrom = (options.scrollFrom != "")? options.scrollFrom : top;
			var _scrollSpeed = (options.scrollSpeed != "")? options.scrollSpeed : 800;
			var _easingType = (options.easingType != "")? options.easingType : 'easeOutQuint';
			var _animation = (options.animation != "")? options.animation : 'slide';
			var _animationInSpeed = (options.animationInSpeed != "")? options.animationInSpeed : 200;
			var _animationOutSpeed = (options.animationOutSpeed != "")? options.animationOutSpeed : 200;
			var _scrollText = (options.scrollText != "")? options.scrollText : 'Scroll to top';
			var _scrollTitle = (options.scrollTitle != "")? options.scrollTitle : false;
			var _scrollImg = (options.scrollImg != "")? options.scrollImg : true;

			opt = {
                scrollName: _scrollName, 
                scrollDistance: _scrollDistance, 
                scrollFrom: _scrollFrom, 
                scrollSpeed: _scrollSpeed, 
                easingType: _easingType, 
                animation: _animation, 
                animationInSpeed: _animationInSpeed, 
                animationOutSpeed: _animationOutSpeed, 
                scrollText: _scrollText, 
                scrollTitle: _scrollTitle, 
                scrollImg: _scrollImg, 
                activeOverlay: true, 
                zIndex: 2147483647 
			}
			break;
		case 'tab':
            opt = {
                    animation: 'slide',
                    activeOverlay: true
            };
            $('#scrollup-setting-css').attr('href', $('#scrollup-setting-css').attr('href').replace(/themes+\/+\w.+/,"themes/tab.css"));
			break;
		case 'pill':
            opt = {
                    animation: 'fade',
                    activeOverlay: true
            };
            $('#scrollup-setting-css').attr('href', $('#scrollup-setting-css').attr('href').replace(/themes+\/+\w.+/,"themes/pill.css"));
			break;
		case 'text':
            opt = {
                    animation: 'fade',
                    activeOverlay: true
            };
            $('#scrollup-setting-css').attr('href', $('#scrollup-setting-css').attr('href').replace(/themes+\/+\w.+/,"themes/link.css"));
			break;

		case 'text':
		default		:
            opt = {
                    animation: 'fade',
                    activeOverlay: true,
                    scrollImg: { active: true }
            };
            $('#scrollup-setting-css').attr('href', $('#scrollup-setting-css').attr('href').replace(/themes+\/+\w.+/,"themes/image.css"));
			break;

	}


    $.scrollUp(opt);

});

})(jQuery);