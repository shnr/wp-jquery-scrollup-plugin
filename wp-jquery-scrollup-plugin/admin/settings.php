 <?php
$Wp_shnr_JQSCRLUP = new Wp_shnr_JQSCRLUP();
global $wpdb;
// define field names
$hidden_field_name = "hf";
$sm_param_name = "smi_id";

// define field names
$hidden_field_name = "hf";

// Define options
$scrollFromArr = array("top", "bottom");
$easingType = array(
	"easeInSine",
	"easeOutSine",
	"easeInOutSine",
	"easeInQuad",
	"easeOutQuad",
	"easeInOutQuad",
	"easeInCubic",
	"easeOutCubic",
	"easeInOutCubic",
	"easeInQuart",
	"easeOutQuart",
	"easeInOutQuart",
	"easeInQuint",
	"easeOutQuint",
	"easeInOutQuint",
	"easeInExpo",
	"easeOutExpo",
	"easeInOutExpo",
	"easeInCirc",
	"easeOutCirc",
	"easeInOutCirc",
	"easeInBack",
	"easeOutBack",
	"easeInOutBack",
	"easeInElastic",
	"easeOutElastic",
	"easeInOutElastic",
	"easeInBounce",
	"easeOutBounce",
	"easeInOutBounce",
	);
$animation = array("Fade", "slide", "none");
$scrollTheme = $Wp_shnr_JQSCRLUP->scrollTheme();
$boolean = array('true', 'false');

if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
// Get posted value
    check_admin_referer( 'nonce' );
    
    // update and redirect.
    $data = h($_POST);
    $arr_unset = array(
      '_wpnonce',
      '_wp_http_referer',
      'hf',
      'Submit'
      );
    foreach ($arr_unset as $key => $value) {
        if(isset($data[$value])){
            unset($data[$value]);
        }
    }

    update_option( WP_SHNR_JQSCRLUP_OPTIONS, $data )
        
?>
<div class="updated"><p><strong><?php _e('Success!!', WP_SHNR_JQSCRLUP_DOMAIN) ?></strong></p></div>
<?php
}
$options = get_option(WP_SHNR_JQSCRLUP_OPTIONS);

?>
<div class="wrap" >
<h2><?php _e('jQuery ScrollUp settings', WP_SHNR_JQSCRLUP_DOMAIN); ?></h2>
<div id='poststuff'>

