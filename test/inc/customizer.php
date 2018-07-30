<?php
add_action('customize_register', function($customizer){
    $customizer->add_section(
        'global_theme_setting',
        array(
            'title' => 'Theme Settings',
            'priority' => 11,
        )
    );
    $customizer->add_setting(
		    'phone',
		    array('default' => '+380 689 89 90')
		);
		$customizer->add_control(
		    'phone',
		    array(
		        'label' => 'Phone Number',
		        'section' => 'global_theme_setting',
		        'type' => 'text',
		    )
		);
});

