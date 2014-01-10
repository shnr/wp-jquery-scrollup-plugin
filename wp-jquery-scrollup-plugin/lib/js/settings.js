(function($){

$(document).ready(function(){

	shnr_jq_settings_init();
	shnr_jq_theme_change();

});


function shnr_jq_settings_init(){
	var theme = $('#scrollTheme').val();
	var $settings_trs = 	$("#scrollsettings").find("tr");

	if(theme != 'custom'){
		$.each($settings_trs, function(index, val) {
			if(!$(val).hasClass('main')){
				$(val).css("display",'none');
			}
		});
	}
	return false;
}


function shnr_jq_theme_change(){
	var $settings_trs = 	$("#scrollsettings").find("tr");

	$('#scrollTheme').change(function(event) {
		if($(this).val() == "custom" ){
			$.each($settings_trs, function(index, val) {
				if(!$(val).hasClass('main')){
					$(val).fadeIn('fast', function() {
						
					});
				}
			});
		}else{
			$.each($settings_trs, function(index, val) {
				if(!$(val).hasClass('main')){
					$(val).css("display",'none');
				}
			});
		}
	});
	return false;

}

})(jQuery);