<div id='galleryList' class="postbox">
<h3 class=""><span><?php _e('Settings', WP_SHNR_JQSCRLUP_DOMAIN); ?></span></h3>
<div class="inside">
<form name="form" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
<table id="scrollsettings">

  <tr class="main">
  	<th><p><?php _e('scrollTheme', WP_SHNR_JQSCRLUP_DOMAIN); ?></p></th>
  	<td>
  		<select name="scrollTheme" id="scrollTheme">
		<?php
		foreach ($scrollTheme as $key => $value) {
			echo (isset($options['scrollTheme']) && $options['scrollTheme'] == $value)? '<option value="'.$value.'" selected>'.$value.'</option>' : '<option value="'.$value.'">'.$value.'</option>';
		}
		?>
		</select>
		<span><?php _e('Set a scroll theme', WP_SHNR_JQSCRLUP_DOMAIN); ?></span>
  	</td>
  </tr>

  <tr>
  	<th><p><?php _e('scrollName', WP_SHNR_JQSCRLUP_DOMAIN); ?></p></th>
  	<td><input type="text" name="scrollName" value="<?php echo ($options['scrollName'] != "")? $options['scrollName'] : ""; ?>" size="50">
  		<span><?php _e('Element ID', WP_SHNR_JQSCRLUP_DOMAIN); ?></span>
  	</td>
  </tr>
  <tr>
  	<th><p><?php _e('scrollDistance', WP_SHNR_JQSCRLUP_DOMAIN); ?></p></th>
  	<td><input type="text" name="scrollName" value="<?php echo ($options['scrollDistance'] != "")? $options['scrollDistance'] : ""; ?>" size="50">
  		<span><?php _e('Distance from top/bottom before showing element (px)', WP_SHNR_JQSCRLUP_DOMAIN); ?></span>
  	</td>
  </tr>
  <tr>
  	<th><p><?php _e('scrollFrom', WP_SHNR_JQSCRLUP_DOMAIN); ?></p></th>
  	<td>
  		<select name="scrollFromArr">
  		<?php
		foreach ($scrollFromArr as $key => $value) {
			echo (isset($options['scrollFrom']) && $options['scrollFrom'] == $value)? '<option value="'.$value.'" selected>'.$value.'</option>' : '<option value="'.$value.'">'.$value.'</option>';
		}
  		?>
	  	</select>
  		<span><?php _e("'top' or 'bottom'", WP_SHNR_JQSCRLUP_DOMAIN); ?></span>
  	</td>
  </tr>
  <tr>
  	<th><p><?php _e('scrollSpeed', WP_SHNR_JQSCRLUP_DOMAIN); ?></p></th>
  	<td><input type="text" name="scrollSpeed" value="<?php echo ($options['scrollSpeed'] != "")? $options['scrollSpeed'] : ""; ?>" size="50">
  		<span><?php _e('Speed back to top (ms)', WP_SHNR_JQSCRLUP_DOMAIN); ?></span>
  	</td>
  </tr>
  <tr>
  	<th><p><?php _e('easingType', WP_SHNR_JQSCRLUP_DOMAIN); ?></p></th>
  	<td>
  		<select name="easingType">
  		<?php
		foreach ($easingType as $key => $value) {
			echo (isset($options['easingType']) && $options['easingType'] == $value)? '<option value="'.$value.'" selected>'.$value.'</option>' : '<option value="'.$value.'">'.$value.'</option>';
		}
  		?>
	  	</select>
  		<span><?php _e('Scroll to top easing', WP_SHNR_JQSCRLUP_DOMAIN); ?> <a href="http://easings.net/" target="_blank">http://easings.net/</a></span>
  	</td>
  </tr>
  <tr>
  	<th><p><?php _e('animation', WP_SHNR_JQSCRLUP_DOMAIN); ?></p></th>
  	<td>
  		<select name="animation">
  		<?php
		foreach ($animation as $key => $value) {
			echo (isset($options['animation']) && $options['animation'] == $value)? '<option value="'.$value.'" selected>'.$value.'</option>' : '<option value="'.$value.'">'.$value.'</option>';
		}
  		?>
	  	</select>
  		<span><?php _e('Fade, slide, none', WP_SHNR_JQSCRLUP_DOMAIN); ?></span>
  	</td>
  </tr>
  <tr>
  	<th><p><?php _e('animationInSpeed', WP_SHNR_JQSCRLUP_DOMAIN); ?></p></th>
  	<td><input type="text" name="animationInSpeed" value="<?php echo ($options['animationInSpeed'] != "")? $options['animationInSpeed'] : ""; ?>" size="50">
  		<span><?php _e('Animation in speed (ms)', WP_SHNR_JQSCRLUP_DOMAIN); ?></span>
  	</td>
  </tr>
  <tr>
  	<th><p><?php _e('animationOutSpeed', WP_SHNR_JQSCRLUP_DOMAIN); ?></p></th>
  	<td><input type="text" name="animationOutSpeed" value="<?php echo ($options['animationOutSpeed'] != "")? $options['animationOutSpeed'] : ""; ?>" size="50">
  		<span><?php _e('Animation out speed (ms)', WP_SHNR_JQSCRLUP_DOMAIN); ?></span>
  	</td>
  </tr>
  <tr>
  	<th><p><?php _e('scrollText', WP_SHNR_JQSCRLUP_DOMAIN); ?></p></th>
  	<td><input type="text" name="scrollText" value="<?php echo ($options['scrollText'] != "")? $options['scrollText'] : ""; ?>" size="50">
  		<span><?php _e('Text for element, can contain HTML', WP_SHNR_JQSCRLUP_DOMAIN); ?></span>
  	</td>
  </tr>
  <tr>
  	<th><p><?php _e('scrollTitle', WP_SHNR_JQSCRLUP_DOMAIN); ?></p></th>
  	<td>
  		<select name="scrollTitle">
		<?php
		foreach ($boolean as $key => $value) {
			echo (isset($options['scrollTitle']) && $options['scrollTitle'] == $value)? '<option value="'.$value.'" selected>'.$value.'</option>' : '<option value="'.$value.'">'.$value.'</option>';
		}
		?>
		</select>
		<span><?php _e('Set a custom <a> title if required. Defaults to scrollText', WP_SHNR_JQSCRLUP_DOMAIN); ?></span>
  	</td>
  </tr>
  <tr>
  	<th><p><?php _e('scrollImg', WP_SHNR_JQSCRLUP_DOMAIN); ?></p></th>
  	<td>
  		<select name="scrollImg">
		<?php
		foreach ($boolean as $key => $value) {
			echo (isset($options['scrollImg']) && $options['scrollImg'] == $value)? '<option value="'.$value.'" selected>'.$value.'</option>' : '<option value="'.$value.'">'.$value.'</option>';
		}
		?>
		</select>
  		<span><?php _e('Set true to use image', WP_SHNR_JQSCRLUP_DOMAIN); ?></span>
  	</td>
  </tr>



</table>
<?php if ( function_exists( 'wp_nonce_field' ) ) wp_nonce_field( 'nonce' ); ?>

<input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes', WP_SHNR_JQSCRLUP_DOMAIN) ?>" />
</form>

</div><!--/.inside-->
</div><!--/#galleryList-->
</div>


</div><!-- .wrap -->

