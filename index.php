<?php
/*
Plugin Name: Huff Social Plugin
Version: 1.0
Plugin URI: http://www.jaimerossello.com
Description: Minimal social icons
Author: Jaime R Portmann
Author URI: http://www.jaimerossello.com
License: GPL2
*/
session_start();

$options = get_option('plugin_options');

/* Settings Page */
add_action('admin_init', 'huff_social_options_init' );
add_action('admin_menu', 'huff_social_options_page');

function huff_social_options_init(){
	register_setting('plugin_options', 'plugin_options', 'plugin_options_validate' );

	add_settings_section('main_section', 'Add your social media URL!', 'huff_social_shortcode', __FILE__);

	add_settings_field('huff_social_size', 'Sizing', 'huff_social_size', __FILE__, 'main_section');
	add_settings_field('huff_social_title', 'Title', 'huff_social_title', __FILE__, 'main_section');

	add_settings_field('huff_social_input_0', 'call', 'huff_social_input_0', __FILE__, 'main_section');
	add_settings_field('huff_social_input_1', 'E-Mail', 'huff_social_input_1', __FILE__, 'main_section');
	add_settings_field('huff_social_input_2', 'Facebook', 'huff_social_input_2', __FILE__, 'main_section');
	add_settings_field('huff_social_input_3', 'Instagram', 'huff_social_input_3', __FILE__, 'main_section');
	add_settings_field('huff_social_input_4', 'Twitter', 'huff_social_input_4', __FILE__, 'main_section');
	add_settings_field('huff_social_input_5', 'Google', 'huff_social_input_5', __FILE__, 'main_section');
	add_settings_field('huff_social_input_6', 'Snapchat', 'huff_social_input_6', __FILE__, 'main_section');
	add_settings_field('huff_social_input_7', 'Linkedin', 'huff_social_input_7', __FILE__, 'main_section');
	add_settings_field('huff_social_input_8', 'Spotify', 'huff_social_input_8', __FILE__, 'main_section');
	add_settings_field('huff_social_input_9', 'Pinterest', 'huff_social_input_9', __FILE__, 'main_section');
	add_settings_field('huff_social_input_10', 'Youtube', 'huff_social_input_10', __FILE__, 'main_section');
	add_settings_field('huff_social_input_11', 'Paypal', 'huff_social_input_11', __FILE__, 'main_section');
	add_settings_field('huff_social_input_12', 'Vimeo', 'huff_social_input_12', __FILE__, 'main_section');
	add_settings_field('huff_social_input_13', 'Jsfiddle', 'huff_social_input_13', __FILE__, 'main_section');
	add_settings_field('huff_social_input_14', 'Codepen', 'huff_social_input_14', __FILE__, 'main_section');
	add_settings_field('huff_social_input_15', 'Soundcloud', 'huff_social_input_15', __FILE__, 'main_section');
	add_settings_field('huff_social_input_16', 'Angelco', 'huff_social_input_16', __FILE__, 'main_section');
	add_settings_field('huff_social_input_17', 'VSCO', 'huff_social_input_17', __FILE__, 'main_section');
	add_settings_field('huff_social_input_18', 'Medium', 'huff_social_input_18', __FILE__, 'main_section');
	add_settings_field('huff_social_input_19', 'Twitch', 'huff_social_input_19', __FILE__, 'main_section');
	add_settings_field('huff_social_input_20', 'tumblr', 'huff_social_input_20', __FILE__, 'main_section');

}

function huff_social_options_page() {
	add_options_page('Huff Social Plugin', 'Huff Social Plugin', 'administrator', 'huff_social_the_options_page', 'huff_social_the_options_page');
}

function huff_social_the_options_page() {
?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br></div>
		<h2>Social Huff Options</h2>
		<form action="options.php" method="post">
					<?php
if ( function_exists('wp_nonce_field') ) 
	wp_nonce_field('plugin-name-action_' . "yep"); 
?>
		<?php settings_fields('plugin_options'); ?>
		<?php do_settings_sections(__FILE__); ?>
		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
		</p>
		</form>
	</div>
<?php
}


function  huff_social_shortcode() {
	echo'<table class="form-table"><tbody><tr><th>Shortcode</th><td>[huff-social]</td></tr></tbody></table>';
}

function huff_social_size() {
	$options = get_option('plugin_options');
	$items = array("small", "big");
	echo "<select id='huff_social_size' name='plugin_options[huff_social_size]'>";
	foreach($items as $item) {
		$selected = ($options['huff_social_size']==$item) ? 'selected="selected"' : '';
		echo "<option value='$item' $selected>$item</option>";
	}
	echo "</select>";
}

function huff_social_title() {
	$options = get_option('plugin_options');
	$items = array("Disabled", "Enabled");
	echo "<select id='huff_social_title' name='plugin_options[huff_social_title]'>";
	foreach($items as $item) {
		$selected = ($options['huff_social_title']==$item) ? 'selected="selected"' : '';
		echo "<option value='$item' $selected>$item</option>";
	}
	echo "</select>";
}

