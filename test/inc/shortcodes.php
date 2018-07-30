<?php
/**
 * Create Test Shortcode
 * @return string div block
 */
function test_shortcode_func(){
	 return '<div class="test-shortcode">Hello Wordl!</div>';
}
add_shortcode('test_shortcode', 'test_shortcode_func');