function huff_social_input_0() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_0]' size='40' type='text' value='{$options['huff_social_input_0']}' />";
}
function huff_social_input_1() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_1]' size='40' type='text' value='{$options['huff_social_input_1']}' />";
}
function huff_social_input_2() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_2]' size='40' type='text' value='{$options['huff_social_input_2']}' />";
}
function huff_social_input_3() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_3]' size='40' type='text' value='{$options['huff_social_input_3']}' />";
}
function huff_social_input_4() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_4]' size='40' type='text' value='{$options['huff_social_input_4']}' />";
}
function huff_social_input_5() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_5]' size='40' type='text' value='{$options['huff_social_input_5']}' />";
}
function huff_social_input_6() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_6]' size='40' type='text' value='{$options['huff_social_input_6']}' />";
}
function huff_social_input_7() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_7]' size='40' type='text' value='{$options['huff_social_input_7']}' />";
}
function huff_social_input_8() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_8]' size='40' type='text' value='{$options['huff_social_input_8']}' />";
}
function huff_social_input_9() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_9]' size='40' type='text' value='{$options['huff_social_input_9']}' />";
}

function huff_social_input_10() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_10]' size='40' type='text' value='{$options['huff_social_input_10']}' />";
}
function huff_social_input_11() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_11]' size='40' type='text' value='{$options['huff_social_input_11']}' />";
}
function huff_social_input_12() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_12]' size='40' type='text' value='{$options['huff_social_input_12']}' />";
}
function huff_social_input_13() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_13]' size='40' type='text' value='{$options['huff_social_input_13']}' />";
}
function huff_social_input_14() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_14]' size='40' type='text' value='{$options['huff_social_input_14']}' />";
}
function huff_social_input_15() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_15]' size='40' type='text' value='{$options['huff_social_input_15']}' />";
}
function huff_social_input_16() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_16]' size='40' type='text' value='{$options['huff_social_input_16']}' />";
}
function huff_social_input_17() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_17]' size='40' type='text' value='{$options['huff_social_input_17']}' />";
}
function huff_social_input_18() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_18]' size='40' type='text' value='{$options['huff_social_input_18']}' />";
}
function huff_social_input_19() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_19]' size='40' type='text' value='{$options['huff_social_input_19']}' />";
}
function huff_social_input_20() {
	$options = get_option('plugin_options');
	echo "<input id='plugin_text_key' name='plugin_options[huff_social_input_20]' size='40' type='text' value='{$options['huff_social_input_20']}' />";
}



/* Add css, js & ajax */
add_action( 'wp_enqueue_scripts', 'social_enqueue_scripts' );
function social_enqueue_scripts() {
    
	wp_enqueue_style( 'social-huff', plugins_url( '/style.css', __FILE__ ) );
	
}

/* Add social more button */
function social_display() {

$options = get_option('plugin_options');
$size = $options['huff_social_size'];
$title = $options['huff_social_title'];

$call = $options['huff_social_input_0'];
$email = $options['huff_social_input_1'];
$facebook = $options['huff_social_input_2'];
$instagram = $options['huff_social_input_3'];
$twitter = $options['huff_social_input_4'];
$Google = $options['huff_social_input_5'];
$snapchat = $options['huff_social_input_6'];
$linkedin = $options['huff_social_input_7'];
$spotify = $options['huff_social_input_8'];
$pinterest = $options['huff_social_input_9'];
$youtube = $options['huff_social_input_10'];
$paypal = $options['huff_social_input_11'];
$vimeo = $options['huff_social_input_12'];
$jsfiddle = $options['huff_social_input_13'];
$codepen = $options['huff_social_input_14'];
$soundcloud = $options['huff_social_input_15'];
$angelco = $options['huff_social_input_16'];
$vsco = $options['huff_social_input_17'];
$medium = $options['huff_social_input_18'];
$twitch = $options['huff_social_input_19'];
$tumblr = $options['huff_social_input_20'];

$array = array('call' => $options['huff_social_input_0'], 'email' => $options['huff_social_input_1'], 'facebook' => $options['huff_social_input_2'], 'instagram' => $options['huff_social_input_3'], 'twitter' => $options['huff_social_input_4'], 'google' => $options['huff_social_input_5'], 'snapchat' => $options['huff_social_input_6'], 'linkedin' => $options['huff_social_input_7'], 'spotify' => $options['huff_social_input_8'], 'pinterest' => $options['huff_social_input_9'], 'youtube' => $options['huff_social_input_10'], 'paypal' => $options['huff_social_input_11'], 'vimeo' => $options['huff_social_input_12'], 'jsfiddle' => $options['huff_social_input_13'], 'codepen' => $options['huff_social_input_14'], 'soundcloud' => $options['huff_social_input_15'], 'angelco' => $options['huff_social_input_16'], 'vsco' => $options['huff_social_input_17'], 'medium' => $options['huff_social_input_18'], 'twitch' => $options['huff_social_input_19'], 'tumblr' => $options['huff_social_input_20']);
?>

	<ul class="hsp <?php echo $size; if($title == 'Enabled'){ echo ' ft'; }?>">

<?php foreach ($array as $key => $value){ if($value){
	
if($key == 'email'){ ?>

	<li class="<?php echo $key; ?>">
		<a href="mailto:<?php echo $value; ?>"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/img/<?php echo $key; ?>.png"/></a>
	</li>

<?php }elseif($key == 'call'){ ?>
	<li class="<?php echo $key; ?>">
		<a href="tel:<?php echo $value; ?>"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/img/<?php echo $key; ?>.png"/></a>
	</li>
<?php }else{ ?>
	<li class="<?php echo $key; ?>">
		<a target="_blank" href="<?php echo $value; ?>"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/img/<?php echo $key; ?>.png"/></a>
	</li>
	
<?php }

} } ?>

	</ul>

<?php

}
add_shortcode( 'huff-social', 'social_display');

